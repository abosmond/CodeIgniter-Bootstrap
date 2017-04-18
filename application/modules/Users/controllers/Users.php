<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    var $data;

    function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in() OR !$this->ion_auth->is_admin()) {
            redirect('Login');
        }

    }

	public function index() {

        $this->data['users'] = $this->ion_auth->users()->result();
        $this->template->load('index', 'list_users', $this->data);
    }

    public function add() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('db_username', 'Username', 'required|max_length[100]');
        $this->form_validation->set_rules('db_password', 'Password', 'required|max_length[255]');
        $this->form_validation->set_rules('db_email', 'Email', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('xx_first_name', 'First Name', 'required|max_length[50]');
        $this->form_validation->set_rules('xx_last_name', 'Last Name', 'required|max_length[50]|alpha');
        $this->form_validation->set_rules('xx_company', 'Company', 'required|max_length[100]');

        if ($this->form_validation->run() === FALSE) {

            $arr = array();
            $arr[0] = '-- select group --';

            foreach($this->ion_auth->groups()->result() as $q) {
                $arr[$q->id] = $q->name;
            }

            $this->data['group'] = $arr;
            $this->template->load('index', 'add_users', $this->data);
        }
        else {
            $additional_data = parseForm($this->input->post(), 'xx_');

            if ($this->ion_auth->register($this->input->post('db_username'), $this->input->post('db_password'), $this->input->post('db_email'), $additional_data, array($this->input->post('db_group_id')))) {
                redirect('Users');
            }
        }
    }

    public function edit($id) {

        $id = (int)$id;
        if ($id !== '' AND $id > 0) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('db_username', 'Username', 'required|max_length[100]');
            $this->form_validation->set_rules('db_email', 'Email', 'required|valid_email|max_length[100]');
            $this->form_validation->set_rules('xx_first_name', 'First Name', 'required|max_length[50]');
            $this->form_validation->set_rules('xx_last_name', 'Last Name', 'required|max_length[50]|alpha');
            $this->form_validation->set_rules('xx_company', 'Company', 'required|max_length[100]');

            if ($this->form_validation->run() === FALSE) {

                $arr = array();
                $arr[0] = '-- select group --';

                foreach($this->ion_auth->groups()->result() as $q) {
                    $arr[$q->id] = $q->name;
                }

                $this->data['group'] = $arr;
                $this->data['t'] = $this->ion_auth->user($id)->row();
                $this->data['group_id'] = $this->db->select('group_id')->from('users_groups')->where('user_id', $id)->get()->row()->group_id;

                $this->template->load('index', 'add_users', $this->data);
            }
            else {
                $data = array();
                $data = parseForm($this->input->post());

                $data['first_name'] = $this->input->post('xx_first_name');
                $data['last_name'] = $this->input->post('xx_last_name');
                $data['company'] = $this->input->post('xx_company');

                if ($this->ion_auth->update($id, $data)) {
                    redirect('Users');
                }
            }
        }
    }

    public function change($id) {

        $this->load->library('form_validation');
        if ($id !== '') {
            $this->form_validation->set_rules('db_password', 'Password', 'required|max_length[255]');

            if ($this->form_validation->run() === FALSE) {
                $this->template->load('index', 'change_password_user');
            }
            else {
                $id = base64_decode($this->input->post('aWQ='));
                $pass = $this->input->post('db_password');

                if ($this->ion_auth->update($id, array('password' => $pass))) {
                    redirect('Users');
                }
            }
        }
    }

    public function delete($id) {

        $id = (int)$id;

        if ($id !== '' AND $id > 0) {
            if ($this->ion_auth->delete_user($id)) {
                redirect('Users');
            }
        }
    }
}

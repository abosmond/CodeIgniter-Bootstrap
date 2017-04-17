<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()	{
        $this->load->library('form_validation');

		if ($this->ion_auth->logged_in()) {
            redirect('Login/home', 'refresh');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('passwd', 'Password', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        }
        else {
            if ($this->ion_auth->login($this->input->post('username'), $this->input->post('passwd'))) {
                redirect('Home');
            }
            else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('Login', 'refresh');
            }
        }
	}

    public function logout() {
        if ($this->ion_auth->logout()) {
            redirect('Login');
        }
    }

    public function home() {
        echo 'sukses';
    }
}

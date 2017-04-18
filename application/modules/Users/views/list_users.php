<section class="content-header">
    <h1>
        Users
        <small>List of users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
    <h3 class="box-title"></h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
    <th>Username</th>
    <th>Email</th>
    <th>IP Adress(s)</th>
    <th>Company</th>
    <th>Last Login</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php
    if ($users) {

        foreach ($users as $t) {
            ?>
            <tr>
                <td><?php echo $t->username;?></td>
                <td><?php echo $t->email;?></td>
                <td><?php echo $t->ip_address;?></td>
                <td><?php echo $t->company;?></td>
                <td><?php echo $t->last_login;?></td>
                <td>
                    <p>
                        <!-- <button type="button" class="btn bg-purple margin">.btn.bg-purple</button>
                        <button type="button" class="btn bg-navy margin">.btn.bg-navy</button> -->
                        <a href="<?php echo base_url()?>Users/change/<?php echo $t->id;?>"><button type="button" class="btn bg-orange margin">Change Password</button></a>
                        <a href="<?php echo base_url()?>Users/edit/<?php echo $t->id;?>"><button type="button" class="btn bg-olive margin">Edit</button></a>
                        <a href="<?php echo base_url()?>Users/delete/<?php echo $t->id;?>"><button type="button" class="btn bg-red margin">Delete</button></a>
                    </p>
                </td>
            </tr>
<?php
        }
    }
?>
</tbody>
</table>

<p>
    <a href="<?php echo base_url();?>Users/add"><button type="button" class="btn bg-maroon btn-flat margin">Add User</button></a>
</p>

</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
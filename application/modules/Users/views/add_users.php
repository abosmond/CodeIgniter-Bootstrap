<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Users
        <small>Add User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('Users');?>">Users</a></li>
        <li class="active">Add User</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<!-- left column -->
<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <!-- <form role="form"> -->
        <?php echo form_open(''); ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="username" class="form-control" id="exampleInputUsername1" placeholder="Enter Username" name="db_username" value="<?php echo set_value('db_username', @$t->username);?>">
                    <?php echo form_error('db_username'); ?>
                </div>
                <?php
                if ($this->uri->segment(3) == 'add') {
                    ?>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                               name="db_password">
                        <?php echo form_error('db_password'); ?>
                    </div>
                <?php
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="db_email" value="<?php echo set_value('db_email', @$t->email);?>">
                    <?php echo form_error('db_email'); ?>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="Enter First Name" name="xx_first_name" value="<?php echo set_value('xx_first_name', @$t->first_name);?>">
                    <?php echo form_error('xx_first_name'); ?>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter Last Name" name="xx_last_name" value="<?php echo set_value('xx_last_name', @$t->last_name);?>">
                    <?php echo form_error('xx_last_name'); ?>
                </div>
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" class="form-control" placeholder="Enter Company" name="xx_company" value="<?php echo set_value('xx_company', @$t->company);?>">
                    <?php echo form_error('xx_company'); ?>
                </div>
                <div class="form-group">
                    <label>Group</label>
                    <?php echo form_dropdown('db_group_id', $group, @$group_id, 'class="form-control"');?>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        <?php echo form_close(); ?>
    </div>
    <!-- /.box -->
</div>
<!--/.col (left) -->
<!-- right column -->

<!--/.col (right) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Users
        <small>Change Password</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('Users');?>">Users</a></li>
        <li class="active">Change Password</li>
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
            <h3 class="box-title">Change Password</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <!-- <form role="form"> -->
        <?php echo form_open(''); ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="db_password">
                    <input type="hidden" name="<?php echo base64_encode('id')?>" value="<?php echo base64_encode($this->uri->segment(3))?>">
                    <?php echo form_error('db_password'); ?>
                </div>
            </div>

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
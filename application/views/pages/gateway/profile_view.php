<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">
      <a href="<?php echo base_url().'profile';?>">Profile</a>
    </li>
  </ol>
  <div class="row">
    <div class="col-md-6">
      <?php echo $this->session->flashdata('profile_msg'); ?>
      <form class="form-horizontal" action="<?php echo base_url().'manage_user/profile'; ?>" method="POST">
        <div class="form-group">
          <label for="inputName" class="col-sm-4 control-label">Name</label>
          <div class="col-sm-8">
            <input type="hidden" class="form-control" id="inputID" value="<?php echo $this->session->userdata('id'); ?>" required="" name="id">
            <input type="text" class="form-control" id="inputName" value="<?php echo $this->session->userdata('name'); ?>" required="" name="name">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-sm-4 control-label">Email</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="inputEmail" value="<?php echo $this->session->userdata('email'); ?>" required="" name="email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPhone" class="col-sm-4 control-label">Phone</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="inputPhone" value="<?php echo $this->session->userdata('phone'); ?>" required="" name="phone">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8">
            <button type="submit" class="btn btn-info btn-md"><i class="fa fa-refresh"></i> Update Profile</button>   
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <?php echo $this->session->flashdata('password_msg'); ?>
      <form class="form-horizontal" action="<?php echo base_url().'manage_user/password'; ?>" method="POST">
        <div class="form-group">
          <label for="inputCurrentPassword" class="col-sm-4 control-label">Current Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="inputCurrentPassword" value="" required="" name="current_password">
          </div>
        </div>
        <div class="form-group">
          <label for="inputNewPassword" class="col-sm-4 control-label">New Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control cpass" id="inputNewPassword" value="" required="" name="new_password" id="new_password">
          </div>
        </div>
        <div class="form-group">
          <label for="inputConfirmPassword" class="col-sm-4 control-label">Confirm New Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control cpass" id="inputConfirmPassword" value="" required="" name="confirm_new_password" id="confirm_new_password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8">
            <button type="submit" class="btn btn-info btn-md"><i class="fa fa-refresh"></i> Change Password</button>   
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
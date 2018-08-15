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
      <form class="form-horizontal">
        <div class="form-group">
          <label for="inputName" class="col-sm-4 control-label">Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="inputName" value="<?php echo $this->session->userdata('name'); ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-sm-4 control-label">Email</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="inputEmail" value="<?php echo $this->session->userdata('email'); ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPhone" class="col-sm-4 control-label">Phone</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="inputPhone" value="<?php echo $this->session->userdata('phone'); ?>">
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
      <form class="form-horizontal">
        <div class="form-group">
          <label for="inputCurrentPassword" class="col-sm-4 control-label">Current Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="inputCurrentPassword" value="">
          </div>
        </div>
        <div class="form-group">
          <label for="inputNewPassword" class="col-sm-4 control-label">New Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="inputNewPassword" value="">
          </div>
        </div>
        <div class="form-group">
          <label for="inputConfirmPassword" class="col-sm-4 control-label">Confirm New Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="inputConfirmPassword" value="">
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
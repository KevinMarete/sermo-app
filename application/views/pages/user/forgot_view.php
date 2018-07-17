<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $page_title; ?></title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url().'public/template/sbadmin/vendor/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url().'public/template/sbadmin/vendor/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url().'public/template/sbadmin/css/sb-admin.css';?>" rel="stylesheet">
  <!--favicon-->
  <link href="<?php echo base_url().'public/img/favicon.ico';?>" rel="shortcut icon" type="text/css"> 
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
        Reset Password <?php echo $this->session->flashdata('user_msg'); ?>
      </div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form action="<?php echo base_url().'forgot-pass';?>" method="POST">
          <div class="form-group">
            <input class="form-control" id="input_email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" required="">
          </div>
          <button class="btn btn-primary btn-block">Reset Password</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url().'user/register'; ?>">Register an Account</a>
          <a class="d-block small" href="<?php echo base_url().'user/login'; ?>">Login Page</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url().'public/template/sbadmin/vendor/jquery/jquery.min.js';?>"></script>
  <script src="<?php echo base_url().'public/template/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url().'public/template/sbadmin/vendor/jquery-easing/jquery.easing.min.js';?>"></script>
</body>

</html>

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
        <div class="text-center mb-0">
          <img class="mb-0" src="<?php echo base_url().'public/img/logo.png';?>" alt="" width="200" height="150">
          <h1 class="h3 mb-0 font-weight-normal">NIOJI</h1>
          <p>
            <?php echo $this->session->flashdata('user_msg');?>
          </p>
        </div>
      </div>
      <div class="card-body">
        <form action="<?php echo base_url().'authenticate';?>" method="POST">
          <div class="form-group">
            <label for="emaill_address">Email address</label>
            <input class="form-control" id="input_emaill_address" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required="">
          </div>
          <div class="form-group">
            <label for="inputpassword">Password</label>
            <input class="form-control" id="inputpassword" type="password" placeholder="Password" name="password" required="">
          </div>
          <button class="btn btn-info btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url().'user/register'; ?>">Register an Account</a>
          <a class="d-block small" href="<?php echo base_url().'user/forgot-pass'; ?>">Forgot Password?</a>
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

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
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Register an Account <?php echo $this->session->flashdata('user_msg'); ?>
      </div>
      <div class="card-body">
        <form action="<?php echo base_url().'registration';?>" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="input_firstname">First name</label>
                <input class="form-control" id="input_firstname" type="text" aria-describedby="nameHelp" placeholder="Enter first name" name="firstname" required="">
              </div>
              <div class="col-md-6">
                <label for="input_lastname">Last name</label>
                <input class="form-control" id="input_lastname" type="text" aria-describedby="nameHelp" placeholder="Enter last name" name="lastname" required="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="input_email">Email address</label>
            <input class="form-control" id="input_email" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required="">
          </div>
          <div class="form-group">
            <label for="input_phone">Phone Number</label>
            <input class="form-control" id="input_phone" type="number" aria-describedby=phoneHelp" placeholder="Enter phone" name="phone" required="">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="input_password">Password</label>
                <input class="form-control" id="input_password" type="password" placeholder="Password" name="password" required="">
              </div>
              <div class="col-md-6">
                <label for="input_cpassword">Confirm password</label>
                <input class="form-control" id="input_cpassword" type="password" placeholder="Confirm password" required="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="input_country">Country</label>
            <select class="form-control" id="input_country" name="country" required="">
              <option value="ke" selected="selected">Kenya</option>
              <option value="ug">Uganda</option>
              <option value="tz">Tanzania</option>
            </select>
          </div>
          <button class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url().'user/login'; ?>">Login Page</a>
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

  <script type="text/javascript">
        $(function(){
          $("#input_password").on("change", validatePassword)
          $("#input_cpassword").on("change", validatePassword)

          function validatePassword(){
              var password = $("#input_password").val()
              var confirm_password = $("#input_cpassword").val()
              if(password != confirm_password && confirm_password !=='') {
                  alert("Passwords Don't Match");
              }
          }
        });
    </script>

</body>

</html>

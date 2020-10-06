<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Elite Management- Tenant Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('admin_assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('admin_assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('admin_assets/'); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('admin_assets/'); ?>dist/css/AdminLTE.min.css">
  
    <style>

    .tenantbackground{
     background-image: url("<?php echo base_url('admin_assets/'); ?>dist/img/signup-background.jpg");
    }
    .login-box {
    background: #ffffff;
    width: 520px;
    border-radius: 7px 7px 7px 7px;
        padding-left: 20px;
    padding-right: 20px;
    padding-top: 17px;
    padding-bottom: 30px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    .login-box-body {
    background: #ffffff;
    width: 500px;
    border-radius: 7px 7px 7px 7px;
        padding-left: 20px;
    padding-right: 20px;
    }
    .tenantform input {
    height: 52px;
    border-radius: 7px 7px 7px 7px;
    border: 1px solid #bab9b7;
  }
  button.btn.btn-primary.btn-block.btn-flat {
    padding: 14px;
    font-size: 18px;
    background: #389c38;
    border-radius: 12px;
}
.login-logo, .register-logo {
   
    margin-bottom: 2px;
    
}
.bcaklink {
    text-align: center;
    color: #389c38;
    font-size: 14px;
}
.bcaklink a{
    color: #389c38;
}
.lab{
   font-size: 12px;
   color:black;
   font-weight: bold; 
   }
.login-box-msg{
   font-size: 14px;
   color:black;
   }

.icon {
    margin-left: 93%;
    margin-top: -32px;
}   
  </style>
  
</head>
<body class="hold-transition login-page tenantbackground">
<div class="login-box">
  <div class="login-logo">
    <span><img src="<?php echo base_url('admin_assets/'); ?>dist/img/logo.png" class="user-image" alt="User Image"></span>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Welcome back Tenant, Please login into your account.</p>

    <form action="<?php echo base_url('tenant/login/validate_login'); ?>" method="post" id="staff_login1">
      <div class="form-group has-feedback tenantform">
        <label class="lab">Username/Email</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username/Email">
      </div>
      <div class="form-group has-feedback tenantform">
        <label class="lab">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
         <div class="icon"><i class="fa fa-eye-slash crosseye" aria-hidden="true" onclick="showpassword()"></i>
          <i class="fa fa-eye openeye" aria-hidden="true" onclick="hidepassword()"></i></div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <?php echo $this->session->flashdata("logout_success"); ?>
          <?php echo $this->session->flashdata("login_first"); ?>
          <div id="res"></div>
        </div>
        <!-- /.col -->
       
        <div class="col-xs-4">

        </div></div><br>
        <!-- /.col -->
        <div class="row">
        <div class="col-xs-12 adminbutton">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <div class="bcaklink"><a href="http://localhost/elite"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Elite management site</a></div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script type="text/javascript">
  function base_url(url = ''){
    return '<?php echo base_url(); ?>' + url ;
  }
</script>
<!-- jQuery 3 -->
<script src="<?php echo base_url('admin_assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('admin_assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('admin_assets/'); ?>scripts.js"></script>
<!-----     show password ------------------------->
<script>
  $('.openeye').hide();
  function showpassword() {
  $('.openeye').show();
  $('.crosseye').hide();
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script>
 
  function hidepassword() {
  $('.openeye').hide();
  $('.crosseye').show();
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>

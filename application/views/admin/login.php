<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- base_url() = http://localhost/ventas_ci/-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">

</head>
<body class="hold-transition login-page" style="background-image: url('<?php echo base_url() ?>img/fondo.png');">
    <div class="login-box" >
        <!-- /.login-logo -->
        <div class="login-box-body" style="background-color:#6e0305; width: 100%; min-height: 90%">
          <div align="center">
          <h2>VENTAS-IHANA</h2>
          </div>
            <div align="center">
              <img src="<?php echo base_url()?>/img/logo.png" class="img-circle" alt="Cinque Terre" style="width: 150px; height: 150px;">
            </div>
            <p class="login-box-msg">Introduzca sus datos correspondientes</p>
            <?php if($this->session->flashdata("error")):?>
              <div class="alert alert-danger">
                <p><?php echo $this->session->flashdata("error")?></p>
              </div>
            <?php endif; ?>
            <form action="<?php echo base_url();?>auth/login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Usuario" name="username" style="background-color:#6e0305; width: 100%; min-height: 90%">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" style="background-color:#6e0305; width: 100%; min-height: 90%">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12" >
                        <button type="submit" class="btn btn-primary btn-block btn-flat"style="background-color:#6e0305; width: 100%; min-height: 90%">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

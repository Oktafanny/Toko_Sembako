<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url('assets/admin/production/images/logo.png');?>" type="image/ico" />

    <title>Posyandu Harapan Bangsa</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/admin/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/admin//vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('assets/admin/vendors/animate.css/animate.min.css');?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/admin/build/css/custom.min.css');?>" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo site_url('adminpanel/login');?>" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" >Log in</button>
                <!-- <button><a class="reset_pass">Lost your password?</a></button> -->
              </div>

              

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-heartbeat"></i>&nbsp;&nbsp;
                   Posyandu Harapan Bangsa</h1>
                  <p>©2023 Kelompok Posyandu</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

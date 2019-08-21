<?php
$sql = $this->db->get('setting');
$exec = $sql->row();
$logo = $exec->CompanyLogo;
$companyname = $exec->CompanyName;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cabinet TopGrowth Futures</title>
        <!-- start: META -->
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <!-- start: GOOGLE FONTS -->
        <!--        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />-->
        <!-- end: GOOGLE FONTS -->
        <!-- start: MAIN CSS -->
        <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico">
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/themify-icons/themify-icons.min.css">
        <link href="<?php echo base_url();?>vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
        <!-- end: MAIN CSS -->
        <!-- start: CLIP-TWO CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/theme-1.css" id="skin_color" />
        <!-- end: CLIP-TWO CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/nprogress/nprogress.css" />
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body class="login">
        <!-- start: LOGIN -->
        <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="logo margin-top-30">
                    <img src="<?php echo base_url('uploads/logo/') . $logo;?>" alt="logo" style="width: 240px; height: 60px;"/>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $this->session->flashdata('msg');?>
                    </div>
                </div>
                <!-- start: LOGIN BOX -->
                <div class="box-login">
                    <form class="form-login" action="<?php echo base_url();?>login/user_login" method="POST">
                        <fieldset>
                            <legend>
                                Sign in to your account
                            </legend>
                            <p>
                                Please enter your name and password to log in.
                            </p>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="username" placeholder="Email">
                                    <i class="fa fa-user"></i> </span>
                                <span class="text-danger"><?php echo form_error('username');?></span>
                            </div>
                            <div class="form-group form-actions">
                                <span class="input-icon">
                                    <input type="password" class="form-control password" name="password" placeholder="Password">
                                    <i class="fa fa-lock"></i>
                                    <span class="text-danger"><?php echo form_error('password');?></span>
                                </span>
                            </div>
                            <div class="form-actions">
                                <!--                                <div class="checkbox clip-check check-primary">
                                                                    <input type="checkbox" id="remember" value="1">
                                                                    <label for="remember">
                                                                        Keep me signed in
                                                                    </label>
                                                                </div>-->
                                <button type="submit" name="btn_login" class="btn btn-info pull-right">
                                    Login <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                            <div class="new-account">
                                Don't have an account yet?
                                <a href="<?php echo base_url();?>signup">
                                    Create an account
                                </a>
                            </div>
                        </fieldset>
                    </form>
                    <!-- start: COPYRIGHT -->
                    <div class="copyright">
                        &copy; 2017<span class="text-bold text-uppercase"> <?=$companyname;?></span>. <span>All rights reserved</span>
                    </div>
                    <!-- end: COPYRIGHT -->
                </div>
                <!-- end: LOGIN BOX -->
            </div>
        </div>
        <!-- end: LOGIN -->
        <!-- start: MAIN JAVASCRIPTS -->
        <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>vendor/modernizr/modernizr.js"></script>
        <script src="<?php echo base_url();?>vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="<?php echo base_url();?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url();?>vendor/switchery/switchery.min.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?php echo base_url();?>vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="<?php echo base_url();?>vendor/nprogress/nprogress.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="<?php echo base_url();?>assets/js/main.js"></script>
        <!-- start: JavaScript Event Handlers for this page -->
        <script src="<?php echo base_url();?>assets/js/login.js"></script>
        <script>
//            NProgress.start();
//            setTimeout(function () {
//                NProgress.done();
//                $('.fade').removeClass('out');
//            }, 1000);

        </script>
        <script>
            jQuery(document).ready(function () {
                Main.init();
                Login.init();
            });
        </script>
        <!-- end: JavaScript Event Handlers for this page -->
        <!-- end: CLIP-TWO JAVASCRIPTS -->
    </body>
    <!-- end: BODY -->
</html>
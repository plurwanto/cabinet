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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/nprogress/nprogress.css" />
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>
    <body class="login">
        <!-- start: REGISTRATION -->
        <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="logo margin-top-30">
                    <img src="<?php echo base_url('uploads/logo/') . $logo;?>" alt="logo" style="width: 240px; height: 60px;"/>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $this->session->flashdata('msg');?>
                    </div>
                </div>
                <!-- start: REGISTER BOX -->
                <div class="box-register">
                    <form action="<?php echo base_url();?>signup/registration" method="post" class="form-register">
                        <fieldset>
                            <legend>
                                Sign Up
                            </legend>
                            <p>
                                Enter your personal details below:
                            </p>
                            <div class="form-group">
                                <input type="text" class="form-control" name="fname" placeholder="Full Name" required="" value="<?php echo @$_POST['fname']?>">
                                <span class="text-danger"><?php echo form_error('fname');?></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Mobile Phone" required="" value="<?php echo @$_POST['phone']?>">
                                <span class="text-danger"><?php echo form_error('phone');?></span>
                            </div>

                            <p>
                                Enter your account details below:
                            </p>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo @$_POST['email']?>">
                                    <i class="fa fa-envelope"></i> </span>
                                <span class="text-danger"><?php echo form_error('email');?></span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                                    <i class="fa fa-lock"></i> </span>
                                <span class="text-danger"><?php echo form_error('password');?></span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="password" class="form-control" name="confirmpswd" placeholder="Password Again" required="">
                                    <i class="fa fa-lock"></i> </span>
                                <span class="text-danger"><?php echo form_error('confirmpswd');?></span>
                            </div>

                            <div class="form-actions">
                                <p>
                                    Already have an account?
                                    <a href="<?php echo base_url();?>login">
                                        Log-in
                                    </a>
                                </p>
                                <button type="submit" class="btn btn-info pull-right">
                                    Submit <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                    <!-- start: COPYRIGHT -->
                    <div class="copyright">
                        &copy; 2017<span class="text-bold text-uppercase"> <?=$companyname;?></span>. <span>All rights reserved</span>
                    </div>
                    <!-- end: COPYRIGHT -->
                </div>
                <!-- end: REGISTER BOX -->
            </div>
        </div>
        <!-- end: REGISTRATION -->
        <!-- start: MAIN JAVASCRIPTS -->
        <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
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
            NProgress.start();
            setTimeout(function () {
                NProgress.done();
                $('.fade').removeClass('out');
            }, 1000);

        </script>
        <script>
//            jQuery(document).ready(function () {
//                Main.init();
//                Login.init();
//            });
        </script>
        <!-- end: JavaScript Event Handlers for this page -->
        <!-- end: CLIP-TWO JAVASCRIPTS -->
    </body>
    <!-- end: BODY -->

</html>
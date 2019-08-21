<?php
$this->load->library('session');
$this->load->model('settings/global_config_model');
$session_name = $this->session->userdata('fullname');
$userId = $this->session->userdata('userId');

$config = new Global_config_model();

if (!empty($userId)) {
    $setup_company = $config->getSetting();
    $setup_user_profile = $config->getUserInfoById($userId);
    $menu = $config->category_menu();

    $username = $setup_user_profile->FullName;
    $photo = $setup_user_profile->photo_profile;
    $logo = $setup_company->CompanyLogo;
    $companyname = $setup_company->CompanyName;

    $uri = $this->uri->segment(1);
    $breadchum = $config->getMenuBreadcrumb($uri);
} else {
    redirect('login');
}
?>
<!DOCTYPE html>
<html lang="en">
    <!-- start: HEAD -->
    <head>
        <title>Cabinet Topgrowth</title>
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
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/fontawesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/themify-icons/themify-icons.min.css" />
        <link href="<?php echo base_url();?>vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
        <!-- end: MAIN CSS -->
        <link href="<?php echo base_url();?>vendor/select2/select2.min.css" rel="stylesheet" media="screen">
        <!-- start: CLIP-TWO CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/theme-4.css" id="skin_color" />

        <link href="<?php echo base_url();?>vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap-fileinput/jasny-bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/nprogress/nprogress.css" />
        <!-- end: CLIP-TWO CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
<!--        <script src="<?php echo base_url();?>vendor/jquery-validation/sample/jquery.validate.js"></script>-->
    </head>
    <!-- end: HEAD -->
    <body>
        <noscript>This site requires Javascript. Please enable Javascript in your browser for this site.</noscript>
        <div id="app">
            <!-- sidebar -->
            <div class="sidebar app-aside" id="sidebar">
                <div class="sidebar-container perfect-scrollbar">
                    <nav>
                        <!-- start: MAIN NAVIGATION MENU -->

                        <?php
                        echo $menu;
                        ?>


                        <!-- end: MAIN NAVIGATION MENU -->

                    </nav>
                </div>
            </div>

            <!-- / sidebar -->
            <div class="app-content">
                <!-- start: TOP NAVBAR -->
                <header class="navbar navbar-default navbar-static-top">
                    <!-- start: NAVBAR HEADER -->
                    <div class="navbar-header">
                        <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                            <i class="ti-align-justify"></i>
                        </a>
                        <a class="navbar-brand" href="#">
                            <img src="<?php echo base_url('uploads/logo/') . $logo;?>" alt="logo" style="width: 160px; height: 50px;"/>
                        </a>
                        <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
                            <i class="ti-align-justify"></i>
                        </a>
                        <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="ti-view-grid"></i>
                        </a>
                    </div>
                    <!-- end: NAVBAR HEADER -->
                    <!-- start: NAVBAR COLLAPSE -->
                    <div class="navbar-collapse collapse">

                        <ul class="nav navbar-right">
                            <!-- start: MESSAGES DROPDOWN -->
                            <!--                            <li class="dropdown">
                                                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                                                <span class="dot-badge partition-red"></span> <i class="ti-comment"></i> <span>MESSAGES</span>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large">
                                                                <li>
                                                                    <span class="dropdown-header"> Unread messages</span>
                                                                </li>
                                                                <li>
                                                                    <div class="drop-down-wrapper ps-container">
                                                                        <ul>
                                                                            <li class="unread">
                                                                                <a href="javascript:;" class="unread">
                                                                                    <div class="clearfix">
                                                                                        <div class="thread-image">
                                                                                            <img src="<?php echo base_url();?>assets/images/avatar-2.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="thread-content">
                                                                                            <span class="author">Nicole Bell</span>
                                                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
                                                                                            <span class="time"> Just Now</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;" class="unread">
                                                                                    <div class="clearfix">
                                                                                        <div class="thread-image">
                                                                                            <img src="<?php echo base_url();?>assets/images/avatar-3.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="thread-content">
                                                                                            <span class="author">Steven Thompson</span>
                                                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
                                                                                            <span class="time">8 hrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;">
                                                                                    <div class="clearfix">
                                                                                        <div class="thread-image">
                                                                                            <img src="<?php echo base_url();?>assets/images/avatar-5.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="thread-content">
                                                                                            <span class="author">Kenneth Ross</span>
                                                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
                                                                                            <span class="time">14 hrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <li class="view-all">
                                                                    <a href="#">
                                                                        See All
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>-->
                            <!-- end: MESSAGES DROPDOWN -->
                            <!-- start: ACTIVITIES DROPDOWN -->
                            <!--                            <li class="dropdown">
                                                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="ti-check-box"></i> <span>ACTIVITIES</span>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large">
                                                                <li>
                                                                    <span class="dropdown-header"> You have new notifications</span>
                                                                </li>
                                                                <li>
                                                                    <div class="drop-down-wrapper ps-container">
                                                                        <div class="list-group no-margin">
                                                                            <a class="media list-group-item" href="">
                                                                                <img class="img-circle" alt="..." src="<?php echo base_url();?>assets/images/avatar-1.jpg">
                                                                                <span class="media-body block no-margin"> Use awesome animate.css <small class="block text-grey">10 minutes ago</small> </span>
                                                                            </a>
                                                                            <a class="media list-group-item" href="">
                                                                                <span class="media-body block no-margin"> 1.0 initial released <small class="block text-grey">1 hour ago</small> </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="view-all">
                                                                    <a href="#">
                                                                        See All
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>-->
                            <!-- end: ACTIVITIES DROPDOWN -->
                            <!-- start: LANGUAGE SWITCHER -->
                            <!--                            <li class="dropdown">
                                                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="ti-world"></i> English
                                                            </a>
                                                            <ul role="menu" class="dropdown-menu dropdown-light fadeInUpShort">
                                                                <li>
                                                                    <a href="#" class="menu-toggler">
                                                                        Deutsch
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="menu-toggler">
                                                                        English
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="menu-toggler">
                                                                        Italiano
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>-->
                            <!-- start: LANGUAGE SWITCHER -->
                            <!-- start: USER OPTIONS DROPDOWN -->
                            <li class="dropdown current-user">
                                <a href class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                    if (empty($photo)) {
                                        ?>
                                        <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo" id="noimage"><span class="username"><?php echo $username;?> <i class="ti-angle-down"></i></span>
                                    <?php } else {?>
                                        <img src="<?php echo base_url('uploads/profile/') . $photo;?>" alt="photo" id="noimage"><span class="username"><?php echo $username;?> <i class="ti-angle-down"></i></span>
                                    <?php }?>

                                </a>
                                <ul class="dropdown-menu dropdown-dark">
                                    <li>
                                        <a href="<?php echo base_url();?>master/profile/">
                                            My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>logout">
                                            Log Out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end: USER OPTIONS DROPDOWN -->
                        </ul>

                    </div>
                    <a class="dropdown-off-sidebar sidebar-mobile-toggler hidden-md hidden-lg" data-toggle-class="app-offsidebar-open" data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">
                        &nbsp;
                    </a>

                    <!-- end: NAVBAR COLLAPSE -->
                </header>
                <!-- end: TOP NAVBAR -->
                <div class="main-content" >
                    <div class="wrap-content container" id="container">
                        <!-- start: PAGE TITLE -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="clip-home-3"></i>
                                <a href="#">
                                    <?php echo ucwords($this->uri->segment(1));?>
                                </a>
                            </li>
                            <li class="active">
                                <?php echo ucwords($this->uri->segment(2));?>
                            </li>
                        </ol>
                        <!-- end: PAGE TITLE -->
                        <!-- start: YOUR CONTENT HERE -->
                        <?php $this->load->view($content);?>
                        <!-- end: YOUR CONTENT HERE -->
                    </div>
                </div>
            </div>
            <!-- start: FOOTER -->
            <footer>
                <div class="footer-inner">
                    <div class="pull-left">
                        &copy; 2017<span class="text-bold text-uppercase"> <?=$companyname;?></span>. <span>All rights reserved</span>
                    </div>
                    <div class="pull-right">
                        <span class="go-top"><i class="ti-angle-up"></i></span>
                    </div>
                </div>
            </footer>
            <!-- end: FOOTER -->
        </div>
        <!-- start: MAIN JAVASCRIPTS -->
        <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>vendor/modernizr/modernizr.js"></script>
<!--        <script src="<?php echo base_url();?>vendor/jquery-cookie/jquery.cookie.js"></script>-->
        <script src="<?php echo base_url();?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url();?>vendor/switchery/switchery.min.js"></script>
        <script src="<?php echo base_url();?>vendor/DataTables/jquery.dataTables.min.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <script src="<?php echo base_url();?>vendor/Chart.js/Chart.min.js"></script>
        <script src="<?php echo base_url();?>vendor/jquery.sparkline/jquery.sparkline.min.js"></script>
        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="<?php echo base_url();?>assets/js/main.js"></script>
        <script src="<?php echo base_url();?>assets/js/index.js"></script>
        <script src="<?php echo base_url();?>assets/js/table-data.js"></script>
        <script src="<?php echo base_url();?>vendor/selectFx/classie.js"></script>
        <script src="<?php echo base_url();?>vendor/selectFx/selectFx.js"></script>
        <script src="<?php echo base_url();?>vendor/select2/select2.min.js"></script>
        <script src="<?php echo base_url();?>vendor/bootstrap-fileinput/jasny-bootstrap.js"></script>
        <script src="<?php echo base_url();?>vendor/nprogress/nprogress.js"></script>
        <script src="<?php echo base_url();?>vendor/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url();?>vendor/ckeditor/adapters/jquery.js"></script>
        <script src="<?php echo base_url();?>vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="<?php echo base_url();?>vendor/jquery-smart-wizard/jquery.smartWizard.js"></script>
        <script src="<?php echo base_url();?>assets/js/form-wizard.js"></script>
<!--        <script src="<?php echo base_url();?>assets/js/form-elements.js"></script>-->
        <!-- start: JavaScript Event Handlers for this page -->

        <script>
            NProgress.start();
            setTimeout(function () {
                NProgress.done();
                $('.fade').removeClass('out');
            }, 1000);

        </script>
        <script>
            jQuery(document).ready(function () {
                Main.init();
                //FormElements.init();
                // TableData.init();
                //  Index.init();
            });
        </script>
        <!-- end: JavaScript Event Handlers for this page -->
        <!-- end: CLIP-TWO JAVASCRIPTS -->
    </body>
</html>

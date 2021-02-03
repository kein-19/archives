<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <title>SISFO AKADEMIK</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="Responsive Admin Template build with Twitter Bootstrap and jQuery" name="description" />
    <meta content="ClipTheme" name="author" />
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Raleway:400,100,200,300,500,600,700,800,900/" />
    <link type="text/css" rel="stylesheet" href="http://clipone.nurisakbar.com/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>template/font-awesome/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="http://clipone.nurisakbar.com/assets/fonts/clip-font.min.css" />
    <link type="text/css" rel="stylesheet" href="http://clipone.nurisakbar.com/bower_components/iCheck/skins/all.css" />
    <link type="text/css" rel="stylesheet" href="http://clipone.nurisakbar.com/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" />
    <link type="text/css" rel="stylesheet" href="http://clipone.nurisakbar.com/bower_components/sweetalert/dist/sweetalert.css" />
    <link type="text/css" rel="stylesheet" href="http://clipone.nurisakbar.com/assets/css/main.min.css" />
    <link type="text/css" rel="stylesheet" href="http://clipone.nurisakbar.com/assets/css/main-responsive.min.css" />
    <link type="text/css" rel="stylesheet" media="print" href="http://clipone.nurisakbar.com/assets/css/print.min.css" />
    <link type="text/css" rel="stylesheet" id="skin_color" href="http://clipone.nurisakbar.com/assets/css/theme/light.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link href="http://clipone.nurisakbar.com/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>

<body>

    <!-- start: HEADER -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <!-- start: TOP NAVIGATION CONTAINER -->
        <div class="container">
            <div class="navbar-header">
                <!-- start: RESPONSIVE MENU TOGGLER -->
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="clip-list-2"></span>
                </button>
                <!-- end: RESPONSIVE MENU TOGGLER -->
                <!-- start: LOGO -->
                <a class="navbar-brand" href="index.html">
                    SISFO AKADEMIK
                </a>
                <!-- end: LOGO -->
            </div>
            <div class="navbar-tools">
                <!-- start: TOP NAVIGATION MENU -->
                <ul class="nav navbar-right">

                    <!-- start: USER DROPDOWN -->
                    <li class="dropdown current-user">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                            <img src="http://clipone.nurisakbar.com/assets/images/avatar-1-small.jpg" class="circle-img" alt="">
                            <span class="username"><?php echo $this->session->userdata('nama_lengkap') ?></span>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="pages_user_profile.html">
                                    <i class="fa fa-user" aria-hidden="true"></i> &nbsp;My Profile
                                </a>
                            </li>
                            <li>
                                <a href="pages_calendar.html">
                                    <i class="clip-calendar"></i> &nbsp;My Calendar
                                </a>
                            <li>
                                <a href="pages_messages.html">
                                    <i class="clip-bubble-4"></i> &nbsp;My Messages (3)
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="utility_lock_screen.html">
                                    <i class="clip-locked"></i> &nbsp;Lock Screen
                                </a>
                            </li>
                            <li>

                                <?php
                                echo anchor('auth/logout', '<i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Log Out');
                                ?>

                            </li>
                        </ul>
                    </li>
                    <!-- end: USER DROPDOWN -->

                </ul>
                <!-- end: TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- end: TOP NAVIGATION CONTAINER -->
    </div>
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->
    <div class="main-container">
        <div class="navbar-content">
            <!-- start: SIDEBAR -->
            <div class="main-navigation navbar-collapse collapse">
                <!-- start: MAIN MENU TOGGLER BUTTON -->
                <div class="navigation-toggler">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
                <!-- end: MAIN MENU TOGGLER BUTTON -->
                <!-- start: MAIN NAVIGATION MENU -->
                <ul class="main-navigation-menu">

                    <!-- ini area menu dinamis --->

                    <?php
                    $id_level_user = $this->session->userdata('id_level_user');
                    $sql_menu = "SELECT * FROM tabel_menu WHERE id in(select id_menu from tbl_user_rule where id_level_user=$id_level_user) and is_main_menu=0";
                    $main_menu = $this->db->query($sql_menu)->result();
                    foreach ($main_menu as $main) {
                        // chek apakah ada submenu ?
                        $submenu = $this->db->get_where('tabel_menu', array('is_main_menu' => $main->id));
                        if ($submenu->num_rows() > 0) {
                            // tampilkan submenu disini
                            echo "<li>
                                    <a href='javascript:void(0)'>
                                    <i class='" . $main->icon . "'></i>
                                    <span class='title'> " . strtoupper($main->nama_menu) . " </span>
                                    <i class='fa fa-angle-down' aria-hidden='true'></i>
                                    <span class='selected'></span>
                                    </a>
                                    <ul class='sub-menu'>";
                            foreach ($submenu->result() as $sub) {
                                echo "<li>" . anchor($sub->link, "<i class='" . $sub->icon . "'></i><span class='title'> " . strtoupper($sub->nama_menu)) . "</span></li>";
                            }

                            echo "</ul>
                                    </li>";
                        } else {
                            // tampilkan main menu
                            echo "<li>" . anchor($main->link, "<i class='" . $main->icon . "'></i><span class='title'>" . strtoupper($main->nama_menu)) . "</span></li>";
                        }
                    }
                    ?>

                    <li class="active_open"><a href="<?php echo base_url() ?>/auth/logout"><i class="fa fa-sign-out"></i><span class="title">LOGOUT</span></a></li>

                </ul>
                <!-- end: MAIN NAVIGATION MENU -->
            </div>
            <!-- end: SIDEBAR -->
        </div>

        <!-- start: PAGE -->
        <div class="main-content">
            <!-- start: PANEL CONFIGURATION MODAL FORM -->
            <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title">Panel Configuration</h4>
                        </div>
                        <div class="modal-body">
                            Here will be a configuration form
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- end: SPANEL CONFIGURATION MODAL FORM -->
            <div class="container">
                <!-- start: PAGE HEADER -->
                <div class="row">
                    <div class="col-sm-12">

                        <!-- start: PAGE TITLE & BREADCRUMB -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li class="active">
                                Dashboard
                            </li>
                            <li class="search-box">
                                <form class="sidebar-search">
                                    <div class="form-group">
                                        <input type="text" placeholder="Start Searching...">
                                        <button class="submit">
                                            <i class="clip-search-3"></i>
                                        </button>
                                    </div>
                                </form>
                            </li>
                        </ol>
                        <div class="page-header">
                            <h1>Dashboard <small>overview &amp; stats </small></h1>
                        </div>
                        <!-- end: PAGE TITLE & BREADCRUMB -->
                    </div>
                </div>
                <!-- end: PAGE HEADER -->
                <!-- start: PAGE CONTENT -->
                <div class="row">



                    <?php echo $contents; ?>

                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        <div class="footer clearfix">
            <div class="footer-inner">
                <script>
                    document.write(new Date().getFullYear())
                </script> &copy; clip-one by cliptheme.
            </div>
            <div class="footer-items">
                <span class="go-top"><i class="clip-chevron-up"></i></span>
            </div>
        </div>
        <!-- end: FOOTER -->

        <!-- end: RIGHT SIDEBAR -->

        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
                <script src="http://clipone.nurisakbar.com/bower_components/respond/dest/respond.min.js"></script>
                <script src="http://clipone.nurisakbar.com/bower_components/Flot/excanvas.min.js"></script>
                <script src="http://clipone.nurisakbar.com/bower_components/jquery-1.x/dist/jquery.min.js"></script>
                <![endif]-->
        <!--[if gte IE 9]><!-->

        <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/blockUI/jquery.blockUI.js"></script>
        <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/iCheck/icheck.min.js"></script>
        <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js"></script>
        <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/jquery.cookie/jquery.cookie.js"></script>
        <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="http://clipone.nurisakbar.com/assets/js/min/main.min.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="http://clipone.nurisakbar.com/bower_components/Flot/jquery.flot.js"></script>
        <script src="http://clipone.nurisakbar.com/bower_components/Flot/jquery.flot.pie.js"></script>
        <script src="http://clipone.nurisakbar.com/bower_components/Flot/jquery.flot.resize.js"></script>
        <script src="http://clipone.nurisakbar.com/assets/plugin/jquery.sparkline.min.js"></script>
        <script src="http://clipone.nurisakbar.com/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script src="http://clipone.nurisakbar.com/bower_components/jqueryui-touch-punch/jquery.ui.touch-punch.min.js"></script>
        <script src="http://clipone.nurisakbar.com/bower_components/moment/min/moment.min.js"></script>
        <script src="http://clipone.nurisakbar.com/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="http://clipone.nurisakbar.com/assets/js/min/index.min.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

        <script>
            jQuery(document).ready(function() {
                Main.init();
                Index.init();
            });
        </script>

</body>

</html>
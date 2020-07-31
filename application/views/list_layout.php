<?php $user_session_data = getUserSession(); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- START @HEAD -->
    <head>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
        <meta name="keywords" content="admin, admin template, bootstrap3, clean, fontawesome4, good documentation, lightweight admin, responsive dashboard, webapp">
        <meta name="author" content="Djava UI">
        <title><?php echo (isset($title)) ? $title :  'FBM Distribution'; ?></title>
        <!--/ END META SECTION -->
        <!-- START @FONT STYLES -->
        <script> var base_url="<?php echo base_url(); ?>";</script>
        <!-- START @FAVICONS -->
        <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
        <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
        <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
        <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
        <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon.png" rel="shortcut icon">
        <!--/ END FAVICONS -->
        <!-- START @FONT STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Oswald:700,400" rel="stylesheet">
        <!--/ END FONT STYLES -->
        <!-- START @GLOBAL MANDATORY STYLES --> 
        <link href="<?php echo base_url(); ?>/assets/assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        <link href="<?php echo base_url(); ?>/assets/assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/assets/global/plugins/bower_components/animate.css/animate.min.css" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>/assets/assets/global/plugins/bower_components/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>/assets/assets/global/plugins/bower_components/datatables/css/datatables.responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/assets/global/plugins/bower_components/fuelux/dist/css/fuelux.min.css" rel="stylesheet">
         <link href="<?php echo base_url(); ?>/assets/assets/admin/css/pages/table-advanced.css" rel="stylesheet">
        <!--/ END PAGE LEVEL STYLES -->
        <!-- START @THEME STYLES -->
        <link href="<?php echo base_url(); ?>/assets/assets/admin/css/reset.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/assets/admin/css/layout.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/assets/admin/css/components.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/assets/admin/css/plugins.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/assets/admin/css/themes/default.theme.css" rel="stylesheet" id="theme">
        <link href="<?php echo base_url(); ?>/assets/assets/admin/css/custom.css" rel="stylesheet">

        

        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery-cookie/jquery.cookie.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/typehead.js/dist/handlebars.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/typehead.js/dist/typeahead.bundle.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery-nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery.sparkline.min/index.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery-easing-original/jquery.easing.1.3.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/ionsound/js/ion.sound.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/bootbox/bootbox.js"></script>
        <!--/ END CORE PLUGINS -->
        <!-- START @PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/js/datatables.responsive.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/fuelux/dist/js/fuelux.min.js"></script>
        <!--/ END PAGE LEVEL PLUGINS -->
        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url()?>/assets/assets/admin/js/apps.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/admin/js/pages/blankon.table.advanced.js"></script>
        <!--<script src="../assets/assets/admin/js/pages/blankon.table.js"></script>-->
        <script src="<?php echo base_url()?>/assets/assets/admin/js/demo.js"></script>
        <script src="<?php echo base_url()?>/assets/js/custom.js"></script>

       <!-- START GOOGLE ANALYTICS -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-55892530-1', 'auto');
            ga('send', 'pageview');

        </script>
        <!--/ END GOOGLE ANALYTICS -->
        <script>
            setTimeout(function(){
                $( ".alert" ).fadeOut(3000);
            },3000);
        </script>
        <!--/ END THEME STYLES -->
        <!-- START @IE SUPPORT -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../../../assets/global/plugins/bower_components/html5shiv/dist/html5shiv.min.js"></script>
        <script src="../../../assets/global/plugins/bower_components/respond-minmax/dest/respond.min.js"></script>
        <![endif]-->
        <!--/ END IE SUPPORT -->
    </head>
<?php 
/*
<!DOCTYPE html>
    <head>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
        <meta name="keywords" content="admin, admin template, bootstrap3, clean, fontawesome4, good documentation, lightweight admin, responsive dashboard, webapp">
        <meta name="author" content="Djava UI">
        <title><?php echo (isset($title)) ? $title :  'FranchiseSoft 2.0'; ?></title>
        <!--/ END META SECTION -->
        
        <!-- START @FONT STYLES -->
        <script> var base_url="<?php echo base_url(); ?>";</script>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Oswald:700,400" rel="stylesheet">
        <!--/ END FONT STYLES -->

        <!-- START @GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/dropzone/downloads/css/dropzone.css" rel="stylesheet">
       <!-- <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery.gritter/css/jquery.gritter.css" rel="stylesheet">-->
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css" rel="stylesheet">
        <!--/ END PAGE LEVEL STYLES -->
        
        
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery.gritter/css/jquery.gritter.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/css/editor.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/css/datatables.responsive.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/css/select.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/admin/css/pages/table-advanced.css" rel="stylesheet">

        
        <!-- START @THEME STYLES -->
        <link href="<?php echo base_url()?>/assets/assets/admin/css/reset.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/admin/css/layout.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/admin/css/components.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/admin/css/plugins.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/admin/css/themes/blue-gray.theme.css" rel="stylesheet" id="theme">
        <link href="<?php echo base_url()?>/assets/assets/admin/css/custom.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/css/datepicker.css" rel="stylesheet">
        
         <!-- START PLUGINS STYLES -->
        <link href="<?php echo base_url()?>assets/global/plugins/bower_components/jasny-bootstrap-fileinput/css/jasny-bootstrap-fileinput.min.css" rel="stylesheet">
       
        <!-- END PLUGINS STYLES -->
        
         <!-- START PLUGINS SCRIPT -->
        <script src="<?php echo base_url()?>assets/global/plugins/bower_components/jasny-bootstrap-fileinput/js/jasny-bootstrap.fileinput.min.js"></script>
         <!-- END PLUGINS STYLES -->
        
        
        <!--/ END THEME STYLES -->
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/assets/js/custom.js"></script>
         <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- START @CORE PLUGINS -->
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery-cookie/jquery.cookie.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/typehead.js/dist/handlebars.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/typehead.js/dist/typeahead.bundle.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery-nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery.sparkline.min/index.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery-easing-original/jquery.easing.1.3.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/ionsound/js/ion.sound.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/bootbox/bootbox.js"></script>
        <!--/ END CORE PLUGINS -->

        <!-- START @PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/flot/jquery.flot.spline.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/flot/jquery.flot.categories.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/flot/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/flot/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/dropzone/downloads/dropzone.min.js"></script>
        <!--<script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery.gritter/js/jquery.gritter.min.js"></script>-->
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/skycons-html5/skycons.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/counter-up/jquery.counterup.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
        <!--/ END PAGE LEVEL PLUGINS -->
        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/extentions/dataTables.select.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/extentions/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/extentions/jszip.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/extentions/pdfmake.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/extentions/vfs_fonts.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/extentions/buttons.html5.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/extentions/buttons.print.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/extentions/full_numbers_no_ellipses.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/extentions/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/datatables/extentions/datatables.responsive.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery-mockjax/jquery.mockjax.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/jquery.gritter/js/jquery.gritter.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js"></script>
        
        <!--/ END PAGE LEVEL PLUGINS -->
        <!-- START @PAGE LEVEL SCRIPTS -->
        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->
    </head>
*/
?>
    <!--/ END HEAD -->
    <body class="page-session page-header-fixed page-sidebar-fixed demo-dashboard-session">
        <!-- START @WRAPPER -->
        <section id="wrapper">
                        <?php 
                        $this->load->view('header');
                        
                        $user_session_data = getUserSession();
                        if(!empty($user_session_data->franchise_id)){
                            $periods = checkFranchiseKpi();    
                        }
                        if(empty($periods)){
                            $this->load->view('left_menu');
                        }else{
                            $this->load->view('add_kpi_left_menu');
                        }?>
                    
            <!--/ END SIDEBAR LEFT -->

            <!-- START @PAGE CONTENT -->
            
            <section id="page-content">
                <?php $this->load->view($content_view);?>
                
                <!-- Start footer content -->
                <footer class="footer-content">
                    <span id="tour-19">
                        2014 - <span id="copyright-year"></span> &copy; Powered by <a href="#" target="_blank">FBM Distribution</a>
                    </span>
                    <span id="tour-20" class="pull-right">System Server Parameters Normal</span>
                </footer><!-- /.footer-content -->
                <!--/ End footer content -->

            </section><!-- /#page-content -->
            <!--/ END PAGE CONTENT -->

            <!-- START @SIDEBAR RIGHT -->
            <aside id="sidebar-right">

                <div class="panel panel-tab">
                    <div class="panel-heading no-padding">
                        <div class="pull-right">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a href="#sidebar-profile" data-toggle="tab">
                                        <i class="fa fa-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#sidebar-layout" data-toggle="tab">
                                        <i class="fa fa-cogs"></i>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#sidebar-setting" data-toggle="tab">
                                        <i class="fa fa-paint-brush"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#sidebar-chat" data-toggle="tab">
                                        <i class="fa fa-comments"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body no-padding">
                        <div class="tab-content">
                            <div class="tab-pane" id="sidebar-profile">
                                <div class="sidebar-profile">

                                    <!-- Start right navigation - menu -->
                                    <ul class="sidebar-menu niceScroll">

                                        <!-- Start category about me -->
                                        <li class="sidebar-category">
                                            <span>ABOUT ME</span>
                                            <span class="pull-right"><i class="fa fa-newspaper-o"></i></span>
                                        </li>
                                        <!--/ End category about me -->

                                        <!--/ Start navigation - about me -->
                                        <li>
                                            <ul class="list-unstyled">
                                                <li>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                </li>
                                                <li>
                                                    <i class="fa fa-refresh"></i> Last update about 2 hours ago
                                                </li>
                                                <li>
                                                    <i class="fa fa-clock-o"></i> Total time spent 250 hrs
                                                </li>
                                                <li>
                                                    <i class="fa fa-envelope"></i> Tol.lee@djavaui.com
                                                </li>
                                                <li>
                                                    <i class="fa fa-mobile"></i> 1 405 777 1212
                                                </li>
                                            </ul>
                                        </li>
                                        <!--/ End navigation - about me -->

                                        <!-- Start category recent activity -->
                                        <li class="sidebar-category">
                                            <span>RECENT ACTIVITY</span>
                                            <span class="pull-right"><i class="fa fa-line-chart"></i></span>
                                        </li>
                                        <!--/ End category recent activity -->

                                        <!--/ Start navigation - activity -->
                                        <li>
                                            <div class="media-list activity">
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <i class="fa fa-flash"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Added a note to Ticket #947</span>
                                                        <span class="media-meta time">about 2 hours ago</span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <i class="fa fa-flash"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Added a product to Ticket #948</span>
                                                        <span class="media-meta time">about 3 hours ago</span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <i class="fa fa-flash"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Added a service to Ticket #949</span>
                                                        <span class="media-meta time">about 15 hours ago</span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                            </div><!-- /.media-list -->
                                        </li>
                                        <!--/ End navigation - activity -->

                                        <!-- Start category current working -->
                                        <li class="sidebar-category">
                                            <span>CURRENTLY WORKING</span>
                                            <span class="pull-right"><i class="fa fa-group"></i></span>
                                        </li>
                                        <!--/ End category current working -->

                                        <!-- Start left navigation - current working -->
                                        <li>
                                            <div class="media-list working">
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Daddy Botak">
                                                        <i class="online"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Daddy Botak</span>
                                                        <span class="media-meta status">online</span>
                                                        <span class="media-meta device"><i class="fa fa-globe"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Sarah Tingting">
                                                        <i class="offline"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Sarah Tingting</span>
                                                        <span class="media-meta status">offline</span>
                                                        <span class="media-meta device"><i class="fa fa-globe"></i></span>
                                                        <span class="media-meta time">7 m</span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="">
                                                        <i class="busy"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Nicolas Olivier</span>
                                                        <span class="media-meta status">busy</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Claudia Cinta">
                                                        <i class="online"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Claudia Cinta</span>
                                                        <span class="media-meta status">online</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="">
                                                        <i class="busy"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Catherine Parker</span>
                                                        <span class="media-meta status">busy</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                            </div><!-- /.media-list -->
                                        </li>
                                        <!--/ End left navigation - current working -->

                                    </ul>
                                    <!-- Start right navigation - menu -->
                                </div>
                            </div><!-- /#sidebar-profile -->
                            <div class="tab-pane" id="sidebar-layout">
                                <div class="sidebar-layout">

                                    <!-- Start right navigation - menu -->
                                    <ul class="sidebar-menu niceScroll">

                                        <!--/ Start navigation - reset settings -->
                                        <li>
                                            <a id="reset-setting" href="javascript:void(0);" class="btn btn-inverse btn-block"><i class="fa fa-refresh fa-spin"></i> RESET SETTINGS</a>
                                        </li>
                                        <!--/ End navigation - reset settings -->

                                        <!-- Start category layout -->
                                        <li class="sidebar-category">
                                            <span>LAYOUT</span>
                                            <span class="pull-right"><i class="fa fa-toggle-on"></i></span>
                                        </li>
                                        <!--/ End category layout -->

                                        <!--/ Start navigation - layout -->
                                        <li>
                                            <ul class="list-unstyled layout-setting">
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="layout-fluid" type="radio" name="layout" value="">
                                                        <label for="layout-fluid">Fluid</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="layout-boxed" type="radio" name="layout" value="page-boxed">
                                                        <label for="layout-boxed">Boxed</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <!--/ End navigation - layout -->

                                        <!-- Start category header -->
                                        <li class="sidebar-category">
                                            <span>HEADER</span>
                                            <span class="pull-right"><i class="fa fa-toggle-on"></i></span>
                                        </li>
                                        <!--/ End category header -->

                                        <!--/ Start navigation - header -->
                                        <li>
                                            <ul class="list-unstyled header-layout-setting">
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="header-default" type="radio" name="header" value="">
                                                        <label for="header-default">Default</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="header-fixed" type="radio" name="header" value="page-header-fixed">
                                                        <label for="header-fixed">Fixed</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <!--/ End navigation - header -->

                                        <!-- Start category sidebar -->
                                        <li class="sidebar-category">
                                            <span>SIDEBAR</span>
                                            <span class="pull-right"><i class="fa fa-toggle-on"></i></span>
                                        </li>
                                        <!--/ End category sidebar -->

                                        <!--/ Start navigation - sidebar -->
                                        <li>
                                            <ul class="list-unstyled sidebar-layout-setting">
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="sidebar-default" type="radio" name="sidebar" value="">
                                                        <label for="sidebar-default">Default</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="sidebar-fixed" type="radio" name="sidebar" value="page-sidebar-fixed">
                                                        <label for="sidebar-fixed">Fixed</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <!--/ End navigation - sidebar -->

                                        <!-- Start category sidebar type -->
                                        <li class="sidebar-category">
                                            <span>SIDEBAR TYPE</span>
                                            <span class="pull-right"><i class="fa fa-toggle-on"></i></span>
                                        </li>
                                        <!--/ End category sidebar type -->

                                        <!--/ Start navigation - sidebar -->
                                        <li>
                                            <ul class="list-unstyled sidebar-type-setting">
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="sidebar-type-default" type="radio" name="sidebarType" value="">
                                                        <label for="sidebar-type-default">Default</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="sidebar-type-box" type="radio" name="sidebarType" value="sidebar-box">
                                                        <label for="sidebar-type-box">Box</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="sidebar-type-rounded" type="radio" name="sidebarType" value="sidebar-rounded">
                                                        <label for="sidebar-type-rounded">Rounded</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="sidebar-type-circle" type="radio" name="sidebarType" value="sidebar-circle">
                                                        <label for="sidebar-type-circle">Circle</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <!--/ End navigation - sidebar -->

                                        <!-- Start category footer -->
                                        <li class="sidebar-category">
                                            <span>FOOTER</span>
                                            <span class="pull-right"><i class="fa fa-toggle-on"></i></span>
                                        </li>
                                        <!--/ End category footer -->

                                        <!--/ Start navigation - footer -->
                                        <li>
                                            <ul class="list-unstyled footer-layout-setting">
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="footer-default" type="radio" name="footer" value="">
                                                        <label for="footer-default">Default</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="rdio rdio-theme">
                                                        <input id="footer-fixed" type="radio" name="footer" value="page-footer-fixed">
                                                        <label for="footer-fixed">Fixed</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <!--/ End navigation - footer -->

                                    </ul>
                                    <!-- Start right navigation - menu -->
                                </div>
                            </div><!-- /#sidebar-layout -->
                            <div class="tab-pane in active" id="sidebar-setting">
                                <div class="sidebar-setting">
                                    <!-- Start right navigation - menu -->
                                    <ul class="sidebar-menu">

                                        <!-- Start category color schemes -->
                                        <li class="sidebar-category">
                                            <span>COLOR SCHEMES</span>
                                            <span class="pull-right"><i class="fa fa-tint"></i></span>
                                        </li>
                                        <!--/ End category color schemes -->

                                        <!-- Start navigation - themes -->
                                        <li>
                                            <div class="sidebar-themes color-schemes">

                                                <a class="theme" href="javascript:void(0);" style="background-color: #81b71a" data-toggle="tooltip" data-placement="right" data-original-title="Default"><span class="hide">default</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #00B1E1" data-toggle="tooltip" data-placement="top" data-original-title="Blue"><span class="hide">blue</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #37BC9B" data-toggle="tooltip" data-placement="top" data-original-title="Cyan"><span class="hide">cyan</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #8CC152" data-toggle="tooltip" data-placement="top" data-original-title="Green"><span class="hide">green</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #E9573F" data-toggle="tooltip" data-placement="top" data-original-title="Red"><span class="hide">red</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #F6BB42" data-toggle="tooltip" data-placement="top" data-original-title="Yellow"><span class="hide">yellow</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #906094" data-toggle="tooltip" data-placement="top" data-original-title="Purple"><span class="hide">purple</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #D39174" data-toggle="tooltip" data-placement="top" data-original-title="Brown"><span class="hide">brown</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #9FB478" data-toggle="tooltip" data-placement="left" data-original-title="Green Army"><span class="hide">green-army</span></a>

                                                <a class="theme" href="javascript:void(0);" style="background-color: #63D3E9" data-toggle="tooltip" data-placement="right" data-original-title="Blue Sea"><span class="hide">blue-sea</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #5577B4" data-toggle="tooltip" data-placement="top" data-original-title="Blue Gray"><span class="hide">blue-gray</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #AF86B9" data-toggle="tooltip" data-placement="top" data-original-title="Purple Gray"><span class="hide">purple-gray</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #CC6788" data-toggle="tooltip" data-placement="top" data-original-title="Purple Wine"><span class="hide">purple-wine</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #F06F6F" data-toggle="tooltip" data-placement="top" data-original-title="Alizarin Crimson"><span class="hide">alizarin-crimson</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #979797" data-toggle="tooltip" data-placement="top" data-original-title="Black And White"><span class="hide">black-and-white</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #8BC4B9" data-toggle="tooltip" data-placement="top" data-original-title="Amazon"><span class="hide">amazon</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #B0B069" data-toggle="tooltip" data-placement="top" data-original-title="Amber"><span class="hide">amber</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #A9C784" data-toggle="tooltip" data-placement="left" data-original-title="Android green"><span class="hide">android-green</span></a>

                                                <a class="theme" href="javascript:void(0);" style="background-color: #B3998A" data-toggle="tooltip" data-placement="right" data-original-title="Antique brass"><span class="hide">antique-brass</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #8D8D6E" data-toggle="tooltip" data-placement="top" data-original-title="Antique Bronze"><span class="hide">antique-bronze</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #B0B69D" data-toggle="tooltip" data-placement="top" data-original-title="Artichoke"><span class="hide">artichoke</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #F19B69" data-toggle="tooltip" data-placement="top" data-original-title="Atomic Tangerine"><span class="hide">atomic-tangerine</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #98777B" data-toggle="tooltip" data-placement="top" data-original-title="Bazaar"><span class="hide">bazaar</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #C3A961" data-toggle="tooltip" data-placement="top" data-original-title="Bistre Brown"><span class="hide">bistre-brown</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #D6725E" data-toggle="tooltip" data-placement="top" data-original-title="Bittersweet"><span class="hide">bittersweet</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #7789D1" data-toggle="tooltip" data-placement="top" data-original-title="Blueberry"><span class="hide">blueberry</span></a>
                                                <a class="theme" href="javascript:void(0);" style="background-color: #6FA362" data-toggle="tooltip" data-placement="left" data-original-title="Bud Green"><span class="hide">bud-green</span></a>

                                            </div><!-- /.sidebar-themes -->
                                        </li>
                                        <!--/ End navigation - themes -->

                                        <!-- Start category navbar color -->
                                        <li class="sidebar-category">
                                            <span>NAVBAR COLOR</span>
                                            <span class="pull-right"><i class="fa fa-tint"></i></span>
                                        </li>
                                        <!--/ End category navbar color -->

                                        <!-- Start navigation - navbar color -->
                                        <li>
                                            <div class="sidebar-themes navbar-color">

                                                <a class="theme bg-dark" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Dark"><span class="hide">dark</span></a>
                                                <a class="theme bg-light" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Light"><span class="hide">light</span></a>
                                                <a class="theme bg-primary" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Primary"><span class="hide">primary</span></a>
                                                <a class="theme bg-success" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Success"><span class="hide">success</span></a>
                                                <a class="theme bg-info" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Info"><span class="hide">info</span></a>
                                                <a class="theme bg-warning" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Warning"><span class="hide">warning</span></a>
                                                <a class="theme bg-danger" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Danger"><span class="hide">danger</span></a>

                                            </div><!-- /.navbar-color -->
                                        </li>
                                        <!--/ End navigation - navbar color -->

                                        <!-- Start category sidebar color -->
                                        <li class="sidebar-category">
                                            <span>SIDEBAR COLOR</span>
                                            <span class="pull-right"><i class="fa fa-tint"></i></span>
                                        </li>
                                        <!--/ End category sidebar color -->

                                        <!-- Start navigation - sidebar color -->
                                        <li>
                                            <div class="sidebar-themes sidebar-color">

                                                <a class="theme bg-dark" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Dark"><span class="hide">dark</span></a>
                                                <a class="theme bg-light" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Light"><span class="hide">light</span></a>
                                                <a class="theme bg-primary" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Primary"><span class="hide">primary</span></a>
                                                <a class="theme bg-success" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Success"><span class="hide">success</span></a>
                                                <a class="theme bg-info" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Info"><span class="hide">info</span></a>
                                                <a class="theme bg-warning" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Warning"><span class="hide">warning</span></a>
                                                <a class="theme bg-danger" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Danger"><span class="hide">danger</span></a>

                                            </div><!-- /.sidebar-color -->
                                        </li>
                                        <!--/ End navigation - sidebar color -->

                                        <!-- Start category task progress -->
                                        <li class="sidebar-category">
                                            <span>TASK PROGRESS</span>
                                            <span class="pull-right"><i class="fa fa-sliders"></i></span>
                                        </li>
                                        <!--/ End category task progress -->

                                        <!--/ Start navigation - task progress -->
                                        <li>
                                            <ul class="list-group sidebar-task">
                                                <li class="list-group-item">
                                                    <p class="details"> <span> Core System </span> <span class="pull-right"> 82% </span> </p>
                                                    <div class="progress progress-xs progress-striped active no-margin">
                                                        <div style="width: 82%" class="progress-bar progress-bar-success"> </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <p class="details"> <span> Front-End </span> <span class="pull-right"> 67% </span> </p>
                                                    <div class="progress progress-xs progress-striped active no-margin">
                                                        <div style="width: 47%" class="progress-bar progress-bar-danger"> </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <p class="details"> <span> Back-End </span> <span class="pull-right"> 45% </span> </p>
                                                    <div class="progress progress-xs progress-striped active no-margin">
                                                        <div style="width: 47%" class="progress-bar progress-bar-info"> </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <!--/ End navigation - task progress -->

                                        <!-- Start category summary system -->
                                        <li class="sidebar-category">
                                            <span>SUMMARY SYSTEM</span>
                                            <span class="pull-right"><i class="fa fa-bar-chart-o"></i></span>
                                        </li>
                                        <!--/ End category summary system -->

                                        <!-- Start left navigation - summary -->
                                        <li>
                                            <ul class="sidebar-summary sparklines">
                                                <li>
                                                    <div class="list-info">
                                                        <span>Average Users</span>
                                                        <h4>1, 412, 101</h4>
                                                    </div>
                                                    <div class="chart"><span class="average">4,2,3,2,4,2,5,1,2,2,5,3</span></div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <div class="list-info">
                                                        <span>Daily Traffic</span>
                                                        <h4>781, 601</h4>
                                                    </div>
                                                    <div class="chart"><span class="traffic">1,2,3,2,4,1,5,3,2,4,2,3</span></div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <div class="list-info">
                                                        <span>Disk Usage</span>
                                                        <h4>52.2%</h4>
                                                    </div>
                                                    <div class="chart"><span class="disk">5,5,3,2,1,3,4,3,2,4,1,3</span></div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <div class="list-info">
                                                        <span>CPU Usage</span>
                                                        <h4>67.8%</h4>
                                                    </div>
                                                    <div class="chart"><span class="cpu">1,5,3,2,4,5,5,3,2,4,5,3</span></div>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
                                        </li>
                                        <!--/ End left navigation - summary -->

                                    </ul>
                                    <!-- Start right navigation - menu -->
                                </div>
                            </div><!-- /#sidebar-setting -->
                            <div class="tab-pane" id="sidebar-chat">
                                <div class="sidebar-chat">

                                    <form class="form-horizontal">
                                        <div class="form-group has-feedback">
                                            <input class="form-control" type="text" placeholder="Search messages...">
                                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                        </div>
                                    </form>

                                    <!-- Start right navigation - menu -->
                                    <ul class="sidebar-menu niceScroll">

                                        <!-- Start category family chat -->
                                        <li class="sidebar-category">
                                            <span>FAMILY</span>
                                            <span class="pull-right"><i class="fa fa-home"></i></span>
                                        </li>
                                        <!--/ End category family chat -->

                                        <li>
                                            <!-- Start chat - contact list -->
                                            <div class="media-list">
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Daddy Botak">
                                                        <i class="online"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Daddy Botak</span>
                                                        <span class="media-meta status">online</span>
                                                        <span class="media-meta device"><i class="fa fa-globe"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Sarah Tingting">
                                                        <i class="offline"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Sarah Tingting</span>
                                                        <span class="media-meta status">offline</span>
                                                        <span class="media-meta device"><i class="fa fa-globe"></i></span>
                                                        <span class="media-meta time">7 m</span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="...">
                                                        <i class="busy"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Nicolas Olivier</span>
                                                        <span class="media-meta status">busy</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Harry Potret">
                                                        <i class="online"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Harry Potret</span>
                                                        <span class="media-meta status">online</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="...">
                                                        <i class="busy"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Catherine Parker</span>
                                                        <span class="media-meta status">busy</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                            </div><!-- /.media-list -->
                                            <!--/ End chat - contact list -->
                                        </li>

                                        <!-- Start category friends chat -->
                                        <li class="sidebar-category">
                                            <span>FRIENDS</span>
                                            <span class="pull-right"><i class="fa fa-group"></i></span>
                                        </li>
                                        <!--/ End category friends chat -->

                                        <li>
                                            <!-- Start chat - contact list -->
                                            <div class="media-list">
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Jeck Joko">
                                                        <i class="online"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Jeck Joko</span>
                                                        <span class="media-meta status">online</span>
                                                        <span class="media-meta device"><i class="fa fa-globe"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Tenny Imoet">
                                                        <i class="busy"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Tenny Imoet</span>
                                                        <span class="media-meta status">busy</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Leli Madang">
                                                        <i class="offline"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Leli Madang</span>
                                                        <span class="media-meta status">offline</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                        <span class="media-meta time">2 m</span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Rebecca Cabean">
                                                        <i class="offline"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Rebecca Cabean</span>
                                                        <span class="media-meta status">offline</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                        <span class="media-meta time">8 m</span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="...">
                                                        <i class="busy"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">ondoel return</span>
                                                        <span class="media-meta status">busy</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                            </div><!-- /.media-list -->
                                            <!--/ End chat - contact list -->
                                        </li>

                                        <!-- Start category other chat -->
                                        <li class="sidebar-category">
                                            <span>OTHERS</span>
                                            <span class="pull-right"><i class="fa fa-share"></i></span>
                                        </li>
                                        <!--/ End category other chat -->

                                        <li>
                                            <!-- Start chat - contact list -->
                                            <div class="media-list">
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Sishy Mawar">
                                                        <i class="offline"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Sishy Mawar</span>
                                                        <span class="media-meta status">offline</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                        <span class="media-meta time">23 m</span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Mbah Roso">
                                                        <i class="away"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Mbah Roso</span>
                                                        <span class="media-meta status">away</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                        <span class="media-meta time">2 h</span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                                <a href="#" class="media">
                                                    <div class="media-object pull-left has-notif">
                                                        <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="...">
                                                        <i class="busy"></i>
                                                    </div><!-- /.media-object -->
                                                    <div class="media-body">
                                                        <span class="media-heading">Alma Butoi</span>
                                                        <span class="media-meta status">busy</span>
                                                        <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                    </div><!-- /.media-body -->
                                                </a><!-- /.media -->
                                            </div><!-- /.media-list -->
                                            <!--/ End chat - contact list -->
                                        </li>

                                    </ul><!-- /.sidebar-menu -->
                                    <!-- Start right navigation - menu -->

                                </div><!-- /.sidebar-chat -->
                            </div><!-- /#sidebar-chat -->
                        </div>
                    </div>
                </div>

            </aside><!-- /#sidebar-right -->
            <!--/ END SIDEBAR RIGHT -->

        </section><!-- /#wrapper -->
        <!--/ END WRAPPER -->

        <!-- START @BACK TOP -->
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div><!-- /#back-top -->
        <!--/ END BACK TOP -->

        <!-- START @ADDITIONAL ELEMENT -->
        <!--<div class="modal modal-success fade" id="modal-bootstrap-tour" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="margin: 150px auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Welcome to Blankon</h4>
                    </div>
                    <div class="modal-body">
                        <div class="media">
                            <div class="media-left" style="padding-right: 15px;">
                                <a href="#">
                                    <img data-no-retina class="media-object" src="http://img.djavaui.com/?create=100x180,81B71A?f=ffffff" alt="..." style="width: 100px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Hello, my name is Mr.Blankon</h4>
                                <b>Introduction</b> - Blankon fullpack admin theme is a theme full pack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="BlankonDashboard.callModal2()" data-dismiss="modal">Let's tour <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>-->

        <div class="modal modal-success fade" id="modal-bootstrap-tour-new-features" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document" style="margin: 150px auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Features</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th>Page</th>
                                    <th>Description</th>
                                    <th style="width: 90px" class="text-center">Live preview</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="min-width: 150px">
                                            Material Design version
                                        </td>
                                        <td>
                                            It is a design language developed by Google. Material Design makes more liberal use of grid-based layouts, responsive animations and depth effects such as lighting and shadows.
                                        </td>
                                        <td class="text-center">
                                            <a href="../../../production/admin/material-design/dashboard.html" target="_blank" class="btn btn-block btn-primary">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="min-width: 150px">
                                            Photography type 2
                                        </td>
                                        <td>
                                            This design suitable for your portfolio photography, so simple and the best UI/UX photography website.
                                        </td>
                                        <td class="text-center">
                                            <a href="../../../production/frontend/one-page-revolution-slider/photography-type-2/html/index.html" target="_blank" class="btn btn-block btn-primary">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="min-width: 150px">
                                            UI features notifications page
                                        </td>
                                        <td>
                                            It makes it easy to create alert - success - error - warning - information - confirmation messages as an alternative the standard alert dialog
                                        </td>
                                        <td class="text-center">
                                            <a href="../../../production/admin/html/ui-feature-notifications.html" target="_blank" class="btn btn-block btn-primary">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="BlankonDashboard.handleTour()" data-dismiss="modal">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal-danger fade" id="modal-bootstrap-tour-end" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="margin: 150px auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">End Blankon Tour</h4>
                    </div>
                    <div class="modal-body">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img data-no-retina class="media-object" src="http://img.djavaui.com/?create=100x180,81B71A?f=ffffff" alt="..." style="width: 100px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Thanks for watching!</h4>
                                <p>Thank you for view our blankon tour. If you already purchased Blankon and then you have any questions that are beyond the scope of this help file. You can visit us on below :</p>
                                <ul class="list-inline">
                                    <li>
                                        <a href="https://wrapbootstrap.com/user/djavaui" class="btn btn-inverse tooltips" target="_blank" data-toggle="tooltip" data-placement="top" data-title="Wrapbootstrap">W</a>
                                    </li>
                                    <li>
                                        <a href="http://djavaui.com" class="btn btn-lilac tooltips" target="_blank" data-toggle="tooltip" data-placement="top" data-title="Our Website"><i class="fa fa-globe"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/djavaui/" class="btn btn-facebook tooltips" target="_blank" data-toggle="tooltip" data-placement="top" data-title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/djavaui" class="btn btn-twitter tooltips" target="_blank" data-toggle="tooltip" data-placement="top" data-title="Twitter"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://plus.google.com/102744122511959250698" class="btn btn-googleplus tooltips" target="_blank" data-toggle="tooltip" data-placement="top" data-title="Google+"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/djavaui" class="btn btn-default tooltips" target="_blank" data-toggle="tooltip" data-placement="top" data-title="Github"><i class="fa fa-github"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/channel/UCt_dudJF4_0bOkQkwYN2qQQ" class="btn btn-youtube tooltips" target="_blank" data-toggle="tooltip" data-placement="top" data-title="Youtube"><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                                <b>Thanks so much!</b>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="BlankonDashboard.handleTour()" data-dismiss="modal">Let's tour again <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ END ADDITIONAL ELEMENT -->

<!--/ START MODEL -->
<div class="modal fade modal-success" id="modal-view-datatable" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="pop_heading"></h4>
            </div>
            <div class="modal-body" id="modal_content">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade modal-success" id="view-table-modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" style="width:95%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title pop_heading"></h4>
            </div>
            <div class="modal-body modal_content" >
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script type='text/javascript'>

function showAjaxModel(model_head,page_url)
{
	$.ajax({
		type: "POST",
		url: base_url + page_url,
		cache:false,
        dataType: 'json',
		success: function(msg){
		   	if(msg.status=='100'){
				$('#modal-view-datatable').modal('show');
				$('#pop_heading').html(model_head);
				$('#modal_content').html(msg.data);
				if(msg.customWidth){
					$(".modal-dialog").css("width", msg.customWidth);
				}else{
					$(".modal-dialog").css("width", "");
				}
			}else{
				location.reload();
			}
		}
	});
}

function submitMoldelForm(form_id,page_url,customWidth){
    if(form_id!=''){
    	 var $data = $('#'+form_id).serialize();
         //console.log($data);return false;
    	 $data +='&actionType=save';
    	 $.ajax({
    		type: "POST",
    		url: base_url + page_url,
    		cache:false,
    		data: $data,
    		success: function(msg){
                var obj = jQuery.parseJSON(msg);
    			if(obj.status=='100'){
    				$('#modal-view-datatable').modal('show');
    				$('#modal_content').html(obj.data);
					if(customWidth){
						$(".modal-dialog").css("width",customWidth);
					}else{
						$(".modal-dialog").css("width", "");
					}
    			}else{
    				location.reload();
    			}
    		}
    	});
    }
} 

function submitFileMoldelForm(form_id,page_url){ 
    
 if(form_id!=''){
    var $data = new FormData($('#'+form_id)[0]);
    $data.append( 'actionType', 'save');
     $.ajax({
        type: "POST",
        url: base_url + page_url,
        cache:false,
        data: $data,
        processData: false,
        contentType: false,
        success: function(msg){
            var obj = jQuery.parseJSON(msg);
            if(obj.status=='100'){
                $('#modal-view-datatable').modal('show');
                $('#modal_content').html(obj.data);
            }else{
				location.reload();
            }
        }
    });
 }
}

function viewTableModal(model_head,page_url, customWidth)
{
    $.ajax({
        type: "POST",
        url: base_url + page_url,
        cache:false,
        data: '',
        success: function(msg){
            var obj = jQuery.parseJSON(msg);
            $('#view-table-modal').modal('show');
            $('.pop_heading').html(model_head);
            $('.modal_content').html(obj.data);
			if(customWidth){
					$(".modal-dialog").css("width", customWidth);
			}else{
					$(".modal-dialog").css("width", "");
			}
        }
    });
}
	
function changeStatus(id,contact_id,type, customWidth){ 
        var current_work_flow_step_id = $("#current_work_flow_step_id").val();
    	$.ajax({
            type: "POST",
            url: base_url + 'franchisor/changeStatus/',
            cache:false,
            data:{'current_work_flow_step_id':current_work_flow_step_id,'entity_id':id,'entity_type':type,'contact_id':contact_id},
            dataType : "json",
            success: function(data){
                if(data.status=='100')
                {
                    $('#modal-view-datatable').modal('show');
                    //$("#modal-view-datatable").modal( "option", "width", '460' );
                    $("#modal_content").html(data.data);
                   // $(".modal-dialog").css("width", '95%');
				   if(customWidth){
					$(".modal-dialog").css("width", customWidth);
					}else{
						$(".modal-dialog").css("width", "");
					}
                }else
                {
                    $('#modal-view-datatable').modal('show');
                    $("#modal_content").html(data.data);
                }
            }
        });
    }       

    function getMoreTableData($tableId,$requestUrl,pageID)
    {
        var t = $('#'+$tableId).DataTable();
        $.ajax({
        type : 'POST',
        url :  $requestUrl,
        data:  {'pageId':pageID},
        dataType : "json",
        success : function(htmlResponse) {
               //console.log(htmlResponse);
               if(htmlResponse.data)
               {
                    t.rows.add(htmlResponse.data).draw();
                    getMoreTableData($tableId,$requestUrl,parseInt(parseInt(pageID) + 1));
               }
            }
         });
    }

    function getPrirequsitList($work_flow_step_id)
    {
    	//alert($current_work_flow_id+'----'+$work_flow_step_id);
        var current_work_flow_step_id = $("#current_work_flow_step_id").val();
        if($work_flow_step_id)
        {
            var id = $("#entity_id").val();
            var type = $("#entity_type").val();
            var contact_id = $("#contact_id").val();
        	$.ajax({
                type: "POST",
                url: base_url + 'franchisor/changeStatus/',
                cache:false,
                data:{'contact_id':contact_id,'current_work_flow_step_id':current_work_flow_step_id,'work_flow_step_id':$work_flow_step_id,'entity_id':id,'entity_type':type},
                dataType : "json",
                success: function(data){
                    if(data.status=='100')
                    {
    			$("#modal_content").html(data.data);
                    }else
                    {
                    	$("#modal_content").html(data.data);
                    }
                }
            });
        }
    }          
        
</script>
<!--/ START MODEL -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- START @CORE PLUGINS -->
       
        
    </body>
    <!--/ END BODY -->
</html>

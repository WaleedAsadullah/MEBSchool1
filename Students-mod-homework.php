<?php
include_once('session_end.php');
?>
<!DOCTYPE html>
<html>
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.png">

          <?php include_once("title.php") ?>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>
<body class="fixed-left">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php");
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Students-mod-sidemenu.php");
                    ?>

                    <!-- Sidebar -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Home Work</h3>
                                <div class="timeline">

                                    <?php
                                    $sql = 'SELECT `th_home_work_id`"ID",  `class` "Class", `subject`"Subject", `date`"Date", `work`"Work" , `file` "File"FROM `th_home_work`';
                                    display_homework($sql)
                                    ?>
                                    <!-- <article class="timeline-item alt">
                                        <div class="text-right">
                                            <div class="time-show first">
                                                <a href="#" class="btn btn-custom w-lg">Today</a>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item alt">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow-alt"></span>
                                                    <span class="timeline-icon bg-danger"><i class="zmdi zmdi-circle"></i></span>
                                                    <h4 class="text-danger">Maths</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>Do pratice Exe # 5.2 test will conduct on monday </p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item ">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow"></span>
                                                    <span class="timeline-icon bg-success"><i class="zmdi zmdi-circle"></i></span>
                                                    <h4 class="text-success">English</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>Read chapter # 6  </p>

                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item alt">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow-alt"></span>
                                                    <span class="timeline-icon bg-primary"><i class="zmdi zmdi-circle"></i></span>
                                                    <h4 class="text-primary">Science</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>Learn type of matter test on tuesday</p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow"></span>
                                                    <span class="timeline-icon bg-purple"><i class="zmdi zmdi-circle"></i></span>
                                                    <h4 class="text-purple">Islamiat</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>Read Hadees number 1 - 5 on ypur book  </p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item alt">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow-alt"></span>
                                                    <span class="timeline-icon"><i class="zmdi zmdi-circle"></i></span>
                                                    <h4 class="text-muted">19 hours ago</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>Jonatha Smith added new milestone <span><a href="#">Pathek</a></span>
                                                        Lorem ipsum dolor sit amet consiquest dio</p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="timeline-item alt">
                                        <div class="text-right">
                                            <div class="time-show">
                                                <a href="#" class="btn btn-custom w-lg">Yesterday</a>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow"></span>
                                                    <span class="timeline-icon bg-warning"><i class="zmdi zmdi-circle"></i></span>
                                                    <h4 class="text-warning">07 January 2016</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>Montly Regular Medical check up at Greenland Hospital by the
                                                        doctor <span><a href="#"> Johm meon </a></span>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item alt">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow-alt"></span>
                                                    <span class="timeline-icon bg-primary"><i class="zmdi zmdi-circle"></i></span>
                                                    <h4 class="text-primary">07 January 2016</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>Download the new updates of Ubold admin dashboard</p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="timeline-item">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow"></span>
                                                    <span class="timeline-icon bg-success"><i class="zmdi zmdi-circle"></i></span>
                                                    <h4 class="text-success">07 January 2016</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>Jonatha Smith added new milestone <span><a class="blue" href="#">crishtian</a></span>
                                                        Lorem ipsum dolor sit amet consiquest dio</p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item alt">
                                        <div class="text-right">
                                            <div class="time-show">
                                                <a href="#" class="btn btn-custom w-lg">Last Month</a>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="timeline-item alt">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow-alt"></span>
                                                    <span class="timeline-icon"><i class="zmdi zmdi-circle"></i></span>
                                                    <h4 class="text-muted">31 December 2015</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>Download the new updates of Ubold admin dashboard</p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="timeline-item">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow"></span>
                                                    <span class="timeline-icon bg-danger"><i class="zmdi zmdi-circle"></i></span>
                                                    <h4 class="text-danger">16 Decembar 2015</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>Jonatha Smith added new milestone <span><a href="#">prank</a></span>
                                                        Lorem ipsum dolor sit amet consiquest dio</p>
                                                </div>
                                            </div>
                                        </div>
                                    </article> -->

                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer">
                    2016 - 2017 © Adminto.
                </footer>

            </div>
                               
    </div>
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
</body>
</html>
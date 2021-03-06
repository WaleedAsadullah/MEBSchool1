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

        <!--Chartist Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/chartist/dist/chartist.min.css">
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
                            include_once("header.php")
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Parents-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->


            <!-- line chart -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <!-- graph -->
                            <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Child progress</h4>

                                    <canvas id="lineChart" height="300"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            <!-- graph end -->


                            <!-- report -->
            <div class="content-page">
                <!-- Start content -->
                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="m-t-0 header-title"><b>Report card</b></h4>
                                    
                                    <table class="tablesaw m-t-20 table m-b-0" data-tablesaw-mode="stack">
                                        <thead>
                                        <tr>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Subject</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Marks</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total Marks</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Percentage</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Grade</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Subject 1</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>76%</td>
                                            <td>A</td>
                                        </tr>
                                       <tr>
                                            <td>Subject 1</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>76%</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Subject 1</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>76%</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Subject 1</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>76%</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Subject 1</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>76%</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Subject 1</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>76%</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Subject 1</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>76%</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Subject 1</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>76%</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Subject 1</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>76%</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Subject 1</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>76%</td>
                                            <td>A</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <!-- report end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-page">
            <!-- Start content -->
            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">

                                <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Attendance</h4>

                                <div id="simple-pie" class="ct-chart ct-golden-section simple-pie-chart-chartist"></div>
                            </div>
                        </div><!-- end col-->
                    </div>
                </div>
            </div>
        </div>
            <!-- /Right-bar -->
    </div>
           
    </div>
        <script>
            var resizefunc = [];
        </script>
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
                <!-- Chart JS -->
        <script src="assets/plugins/chart.js/chart.min.js"></script>
        <script src="assets/pages/jquery.chartjs.init.js"></script>


        <!--Chartist Chart-->
        <script src="assets/plugins/chartist/dist/chartist.min.js"></script>
        <script src="assets/plugins/chartist/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="assets/pages/jquery.chartist.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
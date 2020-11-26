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

<!--         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->

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

        <style>
            rect{
                fill = "#768456";
            }
        </style>

</head>
<body class="smallscreen fixed-left-void">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("db_functions.php");
                            include_once("header.php")
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Admin-mod-sidemenu.php")





                    ?>



<?php








// $p = query_to_array('SELECT count(`status`)"Total Present" FROM `ad_employee_attendance` WHERE  `status` = "Present" and `id_num` = 6 ');
// $p = $p[0]['Total Present']; 

// $a = query_to_array('SELECT count(`status`)"Total Absent" FROM `ad_employee_attendance` WHERE  `status` = "Absent" and `id_num` = 6 ');
// $a = $a[0]['Total Absent']; 

//     echo '<script type="text/javascript">
//       google.charts.load("current", {packages:["corechart"]});
//       google.charts.setOnLoadCallback(drawChart);
//       function drawChart() {
//         var data = google.visualization.arrayToDataTable([
//           ["Status", "Value"],
//           ["Absent",      '.$a.'],
//           ["Present",      '.$p.']
//         ]);

//         var options = {
//             title: "title",
//             backgroundColor: "2f3e47",
//             is3D: true
//         };
//         var chart = new google.visualization.PieChart(document.getElementById("piechart_3d"));
//         chart.draw(data, options);
//       }
//     </script>'

?>

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Zakat Donate</h4>

                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li>
                                                <h5 style="color: #ff8acc;"><i class="fa fa-circle m-r-5"></i>IRFAN Zakats</h5>
                                            </li>
                                            <li>
                                                <h5 style="color: #5b69bc;"><i class="fa fa-circle m-r-5"></i>WALEED Zakats</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="morris-line-example" style="height: 300px;"></div>

                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Multiple Statistics</h4>

                                    <div id="website-stats" style="height: 320px;" class="flot-chart"></div>

                                </div>
                            </div><!-- end col-->

                            <div class="col-lg-6">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Realtime Statistics</h4>

                                    <div id="flotRealTime" style="height: 320px;" class="flot-chart"></div>

                                </div>
                            </div><!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Donut Pie</h4>

                                    <div id="donut-chart">
                                        <div id="donut-chart-container" class="flot-chart" style="height: 260px;">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col-->

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Pie Chart</h4>

                                    <div id="pie-chart">
                                        <div id="pie-chart-container" class="flot-chart" style="height: 260px;">
                                        </div>
                                    </div>

                                </div>
                            </div><!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Bar chart</h4>

                                    <div id="ordered-bars-chart" style="height: 320px;"></div>
                                </div>
                            </div><!-- end col-->

                        </div>

                        <!-- <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Attendance</h4>

                                    <div id="piechart_3d" class="flot-chart" style="width: 900px; height: 500px;"></div>
                                </div>
                            </div><!-- end col-->

                        <!-- </div>  -->
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Combine Statistics</h4>

                                    <div id="combine-chart">
                                        <div id="combine-chart-container" class="flot-chart" style="height: 320px;">
                                        </div>
                                    </div>

                                </div>
                            </div><!-- end col-->

                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->


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

        <!-- Flot chart js -->
        <script src="assets/plugins/flot-chart/jquery.flot.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>

        <!-- flot init -->
        <script src="assets/pages/jquery.flot.init.js"></script>

        <!--Morris Chart-->
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <!-- edit php here  -->
        <script><?php include_once('assets/pages/jquery.morris.init.php') ?></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <?php include_once('script.php') ?>
        <!-- <h1><?php print_r( $data1); ?></h1>
        <h1><?php echo $data_gr[1]['doner_gr']; ?></h1>
        <h1><?php print_r($data_d) ; ?></h1> -->
    </body>
</html>
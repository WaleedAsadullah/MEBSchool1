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

        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

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
            th,td{
                text-align: center;
            }
        </style>
</head>
<body class="smallscreen fixed-left-void">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php")
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Accounts-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->





            <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">Miscellaneous query report</h4>

                                    <div class="row">


                                        <div>
                                            <div class="panel-group" id="accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <div class="panel panel-default bx-shadow-none">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                               data-parent="#accordion" href="#collapseOne"
                                                               aria-expanded="true" aria-controls="collapseOne">
                                                                miscellaneous query report #1
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse in"
                                                         role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia
                                                            aute, non cupidatat skateboard dolor brunch. Food truck
                                                            quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                                            sunt aliqua put a bird on it squid single-origin coffee
                                                            nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                            helvetica, craft beer labore wes anderson cred nesciunt
                                                            sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim
                                                            aesthetic synth nesciunt you probably haven't heard of them
                                                            accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default bx-shadow-none">
                                                    <div class="panel-heading" role="tab" id="headingTwo">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                               data-parent="#accordion" href="#collapseTwo"
                                                               aria-expanded="false" aria-controls="collapseTwo">
                                                                miscellaneous query report #2
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse"
                                                         role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="panel-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia
                                                            aute, non cupidatat skateboard dolor brunch. Food truck
                                                            quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                                            sunt aliqua put a bird on it squid single-origin coffee
                                                            nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                            helvetica, craft beer labore wes anderson cred nesciunt
                                                            sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim
                                                            aesthetic synth nesciunt you probably haven't heard of them
                                                            accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default bx-shadow-none">
                                                    <div class="panel-heading" role="tab" id="headingThree">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                               data-parent="#accordion" href="#collapseThree"
                                                               aria-expanded="false" aria-controls="collapseThree">
                                                                miscellaneous query report #3
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse"
                                                         role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="panel-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia
                                                            aute, non cupidatat skateboard dolor brunch. Food truck
                                                            quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                                            sunt aliqua put a bird on it squid single-origin coffee
                                                            nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                            helvetica, craft beer labore wes anderson cred nesciunt
                                                            sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim
                                                            aesthetic synth nesciunt you probably haven't heard of them
                                                            accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->

                                    </div><!-- end row -->

                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->




                    </div>
                </div>
            </div>




                <!-- footer -->
                <?php 
                    include_once("footer.php")
                ?>
                   
                               
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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <?php include_once('script.php') ?>

    </body>
</html>
</html>
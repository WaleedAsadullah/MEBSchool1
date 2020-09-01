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
            h1{
                font-size: 50px;
            }
            .i{
                font-size: 4em;
            }
            button{
                height:100px;
                width:100px;
                margin: 20px;
            }
        </style>
    </head>
<body class="fixed-left-void">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php")
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                   
                    include_once("Accounts-mod-sidemenu.php");
                    ?>

                    <!-- Sidebar -->



            <!--  -->
            <!--  -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
<!--                                 <div class="account-pages" style="height:100vh" ></div>
                                <div class="clearfix" style="height:100vh" ></div>
                                <div class="wrapper-page"> -->
                                    <div class="text-center">
<!--                 <div><img src="assets/images/favicon2.png"></div> -->

                                        <h1 class="logo"  style="font-size: 3em; padding-top: 5%; padding-bottom: 3% ; color: white !important"><span style="font-size: 2em;">Welcome<span></span></span></h1>
                                        <h1 class="logo"><span><span style="font-size: 2em"><?php echo $_SESSION['name']?></span></span></h1>
                                        <br>
                                        <div>
                                            <span>
                                                <a href="Accounts-mod-profit-and-loss.php" ><button class="btn btn-default waves-effect m-b-5"> <i  class="fa fa-line-chart m-r-5 i"></i> 
                                                </button>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="Accounts-mod-receivable-and-payables-reporting.php" ><button class="btn btn-default waves-effect m-b-5"> <i style="" class="zmdi zmdi-collection-item m-r-5 i"></i> 
                                                </button>
                                                </a>
                                            </span>
                                            
                                            <span>
                                                <a href="Accounts-mod-budgeting-and-forecasting.php" ><button class="btn btn-default waves-effect m-b-5 i"> <i class="fa fa-money m-r-5"></i> 
                                                </button>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="Accounts-mod-payoll-calculation.php" ><button class="btn btn-default waves-effect m-b-5 i"> <i class="fa fa-calculator m-r-5"></i>
                                                </button>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="Accounts-mod-balance-sheet.php" ><button class="btn btn-default waves-effect m-b-5 i"> <i  class="fa fa-balance-scale m-r-5"></i> 
                                                </button>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="Accounts-mod-zakat-form.php" ><button class="btn btn-default waves-effect m-b-5 i"> <i class="fa fa-pagelines m-r-5"></i> 
                                                </button>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="Accounts-mod-fee-collecting.php" ><button class="btn btn-default waves-effect m-b-5 i"> <i class="fa fa-vcard-o m-r-5"></i> 
                                                </button>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="Accounts-mod-fee-card.php" ><button class="btn btn-default waves-effect m-b-5 i"> <i class="dripicons-document m-r-5"></i> 
                                                </button>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="Accounts-mod-fee-discount.php" ><button class="btn btn-default waves-effect m-b-5 i"> <i class="dripicons-to-do m-r-5"></i> 
                                                </button>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="Accounts-mod-miscellaneous-querry-reporting.php" ><button class="btn btn-default waves-effect m-b-5 i"> <i class="fa fa-database m-r-5"></i> 
                                                </button>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="Accounts-mod-annual-appraisal-for-bonus-and-increment.php" ><button class="btn btn-default waves-effect m-b-5 i"> <i class="fa fa-calendar-check-o m-r-5"></i> 
                                                </button>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="Accounts-mod-hall-booking.php" ><button class="btn btn-default waves-effect m-b-5 i"> <i class="zmdi zmdi-assignment m-r-5"></i> 
                                                </button>
                                                </a>
                                            </span>
                                        </div>
                <!-- <h5 class="text-muted m-t-0 font-600">Responsive Admin Dashboard</h5> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <!-- footer -->



            <?php 
            echo '<div style = "padding-top : 3em;" >';
                include_once("footer.php");
            echo '</div>';
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


        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

</body>
</html>
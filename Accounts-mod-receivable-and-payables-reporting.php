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


        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />


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
<body class="smallscreen fixed-left-void">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php");
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Accounts-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->





            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Payables </h4>
                                    

                                    <div class="table-responsive">
                                        <table class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered">
                                            <thead>
                                                <th>Assets</th>
                                                <th>Liability</th>
                                                <th>Expenses</th>
                                                <th>Fee Payables</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                    <?php 
                                    $sql_a = 'SELECT sum(`ac_asset_liab_amount`) - sum(`paid_amount`) FROM `ac_asset_liab` WHERE `type` = "Assets"';
                                    $result = mysqli_query($conn,$sql_a);
                                    $row = mysqli_fetch_assoc($result);
                                    // echo"Assets";
                                    echo "<td>".$row['sum(`ac_asset_liab_amount`) - sum(`paid_amount`)']."</td>";
                                    // echo "<br>";
                                    ?>
                                    <!--  -->

                                    <?php 
                                    $sql_a = 'SELECT sum(`ac_asset_liab_amount`) - sum(`paid_amount`) FROM `ac_asset_liab` WHERE `type` = "Liability"';
                                    $result = mysqli_query($conn,$sql_a);
                                    $row2 = mysqli_fetch_assoc($result);
                                    // echo"Liability";
                                    echo "<td>".$row2['sum(`ac_asset_liab_amount`) - sum(`paid_amount`)']."</td>";
                                    // echo "<br>";
                                    ?>
                                    <!--  -->
                                    
                                    <?php 
                                    $sql_a = 'SELECT sum(`exp_amount`)-sum(`paid_amount`) FROM `ac_rev_exp` WHERE `type` = "Expenses"';
                                    $result = mysqli_query($conn,$sql_a);
                                    $row3 = mysqli_fetch_assoc($result);
                                    // echo"Expenses";
                                    echo "<td>".$row3['sum(`exp_amount`)-sum(`paid_amount`)']."</td>";
                                    // echo "<br>";
                                    ?>

                                    <?php 
                                    $sql_a = 'SELECT sum(`fee`) FROM `ac_fee_collection`';
                                    $result = mysqli_query($conn,$sql_a);
                                    $row4 = mysqli_fetch_assoc($result);
                                    // echo"Expenses";
                                    echo "<td>".$row4['sum(`fee`)']."</td>";
                                    // echo "<br>";
                                    ?>
                                    <th>
                                        <?php echo $row['sum(`ac_asset_liab_amount`) - sum(`paid_amount`)'] + $row2['sum(`ac_asset_liab_amount`) - sum(`paid_amount`)'] +$row3['sum(`exp_amount`)-sum(`paid_amount`)'] +$row4['sum(`fee`)'] ?>
                                    </th>

                                    
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-page">
                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Receivable </h4>
                                    

                                    <div class="table-responsive">
                                        <table class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered">
                                            <thead>
                                                <th>Revenue</th>
                                                <th>Fee Receivable</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                   <?php 
                                    $sql_a = 'SELECT sum(`exp_amount`)-sum(`paid_amount`) FROM `ac_rev_exp` WHERE `type` = "Revenue"';
                                    $result = mysqli_query($conn,$sql_a);
                                    $row = mysqli_fetch_assoc($result);
                                    // echo"Revenue";
                                    echo "<td>".$row['sum(`exp_amount`)-sum(`paid_amount`)']."</td>";
                                    // echo "<br>";
                                    ?>

                                    <?php 
                                    $sql_a = 'SELECT SUM(`amount_pay`) FROM `ac_fee_collection_done`';
                                    $result = mysqli_query($conn,$sql_a);
                                    $row5 = mysqli_fetch_assoc($result);
                                    // echo"Revenue";
                                    echo "<td>".$row5['SUM(`amount_pay`)']."</td>";
                                    // echo "<br>";
                                    ?>
                                    <th>
                                        <?php echo $row['sum(`exp_amount`)-sum(`paid_amount`)'] + $row5['SUM(`amount_pay`)']  ?>
                                    </th>

                                    
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
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

        <!-- Datatables-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();

        </script>
        <?php include_once('script.php') ?>
 
</body>
</html>
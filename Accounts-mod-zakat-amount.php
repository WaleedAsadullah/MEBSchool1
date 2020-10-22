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

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

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



<!--             <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Zakat Donate</h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            $sql = 'SELECT `doner_gr`, `doner`, sum(`amount`)"Total" FROM `ac_zakat` group by `doner_gr`';
                                            print_r(query_to_array( $sql));
                                            $doner = query_to_array( $sql);


                                            for($doner_number = 0;  $doner_number < count($doner);  $doner_number++)
                                            {
                                                $doner_gr = $doner[$doner_number]['doner_gr'];
                                                $zakat_student = $doner[$doner_number]['Total'];

                                                $sql2 = 'SELECT `fee_collection_id`,`studend_id`, `student_name`,`which_month`,`year`,`feeza`, `from_zakat_account_id` FROM `ac_fee_collection`,`ad_fee_concession` WHERE `student_id` = `studend_id` and `from_zakat_account_id` = '.$doner_gr.' group by `fee_collection_id`';
                                                echo"<br>";
                                                echo"<br>";
                                                echo"<br>";
                                                echo $sql2;
                                                $amount = query_to_array( $sql2);
                                                $sum = 0;
                                                foreach ($amount as $item) {
                                                $sum += $item['feeza'];
                                                }
                                                echo "<h1>".$sum."</h1>";
                                                echo "<h1>".$zakat_student."</h1>";

                                                $outstanding =  (int)$zakat_student - (int)$sum;
                                                echo "<h1>outstanding ".$outstanding."</h1>";
                                            } 
                                            
                                            // print_r(query_to_array( $sql2))
                                            // ------------------------

                                            

                                            // $sql = 'SELECT `zakat_id`"ID",`period`"Period", `doner_gr`"Doner ID", `doner`"Doner Name", `amount`"Amount", `purpose`"Purpose", `date_of_donation`"Date Of Donation", `comment` "Comments"FROM `ac_zakat`order by `zakat_id` desc ';
                                            // display_query($sql);
                                            // -----------------------

                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                             <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Zakat Detail</h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Zakat Doner ID</th>
                                                <th>Zakat Doner Name </th>
                                                <th>Zakat Used</th>
                                                <th>Zakat Donate</th>
                                                <th>Outstanding</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sql = 'SELECT `doner_gr`, `doner`, sum(`amount`)"Total" FROM `ac_zakat` group by `doner_gr`';
                                            // print_r(query_to_array( $sql));
                                            $doner = query_to_array( $sql);

                                            $i = 0;
                                            for($doner_number = 0;  $doner_number < count($doner);  $doner_number++)
                                            {
                                                $i +=1;
                                                $doner_name =  $doner[$doner_number]['doner'];
                                                $doner_gr = $doner[$doner_number]['doner_gr'];
                                                $zakat_student = $doner[$doner_number]['Total'];

                                                $sql2 = 'SELECT `fee_collection_id`,`studend_id`,`ac_fee_collection`. `student_name`,`which_month`,`year`,`feeza`, `from_zakat_account_id` FROM `ac_fee_collection`,`ad_fee_concession` WHERE `student_id` = `studend_id` and `from_zakat_account_id` = '.$doner_gr.' group by `fee_collection_id`';
                                                echo "<tr>";
                                                // echo $sql2;
                                                $amount = query_to_array( $sql2);
                                                $sum = 0;
                                                foreach ($amount as $item) {
                                                $sum += $item['feeza'];
                                                }
                                                echo '<td>'.$i.'</td>';
                                                echo '<td>'.$doner_gr.'</td>';
                                                echo '<td>'.$doner_name.'</td>';
                                                echo "<td>".$sum."</td>";
                                                echo "<td>".$zakat_student."</td>";

                                                $outstanding =  (int)$zakat_student - (int)$sum;
                                                echo "<td>".$outstanding."</td>";
                                                if ($outstanding < 1000 ){
                                                    echo '<td><span class="label label-danger">Zakat Required</span></td>';
                                                }
                                                elseif ($outstanding == $zakat_student ){
                                                    echo '<td><span class="label label-warning"> Total Zakat is Used </span></td>';
                                                }
                                                elseif ($outstanding > 1000 ){
                                                    echo '<td><span class="label label-success">Normal  </span></td>';
                                                }

                                                echo "</tr>";
                                                }
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-sm-12" id="formadd2" >
                                <div class="card-box" >
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px">Check Indiviual Student Zakat</h4>
                                    <br>
                                    <form action="Accounts-mod-zakat-amount.php#formadd2" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Student ID","gr_no2","student_id","student_name","ad_fee_concession","WHERE `zakat_adj` > 0");
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                <br>
                                <div class="table-responsive">
                                    <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                <?php
                                if(isset($_REQUEST['gr_no2'])){
                                $sql3 = 'SELECT `fee_collection_id`"Voucher No.",`studend_id`"Student ID",`ac_fee_collection`. `student_name`"Student Name",`which_month`"Month",`year`"Year",`feeza`"Zakat", `from_zakat_account_id`"Doner Id" FROM `ac_fee_collection`,`ad_fee_concession` WHERE `studend_id` = '.$_REQUEST['gr_no2'].' GROUP BY `fee_collection_id`';
                                // echo $sql3;
                                display_query($sql3);
                                }
                                ?>  
                                    </table>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-12" id="formadd3" >
                                <div class="card-box" >
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px">Check Indiviual Zakat Doner</h4>
                                    <br>
                                    <form action="Accounts-mod-zakat-amount.php#formadd3" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Doner ID","doner_gr2","doner_id","doner_name","doner_zakat",Null);
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                <br>
                                <div class="table-responsive">
                                    <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                <?php
                                if(isset($_REQUEST['doner_gr2'])){
                                $sql4 = 'SELECT `fee_collection_id`"Voucher No.",`studend_id`"Student ID",`ac_fee_collection`. `student_name`"Name of Student",`which_month`"Month",`year`"Year",`feeza`"Zakat Amount", `from_zakat_account_id`"Doner ID" FROM `ac_fee_collection`,`ad_fee_concession` WHERE `student_id` = `studend_id` and `from_zakat_account_id` = '.$_REQUEST['doner_gr2'].' group by `fee_collection_id`';
                                // echo $sql3;
                                display_query($sql4);
                                }
                                ?>  
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
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

    
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

       
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
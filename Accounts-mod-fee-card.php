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

            <!-- fee card -->

            <div class="content-page">
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

                            <!-- input form -->


                            <!-- input form -->
                                <div class="col-lg-12">
                                    <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fees Card Table</h4>
                                    <div class="table-responsive">
                                        <table id="datatable2" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                          
                </div>
            </div>


             <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fee card Form </h4>
                                    <br>
                                    <form action="Accounts-mod-fee-card.php#formadd" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Student ID","gr_num2","addmission_id","name_of_student","ad_admission",NULL);
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>

<?php
if(isset($_REQUEST['gr_num2'])){
    echo'<div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Vouchar No.</th>
                <th>Year</th>
                <th>Month</th>
                <th>Month Fee</th>
                <th>Month Consession</th>
                <th>Admission Fee</th>
                <th>Admission Consession</th>
                <th>Exams and Other Activities Fee</th>
                <th>Exams and Other Activities Consession</th>
                <th>Misc Fee</th>
                <th>Misc Consession</th>
                <th>Other Charges</th>
                <th>Other Consession</th>
                <th>Anaual Charges</th>
                <th>Anaual Consession</th>
                <th>Month Fee Total</th>
                <th>Admission Fee Total</th>
                <th>Exams & Other Activities Total</th>
                <th>Misc Fee Total</th>
                <th>Other Fee Total</th>
                <th>Annual Fee Total</th>
                <th>Total</th>
            </tr>
            </thead>';
    $conn = connect_db();
    $sql_s = 'SELECT `fee_collection_id`, `user_id`, `user_date`, `which_month`, `year`, `class_id`, `class_name`, `section`, `studend_id`, `student_name`, `month_fee`, `month_con`, `admission_fee`, `admission_con`, `exam_fee`, `exam_con`, `misc_fee`, `misc_con`, `other_fee`, `other_con`, `annual_fee`, `annual_con`, `monfee`, `admfee`, `examfee`, `miscfee`, `specialfee`, `annualfee`, `feesibdisc`, `feeza`, `fee`, `concsession_id`, `generate_id`, `balance` FROM `ac_fee_collection` WHERE `studend_id` = '.$_REQUEST['gr_num2'].' ';

    echo$sql_s;
    $result = mysqli_query($conn,$sql_s);
    $m = 0;
    while($row = mysqli_fetch_assoc($result)){
        print_r($row);
        $m++;

    echo'
            <tbody>
                <tr>
                    <td>'.$m.'</td>
                    <td>'.$row['fee_collection_id'].'</td>
                    <td>'.$row['year'].'</td>
                    <td>'.$row['which_month'].'</td>
                    <td>'.$row['month_fee'].'</td>
                    <td>'.$row['month_con'].'</td>
                    <td>'.$row['admission_fee'].'</td>
                    <td>'.$row['admission_con'].'</td>
                    <td>'.$row['exam_fee'].'</td>
                    <td>'.$row['exam_con'].'</td
                    <td>'.$row['misc_fee'].'</td>
                    <td>'.$row['misc_con'].'</td
                    <td>'.$row['other_fee'].'</td>
                    <td>'.$row['other_con'].'</td
                    <td>'.$row['annual_fee'].'</td>
                    <td>'.$row['annual_con'].'</td
                    <td>'.$row['monfee'].'</td>
                    <td>'.$row['admfee'].'</td>
                    <td>'.$row['examfee'].'</td>
                    <td>'.$row['miscfee'].'</td>
                    <td>'.$row['specialfee'].'</td>
                    <td>'.$row['annualfee'].'</td>
                    <td>'.$row['feesibdisc'].'</td>
                    <td>'.$row['feeza'].'</td>
                    <td>'.$row['fee'].'</td>
                <tr>';
    }
    echo'
            </tbody>
        </table>';
}
?>
                                   
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

        <!-- isotope filter plugin -->
        <script type="text/javascript" src="assets/plugins/isotope/dist/isotope.pkgd.min.js"></script>

        <!-- Magnific popup -->
        <script type="text/javascript" src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
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
                <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable2').dataTable();
                $('#datatable2-keytable').DataTable( { keys: true } );
                $('#datatable2-responsive').DataTable();
                $('#datatable2-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatabl2e-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();

        </script>
        <?php include_once('script.php') ?>



</body>
</html>
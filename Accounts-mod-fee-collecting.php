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
                                <div class="card-box">
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                    </div>
                                </div>
                            </div>


                            <!-- input form -->
                                <div class="col-lg-12">
                                    <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fee Collecting </h4>

                                    <div class="table-responsive">
                                        <!-- tablesaw table m-b-0 tablesaw-columntoggle table-bordered -->
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // -------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){

                                            $balance = $_REQUEST['fee_total'] - $_REQUEST['amount_pay'];
                                            // print_r($_REQUEST);
                                            $sql = 'INSERT INTO `ac_fee_collection_done`(`fee_collection_done_id`, `user_id`, `user_date`, `student_id`, `student_name`, `class_id`, `class_name`, `section`, `fee_total`,`amount_pay`, `balance`, `date`, `voucher_no`,`month`,`year`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['student_id'].'\', \''.$_REQUEST['student_name'].'\', \''.$_REQUEST['class_id'].'\', \''.$_REQUEST['class_name'].'\', \''.$_REQUEST['section'].'\', \''.$_REQUEST['fee_total'].'\', \''.$_REQUEST['amount_pay'].'\', \''.$balance.'\', \''.$_REQUEST['date'].'\', \''.$_REQUEST['voucher_no'].'\', \''.$_REQUEST['month'].'\', \''.$_REQUEST['year'].'\')';
                                                // echo $sql;
                                            insert_query($sql);
                                                }
                                            //----------------------

                                            ///edit code
                                            // check_edit("ac_fee_collection_done","fee_collection_done_id");
                                            // edit_display("ac_fee_collection_done","fee_collection_done_id");
                                            //end of edit code -shift view below delete

                                            // ---------------------

                                            // if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_fee_collection_done` WHERE `ac_fee_collection_done`.`fee_collection_done_id` = '.$_REQUEST['deleteid'];

                                            // insert_query($sql);
                                            // echo "done deleting";
                                                // }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `fee_collection_done_id`"Transaction ID",`voucher_no`"Voucher No.", `user_id`"Cashier", `student_id`"Student ID", `student_name`"Student Name", `class_id`"Class ID", `class_name`"Class Name", `section`"Section", `fee_total`"Total Fee",`amount_pay`"Amount Pay", `balance`"Balance", `date`"Date Of Payment", `month`"Fee For Month",`year`"Year" FROM `ac_fee_collection_done` order by `fee_collection_done_id` desc';
                                            display_query($sql);

                                            ?>
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fee Collecting </h4>
                                    <br>
                                    <form action="Accounts-mod-fee-collecting.php#formadd" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Student ID","gr_num2","studend_id","student_name","ac_fee_collection","group by `studend_id` ORDER BY `user_date` DESC");
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>

<?php
if(isset($_REQUEST['gr_num2'])){
    $conn = connect_db();

    $sql = 'SELECT `fee_collection_id`, `user_id`, `user_date`, `which_month`, `year`, `class_id`, `class_name`, `section`, `studend_id`, `student_name`, `month_fee`, `month_con`, `admission_fee`, `admission_con`, `exam_fee`, `exam_con`, `misc_fee`, `misc_con`, `other_fee`, `other_con`, `annual_fee`, `annual_con`, `monfee`, `admfee`, `examfee`, `miscfee`, `specialfee`, `annualfee`, `feesibdisc`, `feeza`, `fee`,`concsession_id`,`generate_id`,`balance` from `ac_fee_collection` where `studend_id` = '.$_REQUEST['gr_num2'].' order by `user_date` DESC limit 0,1';


    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($result);

    $value_id = $row['fee_collection_id'];
    $value_month =  $row['which_month'];
    $value_year =  $row['year'];
    $value_class_id =  $row['class_id'];
    $value_class_name =  $row['class_name'];
    $value_section =  $row['section'];
    $value_studend_id =  $row['studend_id'];
    $value_student_name =  $row['student_name'];
    $value_fee =  $row['fee'];
    $balance = $row['balance'];
}
?>
                                    <form action="Accounts-mod-fee-collecting.php" method="post">
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="feSno">Voucher No.</label>
                                                    <input type="text" placeholder="Enter voucher no" name="voucher_no" required="" class="form-control" id="feSno"<?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_id.'" readonly' ; else {if(isset($_REQUEST['voucher_no'])) echo'value="'.$_REQUEST['voucher_no'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="feRollNo">GR No.</label>
                                                    <input type="text" name="student_id" required="" placeholder="Enter roll no." class="form-control" id="feRollNo"  <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_studend_id.'" readonly' ; else {if(isset($_REQUEST['student_id'])) echo'value="'.$_REQUEST['student_id'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="feNameOfStudent">Name of Student</label>
                                                    <input id="feNameOfStudent" name="student_name" type="text" placeholder="Enter name of student" required="" class="form-control"  <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_student_name.'" readonly' ; else {if(isset($_REQUEST['student_name'])) echo'value="'.$_REQUEST['student_name'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">  
                                                <div class="form-group">
                                                    <label for="feClass">Class ID</label>
                                                    <input id="feClass" name="class_id" type="text" placeholder="Enter class" required="" class="form-control"   <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_class_id.'" readonly' ; else {if(isset($_REQUEST['class_id'])) echo'value="'.$_REQUEST['class_id'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">  
                                                <div class="form-group">
                                                    <label >Class Name</label>
                                                    <input id="feClass" name="class_name" type="text" placeholder="Enter month" required="" class="form-control"   <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_class_name.'" readonly' ; else {if(isset($_REQUEST['class_name'])) echo'value="'.$_REQUEST['class_name'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="feNameOfStudent">Section</label>
                                                    <input id="feNameOfStudent" name="section" type="text" placeholder="Enter name of student" required="" class="form-control"  <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_section.'" readonly' ; else {if(isset($_REQUEST['section'])) echo'value="'.$_REQUEST['section'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">  
                                                <div class="form-group">
                                                    <label for="">Fee Of Month</label>
                                                    <input name="month" type="text" placeholder="Enter fee of month" required="" class="form-control"  <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_month.'" readonly' ; else {if(isset($_REQUEST['month'])) echo'value="'.$_REQUEST['month'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">  
                                                <div class="form-group">
                                                    <label for="" >Year</label>
                                                    <input name="year" type="text" placeholder="Enter year" required="" class="form-control"  <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_year.'" readonly' ; else {if(isset($_REQUEST['year'])) echo'value="'.$_REQUEST['year'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Arrears</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">  
                                                <div class="form-group">
                                                    <input  type="text" name="balance" placeholder="Arrears remaining as per voucher" required="" class="form-control"  <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$balance.'" readonly' ; else {if(isset($_REQUEST['balance'])) echo'value="'.$_REQUEST['balance'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                        </div>

                                           <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Latest Arears</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">  
                                                <div class="form-group">
                                                    <input  type="text" name="latest_balance" placeholder="Latest Arears" required="" class="form-control"  <?php if(isset($_REQUEST['gr_num2'])) echo 'value="'.get_student_balance($_REQUEST['gr_num2']).'" readonly' ; else { 
                                                        if(isset($_REQUEST['student_id'])) echo'value="'.get_student_balance($_REQUEST['student_id']).'" readonly';} ?>>
                                                </div>
                                            </div>
                                        </div>

                                           <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Total Fee</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">  
                                                <div class="form-group">
                                                    <input  type="text" name="fee_total" placeholder="Enter total fee" required="" class="form-control"  <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_fee.'" readonly' ; else {if(isset($_REQUEST['fee_total'])) echo'value="'.$_REQUEST['fee_total'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Amount Pay</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">  
                                                <div class="form-group">
                                                    <input  type="number" name="amount_pay" placeholder="Enter amount pay" class="form-control" value="<?php if(isset($_REQUEST['amount_pay'])) echo $_REQUEST['amount_pay']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Balance</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">  
                                                <div class="form-group">
                                                    <input  type="number" name="balance" placeholder="Enter balance"  class="form-control"  value="<?php if(isset($_REQUEST['balance'])) echo $_REQUEST['balance']?>">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Date</label>
                                                    <input  name="date" type="date" placeholder="Enter name of student" required="" class="form-control" value="<?php if (isset($_REQUEST['date'])) echo $_REQUEST['date']; else echo (date("Y-m-d")); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">  
                                                <div class="form-group">
                                                    <label for="feClass">Cashier</label>
                                                    <input type="text" required="" class="form-control"  <?php echo 'value="'.get_curr_user().'" readonly'; ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-right m-b-0 m-t-10">
                                            <?php 
                                            code_submit();
                                            ?>
                                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
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
        <?php include_once('script.php') ?>



</body>
</html>
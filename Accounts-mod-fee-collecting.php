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

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fees Table</h4>

                                    <div class="table-responsive">
                                        <!-- tablesaw table m-b-0 tablesaw-columntoggle table-bordered -->
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // -------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                            // print_r($_REQUEST);
                                            $sql = 'INSERT INTO  `ac_fee_module`(`fee_id`, `user_id`, `user_date`, `category`, `s_no`, `name`, `class`, `fee_month_name`, `gr_num`, `fees_month`, `admission_fee`, `exam`, `fine`, `mics`, `total`, `date`, `cashier`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['category'].'\', \''.$_REQUEST['s_no'].'\', \''.$_REQUEST['name'].'\', \''.$_REQUEST['class'].'\', \''.$_REQUEST['fee_month_name'].'\', \''.$_REQUEST['gr_num'].'\', \''.$_REQUEST['fees_month'].'\', \''.$_REQUEST['admission_fee'].'\', \''.$_REQUEST['exam'].'\', \''.$_REQUEST['fine'].'\', \''.$_REQUEST['mics'].'\', \''.$_REQUEST['total'].'\', \''.$_REQUEST['date'].'\', \''.$_REQUEST['cashier'].'\')';
                                                // echo $sql;
                                            insert_query($sql);
                                                }
                                            //----------------------

                                            ///edit code
                                            check_edit("ac_fee_module","fee_id");
                                            edit_display("ac_fee_module","fee_id");
                                            //end of edit code -shift view below delete

                                            // ---------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_fee_module` WHERE `ac_fee_module`.`fee_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `fee_id`"ID", `category` "Category", `name`"name", `class`"Class",`fee_month_name`"Fee for the Month", `gr_num`"Gr No.", `fees_month`"Fees for the Month", `admission_fee`"Admission Fee", `exam`"Exams and Other Activities", `fine`"Fine", `mics`"Mics", `total`"Total", `date`"Date", `cashier`"Cashier" FROM `ac_fee_module`';
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
            </dir>
        </div>





             <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fee Form </h4>
                                    <br>
                                    <form action="Accounts-mod-fee-collecting.php#formadd" method="post" id="submitted">
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
    $conn = connect_db();
    $sql_s = 'SELECT `addmission_id`,`name_of_student`,`father_name`,`class`,`surname`, `guardian_name`, `cnic_guradian`, `occupation_of_father`,`address` FROM `ad_admission` WHERE `addmission_id` = '.$_REQUEST['gr_num2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['addmission_id'];
    $value_name =  $row['name_of_student'];}
?>
                                    <form action="Accounts-mod-fee-collecting.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-9"></div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="feCategory">Category</label>
                                                    <?php 
                                                    table_to_dropdown("ad_section","section_id","section_name","category");
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        // $sql1 = 'SELECT `class`, `name_of_student` FROM `ad_admission` WHERE `GR_No` LIKE \''..'\'';
                                        // $arr_result = query_to_array($sql1);

                                        // $sql2 = 'SELECT `student_fee_id`, `user_id`, `user_date`, `admitted_class`, `admission_fee`, `activities_fee`, `tution_fee`, `total`, `gr_no` FROM `ad_student_fee` WHERE `GR_No` LIKE \''..'\'';
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">S No.</label>
                                                    <input type="text" name="s_no" required="" class="form-control" id="feSno"
                                                     value="<?php if(isset($_REQUEST['s_no'])) echo $_REQUEST['s_no'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feRollNo">Gr No. </label>
                                                    <input type="text" name="gr_num" required="" placeholder="Enter roll no." class="form-control" id="feRollNo"  <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_id.'" readonly' ; else {if(isset($_REQUEST['gr_num'])) echo'value="'.$_REQUEST['gr_num'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feNameOfStudent">Name of Student</label>
                                                    <input id="feNameOfStudent" name="name" type="text" placeholder="Enter name of student" required="" class="form-control"  <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_name.'" readonly' ; else {if(isset($_REQUEST['name'])) echo'value="'.$_REQUEST['name'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">  
                                                <div class="form-group">
                                                    <label for="feClass">Class</label>
                                                    <input id="feClass" name="class" type="text" placeholder="Enter class" required="" class="form-control"  value="<?php if(isset($_REQUEST['class'])) echo $_REQUEST['class']?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">  
                                                <div class="form-group">
                                                    <label >Fee for the Month</label>
                                                    <input id="feClass" name="fee_month_name" type="text" placeholder="Enter month" required="" class="form-control"  value="<?php if(isset($_REQUEST['fee_month_name'])) echo $_REQUEST['fee_month_name']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Fees of the Month</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">  
                                                <div class="form-group">
                                                    <input  type="text" name="fees_month" placeholder="Enter amount" required="" class="form-control"  value="<?php if(isset($_REQUEST['fees_month'])) echo $_REQUEST['fees_month']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Admission Fee</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">  
                                                <div class="form-group">
                                                    <input  type="number" name="admission_fee" placeholder="Enter amount" class="form-control" value="<?php if(isset($_REQUEST['admission_fee'])) echo $_REQUEST['admission_fee']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Exams and Other Activities</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">  
                                                <div class="form-group">
                                                    <input  type="number" name="exam" placeholder="Enter amount"  class="form-control"  value="<?php if(isset($_REQUEST['exam'])) echo $_REQUEST['exam']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Fine</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">  
                                                <div class="form-group">
                                                    <input  type="number" name="fine" placeholder="Enter amount"  class="form-control"  value="<?php if(isset($_REQUEST['fine'])) echo $_REQUEST['fine']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Mics</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">  
                                                <div class="form-group">
                                                    <input  type="number" name="mics" placeholder="Enter amount"  class="form-control"  value="<?php if(isset($_REQUEST['mics'])) echo $_REQUEST['mics']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label><h3>Total</h3></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">  
                                                <div class="form-group">
                                                    <input  type="number" name="total" placeholder="Total amount" required="" class="form-control"  value="<?php if(isset($_REQUEST['total'])) echo $_REQUEST['total']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feNameOfStudent">Date</label>
                                                    <input id="feNameOfStudent" name="date" type="date" placeholder="Enter name of student" required="" class="form-control" value="<?php if (isset($_REQUEST['date'])) echo $_REQUEST['date']; else echo (date("Y-m-d")); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">  
                                                <div class="form-group">
                                                    <label for="feClass">Cashier</label>
                                                    <input id="feClass" name="cashier" type="text" placeholder="Enter class" required="" class="form-control"  value="<?php if (isset($_REQUEST['cashier'])) echo $_REQUEST['cashier'] ?>">
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



<div id="records" ></div>
<div class="form-group">
<label for="">Input</label>
<input type="text" id="getusers" class="form-control">
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
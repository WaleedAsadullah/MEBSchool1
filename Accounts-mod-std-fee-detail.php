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
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Student Fee Deatils </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ------------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                                // print_r($_REQUEST);
                                                $sql = 'INSERT INTO `ac_std_fee_detail`(`std_fee_detail_id`, `user_id`, `user_date`, `std_id`, `actual_fee`, `concession`, `zakat_adjustment`, `from_zakat_account`, `from_zakat_account_id`, `remarks`, `annual_charges_recived`) VALUES (NULL,\'';
                                                $sql .= get_curr_user();
                                                $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['std_id'].'\', \''.$_REQUEST['actual_fee'].'\', \''.$_REQUEST['concession'].'\', \''.$_REQUEST['zakat_adjustment'].'\', \''.$_REQUEST['from_zakat_account'].'\', \''.$_REQUEST['from_zakat_account_id'].'\', \''.$_REQUEST['remarks'].'\', \''.$_REQUEST['annual_charges_recived'].'\')';
                                                // echo $sql;
                                                insert_query($sql);
                                            }

                                            // ------------------------

                                            ///edit code
                                            check_edit("ac_std_fee_detail","std_fee_detail_id");
                                            edit_display("ac_std_fee_detail","std_fee_detail_id");
                                            //end of edit code -shift view below delete

                                            // ------------------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_std_fee_detail` WHERE `ac_std_fee_detail`.`std_fee_detail_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `std_fee_detail_id`"ID", `std_id`"Student ID", `actual_fee`"Actual Fee", `concession`"Concession", `zakat_adjustment`"Zakat Adjustment", `from_zakat_account`"From Zakat Account", `from_zakat_account_id`"From Zakat Account ID", `remarks`"Remarks", `annual_charges_recived`"Annual Charges Recived" FROM `ac_std_fee_detail';
                                            display_query($sql);
                                            // -----------------------

                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px">Student Fee Detail</h4>
                                    <br>
                                    <form action="Accounts-mod-std-fee-detail.php#formadd" method="post" id="submitted">
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
                                    <form action="Accounts-mod-std-fee-detail.php" method="post">


                                        <div class="form-group">
                                            <label for="hbName">Student ID</label>
                                            <input type="text" name="std_id" required="" placeholder="Enter student id" class="form-control" id="hbstd_id" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_id.'" readonly' ; else {if(isset($_REQUEST['std_id'])) echo'value="'.$_REQUEST['std_id'].'" readonly';} ?>>
                                        </div>
                                    
                               
                                        <div class="form-group">
                                            <label for="hbAddress">Actual Fee</label>
                                            <input type="text" name="actual_fee" required="" placeholder="Enter zakat actual fee" class="form-control" value="<?php if(isset($_REQUEST['actual_fee'])) echo $_REQUEST['actual_fee']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbPhone">Concession</label>
                                            <input type="number" name="concession" placeholder="Enter concession" class="form-control" value="<?php if(isset($_REQUEST['concession'])) echo $_REQUEST['concession']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Zakat Adjustment</label>
                                            <input type="text" name="zakat_adjustment" placeholder="Enter zakat adjustment" class="form-control"   value="<?php if(isset($_REQUEST['zakat_adjustment'])) echo $_REQUEST['zakat_adjustment']?>">
                                        </div>

                                        <div class="form-group">
                                            <label >From Zakat Account</label>
                                            <input type="text" name="from_zakat_account" placeholder="Enter from zakat account" class="form-control" value="<?php if(isset($_REQUEST['from_zakat_account'])) echo $_REQUEST['from_zakat_account']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="hbRentAmount">From Zakat Account ID</label>
                                            <input type="text" name="from_zakat_account_id" placeholder="Enter from zakat account id" class="form-control" value="<?php if(isset($_REQUEST['from_zakat_account_id'])) echo $_REQUEST['from_zakat_account_id']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="hbRentAmount">Remarks</label>
                                            <input type="text" name="remarks" placeholder="Enter remarks....." class="form-control" value="<?php if(isset($_REQUEST['remarks'])) echo $_REQUEST['remarks']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="hbRentAmount">Anuual Charges Recived</label>
                                            <input type="text" name="annual_charges_recived" required  placeholder="Enter annual charges recived" class="form-control" value="<?php if(isset($_REQUEST['annual_charges_recived'])) echo $_REQUEST['annual_charges_recived']?>">
                                        </div>

                                       

                                        <div class="form-group text-right m-b-0">
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
            <!-- Form end -->

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

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

        <!--Morris Chart-->
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

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
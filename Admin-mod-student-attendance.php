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


<body class="fixed-left">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php");
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Admin-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->
                
                




            <!-- attendance table -->

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                     <div style="text-align: center" >
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light m-b-5"  >+  Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light m-b-5" > Export </button></a>
                                    </div>
                                </div>
                            </div>

                            <!-- input form -->


                            <!-- input form -->
                                <div class="col-lg-12">
                                    <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px">Student attendance sheet</h4>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php

                                            //echo "test";
                                            if(isset($_REQUEST['submit'])){
                                            //print_r($_REQUEST);
                                            $sql = 'INSERT INTO `ad_std_attendance`(`std_attendance_id`, `user_id`, `user_date`, `name`, `gr_no`, `status`, `class`, `date`)VALUES (NULL, \'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['name'].'\', \''.$_REQUEST['gr_no'].'\', \''.$_REQUEST['status'].'\', \''.$_REQUEST['class'].'\', \''.$_REQUEST['date'].'\')';
                                            //echo $sql;
                                            insert_query($sql);
                                            }

                                            ///edit code
                                       
                                            check_edit("ad_std_attendance","std_attendance_id");

                                            edit_display("ad_std_attendance","std_attendance_id");
                                     
                                            //end of edit code -shift view below delete

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_std_attendance` WHERE `ad_std_attendance`.`std_attendance_id` = '.$_REQUEST['deleteid'];

                                                insert_query($sql);
                                                // echo "done deleting";
                                                }
                                           // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `std_attendance_id`"ID", `name`"Name", `gr_no`"Gr No.", `status`"Status", `class`"Class", `date`"Date" FROM `ad_std_attendance` ';
                                            display_query_attendance($sql);

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
                                        <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Student Attendance </h4>
                                        <br>
                                        <form action="Admin-mod-student-attendance.php#formadd" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Student ID","gr_no2","gr_no","name","ad_assign_student_class",NULL);
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <p class="text-muted">Can't Find Student? <a href="Admin-mod-admission-management.php" class="text-primary m-l-5"><b> Add a Student Here</b></a></p>
                                        </div>
                                    </div>

<?php
if(isset($_REQUEST['gr_no2'])){
    $conn = connect_db();
    $sql_s = 'SELECT `assign_student_class_id`, `user_id`, `user_date`, `gr_no`, `name`, `date`, `assign_class`, `comment` FROM `ad_assign_student_class` WHERE `gr_no` = '.$_REQUEST['gr_no2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['gr_no'];
    $value_name =  $row['name'];
    $valu_class_id = $row['assign_class'];

    $sql = 'SELECT `class_id`, `class_name`, `section`, `comment` FROM `ad_class` WHERE `class_id` = '.$valu_class_id.'';
    $result2 = mysqli_query($conn,$sql);
    $row2 = mysqli_fetch_assoc($result2);
    $value_class = $row2['class_name'];
}
?>

                                        <form action="Admin-mod-student-attendance.php" method="post">

                                            <div class="form-group">
                                                <label for="">Student's Name </label>
                                                <input type="text" name="name" required=""  placeholder="Enter student's name" class="form-control" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_name.'" readonly' ;else { if(isset($_REQUEST['name'])) echo 'value="'.$_REQUEST['name'].'" readonly';} ?>>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Class </label>
                                                <input type="text" name="class" required=""  placeholder="Enter student's class" class="form-control" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_class.'" readonly' ;else { if(isset($_REQUEST['class'])) echo 'value="'.$_REQUEST['class'].'" readonly';} ?>>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="userName">GR #</label>
                                                <input type="text" name="gr_no" required=""placeholder="Enter Gr No." class="form-control" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_id.'" readonly' ;else{ if(isset($_REQUEST['gr_no'])) echo'value="'.$_REQUEST['gr_no'].'" readonly';} ?>>
                                            </div>

                                            <div class="form-group">
                                                <label for="userName">Subject</label>
                                                <input type="text" name="subject" required="" placeholder="Enter subject." class="form-control" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_id.'" readonly' ;else{ if(isset($_REQUEST['gr_no'])) echo'value="'.$_REQUEST['gr_no'].'" readonly';} ?>>
                                            </div>

                                            <div class="form-group">
                                                <label for="userName">Status</label>
                                                <select type="text" name="status" parsley-trigger="change" required="" placeholder="Eligible or not" class="form-control" id="zaEligible">
                                                    <option value="Present" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'Present') echo "selected" ?>>Present</option>
                                                    <option value="Absent" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'Absent') echo "selected" ?>>Absent</option>
                                                    <option value="Late" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'Late') echo "selected" ?>>Late</option>
                                                    <option value="Excused" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'Excused') echo "selected" ?>>Excused</option>
                                                    <option value="Alerts on Absence" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'Alerts on Absence') echo "selected" ?>>Alerts on Absence</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date"  name="date" value="<?php if (isset($_REQUEST['date'])) echo $_REQUEST['date']; else echo (date("Y-m-d")); ?>" parsley-trigger="change" required="" placeholder="Enter GR#" class="form-control" >
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
        </div>
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
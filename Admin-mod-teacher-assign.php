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
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

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
                            include_once("Admin-mod-sidemenu.php");
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
                                <div class="card-box" >
                                    <h4 class="header-title m-t-0 m-b-30" style="text-align: center; font-size: 22px; padding: 10px">Teacher Assign</h4>
                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered " id="adadmissiontable">

                                            <?php
                                            if (isset($_POST['submit'])){
                                            $sql = 'INSERT INTO `ad_teacher_assign`(`teacher_assign_id`, `user_id`, `user_date`, `teacher_id`, `teacher_name`, `assign_class`, `assign_subject`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['teacher_id'].'\', \''.$_REQUEST['teacher_name'].'\', \''.$_REQUEST['assign_class'].'\', \''.$_REQUEST['assign_subject'].'\')';
                                                // echo $sql;
                                            insert_query($sql);
                                            }
                                            check_edit("ad_teacher_assign","teacher_assign_id");
                                            edit_display("ad_teacher_assign","teacher_assign_id");
                                            //end of edit code -shift view below delete

                                            // ------------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_teacher_assign` WHERE `ad_teacher_assign`.`teacher_assign_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                                    // echo "done deleting";
                                                }
                                               // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `ad_teacher_assign`.`teacher_assign_id`"ID",`ad_teacher_assign`.`assign_class`"Class ID",`ad_teacher_assign`.`teacher_id`"Teacher ID", `ad_teacher_assign`.`teacher_name`"Teacher Name", `ad_class`.`section`"Assigned Section", `ad_class`.`class_name`"Assigned Class", `ad_teacher_assign`.`assign_subject`"Assigned Subject" FROM `ad_teacher_assign`,`ad_class` WHERE `ad_class`.`class_id` = `ad_teacher_assign`.`assign_class` ';
                                            display_query($sql);

                                            // --------------------------

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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Teacher Assign </h4>
                                    <br>
                                        <form action="Admin-mod-teacher-assign.php#formadd" method="post">
                                        <?php
                                        dropDownConditional2("Teacher ID","teacher_id2","Teacher_records_id","name","ad_teacher_records",NULL);
                                        ?>
                                        
                                        <div class="form-group text-right m-b-0">
                                            <button type="submit" name="submit2" class="btn btn-default waves-effect waves-light m-l-5">
                                            Submit
                                            </button>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <p class="text-muted">Can't Find Teacher? <a href="Admin-mod-teacher-records.php" class="text-primary m-l-5"><b> Add a Teacher Here</b></a></p>
                                        </div>
                                    </div>

<?php
if(isset($_REQUEST['teacher_id2'])){
    $conn = connect_db();
    $sql_s = 'SELECT `Teacher_records_id`,`name` FROM `ad_teacher_records` WHERE `Teacher_records_id` = '.$_REQUEST['teacher_id2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);
    $value_name =  $row['name'];
    $value_id = $row['Teacher_records_id'];
}
?>
                                    
                                        <form action="Admin-mod-teacher-assign.php" method="post">
                                            <!-- teacher id -->
                                        <div class="form-group">
                                            <label for="">Teacher ID</label>
                                            <input  type="number" name="teacher_id"  required="" placeholder="Enter teacher id" class="form-control" <?php if(isset($_REQUEST['teacher_id2']))echo 'value="'.$value_id.'" readonly' ;else { if(isset($_REQUEST['teacher_id'])) echo'value="'.$_REQUEST['teacher_id'].'" readonly';} ?>>
                                        </div>
                                        
                                            <div class="form-group">
                                                <label for="">Teacher Name </label>
                                                <input type="text" name="teacher_name" required="" placeholder="Enter name" class="form-control" 
                                                <?php if(isset($_REQUEST['teacher_id2']))echo 'value="'.$value_name.'" readonly' ;else { if(isset($_REQUEST['teacher_name'])) echo'value="'.$_REQUEST['teacher_name'].'" readonly';} ?>>
                                            </div>

                                            <!-- class -->
                                        <?php
                                        dropDownConditional3section("Assign Class", "assign_class","class_id","class_name","section","ad_class",Null);


                                        echo'<div class="row">
                                        <div class="col-sm-12 text-right">
                                            <p class="text-muted">Can\'t Find Class? <a href="Admin-mod-class.php" class="text-primary m-l-5"><b> Add a Class Here</b></a></p>
                                            </div>';
                                        dropDownSimple('Assigned Subject','assign_subject','subject_name','ad_subject',NULL);
                                        ?>


                                            

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
            <!-- Form end -->

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
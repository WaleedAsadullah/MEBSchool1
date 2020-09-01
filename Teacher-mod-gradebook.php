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
        <script >
            var today = new Date();
            console.log(today)
        </script>

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
                            include_once("teacher-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->


        <!-- content -->
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Gradebook</h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ---------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                            // print_r($_REQUEST);
                                            $sql = 'INSERT INTO `th_gradebook`(`gardebook_id`, `user_id`, `user_date`, `student_id`, `student_subject_id`, `student_subject_name`, `student_grade`, `student_letter_grade`, `student_teacher_comment`, `semester`, `year`, `current_class`, `internal_comments`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['student_id'].'\', \''.$_REQUEST['student_subject_id'].'\', \''.$_REQUEST['student_subject_name'].'\', \''.$_REQUEST['student_grade'].'\', \''.$_REQUEST['student_letter_grade'].'\', \''.$_REQUEST['student_teacher_comment'].'\', \''.$_REQUEST['semester'].'\', \''.$_REQUEST['year'].'\', \''.$_REQUEST['current_class'].'\', \''.$_REQUEST['internal_comments'].'\')';
                                            // echo $sql;
                                            insert_query($sql);
                                                }

                                            // ---------------

                                            ///edit code
                                            check_edit("th_gradebook","gardebook_id");
                                            edit_display("th_gradebook","gardebook_id");
                                            //end of edit code -shift view below delete

                                            // ---------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `th_gradebook` WHERE `th_gradebook`.`gardebook_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `gardebook_id`"ID", `student_id` "Student ID", `student_subject_id` "Subject ID", `student_subject_name`"Subject Name", `student_grade`"Student Grade", `student_letter_grade`"Letter Grade", `student_teacher_comment`"Teacher Comments", `semester`"Semester", `year`"Year", `current_class`"Current Class", `internal_comments`"Internal Comments" FROM `th_gradebook`';
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

            <!-- Form -->
            <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Gradebook </h4>
                                    <br>
                                        <form action="Teacher-mod-gradebook.php#formadd" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Student ID","gr_no2","addmission_id","name_of_student","ad_admission",NULL);
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                                
                                                <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                    Submit
                                                </button>
                                            </div>
                                    </form>

<?php
if(isset($_REQUEST['gr_no2'])){
    $conn = connect_db();
    $sql_s = 'SELECT `addmission_id`,`name_of_student`,`father_name`,`class`,`surname`, `guardian_name`, `cnic_guradian`, `occupation_of_father`,`address` FROM `ad_admission` WHERE `addmission_id` = '.$_REQUEST['gr_no2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['addmission_id'];
    $value_name =  $row['name_of_student'];
    $value_class =  $row['class'];
}
?>
                                    <form action="Teacher-mod-gradebook.php" method="post">


                                        <div class="form-group">
                                            <label for="hbName">Student ID</label>
                                            <input type="text" name="student_id" required="" placeholder="Enter student id" class="form-control" id="hbName" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_id.'" readonly' ;else { if(isset($_REQUEST['student_id'])) echo 'value="'.$_REQUEST['student_id'].'" readonly';} ?>>
                                        </div>
                                    
                               
                                        <div class="form-group">
                                            <label>Student Subject ID</label>
                                            <input type="text" name="student_subject_id" required="" placeholder="Enter subject id" class="form-control" value="<?php if(isset($_REQUEST['student_subject_id'])) echo $_REQUEST['student_subject_id']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Student Subject Name</label>
                                            <input type="text" name="student_subject_name" required=""  placeholder="Enter subject name" class="form-control" value="<?php if(isset($_REQUEST['student_subject_name'])) echo $_REQUEST['student_subject_name']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Student Grade</label>
                                            <input type="text" name="student_grade" required="" placeholder="Enter student grade" class="form-control" value="<?php if(isset($_REQUEST['student_grade'])) echo $_REQUEST['student_grade']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Student Letter Grade</label>
                                            <input type="text" name="student_letter_grade" required=""  placeholder="Enter letter grade" class="form-control" value="<?php if(isset($_REQUEST['student_letter_grade'])) echo $_REQUEST['student_letter_grade']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Student Teacher Comment</label>
                                            <input type="text" name="student_teacher_comment" placeholder="Enter teacher commentss" class="form-control" value="<?php if(isset($_REQUEST['student_teacher_comment'])) echo $_REQUEST['student_teacher_comment']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Semester</label>
                                            <input type="text" name="semester" required="" placeholder="Enter semester" class="form-control" value="<?php if(isset($_REQUEST['semester'])) echo $_REQUEST['semester']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Year</label>
                                            <input type="text" name="year" required=""  placeholder="Enter year" class="form-control" value="<?php if(isset($_REQUEST['year'])) echo $_REQUEST['year']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Current Class</label>
                                            <input type="text" name="current_class" required="" placeholder="Enter current class" class="form-control" value="<?php if(isset($_REQUEST['current_class'])) echo $_REQUEST['current_class']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Internal Comments</label>
                                            <input type="text" name="internal_comments"  placeholder="Enter internal comments" class="form-control" value="<?php if(isset($_REQUEST['internal_comments'])) echo $_REQUEST['internal_comments']?>">
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
                $('#datatable3').dataTable();
                $('#datatable3-keytable').DataTable( { keys: true } );
                $('#datatable3-responsive').DataTable();
                $('#datatable3-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable3-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();

        </script>
        <?php include_once('script.php') ?>

</body>
</html>






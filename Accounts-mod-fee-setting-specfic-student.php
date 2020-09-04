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
                                <div class="card-box">
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="#formadd" > <button  type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fee Settings For Specific Student </h4>
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <p class="text-muted">To Generate Fee <a href="Admin-mod-class.php" class="text-primary m-l-5"><b> Click Here</b></a></p>
                                        </div>
                                    </div>
                                    <div class="table-responsive" id="view">
                                        <!-- tablesaw table m-b-0 tablesaw-columntoggle table-bordered -->
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // -------------------
                                            //echo "test";
                                            if(isset($_REQUEST['submit'])){
                                            //print_r($_REQUEST);

                                            $take_date =  $_REQUEST['date'];
                                            $take_date =explode("-",$take_date);

                                            $year = $take_date[0];
                                            $month_check = $take_date[1];

                                            switch ($month_check) {
                                                          case 1:
                                                            $month = "January";
                                                            break;
                                                          case 2:
                                                            $month = "February";
                                                            break;
                                                          case 3:
                                                            $month = "March";
                                                            break;
                                                        case 4:
                                                            $month = "April";
                                                            break;
                                                        case 5:
                                                            $month = "May";
                                                            break;
                                                        case 6:
                                                            $month = "June";
                                                            break;
                                                        case 7:
                                                            $month = "July";
                                                            break;
                                                        case 8:
                                                            $month = "August";
                                                            break;
                                                        case 9:
                                                            $month = "September";
                                                            break;
                                                        case 10:
                                                            $month = "October";
                                                            break;
                                                        case 11:
                                                            $month = "November";
                                                            break;
                                                        case 12:
                                                            $month = "December";
                                                            break;
                                                          default:
                                                            $month = "Unknown";
                                                        }

                                            $sql = 'INSERT INTO `ac_generate_fee_student`(`generate_fee_student_id`, `user_id`, `user_date`, `student_id`, `student_name`, `class_id`, `class_name`, `date`, `which_month`, `year`, `month`, `admission`, `exam`, `mics`, `other`, `annual`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['student_id'].'\', \''.$_REQUEST['student_name'].'\', \''.$_REQUEST['class_id'].'\', \''.$_REQUEST['class_name'].'\', \''.$_REQUEST['date'].'\', \''.$month.'\', \''.$year.'\', \''.$_REQUEST['month'].'\', \''.$_REQUEST['admission'].'\', \''.$_REQUEST['exam'].'\', \''.$_REQUEST['mics'].'\', \''.$_REQUEST['other'].'\', \''.$_REQUEST['annual'].'\')';
                                            // echo $sql;
                                            insert_query($sql);
                                            }
                                            // --------------------------
                                            ///edit code
                                            check_edit("ac_generate_fee_student","generate_fee_student_id");
                                            edit_display("ac_generate_fee_student","generate_fee_student_id");
                                            //end of edit code -shift view below delete
                                            // --------------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_generate_fee_student` WHERE `ac_generate_fee_student`.`generate_fee_student_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `generate_fee_student_id`"ID", `student_id`"Student ID", `student_name`"Student Name", `class_id`"Class Id", `class_name`"Class Name",`which_month`"Which Month", `year`"Of Year", `month`"Monthly Fee", `admission`"Admission Fee", `exam`"Exams and Other Activities", `mics`"Mics", `other`"Other Charges", `annual`"Annual Charges" FROM `ac_generate_fee_student`  order by  `generate_fee_student_id` DESC';
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fee Settings For Specific Student  </h4>
                                    <br>
                                        <br>
                                        <form action="Accounts-mod-fee-setting-specfic-student.php#formadd" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Student ID","gr_no2","addmission_id","name_of_student","ad_admission",NULL);
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
if(isset($_REQUEST['gr_no2'])  || isset($_REQUEST['student_id'])){
    $conn = connect_db();

    if(isset($_REQUEST['gr_no2'])){
        $gr_no2 = $_REQUEST['gr_no2'];
    }else {
        $gr_no2 = $_REQUEST['student_id'];
    }

    $sql_s = 'SELECT `ad_class`.`class_id`"classid",`ad_class`.`section`"sections",`ad_admission`.`addmission_id`"ID",`ad_admission`.`name_of_student`"name",`ad_assign_student_class`.`assign_class`"assign_class",`ad_class`.`class_name`,`ad_class`.`section` FROM `ad_admission`, `ad_assign_student_class`,`ad_class` WHERE `ad_assign_student_class`.`gr_no` ='.$gr_no2.' AND `ad_admission`.`addmission_id` = '.$gr_no2.' AND `ad_class`.`class_id` = `ad_assign_student_class`.`assign_class` ' ;
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    
    // echo $row['assign_class'];
    $value_id = $row['ID'];
    $value_name =  $row['name'];
    $value_class =  $row['class_name'];
    $value_classid =  $row['classid'];
    $value_section =  $row['section'];
}

    ?>

                                        <form action="Accounts-mod-generate-fee-specfic-student.php#view" method="post">

                                        <div class="form-group">
                                            <label for="">Student ID</label>
                                            <input type="text" name="student_id" placeholder="Enter student id" class="form-control"
                                        <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_id.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$_REQUEST['student_id'].'" readonly';} ?>>
                                        </div>



                                        <div class="form-group">
                                            <label for="">Student Name</label>
                                            <input type="text" name="student_name" placeholder="Enter student name" class="form-control"
                                        <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_name.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_name.'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Class ID</label>
                                            <input type="number" name="class_id" required="" placeholder="Enter class id" class="form-control"
                                            <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_classid.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_classid.'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Class Name</label>
                                            <input type="text" name="class_name" placeholder="Enter class name" class="form-control"
                                            <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_class.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_class.'" readonly';} ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Section</label>
                                            <input type="text" name="section_name" placeholder="Enter section" class="form-control"
                                            <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_section.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_section.'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Which Month Of Fee</label>
                                            <input type="date" name="date"  class="form-control" required=""
                                            value="<?php if(isset($_REQUEST['date'])) echo $_REQUEST['date']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Monthly Fee</label>
                                            <select type="text" name="month" required="" class="form-control" id="zaPreviously">
                                                <option value="yes" <?php if (isset($_REQUEST['month']) && $_REQUEST['month']== "yes" ) echo "selected";  ?> >Yes</option>
                                                <option value="no" <?php if (isset($_REQUEST['month']) && $_REQUEST['month']== "no" ) echo "selected";  ?>>No</option>
                                            </select>
                                        </div>
                                    
                               
                                        <div class="form-group">
                                            <label for="">Admission Fee</label>
                                            <select type="text" name="admission" required="" class="form-control">
                                                <option value="no" <?php if (isset($_REQUEST['admission']) && $_REQUEST['admission']== "no" ) echo "selected";  ?>>No</option>
                                                <option value="yes" <?php if (isset($_REQUEST['admission']) && $_REQUEST['admission']== "yes" ) echo "selected";  ?> >Yes</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Exams and Other Activities</label>
                                            <select type="text" name="exam" required="" class="form-control">
                                                <option value="no" <?php if (isset($_REQUEST['exam']) && $_REQUEST['exam']== "no" ) echo "selected";  ?>>No</option>
                                                <option value="yes" <?php if (isset($_REQUEST['exam']) && $_REQUEST['exam']== "yes" ) echo "selected";  ?> >Yes</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Mics</label>
                                            <select type="text" name="mics" required="" class="form-control">
                                                <option value="no" <?php if (isset($_REQUEST['mics']) && $_REQUEST['mics']== "no" ) echo "selected";  ?>>No</option>
                                                <option value="yes" <?php if (isset($_REQUEST['mics']) && $_REQUEST['mics']== "yes" ) echo "selected";  ?> >Yes</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Other Charges</label>
                                            <input type="number" name="other" required placeholder="Enter Other Charges" class="form-control"  value="<?php if(isset($_REQUEST['other'])) echo $_REQUEST['other'];  ?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="">Annual Charges</label>
                                            <select type="text" name="annual" required="" class="form-control">
                                                <option value="no" <?php if (isset($_REQUEST['annual']) && $_REQUEST['annual']== "no" ) echo "selected";  ?>>No</option>
                                                <option value="yes" <?php if (isset($_REQUEST['annual']) && $_REQUEST['annual']== "yes" ) echo "selected";  ?> >Yes</option>
                                            </select>
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
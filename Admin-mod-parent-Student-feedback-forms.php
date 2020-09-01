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

<body class="fixed-left">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php")
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Admin-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->
            <!-- content -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                     <div style="text-align: center" >
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light m-b-5"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light m-b-5" > Export </button></a>
                                    </div>
                                </div>
                            </div>
                            <!-- form -->
                                <div class="col-lg-12">
                                    <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30" style="text-align: center; font-size: 22px"> Feedback</h4>
                                    <br>
                                    

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ----------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                            // print_r($_REQUEST);
                                            
                                            $sql = 'INSERT INTO `feedback`(`feedback_id`, `feedback_for_user_id`, `feedback_by_user_id`, `text`, `rating`, `date`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\',\''.$_REQUEST['feedback_by_user_id'].'\', \''.$_REQUEST['text'].'\', \''.$_REQUEST['rating'].'\', \''.$_REQUEST['date'].'\')';
                                            // echo $sql;

                                            insert_query($sql);
                                            }
                                            // ----------------

                                            ///edit code
                                            check_edit("feedback","feedback_id");
                                            edit_display("feedback","feedback_id");
                                            //end of edit code -shift view below delete

                                            // ----------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `feedback` WHERE `feedback`.`feedback_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `feedback_id`"ID", `feedback_for_user_id`"User", `feedback_by_user_id`"For", `rating`"Rating", `date`"Date", `text`"Feedback" FROM `feedback`';
                                            display_query($sql);

                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- form end -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form teacher -->
            <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30" style="text-align: center; font-size: 22px"> Feedback Form</h4>

                                    
                                        <br>
                                        <form action="Admin-mod-parent-Student-feedback-forms.php#formadd" method="post" id="submitted2">
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <select id="settype" name="settype" required="" class="form-control" >
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "" ) echo "selected";  ?>  value="">-Select</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "Staff" ) echo "selected";  ?>  value="Staff">Staff</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "Teacher" ) echo "selected";  ?> value="Teacher">Teacher</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "Student" ) echo "selected";  ?> value="Student">Student</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                            Submit
                                            </button>
                                        </div>
                                    </form>

<?php if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="Teacher"){
    echo '
                                    <form action="Admin-mod-parent-Student-feedback-forms.php#formadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Teacher ID","gr_number2","Teacher_records_id","name","ad_teacher_records",NULL);
                                        
                                   echo' <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                            Submit
                                            </button>
                                        </div></form>
                                        <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <p class="text-muted">Can\'t Find Teacher? <a href="Admin-mod-teacher-records.php" class="text-primary m-l-5"><b> Add a Teacher Here</b></a></p>
                                        </div>
                                    </div>';
                               }} ?>
<?php
if(isset($_REQUEST['gr_number2'])){
    if($_REQUEST['settype'] == "Teacher"){
    $conn = connect_db();
    $sql_s = 'SELECT `Teacher_records_id`, `user_id`, `user_date`, `name`, `cnic`, `position`, `office`, `age`, `start`, `salary`, `phone_number`, `address`, `comment` FROM `ad_teacher_records` WHERE  `Teacher_records_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['Teacher_records_id'];
    $value_name =  $row['name'];
}}
?>

<?php if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="Staff"){

    $settype = $_REQUEST['settype'];
    echo '
                                    <form action="Admin-mod-parent-Student-feedback-forms.php#formadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Employee ID","gr_number2","employee_record_id","name","ad_employee_record",NULL);
                                        
                                   echo' <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                            Submit
                                            </button>
                                        </div></form>
                                        <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <p class="text-muted">Can\'t Find Member? <a href="Admin-mod-employee-record.php" class="text-primary m-l-5"><b> Add a Member Here</b></a></p>
                                        </div>
                                    </div>';
                               }}?>
<?php
if(isset($_REQUEST['gr_number2'])){
    if( $_REQUEST['settype'] == "Staff"){
    $conn = connect_db();
    $sql_s = 'SELECT `employee_record_id`, `user_id`, `user_date`, `name`, `gr_no`, `cnic`, `position`, `assigned_section`, `age`, `start`, `salary`, `phone_number`, `address`, `comment` FROM `ad_employee_record` WHERE  `employee_record_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['employee_record_id'];
    $value_name =  $row['name'];
}}
?>
<?php if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="Student"){
    echo '
                                    <form action="Admin-mod-parent-Student-feedback-forms.php#formadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Student ID","gr_number2","addmission_id","name_of_student","ad_admission",NULL);
                                        
                                   echo' <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                            Submit
                                            </button>
                                        </div></form>
                                        <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <p class="text-muted">Can\'t Find Student? <a href="Admin-mod-admission-management.php" class="text-primary m-l-5"><b> Add a Student Here</b></a></p>
                                        </div>
                                    </div>
';
                               }}?>
<?php
if(isset($_REQUEST['gr_number2'])){
    if( $_REQUEST['settype'] == "Student"){
    $conn = connect_db();
    $sql_s = 'SELECT `addmission_id`,`class`, `name_of_student` FROM `ad_admission` WHERE `addmission_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['addmission_id'];
    $value_name =  $row['name_of_student'];
}}
?>
                                    <form method="post" action="Admin-mod-parent-Student-feedback-forms.php"  >

                                        
                                        
                                        <div class="form-group">
                                            <label for="">Feedback For</label>
                                            <input type="text" name="feedback_by_user_id" required="" placeholder="Enter feedback for user id" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_name.'" readonly' ; else {if(isset($_REQUEST['feedback_by_user_id'])) echo'value="'.$_REQUEST['feedback_by_user_id'].'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="userName">Date</label>
                                            <input type="date" name="date" class="form-control" value="<?php if (isset($_REQUEST['date'])) echo $_REQUEST['date']; else echo (date("Y-m-d")); ?>" >
                                        </div>

                                        

                                        <div class="card-box" style="margin-top: 15px; margin-bottom: 15px; display: block; border: 2px solid #4e5b62">
                                            <div>
                                                <label>Rating</label>
                                            </div>
                                            <div class="radio radio-inline radio-danger">
                                                <input type="radio" id="inlineRadio31" value="Poor" name="rating" required=""
                                                 <?php if (isset($_REQUEST['rating']) && $_REQUEST['rating']== "Poor" ) echo "checked";  ?>>
                                                <label for="inlineRadio31"> Poor </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input type="radio" id="inlineRadio32" value="Fair" name="rating" 
                                                 <?php if (isset($_REQUEST['rating']) && $_REQUEST['rating']== "Fair" ) echo "checked";  ?>>
                                                <label for="inlineRadio32"> Fair </label>
                                            </div>
                                            <div class="radio radio-inline  radio-info">
                                                <input type="radio" id="inlineRadio35" value="Average" name="rating" 
                                                 <?php if (isset($_REQUEST['rating']) && $_REQUEST['rating']== "Average" ) echo "checked";  ?>>
                                                <label for="inlineRadio35"> Average </label>
                                            </div>
                                            <div class="radio radio-inline radio-pink">
                                                <input type="radio" id="inlineRadio33" value="Good" name="rating"
                                                 <?php if (isset($_REQUEST['rating']) && $_REQUEST['rating']== "Good" ) echo "checked";  ?>>
                                                <label for="inlineRadio33"> Good </label>
                                            </div>
                                            <div class="radio radio-inline radio-success">
                                                <input type="radio" id="inlineRadio34" value="Excellent" name="rating"
                                                 <?php if (isset($_REQUEST['rating']) && $_REQUEST['rating']== "Excellent" ) echo "checked";  ?>>
                                                <label for="inlineRadio34"> Excellent </label>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label for="">Feedback</label>
                                            <div >
                                                <textarea class="form-control" rows="5" name="text" placeholder="feedback area ....."><?php if(isset($_REQUEST['text'])) echo $_REQUEST['text'] ?></textarea>
                                            </div>
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
                                <!-- se form-->
            

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

        <!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="assets/plugins/parsleyjs/dist/parsley.min.js"></script>

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
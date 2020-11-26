<?php
include_once('session_end.php');
?>
<!DOCTYPE html>
<htm>
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
<body class="fixed-left">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                     <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php")
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Superadmin-mod-sidemenu.php")
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> Users </h4>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php

                                    if (isset($_POST['submit'])){
                                        $user = mysqli_real_escape_string(connect_db(), $_POST['name']);
                                        $e_mail = mysqli_real_escape_string(connect_db(), $_POST['e_mail']);
                                        $account = mysqli_real_escape_string(connect_db(), $_POST['account']);
                                        $pass = mysqli_real_escape_string(connect_db(), $_POST['pass']);
                                         $cpass = mysqli_real_escape_string(connect_db(), $_POST['cpass']);

                                        $pas = password_hash($pass, PASSWORD_BCRYPT);
                                        $cpas = password_hash($cpass, PASSWORD_BCRYPT);

                                        $e_mailquary = " select * from ad_add_user where e_mail='$e_mail'";
                                        $query = mysqli_query(connect_db(),$e_mailquary);
                                        $e_mailcount = mysqli_num_rows($query);
                                        if($e_mailcount>0){
                                            echo    '<script>
                                                        alert("E-mail is already Exists");
                                                    </script>';
                                        }else{
                                            if( $pass ==  $cpass){
                                            $sql = 'INSERT INTO `ad_add_user`(`add_user_id`, `user_id`, `user_date`, `name`, `e_mail`, `gr_no`, `account`, `pass`, `cpass`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['name'].'\', \''.$_REQUEST['e_mail'].'\', \''.$_REQUEST['gr_no'].'\', \''.$_REQUEST['account'].'\', \''.$pas.'\', \''.$cpas.'\')';
                                                $iquery = insert_query($sql);
                                                    echo '<script>
                                                    alert("Account created")
                                                    </script>';
                                                
                                            }else{
                                                   echo ' <script>
                                                    alert("Password are not same");
                                                    </script>';
                                                }
                                        }
                                    }


                                    ///edit code
                                    check_edit("ad_add_user","add_user_id");
                                    edit_display("ad_add_user","add_user_id");
                                    //end of edit code -shift view below delete

                                    // --------------

                                    if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_add_user` WHERE `ad_add_user`.`add_user_id` = '.$_REQUEST['deleteid'];

                                    insert_query($sql);
                                    // echo "done deleting";
                                        }
                                    // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                    $sql = 'SELECT `add_user_id`"ID", `user_id` , `name`"Name", `e_mail`"E-mail", `gr_no`"Gr No.", `account`"Type" FROM `ad_add_user`';
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

            <!-- table -->
             <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> Add user</h4>
                                                                            <br>
                                        <form action="Superadmin-mod-add-user.php#formadd" method="post" id="submitted2">
                                            <?php
                                        dropDownSimple("User Type","settype","type_name","type",NULL);
                                        ?>
                                        
                                        <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                            Submit
                                            </button>
                                        </div>
                                    </form>

<?php



if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="teacher"){
    echo '
                                    <form action="Superadmin-mod-add-user.php#formadd" method="post" id="submitted">';
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
    if($_REQUEST['settype'] == "teacher"){
    $conn = connect_db();
    $sql_s = 'SELECT `Teacher_records_id`, `user_id`, `user_date`, `name`, `cnic`, `position`, `office`, `age`, `start`, `salary`, `phone_number`, `address`, `comment` FROM `ad_teacher_records` WHERE  `Teacher_records_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['Teacher_records_id'];
    $value_name =  $row['name'];
}}
?>

<!-- <?php if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']!="parent" && $_REQUEST['settype']!="student" && $_REQUEST['settype']!="teacher" ){

    $settype = $_REQUEST['settype'];
    echo '
                                    <form action="Superadmin-mod-add-user.php#formadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Employee ID2","gr_number2","employee_record_id","name","ad_employee_record","WHERE `ad_admission`.`addmission_id` IN (SELECT `ad_admission`.`addmission_id` FROM `ad_admission`,`ad_add_user` where `ad_admission`.`addmission_id` != `ad_add_user`.`gr_no` and `ad_add_user`.`account` = 'student')");
                                        
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
                               }}?> -->
<?php
if(isset($_REQUEST['gr_number2'])){
    if( $_REQUEST['settype']=="admin" || $_REQUEST['settype']=="account" ){
    $conn = connect_db();
    $sql_s = 'SELECT `employee_record_id`, `user_id`, `user_date`, `name`, `gr_no`, `cnic`, `position`, `assigned_section`, `age`, `start`, `salary`, `phone_number`, `address`, `comment` FROM `ad_employee_record` WHERE  `employee_record_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['employee_record_id'];
    $value_name =  $row['name'];
}}
?>
<?php

$sql_nested_student = 'SELECT `addmission_id` ,`name_of_student` FROM `ad_admission` WHERE `ad_admission`.`addmission_id` IN (SELECT `ad_admission`.`addmission_id` FROM `ad_admission`,`ad_add_user` where `ad_admission`.`addmission_id` != `ad_add_user`.`gr_no` and `ad_add_user`.`account` = "student")';

if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="student"){
    echo '
                                    <form action="Superadmin-mod-add-user.php#formadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Student ID","gr_number2","addmission_id","name_of_student","ad_admission","WHERE `ad_admission`.`addmission_id` IN (SELECT `ad_admission`.`addmission_id` FROM `ad_admission`,`ad_add_user` where `ad_admission`.`addmission_id` != `ad_add_user`.`gr_no` and `ad_add_user`.`account` = 'student')");
                                        
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
    if( $_REQUEST['settype'] == "student"){
    $conn = connect_db();
    $sql_s = 'SELECT `addmission_id`,`class`, `name_of_student` FROM `ad_admission` WHERE `addmission_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['addmission_id'];
    $value_name =  $row['name_of_student'];
}}
?>


<?php if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="parent"){
    echo '
                                    <form action="Superadmin-mod-add-user.php#formadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Parent ID","gr_number2","addmission_id","guardian_name","ad_admission","WHERE `ad_admission`.`addmission_id` IN (SELECT `ad_admission`.`addmission_id` FROM `ad_admission`,`ad_add_user` where `ad_admission`.`addmission_id` != `ad_add_user`.`gr_no` and `ad_add_user`.`account` = 'parent')");
                                        
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
    if( $_REQUEST['settype'] == "parent"){
    $conn = connect_db();
    $sql_s = 'SELECT `addmission_id`,`class`, `guardian_name` FROM `ad_admission` WHERE `addmission_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['addmission_id'];
    $value_name =  $row['guardian_name'];
}}
?>
<?php if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="admin" || $_REQUEST['settype']=="account" ){

    $settype = $_REQUEST['settype'];
    echo '
                                    <form action="Superadmin-mod-add-user.php#formadd" method="post" id="submitted">';
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
    if( $_REQUEST['settype']=="admin" || $_REQUEST['settype']=="account" ){
    $conn = connect_db();
    $sql_s = 'SELECT `employee_record_id`, `user_id`, `user_date`, `name`, `gr_no`, `cnic`, `position`, `assigned_section`, `age`, `start`, `salary`, `phone_number`, `address`, `comment` FROM `ad_employee_record` WHERE  `employee_record_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['employee_record_id'];
    $value_name =  $row['name'];
}}
?>

                                    <form action="Superadmin-mod-add-user.php" method="post" >

                                        <div class="form-group">
                                            <label for="lcDateOfBirthF">Gr No.</label>
                                            <input type="text" required name="gr_no" 
                                                   placeholder="Enter GR number" class="form-control" id="lcDateOfBirthF" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_id.'" readonly' ; else {if(isset($_REQUEST['gr_no'])) echo'value="'.$_REQUEST['gr_no'].'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="lcName">User Name</label>
                                            <input type="text" name="name" required
                                                   placeholder="Enter user name" class="form-control" id="lcnName" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_name.'" ' ; else {if(isset($_REQUEST['name'])) echo'value="'.$_REQUEST['name'].'"';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" name="account" class="form-control" placeholder="Enter type" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$_REQUEST['settype'].'" readonly' ; else {if(isset($_REQUEST['account'])) echo'value="'.$_REQUEST['account'].'" readonly';} ?>>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="father'sname">E-mail</label>
                                            <input type="email" required name="e_mail" 
                                                   placeholder="Enter e-mail" class="form-control" id="adfathersname" value="<?php if(isset($_REQUEST['e_mail'])) echo$_REQUEST['e_mail'] ?>">
                                        </div>

                                        

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lcDateOfBirthW">Password</label>
                                                    <input type="password" required name="pass" minlength="8" 
                                                           placeholder="Enter password" class="form-control" id="lcDateOfBirthW" >
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lcLastSchool">Confirm password</label>
                                                    <input  type="password" required name="cpass" minlength="8"
                                                                   placeholder="Confirm password " class="form-control" id="lcLastSchool" >
                                                </div>
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
                            </div><!-- end col -->
                   
                        </div>

                    </div>
                </div>
            <!-- table end -->

            <!-- content end -->

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

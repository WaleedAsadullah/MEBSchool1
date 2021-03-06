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
                            include_once("db_functions.php")
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Admin-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->



            <!--  -->
            <!--  -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="#fromadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card-box" >
                                    <h4 class="header-title m-t-0 m-b-30" style="text-align: center; font-size: 22px; padding: 10px">Increment Records</h4>
                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered " id="adadmissiontable">
                                            <?php
 
   

                                        // echo "test";
                                        if(isset($_REQUEST['submit'])){
                                            // print_r($_REQUEST);
                                            $sql = 'INSERT INTO `ac_annual_appraisal` (`increment_form_id`, `user_id`, `user_date`, `gr_number`, `name`, `old_salary` , `salary_increment`, `new_salary` , `aproved_by`,`date`, `comment`,`type`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['gr_number'].'\', \''.$_REQUEST['name'].'\', \''.$_REQUEST['old_salary'].'\', \''.$_REQUEST['salary_increment'].'\', \''.$_REQUEST['new_salary'].'\', \''.$_REQUEST['aproved_by'].'\', \''.$_REQUEST['date'].'\', \''.$_REQUEST['comment'].'\', \''.$_REQUEST['type'].'\')';
                                            // echo $sql;
                                            insert_query($sql);
                                        }
                                        ///edit code
                                       
                                        check_edit("ac_annual_appraisal","increment_form_id");

                                        edit_display("ac_annual_appraisal","increment_form_id");
                                     

                                    




                                                if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_annual_appraisal` WHERE `ac_annual_appraisal`.`increment_form_id` = '.$_REQUEST['deleteid'];

                                                    insert_query($sql);
                                                    // echo "done deleting";
                                                    }
                                               // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                                $sql = 'SELECT `increment_form_id` "ID",`type`"Type", `gr_number` "Employee ID",`name` "Name", `salary_increment` "Salary Increment", `new_salary` "New Salary",`date` "Date of increment",`aproved_by` "approved by", `comment` "Comments" FROM `ac_annual_appraisal`' ;
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



             <div class="content-page" id="fromadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30" style="text-align: center; font-size: 22px; padding: 10px">Increment Form</h4>
                                    <br>

                                    <form action="Admin-mod-annual-appraisal-for-bonus-and-increment.php#fromadd" method="post" id="submitted2">
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <select id="settype" name="settype" required="" class="form-control" >
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "" ) echo "selected";  ?>  value="">-Select</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "Staff" ) echo "selected";  ?>  value="Staff">Staff</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "Teacher" ) echo "selected";  ?> value="Teacher">Teacher</option>
                                                
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

    $settype = $_REQUEST['settype'];
    echo '
                                    <form action="Admin-mod-annual-appraisal-for-bonus-and-increment.php#fromadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Teacher ID","gr_number2","Teacher_records_id","name","ad_teacher_records",NULL);
                                        
                                   echo' <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                            Submit
                                            </button>
                                        </div></form>';
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
    $value_salary =  $row['salary'];
    $value_position =  $row['position'];
}}
?>

<?php if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="Staff"){

    $settype = $_REQUEST['settype'];
    echo '
                                    <form action="Admin-mod-annual-appraisal-for-bonus-and-increment.php#fromadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Employee ID","gr_number2","employee_record_id","name","ad_employee_record",NULL);
                                        
                                   echo' <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                            Submit
                                            </button>
                                        </div></form>';
                               }}?>
<?php
if(isset($_REQUEST['gr_number2'])){
    if( $settype == "Staff"){
    $conn = connect_db();
    $sql_s = 'SELECT `employee_record_id`, `user_id`, `user_date`, `name`, `gr_no`, `cnic`, `position`, `assigned_section`, `age`, `start`, `salary`, `phone_number`, `address`, `comment` FROM `ad_employee_record` WHERE  `employee_record_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['employee_record_id'];
    $value_name =  $row['name'];
    $value_salary =  $row['salary'];
    $value_position =  $row['position'];
}}
?>
                                

                                    <form action="Admin-mod-annual-appraisal-for-bonus-and-increment.php" method="post">
                                        <input type="hidden" <?php if(isset($_REQUEST['settype']))echo 'value="'.$_REQUEST['settype'].'" readonly' ; else { if(isset($_REQUEST['type'])) echo "readonly value = ".$_REQUEST['type'];} ?> name="type">

                                        <div class="form-group">
                                            <label for="emailAddress">Employee ID</label>
                                            <input type="text" name="gr_number"  required="" placeholder="Enter teacher ID" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_id.'" readonly' ; else { if(isset($_REQUEST['gr_number'])) echo "readonly value = ".$_REQUEST['gr_number'];} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="userName">Employee Name</label>
                                            <input type="text" name="name"  required="" placeholder="Enter employee name" class="form-control" id="userName" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_name.'" readonly' ; else { if(isset($_REQUEST['name'])) echo "readonly value = ".$_REQUEST['name'];} ?>>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label for="userName">old salary</label>
                                            <input type="number" name="old_salary"required="" placeholder="Enter tacher old salary" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_salary.'" readonly' ; else { if(isset($_REQUEST['old_salary'])) echo "readonly value = ".$_REQUEST['old_salary'];} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label >Salary Increment</label>
                                            <input type="number" name="salary_increment" placeholder="Enter salary increment" required="" class="form-control" value="<?php if(isset($_REQUEST['salary_increment'])) echo $_REQUEST['salary_increment']?>" >
                                        </div>

                                        <div class="form-group">
                                            <label >New salary</label>
                                            <input type="number"  name="new_salary" placeholder="Enter teacher new salary" required="" class="form-control" value="<?php if(isset($_REQUEST['new_salary'])) echo $_REQUEST['new_salary']?>">
                                        </div>

                                        <div class="form-group">
                                            <label >Approved by</label>
                                            <input type="text"  name="aproved_by" placeholder="Enter approved by" required="" class="form-control" value="<?php if(isset($_REQUEST['aproved_by'])) echo $_REQUEST['aproved_by']?>">
                                        </div>

                                        <div class="form-group">
                                            <label >Date Of Increment</label>
                                            <input type="date"  name="date" placeholder="Enter approved by" required="" class="form-control" value="<?php if(isset($_REQUEST['date'])) echo $_REQUEST['date']?>">
                                        </div>

                                        

                                        <div class="form-group">
                                            <label for="">Comments</label>
                                            <div >
                                                <textarea class="form-control" rows="3" name="comment" placeholder="comment area ....."><?php if(isset($_REQUEST['comment'])) echo $_REQUEST['comment']?></textarea>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group text-right m-b-0">
                                           
                                            <?php 
                                            code_submit();
                                            ?>
                                           </button>
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
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
<body class="smallscreen fixed-left-void new">
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Final Settlement </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ------------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){

                                                // $laon_installment_amount = $_REQUEST['loan_amount'] / $_REQUEST['laon_installment'] ;
                                                // print_r($_REQUEST);
                                                $sql = 'INSERT INTO `ac_final_settlement`(`settlement_id`, `user_id`, `user_d`, `type`, `employ_id`, `name`, `salary_to_date`, `outstanging_loan`, `other_dues`, `final_amount`, `status`, `paid_status`, `salary`,`net_pay`) VALUES  (NULL,\'';
                                                $sql .= get_curr_user();
                                                $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['type'].'\', \''.$_REQUEST['employ_id'].'\', \''.$_REQUEST['name'].'\', \''.$_REQUEST['salary_to_date'].'\', \''.$_REQUEST['outstanging_loan'].'\', \''.$_REQUEST['other_dues'].'\', \''.$_REQUEST['final_amount'].'\', \''.$_REQUEST['status'].'\', \''.$_REQUEST['paid_status'].'\', \''.$_REQUEST['salary'].'\', \''.$_REQUEST['net_pay'].'\')';
                                                // echo $sql;
                                                insert_query($sql);
                                            }

                                            // ------------------------

                                            ///edit code
                                            check_edit("ac_final_settlement","settlement_id");
                                            edit_display("ac_final_settlement","settlement_id");
                                            //end of edit code -shift view below delete

                                            // ------------------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_final_settlement` WHERE `ac_final_settlement`.`settlement_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `settlement_id`"ID", `type`"Type", `employ_id`"Employee ID", `name`"Name", `salary_to_date`"Last Date fo Duty", `salary`"Salary", `outstanging_loan`"Outstanding Loan",`net_pay`"Net Pay", `other_dues`"Other Dues", `final_amount`"Final Amount", `status`"Status", `paid_status`"Paid Status" FROM `ac_final_settlement` ORDER BY `settlement_id`';
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Final Settlement </h4>
                                    <br>
                                    

                                    <form action="Accounts-mod-final-settlement.php#formadd" method="post" id="submitted2">
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <select id="settype" name="settype" required="" class="form-control" >
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "" ) echo "selected";  ?>  value="">-Select</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "staff" ) echo "selected";  ?>  value="staff">Staff</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "teacher" ) echo "selected";  ?> value="teacher">Teacher</option>
                                                 </select>
                                             </div>
                                                
                                           
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>

<?php if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="teacher"){

    $settype = $_REQUEST['settype'];
    echo '
                                    <form action="Accounts-mod-final-settlement.php#formadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">
                                    <div class="form-group">
                                                    <label>Salary to Date</label>
                                                    <input type="date" name="salary_to_date2" required="" class="form-control">
                                                </div>
                                    ';
                                        dropDownConditional2("Teacher ID","gr_number2","Teacher_records_id","name","ad_teacher_records",NULL);
                                        
                                   echo'
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>

                                   </form>';
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
    $value_salary =  $row['salary'];
    $value_position =  $row['position'];
}}
?>

<?php if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="staff"){

    $settype = $_REQUEST['settype'];
    echo '
                                    <form action="Accounts-mod-final-settlement.php#formadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">

                                    <div class="form-group">
                                        <label>Salary to Date</label>
                                        <input type="date" name="salary_to_date2" required="" class="form-control">
                                    </div>
                                    ';
                                        dropDownConditional2("Employee ID","gr_number2","employee_record_id","name","ad_employee_record",NULL);
                                        
                                   echo' <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div></form>';
                               }}?>
<?php
if(isset($_REQUEST['gr_number2'])){
    if( $settype == "staff"){
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
<?php
    if(isset($_REQUEST['gr_number2'])){
        $sql_o = 'SELECT SUM(`loan_amount`)"sum" from `ac_employee_loan` where `employee_id` = '.$_REQUEST['gr_number2'].' and `type` =  "'.$_REQUEST['settype'].'"';
        // echo $sql_o;
        $result_o = mysqli_query($conn,$sql_o);
        $row_o = mysqli_fetch_assoc($result_o);
        $value_loan_amount = $row_o['sum'];
        $value_loan_amount = (int)$value_loan_amount;
        echo gettype($value_loan_amount);

       // echo "<h1>" .$value_loan_amount."</h1><p>hello</p>";

       $sql_l = 'SELECT SUM(`loan`)"sum2" from `ac_payroll_calculation` where `gr_number` = '.$_REQUEST['gr_number2'].' and `type` =  "'.$_REQUEST['settype'].'"';
        // echo $sql_l;
        $conn2 = connect_db();
        $result_l = mysqli_query($conn2,$sql_l);
        $row_l = mysqli_fetch_assoc($result_l);
        $value_loan_amount2 = $row_l['sum2'];
         gettype($value_loan_amount2);
        $balance = $value_loan_amount - $value_loan_amount2;
         "<h1>".$value_loan_amount2."</h1>";
        $max_laon = ($value_salary * 2) - $balance;
         "<h1>".$balance."</h1>";

    }

?>

<?php
if(isset($_REQUEST['gr_number2'])){
    if( $_REQUEST['settype']=="staff"){
    $staff_sql = 'SELECT `employee_record_id`, `user_id`, `user_date`, `name`, `gr_no`, `cnic`, `position`, `assigned_section`, `age`, `start`, `salary`, `house`, `utility`, `allow`, `gross`, `phone_number`, `address`, `comment` FROM `ad_employee_record` where  `employee_record_id` = '.$_REQUEST['gr_number2'].'';
    $conn = connect_db();
    $staff_result = mysqli_query($conn,$staff_sql);
    $staff = mysqli_fetch_assoc($staff_result);
    // print_r($staff);




// $month = $_REQUEST['which_month'];
// $y = $_REQUEST['year'];

// $date_start = ''.$y.'-'.$month.'-01';
// $date_end = ''.$y.'-'.$month.'-' . date('t', strtotime($date_start)); 
$take_start_date = $_REQUEST['salary_to_date2'];
$take_start_date = explode("-", $take_start_date);


$date_start  = ''.$take_start_date[0].'-'.$take_start_date[1].'-01';
$date_end = $_REQUEST['salary_to_date2']; //get end date of month
$num_of_sunday = 0 ;
$date  = ''.$take_start_date[0].'-'.$take_start_date[1].'-01';
$end = $_REQUEST['salary_to_date2']; //get end date of month
$num_of_sunday = 0 ;




while(strtotime($date) <= strtotime($end)) {
        $day_num = date('d', strtotime($date));
        $day_name = date('l', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));

        // "<td>$day_num  $day_name</td><br>";
        if ($day_name == "Sunday"){
            $num_of_sunday +=1; 
        }
    }
    for($staff_number = 0;  $staff_number < 1;  $staff_number++)
    { 

    // echo '<h1>'.$date_start.'</h1>';
    // echo '<h1>'.$date_end.'</h1>';

    $value_id = $staff['employee_record_id'];
    $value_name =  $staff['name'];
    $value_salary =  $staff['salary'];
    $value_position =  $staff['position'];
    $value_house = $staff['house'];
    $value_utility = $staff['utility'];
    $value_allow = $staff['allow'];
    $value_gross = $staff['gross'];

    $employee_id_record = $staff['employee_record_id'];
    // echo "<h1>".$employee_id_record."</h1>";
    // echo "<h1>".$staff[$staff_number]['name']."</h1>";
    $sql_loan = 'SELECT sum(`loan_amount`)"amount", sum(`laon_installment_amount`)"loan_install" FROM `ac_employee_loan` WHERE `employee_id` = '.$employee_id_record.' and `type` = "'.$_REQUEST['settype'].'"';
    // $sql_loan;
    $result_loan = mysqli_query($conn,$sql_loan);
    $row_laon = mysqli_fetch_assoc($result_loan);
    $sum_of_total_loan = $row_laon['amount'];
    // 

    $sql_loan_collect = 'SELECT `employee_id`, `employee_name`, count(`employee_id`) "Number of loans" , sum(if(`laon_installment`-(month(current_date())- month(`loan_start`))<0,1,0)) "repaid loans", sum(`loan_amount`) "total loan amount", month(current_date())- month(`loan_start`) "installments paid",`laon_installment`-(month(current_date())- month(`loan_start`)) "installments_Left" , `type`,sum( (`laon_installment_amount`)*if(`laon_installment`-(month(current_date())- month(`loan_start`))>0,1,0)) "collect_amount" , `outstanding` FROM `ac_employee_loan` WHERE `employee_id` = '.$employee_id_record.' and `type` = "'.$_REQUEST['settype'].'"';
    $result_loan_collect = mysqli_query($conn,$sql_loan_collect);
    $row_loan_collect = mysqli_fetch_assoc($result_loan_collect);
    $installment = $row_loan_collect['collect_amount'];
    $loan_de = $installment;

    if(gettype($sum_of_total_loan)=="NULL"){
        $sum_of_total_loan = 0;
    'Loan Amount is Zero <br>';}else;{'sum of loan amount '.$sum_of_total_loan. ' and the installment is '.$installment.'<br>';}

    $sql_pay_loan = 'SELECT sum(`loan`)"pay_laon" FROM `ac_payroll_calculation` WHERE `gr_number`  = '.$employee_id_record.' and `type` = "'.$_REQUEST['settype'].'"';
    //  $sql_pay_loan;

    $result_pay_loan = mysqli_query($conn,$sql_pay_loan);
    $row_pay_loan = mysqli_fetch_assoc($result_pay_loan);
    $sum_of_pay_loan = $row_pay_loan['pay_laon'];
    'sum of pay loan '.$sum_of_pay_loan.'<br>';

    if(gettype($sum_of_pay_loan)  == "NULL" )
        {

            $sum_of_pay_loan = 0;
            $balance = $sum_of_total_loan - $sum_of_pay_loan;
            'outstanding loan(not pay any installment) '.$balance.'<br>';
        }
    else{
            $balance = $sum_of_total_loan - $sum_of_pay_loan;
            'outstanding loan'.$balance.'<br>';
        }


    $sql_p = 'SELECT count(`status`)"Total Present" FROM `ad_employee_attendance` WHERE `date` >= "'.$date_start.'" and `date` <= "'.$date_end.'" and `status` = "Present" and `id_num` = '.$employee_id_record.' ';
    //  $sql_p ;
    $result_p = mysqli_query($conn,$sql_p);
    $row_p = mysqli_fetch_assoc($result_p);
    $present = $row_p['Total Present'];
   'Total Present '.$present ."<br>";

    $sql_a = 'SELECT count(`status`)"Total Absent" FROM `ad_employee_attendance` WHERE `date` >= "'.$date_start.'" and `date` <= "'.$date_end.'" and `status` = "Absent" and `id_num` = '.$employee_id_record.' ';
    $result_a = mysqli_query($conn,$sql_a);
    $row_a = mysqli_fetch_assoc($result_a);
    $Absent = $row_a['Total Absent'];
    'Total Absent '.$Absent ."<br>";

    $sql_l = 'SELECT count(`status`)"Total Late" FROM `ad_employee_attendance` WHERE `date` >= "'.$date_start.'" and `date` <= "'.$date_end.'" and `status` = "Late" and `id_num` = '.$employee_id_record.' ';
    $result_l = mysqli_query($conn,$sql_l);
    $row_l = mysqli_fetch_assoc($result_l);
    $Late = $row_l['Total Late'];
    'Total Late '.$Late ."<br>";

    $sql_e = 'SELECT count(`status`)"Total Excused" FROM `ad_employee_attendance` WHERE `date` >= "'.$date_start.'" and `date` <= "'.$date_end.'" and `status` = "Excused" and `id_num` = '.$employee_id_record.' ';
    $result_e = mysqli_query($conn,$sql_e);
    $row_e = mysqli_fetch_assoc($result_e);
    $Excused = $row_e['Total Excused'];
    'Total Excused '.$Excused ."<br>";

    "Number of entries ".$total_number_of_entries = $present + $Absent + $Late + $Excused ."<br>";

"Number of Sunday of this month ".$num_of_sunday."<br>";

"Number of days in this month ".$day_num."<br>";

"Number of working days in this month ".$working_days = $day_num - $num_of_sunday."<br>";
$day_of_in_month = 30;
"Per day basic salary ".$basic_salary_per = (float)$value_salary/(float)$day_of_in_month."<br>";
"Per day gross salary ".$gross_salary_per = (float)$value_gross/(float)$day_of_in_month."<br>";

 "Absent Deduction ".(float)$absent_deduction=(float)$Absent*(float)$gross_salary_per;
"<br>";
"Late Deduction ".(float)$late_deduction=(float)($Late/2)*(float)$gross_salary_per."<br>";
"<br>";
(float)$value_gross  = (float)$gross_salary_per*(float)$day_num;
"Net Pay ".(float)$net_pay = (float)$value_gross - (float)$absent_deduction - (float)$late_deduction - (float)$balance;
$a = 0 ;
$paid_status = 0 ;
// $sql = 'INSERT INTO `ac_payroll_calculation`(`payroll_id`, `user_id`, `user_date`, `which_month`, `which_year`, `gr_number`, `name`, `designation`, `attendance`, `basic_salary`, `house_ra`, `utility`, `convey_allow`, `gross_salary`, `loan`, `i_t`, `s_w_f`, `leave_pay`, `net_pay`, `type`, `paid_status`) VALUES (NULL,\'';
// $sql .= get_curr_user();
// $sql .= '\', CURRENT_TIMESTAMP, \''.$month.'\',  \''.$y.'\',  \''.$value_id.'\', \''.$value_name.'\', \''.$value_position.'\', \''.$present.'\', \''.$value_salary.'\', \''.$value_house.'\', \''.$value_utility.'\', \''.$value_allow.'\', \''.$value_gross.'\', \''.$loan_de.'\', \''.$absent_deduction.'\', \''.$late_deduction.'\', \''.$a.'\', \''.$net_pay.'\', \''.$_REQUEST['settype'].'\', \''.$paid_status.'\')';
//  "<b>".$sql."</b>";
// insert_query($sql);
}




}}

?>
<?php




if(isset($_REQUEST['gr_number2'])){
    if( $_REQUEST['settype'] == "teacher"){
    $staff_sql = 'SELECT `Teacher_records_id`, `user_id`, `user_date`, `name`, `cnic`, `position`, `office`, `age`, `start`, `salary`, `house`, `utility`, `allow`, `gross`, `phone_number`, `address`, `comment` FROM `ad_teacher_records` where `Teacher_records_id` = '.$_REQUEST['gr_number2'].' ';
    // print_r($staff);
    $conn = connect_db();
    $staff_result = mysqli_query($conn,$staff_sql);
    $staff = mysqli_fetch_assoc($staff_result);

    // $result = mysqli_query($conn,$sql_s);
    // $row = mysqli_fetch_assoc($result);


$take_start_date = $_REQUEST['salary_to_date2'];
$take_start_date = explode("-", $take_start_date);



 $date_start  = ''.$take_start_date[0].'-'.$take_start_date[1].'-01';
$date_end = $_REQUEST['salary_to_date2']; //get end date of month
$num_of_sunday = 0 ;
$date  = ''.$take_start_date[0].'-'.$take_start_date[1].'-01';
$end = $_REQUEST['salary_to_date2']; //get end date of month
$num_of_sunday = 0 ;




while(strtotime($date) <= strtotime($end)) {
        $day_num = date('d', strtotime($date));
        $day_name = date('l', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));

        // "<td>$day_num  $day_name</td><br>";
        if ($day_name == "Sunday"){
            $num_of_sunday +=1; 
        }
    }
    for($staff_number = 0;  $staff_number < 1;  $staff_number++)
    { 

    //  '<h1>'.$date_start.'</h1>';
    //  '<h1>'.$date_end.'</h1>';

    $value_id = $staff['Teacher_records_id'];
    $value_name =  $staff['name'];
    $value_salary =  $staff['salary'];
    $value_position =  $staff['position'];
    $value_house = $staff['house'];
    $value_utility = $staff['utility'];
    $value_allow = $staff['allow'];
    $value_gross = $staff['gross'];

    $employee_id_record = $staff['Teacher_records_id'];
    //  "<h1>".$employee_id_record."</h1>";
    //  "<h1>".$staff['name']."</h1>";
    $sql_loan = 'SELECT sum(`loan_amount`)"amount", `laon_installment_amount` FROM `ac_employee_loan` WHERE `employee_id` = '.$employee_id_record.' and `type` = "'.$_REQUEST['settype'].'"';
    //  $sql_loan;
    $result_loan = mysqli_query($conn,$sql_loan);
    $row_laon = mysqli_fetch_assoc($result_loan);
    $sum_of_total_loan = $row_laon['amount'];
    // $installment = $row_laon['laon_installment_amount'];

    $sql_loan_collect = 'SELECT `employee_id`, `employee_name`, count(`employee_id`) "Number of loans" , sum(if(`laon_installment`-(month(current_date())- month(`loan_start`))<0,1,0)) "repaid loans", sum(`loan_amount`) "total loan amount", month(current_date())- month(`loan_start`) "installments paid",`laon_installment`-(month(current_date())- month(`loan_start`)) "installments_Left" , `type`,sum( (`laon_installment_amount`)*if(`laon_installment`-(month(current_date())- month(`loan_start`))>0,1,0)) "collect_amount" , `outstanding` FROM `ac_employee_loan` WHERE `employee_id` = '.$employee_id_record.' and `type` = "'.$_REQUEST['settype'].'"';
    $result_loan_collect = mysqli_query($conn,$sql_loan_collect);
    $row_loan_collect = mysqli_fetch_assoc($result_loan_collect);
    $installment = $row_loan_collect['collect_amount'];
    $loan_de = $installment;

    if(gettype($sum_of_total_loan)=="NULL"){
        $sum_of_total_loan = 0;
     'Loan Amount is Zero <br>';}else;{ 'sum of loan amount '.$sum_of_total_loan. ' and the installment is '.$installment.'<br>';}

    $sql_pay_loan = 'SELECT sum(`loan`)"pay_laon" FROM `ac_payroll_calculation` WHERE `gr_number`  = '.$employee_id_record.' and `type` = "'.$_REQUEST['settype'].'"';
    //  $sql_pay_loan;

    $result_pay_loan = mysqli_query($conn,$sql_pay_loan);
    $row_pay_loan = mysqli_fetch_assoc($result_pay_loan);
    $sum_of_pay_loan = $row_pay_loan['pay_laon'];
    //  'sum of pay loan '.$sum_of_pay_loan.'<br>';

    if(gettype($sum_of_pay_loan)  == "NULL" )
        {

            $sum_of_pay_loan = 0;
            $balance = $sum_of_total_loan - $sum_of_pay_loan;
             'outstanding loan(not pay any installment) '.$balance.'<br>';
        }
    else{
            $balance = $sum_of_total_loan - $sum_of_pay_loan;
             'outstanding loan'.$balance.'<br>';
        }

// if( $balance <= $sum_of_total_loan && $balance >=$installment){
//   $loan_de = $installment;
//    "Loan Deduction".$loan_de."<br>";
// }else{$loan_de=$balance ;  "Loan Deduction".$loan_de."<br>"; }

    $sql_p = 'SELECT count(`status`)"Total Present" FROM `ad_teacher_attendance` WHERE `date` >= "'.$date_start.'" and `date` <= "'.$date_end.'" and `status` = "Present" and `id_num` = '.$employee_id_record.' ';
    //  $sql_p ;
    $result_p = mysqli_query($conn,$sql_p);
    $row_p = mysqli_fetch_assoc($result_p);
    $present = $row_p['Total Present'];
    'Total Present '.$present ."<br>";

    $sql_a = 'SELECT count(`status`)"Total Absent" FROM `ad_teacher_attendance` WHERE `date` >= "'.$date_start.'" and `date` <= "'.$date_end.'" and `status` = "Absent" and `id_num` = '.$employee_id_record.' ';
    $result_a = mysqli_query($conn,$sql_a);
    $row_a = mysqli_fetch_assoc($result_a);
    $Absent = $row_a['Total Absent'];
    'Total Absent '.$Absent ."<br>";

    $sql_l = 'SELECT count(`status`)"Total Late" FROM `ad_teacher_attendance` WHERE `date` >= "'.$date_start.'" and `date` <= "'.$date_end.'" and `status` = "Late" and `id_num` = '.$employee_id_record.' ';
    $result_l = mysqli_query($conn,$sql_l);
    $row_l = mysqli_fetch_assoc($result_l);
    $Late = $row_l['Total Late'];
    'Total Late '.$Late ."<br>";

    $sql_e = 'SELECT count(`status`)"Total Excused" FROM `ad_teacher_attendance` WHERE `date` >= "'.$date_start.'" and `date` <= "'.$date_end.'" and `status` = "Excused" and `id_num` = '.$employee_id_record.' ';
    $result_e = mysqli_query($conn,$sql_e);
    $row_e = mysqli_fetch_assoc($result_e);
    $Excused = $row_e['Total Excused'];
    'Total Excused '.$Excused ."<br>";

     "Number of entries ".$total_number_of_entries = $present + $Absent + $Late + $Excused ."<br>";
// loan part 
    $sql_loan = 'SELECT `employee_loan_id`, `user_id`, `user_date`, `employee_id`, `employee_name`, `loan_amount`, `loan_start`, `laon_installment`, `type`, `laon_installment_amount` FROM `ac_employee_loan` WHERE `employee_id`  = '.$employee_id_record.' and  `type` ="'.$_REQUEST['settype'].'"';
    //  $sql_loan;
    $resultloan = mysqli_query($conn,$sql_loan);
    $rowloan = mysqli_fetch_assoc($resultloan);
    $laon_of_this_amount = $rowloan['laon_installment_amount'];
     "Loan Installment ".$laon_of_this_amount."<br>";

"Number of Sunday of this month ".$num_of_sunday."<br>";

"Number of days in this month ".$day_num."<br>";

"Number of working days in this month ".$working_days = $day_num - $num_of_sunday."<br>";
$day_of_in_month = 30;
"Per day basic salary ".$basic_salary_per = (float)$value_salary/$day_of_in_month."<br>";
"Per day gross salary ".$gross_salary_per = (float)$value_gross/$day_of_in_month."<br>";

"Absent Deduction ".(float)$absent_deduction=(float)$Absent*(float)$gross_salary_per;
"<br>";
"Late Deduction ".(float)$late_deduction=(float)($Late/2)*(float)$gross_salary_per."<br>";
(float)$value_gross  = $gross_salary_per*$day_num;
"Net Pay ".(float)$net_pay = (float)$value_gross - (float)$absent_deduction - (float)$late_deduction - (float)$balance; 

// $a = 0 ;
// $paid_status = 0 ;
// $sql = 'INSERT INTO `ac_payroll_calculation`(`payroll_id`, `user_id`, `user_date`, `which_month`, `which_year`, `gr_number`, `name`, `designation`, `attendance`, `basic_salary`, `house_ra`, `utility`, `convey_allow`, `gross_salary`, `loan`, `i_t`, `s_w_f`, `leave_pay`, `net_pay`, `type`, `paid_status`) VALUES (NULL,\'';
// $sql .= get_curr_user();
// $sql .= '\', CURRENT_TIMESTAMP, \''.$month.'\',  \''.$y.'\',  \''.$value_id.'\', \''.$value_name.'\', \''.$value_position.'\', \''.$present.'\', \''.$value_salary.'\', \''.$value_house.'\', \''.$value_utility.'\', \''.$value_allow.'\', \''.$value_gross.'\', \''.$loan_de.'\', \''.$absent_deduction.'\', \''.$late_deduction.'\', \''.$a.'\', \''.$net_pay.'\', \''.$_REQUEST['settype'].'\', \''.$paid_status.'\')';
// //  "<b>".$sql."</b>";
// insert_query($sql);
}



}}

?>
                                    <form  action="Accounts-mod-final-settlement.php" method="post">
                                        <input type="hidden" <?php if(isset($_REQUEST['type']))echo 'value="'.$_REQUEST['type'].'" readonly' ; else { if(isset($_REQUEST['gr_number2'])) echo "readonly value = ".$_REQUEST['settype'];} ?> name="type">

                                        <div class="form-group">
                                            <label for="hbName">Last Daye Of Duty</label>
                                        <input type="date" id="new1" <?php if(isset($_REQUEST['salary_to_date']))echo 'value="'.$_REQUEST['salary_to_date'].'" readonly' ; else { if(isset($_REQUEST['gr_number2'])) echo "readonly value = ".$_REQUEST['salary_to_date2'];} ?> class="form-control" name="salary_to_date">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbName">Employee ID</label>
                                            <input type="number" name="employ_id" readonly
                                             class="form-control" placeholder="Enter employee id" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_id.'" readonly' ; else { if(isset($_REQUEST['employ_id'])) echo " readonly value = ".$_REQUEST['employ_id'];} ?> >
                                        </div>

                                        <div class="form-group">
                                            <label for="">Employee Name</label>
                                            <input readonly type="text" name="name"  placeholder="Enter employee name" class="form-control"  <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_name.'" readonly' ; else { if(isset($_REQUEST['name'])) echo " readonly value = ".$_REQUEST['name'];} ?> >
                                        </div>

                                        <div class="form-group">
                                            <label for="hbAddress">Salary</label>
                                            <input  readonly type="number" name="salary" required="" placeholder="Enter loan amount" class="form-control"  <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_gross.'" readonly' ; else { if(isset($_REQUEST['salary'])) echo " readonly value = ".$_REQUEST['salary'];} ?> value="0" >
                                        </div>

                                        <div class="form-group">
                                            <label for="hbAddress">Loan</label>
                                            <input  readonly type="number" name="outstanging_loan" required="" placeholder="Enter loan amount" class="form-control"  <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$balance.'" readonly' ; else { if(isset($_REQUEST['outstanging_loan'])) echo " readonly value = ".$_REQUEST['outstanging_loan'];} ?> value="0" >
                                        </div>
                                    
                               
                                        <div class="form-group">
                                            <label for="hbAddress">Net Pay</label>
                                            <input id="loan" readonly type="number" name="net_pay" required="" placeholder="Enter loan amount" class="form-control"  <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$net_pay.'" readonly' ; else { if(isset($_REQUEST['net_pay'])) echo " readonly value = ".$_REQUEST['net_pay'];} ?> value="0" >
                                        </div>

                                        <div class="form-group">
                                            <label >Other Dues</label>
                                            <input id="other" type="number" name="other_dues" required="" placeholder="Enter other amount" class="form-control" value="0"  <?php if(isset($_REQUEST['other_duesr'])) echo " readonly value = ".$_REQUEST['other_duesr']; ?> >
                                        </div>
                                        <div class="form-group">
                                            <label >Final Amount</label>
                                            <input id="total" required readonly  type="number" name="final_amount" required="" placeholder="Enter other amount" class="form-control" id="prRegular" value="<?php if(isset($_REQUEST['final_amount'])) echo $_REQUEST['final_amount']?>">
                                        </div>



                                        <div class="form-group">
                                            <label >Status</label>
                                            <input id="new2" required readonly  type="text" name="status" value="0" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label >Paid Status</label>
                                            <select class="form-control" id="hbFemaleWaiter" name="paid_status">
                                                <option value="no" <?php if(isset($_REQUEST['paid_status']) && $_REQUEST['paid_status'] == 'no') echo "selected" ?> >No</option>
                                                <option value="yes" <?php if(isset($_REQUEST['paid_status']) && $_REQUEST['paid_status'] == 'yes') echo "selected" ?>>Yes</option>
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
                                    <span id="guests"></span>
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
        <script>
            $(document).ready(function() {
                // var text = 'text';
                // $("#new1").on('click',function (){
                //     alert('123');
                    
                // $('#new3').text(text);
                // });

                $(".new").on('mousemove keyup change update click',function (){
                    var text = '';
                    var total = 0 ;
                    var other = $('#other').val();
                    var loan = $('#loan').val();
                    var total = - parseInt(other) + parseInt(loan);
                    $('#total').val(total);
                    if (total < 0) {
                        text = 'Receivable';
                    }else if(total > 0){
                        text = 'Payable';
                    }else{
                        text = '';
                    }
                    $('#new2').val(text);
                    
                    });
                    
                    $('#datatable').dataTable();
                    $('#datatable-keytable').DataTable( { keys: true } );
                    $('#datatable-responsive').DataTable();
                    $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );

                
            });
            TableManageButtons.init();
        </script>
        
        <?php include_once('script.php') ?>
        

</body>
</html>
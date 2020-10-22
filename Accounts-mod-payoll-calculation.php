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
                            <div class="col-sm-12">
                                <div class="card-box">
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> Payroll Calculation </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">

<!-- =/////////////////////// -->
<!-- Teacher payroll -->
<?php




if(isset($_REQUEST['submittype'])){
    if( $_REQUEST['settype'] == "teacher"){
    $staff = query_to_array('SELECT `Teacher_records_id`, `user_id`, `user_date`, `name`, `cnic`, `position`, `office`, `age`, `start`, `salary`, `house`, `utility`, `allow`, `gross`, `phone_number`, `address`, `comment` FROM `ad_teacher_records`');
    // print_r($staff);

    // $result = mysqli_query($conn,$sql_s);
    // $row = mysqli_fetch_assoc($result);


$month = $_REQUEST['which_month'];
$y = $_REQUEST['year'];

$date_start = ''.$y.'-'.$month.'-01';
$date_end = ''.$y.'-'.$month.'-' . date('t', strtotime($date_start)); 

$date = ''.$y.'-'.$month.'-01';
$end = ''.$y.'-'.$month.'-' . date('t', strtotime($date)); //get end date of month
$num_of_sunday = 0 ;




while(strtotime($date) <= strtotime($end)) {
        $day_num = date('d', strtotime($date));
        $day_name = date('l', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));

        //echo "<td>$day_num  $day_name</td><br>";
        if ($day_name == "Sunday"){
            $num_of_sunday +=1; 
        }
    }
    for($staff_number = 0;  $staff_number < count($staff);  $staff_number++)
    { 

    // echo '<h1>'.$date_start.'</h1>';
    // echo '<h1>'.$date_end.'</h1>';

    $value_id = $staff[$staff_number]['Teacher_records_id'];
    $value_name =  $staff[$staff_number]['name'];
    $value_salary =  $staff[$staff_number]['salary'];
    $value_position =  $staff[$staff_number]['position'];
    $value_house = $staff[$staff_number]['house'];
    $value_utility = $staff[$staff_number]['utility'];
    $value_allow = $staff[$staff_number]['allow'];
    $value_gross = $staff[$staff_number]['gross'];

    $employee_id_record = $staff[$staff_number]['Teacher_records_id'];
    // echo "<h1>".$employee_id_record."</h1>";
    // echo "<h1>".$staff[$staff_number]['name']."</h1>";
    $sql_loan = 'SELECT sum(`loan_amount`)"amount", `laon_installment_amount` FROM `ac_employee_loan` WHERE `employee_id` = '.$employee_id_record.' and `type` = "'.$_REQUEST['settype'].'"';
    // echo $sql_loan;
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







// $d=cal_days_in_month(CAL_GREGORIAN,9,2020);
//  "There was $d days in sep 2020<br>";
// $month = $_REQUEST['which_month'];
// $y = $_REQUEST['year'];

// $date_start = ''.$y.'-'.$month.'-01';
// $date_end = ''.$y.'-'.$month.'-' . date('t', strtotime($date)); //get end date of month
// $num_of_sunday = 0 ;

// while(strtotime($date) <= strtotime($end)) {
//         $day_num = date('d', strtotime($date));
//         $day_name = date('l', strtotime($date));
//         $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));

//         // "<td>$day_num  $day_name</td><br>";
//         if ($day_name == "Sunday"){
//             $num_of_sunday +=1; 
//         }
//     }
"Number of Sunday of this month ".$num_of_sunday."<br>";

"Number of days in this month ".$day_num."<br>";

"Number of working days in this month ".$working_days = $day_num - $num_of_sunday."<br>";

"Per day basic salary ".$basic_salary_per = (float)$value_salary/(float)$working_days."<br>";
"Per day gross salary ".$gross_salary_per = (float)$value_gross/(float)$working_days."<br>";

"Absent Deduction ".(float)$absent_deduction=(float)$Absent*(float)$gross_salary_per;
"<br>";
"Late Deduction ".(float)$late_deduction=(float)($Late/2)*(float)$gross_salary_per."<br>";

"Net Pay ".(float)$net_pay = (float)$value_gross - (float)$absent_deduction - (float)$late_deduction - (float)$loan_de; 

$a = 0 ;
$paid_status = 0 ;
$sql = 'INSERT INTO `ac_payroll_calculation`(`payroll_id`, `user_id`, `user_date`, `which_month`, `which_year`, `gr_number`, `name`, `designation`, `attendance`, `basic_salary`, `house_ra`, `utility`, `convey_allow`, `gross_salary`, `loan`, `i_t`, `s_w_f`, `leave_pay`, `net_pay`, `type`, `paid_status`) VALUES (NULL,\'';
$sql .= get_curr_user();
$sql .= '\', CURRENT_TIMESTAMP, \''.$month.'\',  \''.$y.'\',  \''.$value_id.'\', \''.$value_name.'\', \''.$value_position.'\', \''.$present.'\', \''.$value_salary.'\', \''.$value_house.'\', \''.$value_utility.'\', \''.$value_allow.'\', \''.$value_gross.'\', \''.$loan_de.'\', \''.$absent_deduction.'\', \''.$late_deduction.'\', \''.$a.'\', \''.$net_pay.'\', \''.$_REQUEST['settype'].'\', \''.$paid_status.'\')';
// echo "<b>".$sql."</b>";
insert_query($sql);
}



}}

?>



<?php
if(isset($_REQUEST['submittype'])){
    if( $_REQUEST['settype'] == "staff"){
    $staff = query_to_array('SELECT `employee_record_id`, `user_id`, `user_date`, `name`, `gr_no`, `cnic`, `position`, `assigned_section`, `age`, `start`, `salary`, `house`, `utility`, `allow`, `gross`, `phone_number`, `address`, `comment` FROM `ad_employee_record`');
    // print_r($staff);




$month = $_REQUEST['which_month'];
$y = $_REQUEST['year'];

$date_start = ''.$y.'-'.$month.'-01';
$date_end = ''.$y.'-'.$month.'-' . date('t', strtotime($date_start)); 

$date = ''.$y.'-'.$month.'-01';
$end = ''.$y.'-'.$month.'-' . date('t', strtotime($date)); //get end date of month
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
    for($staff_number = 0;  $staff_number < count($staff);  $staff_number++)
    { 

    // echo '<h1>'.$date_start.'</h1>';
    // echo '<h1>'.$date_end.'</h1>';

    $value_id = $staff[$staff_number]['employee_record_id'];
    $value_name =  $staff[$staff_number]['name'];
    $value_salary =  $staff[$staff_number]['salary'];
    $value_position =  $staff[$staff_number]['position'];
    $value_house = $staff[$staff_number]['house'];
    $value_utility = $staff[$staff_number]['utility'];
    $value_allow = $staff[$staff_number]['allow'];
    $value_gross = $staff[$staff_number]['gross'];

    $employee_id_record = $staff[$staff_number]['employee_record_id'];
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
    // echo $sql_pay_loan;

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

// if( $balance <= $sum_of_total_loan && $balance >=$installment){
//   $loan_de = $installment;
//   echo "Loan Deduction".$loan_de."<br>";
// }else{$loan_de=$balance ; echo "Loan Deduction".$loan_de."<br>"; }

    $sql_p = 'SELECT count(`status`)"Total Present" FROM `ad_employee_attendance` WHERE `date` >= "'.$date_start.'" and `date` <= "'.$date_end.'" and `status` = "Present" and `id_num` = '.$employee_id_record.' ';
    // echo $sql_p ;
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
// loan part 
    $sql_loan = 'SELECT `employee_loan_id`, `user_id`, `user_date`, `employee_id`, `employee_name`, `loan_amount`, `loan_start`, `laon_installment`, `type`, `laon_installment_amount` FROM `ac_employee_loan` WHERE `employee_id`  = '.$employee_id_record.' and  `type` ="'.$_REQUEST['settype'].'"';
    $resultloan = mysqli_query($conn,$sql_loan);
    $rowloan = mysqli_fetch_assoc($resultloan);
    $laon_of_this_amount = $rowloan['laon_installment_amount'];
    "Loan Installment ".$laon_of_this_amount."<br>";







// $d=cal_days_in_month(CAL_GREGORIAN,9,2020);
// echo "There was $d days in sep 2020<br>";
// $month = $_REQUEST['which_month'];
// $y = $_REQUEST['year'];

// $date_start = ''.$y.'-'.$month.'-01';
// $date_end = ''.$y.'-'.$month.'-' . date('t', strtotime($date)); //get end date of month
// $num_of_sunday = 0 ;

// while(strtotime($date) <= strtotime($end)) {
//         $day_num = date('d', strtotime($date));
//         $day_name = date('l', strtotime($date));
//         $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));

//         //echo "<td>$day_num  $day_name</td><br>";
//         if ($day_name == "Sunday"){
//             $num_of_sunday +=1; 
//         }
//     }
"Number of Sunday of this month ".$num_of_sunday."<br>";

"Number of days in this month ".$day_num."<br>";

"Number of working days in this month ".$working_days = $day_num - $num_of_sunday."<br>";

"Per day basic salary ".$basic_salary_per = (float)$value_salary/(float)$working_days."<br>";
"Per day gross salary ".$gross_salary_per = (float)$value_gross/(float)$working_days."<br>";

 "Absent Deduction ".(float)$absent_deduction=(float)$Absent*(float)$gross_salary_per;
"<br>";
"Late Deduction ".(float)$late_deduction=(float)($Late/2)*(float)$gross_salary_per."<br>";
"<br>";
" Net Pay ".(float)$net_pay = (float)$value_gross - (float)$absent_deduction - (float)$late_deduction - (float)$loan_de;
$a = 0 ;
$paid_status = 0 ;
$sql = 'INSERT INTO `ac_payroll_calculation`(`payroll_id`, `user_id`, `user_date`, `which_month`, `which_year`, `gr_number`, `name`, `designation`, `attendance`, `basic_salary`, `house_ra`, `utility`, `convey_allow`, `gross_salary`, `loan`, `i_t`, `s_w_f`, `leave_pay`, `net_pay`, `type`, `paid_status`) VALUES (NULL,\'';
$sql .= get_curr_user();
$sql .= '\', CURRENT_TIMESTAMP, \''.$month.'\',  \''.$y.'\',  \''.$value_id.'\', \''.$value_name.'\', \''.$value_position.'\', \''.$present.'\', \''.$value_salary.'\', \''.$value_house.'\', \''.$value_utility.'\', \''.$value_allow.'\', \''.$value_gross.'\', \''.$loan_de.'\', \''.$absent_deduction.'\', \''.$late_deduction.'\', \''.$a.'\', \''.$net_pay.'\', \''.$_REQUEST['settype'].'\', \''.$paid_status.'\')';
// echo "<b>".$sql."</b>";
insert_query($sql);
}




}}

?>

                                            <?php

                                            $a = 0 ;
                                            $paid_status = 0 ;
                                            // ---------------
                                            if (isset($_REQUEST['submit'])) {
                                            $sql = 'INSERT INTO `ac_payroll_calculation`(`payroll_id`, `user_id`, `user_date`, `which_month`, `which_year`, `gr_number`, `name`, `designation`, `attendance`, `basic_salary`, `house_ra`, `utility`, `convey_allow`, `gross_salary`, `loan`, `i_t`, `s_w_f`, `leave_pay`, `net_pay`,`type`,`paid_status`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['which_month'].'\', \''.$_REQUEST['which_year'].'\',\''.$_REQUEST['gr_number'].'\', \''.$_REQUEST['name'].'\', \''.$_REQUEST['designation'].'\', \''.$_REQUEST['attendance'].'\', \''.$_REQUEST['basic_salary'].'\', \''.$_REQUEST['house_ra'].'\', \''.$_REQUEST['utility'].'\', \''.$_REQUEST['convey_allow'].'\', \''.$_REQUEST['gross_salary'].'\', \''.$_REQUEST['loan'].'\', \''.$_REQUEST['i_t'].'\', \''.$_REQUEST['s_w_f'].'\', \''.$_REQUEST['leave_pay'].'\', \''.$_REQUEST['net_pay'].'\', \''.$_REQUEST['type'].'\', \''.$paid_status.'\')';
                                            insert_query($sql);
                                                }

                                            // -------------------
                                    
                                            ///edit code
                                            check_edit("ac_payroll_calculation","payroll_id");
                                            edit_display("ac_payroll_calculation","payroll_id");
                                            //end of edit code -shift view below delete

                                            // ---------------------
                                                
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_payroll_calculation` WHERE `ac_payroll_calculation`.`payroll_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                                    // echo "done deleting";
                                                    }
                                               // $sql = "SELECT * FROM `ac_annual_appraisal`";
                                           
                                            $sql = 'SELECT `payroll_id`"ID",`type`"Type", `gr_number`"Gr No.", `name`"Employee Name",`which_year`"Year",`which_month`"Month", `designation`"Designation", `attendance`"Attendance", `basic_salary`"Basic salary", `house_ra`"House R/A", `utility`"Utility", `convey_allow` "Convey Allow", `gross_salary`"Gross Salary", `loan` "Loan", `i_t`"Absent Deduction", `s_w_f`"Late Deduction", `leave_pay`"Leave Pay" ,`net_pay`"Net pay",`paid_status` FROM `ac_payroll_calculation` order by `payroll_id` DESC ';

function display_query_salary($sql)
{

 $conn = connect_db();
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row

  
get_current_form();
                                               
   $i = 0;                                     
  while($row = $result->fetch_assoc()) {
    if($i==0)
    {
echo '
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th></th>
                    <th></th>
                    <th></th>';
$row_data = array_keys($row);
$id_column = "";
for($j=0;$j<count($row_data);$j++){

  if($j==0) $id_column = $row_data[$j];

    echo  "<th>".$row_data[$j]."</th>"; }
                                                   
    echo   '</tr>
         </thead>
      <tbody>';

 //echo '';



//print_r($row);



    }
  $i++;

  
    echo '<tr>
              <td>'.$i.'</td>';
$label2 = $row[$row_data[count($row_data)-1]];
if($label2== 0){
echo'
             <td style="text-align:center;"><a style="color:rgb(255,87,90);" href="'.$_SERVER['PHP_SELF'].'?deleteid='.$row[$id_column].'"><i class="fa fa-trash-o"></i></a></td>
              <td style="text-align:center;"><a style="color:rgb(120,108,150);" href="" ><i  class="zmdi zmdi-local-printshop"></i></a></td>
              <td style="text-align:center;"><a style="color:rgb(30,108,180);" href="" ><i class="zmdi zmdi-copy"></i></a></td>';}
if($label2== 1){
echo'
              <td><span class="label label-success">Paid<span></td>
              <td style="text-align:center;"><a style="color:rgb(120,108,150);" href="" ><i  class="zmdi zmdi-local-printshop"></i></a></td>
              <td style="text-align:center;"><a style="color:rgb(30,108,180);" href="" ><i class="zmdi zmdi-copy"></i></a></td>';}


for($k=0;$k<count($row_data)-1;$k++){


echo  '<td>'.$row[$row_data[$k]].'</td>';}

$label = $row[$row_data[count($row_data)-1]];
if($label== 1){ $x = 'label label-success' ; $s = "Paid";} elseif($label== 0 ){ $x = 'label label-danger' ; $s = "Unpiad";}else{$x ='';}
echo  '<td><span class="'.$x.'">'.$s.'<span></td>';

   echo  '</tr>';
  }

    echo '   </tbody>';
} else {
  echo "0 results";
}
    

}
display_query_salary($sql);

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
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Payroll calculation form </h4>
                                    <br>
                                        <form action="Accounts-mod-payoll-calculation.php" method="post">
                                        <div class="form-group">
                                            <label for="">Year</label>
                                            <input type="number" name="year" required=""  class="form-control" id="prVacation" value="<?php if (isset($_REQUEST['year'])) echo $_REQUEST['year']; else echo (date("Y")); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Fee For Month</label>
                                            <select type="text" name="which_month" required="" class="form-control" id=>
                                                <option value="01" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "01" ) echo "selected";  ?> >January</option>
                                                <option value="02" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "02" ) echo "selected";  ?>>February</option>
                                                <option value="03" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "03" ) echo "selected";  ?>>March</option>
                                                <option value="04" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "04" ) echo "selected";  ?>>April</option>
                                                <option value="05" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "05" ) echo "selected";  ?>>May</option>
                                                <option value="06" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "06" ) echo "selected";  ?>>June</option>

                                                <option value="07" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "07" ) echo "selected";  ?>>July</option>
                                                <option value="08" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "08" ) echo "selected";  ?>>August</option>
                                                <option value="09" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "09" ) echo "selected";  ?>>September</option>
                                                <option value="10" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "10" ) echo "selected";  ?>>October</option>
                                                <option value="11" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "11" ) echo "selected";  ?>>November</option>

                                                <option value="12" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "12" ) echo "selected";  ?>>December</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <select name="settype" required="" class="form-control" >
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "" ) echo "selected";  ?>  value="">-Select</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "staff" ) echo "selected";  ?>  value="staff">staff</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "teacher" ) echo "selected";  ?> value="teacher">teacher</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group text-right m-b-0">
                                            <button type="submit" name="submittype" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
<!-- for indivial -->
                            <div class="row" id="formadd2">
                                <div class="col-sm-12">
                                     <div class="card-box">
                                        <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; 
                                        padding: 10px"> Payroll calculation indiviual </h4>
                                    <br>
                                    <form action="Accounts-mod-payoll-calculation.php#formadd2" method="post" id="submitted2">
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <select id="settype" name="settypein" required="" class="form-control" >
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "" ) echo "selected";  ?>  value="">-Select</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "staff" ) echo "selected";  ?>  value="staff">Staff</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "teacher" ) echo "selected";  ?> value="teacher">Teacher</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" name="submittype" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
<?php




if(isset($_REQUEST['settypein'])){
    if( $_REQUEST['settypein'] == "teacher"){
        $settype = $_REQUEST['settypein'];
    echo '
                                    <form action="Accounts-mod-payoll-calculation.php#formadd2" method="post" id="submitted">';
                                    if (isset($_REQUEST['settypein']) ) echo '<input type="hidden" value="'.$_REQUEST['settypein'].'" name="settypein">';
                                        dropDownConditional2("Teacher ID","gr_number2","Teacher_records_id","name","ad_teacher_records",NULL);

                                        
                                   echo'<div class="form-group">
                                            <label for="">Year</label>
                                            <input type="number" name="year" required=""  class="form-control" id="prVacation" value=';
                                    if (isset($_REQUEST['year'])) echo $_REQUEST['year']; else echo (date("Y"));
                                    echo ' >
                                        </div>';

                                    echo'                                        <div class="form-group">
                                            <label for="">Fee For Month</label>
                                            <select type="text" name="which_month" required="" class="form-control" id=>
                                                <option value="01" ';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "01" ) echo "selected";
                                                echo'>January</option>
                                                <option value="02"'; 
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "02" ) echo "selected";
                                                echo'>February</option>
                                                <option value="03"'; 
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "03" ) echo "selected";  
                                                echo'>March</option>
                                                <option value="04"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "04" ) echo "selected";  
                                                echo'>April</option>
                                                <option value="05"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "05" ) echo "selected";  
                                                echo'>May</option>
                                                <option value="06"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "06" ) echo "selected";  
                                                echo'>June</option>

                                                <option value="07"';
                                                 if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "07" ) echo "selected";
                                                 echo'>July</option>
                                                <option value="08"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "08" ) echo "selected"; 
                                                echo'>August</option>
                                                <option value="09"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "09" ) echo "selected";  
                                                echo'>September</option>
                                                <option value="10"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "10" ) echo "selected";  
                                                echo'>October</option>
                                                <option value="11"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "11" ) echo "selected";  
                                                echo'>November</option>

                                                <option value="12" ';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "12" ) echo "selected";  
                                                echo'>December</option>
                                            </select>
                                        </div>';

                                    echo'
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>

                                   </form>';}}
if(isset($_REQUEST['gr_number2'] )){
    if( $_REQUEST['settypein'] == "teacher"){


    $staff = query_to_array('SELECT `Teacher_records_id`, `user_id`, `user_date`, `name`, `cnic`, `position`, `office`, `age`, `start`, `salary`, `house`, `utility`, `allow`, `gross`, `phone_number`, `address`, `comment` FROM `ad_teacher_records` WHERE `Teacher_records_id` = '.$_REQUEST['gr_number2'].' ');
    // print_r($staff);

    // $result = mysqli_query($conn,$sql_s);
    // $row = mysqli_fetch_assoc($result);


$month = $_REQUEST['which_month'];
$y = $_REQUEST['year'];

$date_start = ''.$y.'-'.$month.'-01';
$date_end = ''.$y.'-'.$month.'-' . date('t', strtotime($date_start)); 

$date = ''.$y.'-'.$month.'-01';
$end = ''.$y.'-'.$month.'-' . date('t', strtotime($date)); //get end date of month
$num_of_sunday = 0 ;




while(strtotime($date) <= strtotime($end)) {
        $day_num = date('d', strtotime($date));
        $day_name = date('l', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));

        //echo "<td>$day_num  $day_name</td><br>";
        if ($day_name == "Sunday"){
            $num_of_sunday +=1; 
        }
    }
 

    // echo '<h1>'.$date_start.'</h1>';
    // echo '<h1>'.$date_end.'</h1>';

    $value_id = $staff[0]['Teacher_records_id'];
    $value_name =  $staff[0]['name'];
    $value_salary =  $staff[0]['salary'];
    $value_position =  $staff[0]['position'];
    $value_house = $staff[0]['house'];
    $value_utility = $staff[0]['utility'];
    $value_allow = $staff[0]['allow'];
    $value_gross = $staff[0]['gross'];

    $employee_id_record = $staff[0]['Teacher_records_id'];
    // echo "<h1>".$employee_id_record."</h1>";
    // echo "<h1>".$staff['name']."</h1>";
    $sql_loan = 'SELECT sum(`loan_amount`)"amount", `laon_installment_amount` FROM `ac_employee_loan` WHERE `employee_id` = '.$employee_id_record.' and `type` = "'.$_REQUEST['settypein'].'"';
    // echo $sql_loan;
    $result_loan = mysqli_query($conn,$sql_loan);
    $row_laon = mysqli_fetch_assoc($result_loan);
    $sum_of_total_loan = $row_laon['amount'];
    // $installment = $row_laon['laon_installment_amount'];

    $sql_loan_collect = 'SELECT `employee_id`, `employee_name`, count(`employee_id`) "Number of loans" , sum(if(`laon_installment`-(month(current_date())- month(`loan_start`))<0,1,0)) "repaid loans", sum(`loan_amount`) "total loan amount", month(current_date())- month(`loan_start`) "installments paid",`laon_installment`-(month(current_date())- month(`loan_start`)) "installments_Left" , `type`,sum( (`laon_installment_amount`)*if(`laon_installment`-(month(current_date())- month(`loan_start`))>0,1,0)) "collect_amount" , `outstanding` FROM `ac_employee_loan` WHERE `employee_id` = '.$employee_id_record.' and `type` = "'.$_REQUEST['settypein'].'"';
    $result_loan_collect = mysqli_query($conn,$sql_loan_collect);
    $row_loan_collect = mysqli_fetch_assoc($result_loan_collect);
    $installment = $row_loan_collect['collect_amount'];
    $loan_de = $installment;

    if(gettype($sum_of_total_loan)=="NULL"){
        $sum_of_total_loan = 0;
     'Loan Amount is Zero <br>';}else;{ 'sum of loan amount '.$sum_of_total_loan. ' and the installment is '.$installment.'<br>';}

    $sql_pay_loan = 'SELECT sum(`loan`)"pay_laon" FROM `ac_payroll_calculation` WHERE `gr_number`  = '.$employee_id_record.' and `type` = "'.$_REQUEST['settypein'].'"';
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
    $sql_loan = 'SELECT `employee_loan_id`, `user_id`, `user_date`, `employee_id`, `employee_name`, `loan_amount`, `loan_start`, `laon_installment`, `type`, `laon_installment_amount` FROM `ac_employee_loan` WHERE `employee_id`  = '.$employee_id_record.' and  `type` ="'.$_REQUEST['settypein'].'"';
    //  $sql_loan;
    $resultloan = mysqli_query($conn,$sql_loan);
    $rowloan = mysqli_fetch_assoc($resultloan);
    $laon_of_this_amount = $rowloan['laon_installment_amount'];
     "Loan Installment ".$laon_of_this_amount."<br>";







// $d=cal_days_in_month(CAL_GREGORIAN,9,2020);
//  "There was $d days in sep 2020<br>";
// $month = $_REQUEST['which_month'];
// $y = $_REQUEST['year'];

// $date_start = ''.$y.'-'.$month.'-01';
// $date_end = ''.$y.'-'.$month.'-' . date('t', strtotime($date)); //get end date of month
// $num_of_sunday = 0 ;

// while(strtotime($date) <= strtotime($end)) {
//         $day_num = date('d', strtotime($date));
//         $day_name = date('l', strtotime($date));
//         $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));

//         // "<td>$day_num  $day_name</td><br>";
//         if ($day_name == "Sunday"){
//             $num_of_sunday +=1; 
//         }
//     }
"Number of Sunday of this month ".$num_of_sunday."<br>";

"Number of days in this month ".$day_num."<br>";

"Number of working days in this month ".$working_days = $day_num - $num_of_sunday."<br>";

"Per day basic salary ".$basic_salary_per = (float)$value_salary/(float)$working_days."<br>";
"Per day gross salary ".$gross_salary_per = (float)$value_gross/(float)$working_days."<br>";

"Absent Deduction ".(float)$absent_deduction=(float)$Absent*(float)$gross_salary_per;
"<br>";
"Late Deduction ".(float)$late_deduction=(float)($Late/2)*(float)$gross_salary_per;

"Net Pay ".(float)$net_pay = (float)$value_gross - (float)$absent_deduction - (float)$late_deduction - (float)$loan_de; 



}}

?>



<?php
if(isset($_REQUEST['settypein'])){
    if( $_REQUEST['settypein'] == "staff"){
        $settype = $_REQUEST['settypein'];
        echo '
                                    <form action="Accounts-mod-payoll-calculation.php#formadd2" method="post" id="submitted">';
                                    if (isset($_REQUEST['settypein']) ) echo '<input type="hidden" value="'.$_REQUEST['settypein'].'" name="settypein">';
                                        dropDownConditional2("Employee ID","gr_number2","employee_record_id","name","ad_employee_record",NULL);


                                        
                                   echo'<div class="form-group">
                                            <label for="">Year</label>
                                            <input type="number" name="year" required=""  class="form-control" id="prVacation" value=';
                                    if (isset($_REQUEST['year'])) echo $_REQUEST['year']; else echo (date("Y"));
                                    echo ' >
                                        </div>';

                                    echo'                                        <div class="form-group">
                                            <label for="">Fee For Month</label>
                                            <select type="text" name="which_month" required="" class="form-control" id=>
                                                <option value="01" ';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "01" ) echo "selected";
                                                echo'>January</option>
                                                <option value="02"'; 
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "02" ) echo "selected";
                                                echo'>February</option>
                                                <option value="03"'; 
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "03" ) echo "selected";  
                                                echo'>March</option>
                                                <option value="04"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "04" ) echo "selected";  
                                                echo'>April</option>
                                                <option value="05"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "05" ) echo "selected";  
                                                echo'>May</option>
                                                <option value="06"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "06" ) echo "selected";  
                                                echo'>June</option>

                                                <option value="07"';
                                                 if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "07" ) echo "selected";
                                                 echo'>July</option>
                                                <option value="08"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "08" ) echo "selected"; 
                                                echo'>August</option>
                                                <option value="09"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "09" ) echo "selected";  
                                                echo'>September</option>
                                                <option value="10"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "10" ) echo "selected";  
                                                echo'>October</option>
                                                <option value="11"';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "11" ) echo "selected";  
                                                echo'>November</option>

                                                <option value="12" ';
                                                if (isset($_REQUEST["which_month"]) && $_REQUEST["which_month"]== "12" ) echo "selected";  
                                                echo'>December</option>
                                            </select>
                                        </div>';

                                    echo'
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>

                                   </form>';}}
if(isset($_REQUEST['gr_number2'] )){
    if( $_REQUEST['settypein'] == "staff"){
    $staff = query_to_array('SELECT `employee_record_id`, `user_id`, `user_date`, `name`, `gr_no`, `cnic`, `position`, `assigned_section`, `age`, `start`, `salary`, `house`, `utility`, `allow`, `gross`, `phone_number`, `address`, `comment` FROM `ad_employee_record` WHERE `employee_record_id`='.$_REQUEST['gr_number2'].'' );
    // print_r($staff);




$month = $_REQUEST['which_month'];
$y = $_REQUEST['year'];

$date_start = ''.$y.'-'.$month.'-01';
$date_end = ''.$y.'-'.$month.'-' . date('t', strtotime($date_start)); 

$date = ''.$y.'-'.$month.'-01';
$end = ''.$y.'-'.$month.'-' . date('t', strtotime($date)); //get end date of month
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


    // echo '<h1>'.$date_start.'</h1>';
    // echo '<h1>'.$date_end.'</h1>';

    $value_id = $staff[0]['employee_record_id'];
    $value_name =  $staff[0]['name'];
    $value_salary =  $staff[0]['salary'];
    $value_position =  $staff[0]['position'];
    $value_house = $staff[0]['house'];
    $value_utility = $staff[0]['utility'];
    $value_allow = $staff[0]['allow'];
    $value_gross = $staff[0]['gross'];

    $employee_id_record = $staff[0]['employee_record_id'];
    // echo "<h1>".$employee_id_record."</h1>";
    // echo "<h1>".$staff['name']."</h1>";
    $sql_loan = 'SELECT sum(`loan_amount`)"amount", sum(`laon_installment_amount`)"loan_install" FROM `ac_employee_loan` WHERE `employee_id` = '.$employee_id_record.' and `type` = "'.$_REQUEST['settypein'].'"';
    // $sql_loan;
    $result_loan = mysqli_query($conn,$sql_loan);
    $row_laon = mysqli_fetch_assoc($result_loan);
    $sum_of_total_loan = $row_laon['amount'];
    // 

    $sql_loan_collect = 'SELECT `employee_id`, `employee_name`, count(`employee_id`) "Number of loans" , sum(if(`laon_installment`-(month(current_date())- month(`loan_start`))<0,1,0)) "repaid loans", sum(`loan_amount`) "total loan amount", month(current_date())- month(`loan_start`) "installments paid",`laon_installment`-(month(current_date())- month(`loan_start`)) "installments_Left" , `type`,sum( (`laon_installment_amount`)*if(`laon_installment`-(month(current_date())- month(`loan_start`))>0,1,0)) "collect_amount" , `outstanding` FROM `ac_employee_loan` WHERE `employee_id` = '.$employee_id_record.' and `type` = "'.$_REQUEST['settypein'].'"';
    $result_loan_collect = mysqli_query($conn,$sql_loan_collect);
    $row_loan_collect = mysqli_fetch_assoc($result_loan_collect);
    $installment = $row_loan_collect['collect_amount'];
    $loan_de = $installment;

    if(gettype($sum_of_total_loan)=="NULL"){
        $sum_of_total_loan = 0;
    'Loan Amount is Zero <br>';}else;{'sum of loan amount '.$sum_of_total_loan. ' and the installment is '.$installment.'<br>';}

    $sql_pay_loan = 'SELECT sum(`loan`)"pay_laon" FROM `ac_payroll_calculation` WHERE `gr_number`  = '.$employee_id_record.' and `type` = "'.$_REQUEST['settypein'].'"';
    // echo $sql_pay_loan;

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

// if( $balance <= $sum_of_total_loan && $balance >=$installment){
//   $loan_de = $installment;
//   echo "Loan Deduction".$loan_de."<br>";
// }else{$loan_de=$balance ; echo "Loan Deduction".$loan_de."<br>"; }

    $sql_p = 'SELECT count(`status`)"Total Present" FROM `ad_employee_attendance` WHERE `date` >= "'.$date_start.'" and `date` <= "'.$date_end.'" and `status` = "Present" and `id_num` = '.$employee_id_record.' ';
    // echo $sql_p ;
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
// loan part 
    $sql_loan = 'SELECT `employee_loan_id`, `user_id`, `user_date`, `employee_id`, `employee_name`, `loan_amount`, `loan_start`, `laon_installment`, `type`, `laon_installment_amount` FROM `ac_employee_loan` WHERE `employee_id`  = '.$employee_id_record.' and  `type` ="'.$_REQUEST['settypein'].'"';
    $resultloan = mysqli_query($conn,$sql_loan);
    $rowloan = mysqli_fetch_assoc($resultloan);
    $laon_of_this_amount = $rowloan['laon_installment_amount'];
    "Loan Installment ".$laon_of_this_amount."<br>";







// $d=cal_days_in_month(CAL_GREGORIAN,9,2020);
// echo "There was $d days in sep 2020<br>";
// $month = $_REQUEST['which_month'];
// $y = $_REQUEST['year'];

// $date_start = ''.$y.'-'.$month.'-01';
// $date_end = ''.$y.'-'.$month.'-' . date('t', strtotime($date)); //get end date of month
// $num_of_sunday = 0 ;

// while(strtotime($date) <= strtotime($end)) {
//         $day_num = date('d', strtotime($date));
//         $day_name = date('l', strtotime($date));
//         $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));

//         //echo "<td>$day_num  $day_name</td><br>";
//         if ($day_name == "Sunday"){
//             $num_of_sunday +=1; 
//         }
//     }
"Number of Sunday of this month ".$num_of_sunday."<br>";

"Number of days in this month ".$day_num."<br>";

"Number of working days in this month ".$working_days = $day_num - $num_of_sunday."<br>";

"Per day basic salary ".$basic_salary_per = (float)$value_salary/(float)$working_days."<br>";
"Per day gross salary ".$gross_salary_per = (float)$value_gross/(float)$working_days."<br>";

 "Absent Deduction ".(float)$absent_deduction=(float)$Absent*(float)$gross_salary_per;
"<br>";
"Late Deduction ".(float)$late_deduction=(float)($Late/2)*(float)$gross_salary_per;
"<br>";
" Net Pay ".(float)$net_pay = (float)$value_gross - (float)$absent_deduction - (float)$late_deduction - (float)$loan_de;

}}

?>                                      
                                        <form action="Accounts-mod-payoll-calculation.php" method="post">
                                            <input type="hidden" <?php if(isset($_REQUEST['settypein']))echo 'value="'.$_REQUEST['settypein'].'" readonly' ; else { if(isset($_REQUEST['type'])) echo "readonly value = ".$_REQUEST['type'];} ?> name="type">

                                            <input type="hidden" <?php if(isset($_REQUEST['which_month']))echo 'value="'.$_REQUEST['which_month'].'" readonly' ; else { if(isset($_REQUEST['which_month'])) echo "readonly value = ".$_REQUEST['which_month'];} ?> name="which_month">

                                            <input type="hidden" <?php if(isset($_REQUEST['year']))echo 'value="'.$_REQUEST['year'].'" readonly' ; else { if(isset($_REQUEST['which_year'])) echo "readonly value = ".$_REQUEST['which_year'];} ?> name="which_year">


                                            <div class="form-group">
                                                <label for="prID">Employee code  </label>
                                                <input type="text" name="gr_number" required="" placeholder="Enter employee code" class="form-control" id="prID" <?php if(isset($employee_id_record))echo 'value="'.$value_id.'" readonly' ; else { if(isset($_REQUEST['gr_number'])) echo "readonly value = ".$_REQUEST['gr_number'];} ?>>
                                            </div>
                                        
                                   
                                            <div class="form-group">
                                                <label for="">Employee Name </label>
                                                <input type="text" name="name" required="" placeholder="Enter employee name" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_name.'" readonly' ; else { if(isset($_REQUEST['name'])) echo "readonly value = ".$_REQUEST['name'];} ?>>
                                            </div>

                                            <div class="form-group">
                                                <label for="prRegular">Designation</label>
                                                <input type="text" name="designation" required="" placeholder="Enter designation" class="form-control" id="prRegular" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_position.'" readonly' ; else { if(isset($_REQUEST['designation'])) echo "readonly value = ".$_REQUEST['designation'];} ?>>
                                            </div>

                                            <div class="form-group">
                                                <label for="prVacation">Attendance</label>
                                                <input type="number" name="attendance" parsley-trigger="change" required="" placeholder="Enter attendance" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$present.'" readonly' ; else { if(isset($_REQUEST['attendance'])) echo "readonly value = ".$_REQUEST['attendance'];} ?>>
                                            </div>

                                            <div class="form-group">
                                                <label for="prSick">Basic salary</label>
                                                <input type="number" name="basic_salary" required="" placeholder="Enter basic salary" class="form-control" id="prSick" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_salary.'" readonly' ; else { if(isset($_REQUEST['basic_salary'])) echo "readonly value = ".$_REQUEST['basic_salary'];} ?> >
                                            </div>

                                            <div class="form-group">
                                                <label for="zaClass">House R/A </label>
                                                <input type="number" name="house_ra" required="" placeholder="Enter house R/A" class="form-control" id="prOvertime"  <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_house.'" readonly' ; else { if(isset($_REQUEST['house_ra'])) echo "readonly value = ".$_REQUEST['house_ra'];} ?> >
                                            </div>

                                            <div class="form-group">
                                                <label for="prGross">Utility</label>
                                                <input type="number" name="utility" required="" placeholder="Enter utility" class="form-control" id="prGross"  <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_utility.'" readonly' ; else { if(isset($_REQUEST['utility'])) echo "readonly value = ".$_REQUEST['utility'];} ?> >
                                            </div>

                                            <div class="form-group">
                                                <label for="prTaxes">Convey Allowance</label>
                                                <input type="number" name="convey_allow" required="" placeholder="Enter convey allow" class="form-control" id="prTaxes" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_allow.'" readonly' ; else { if(isset($_REQUEST['convey_allow'])) echo "readonly value = ".$_REQUEST['convey_allow'];} ?> >
                                            </div>

                                            <div class="form-group">
                                                <label for="prTaxes">Gross Salary</label>
                                                <input type="number" name="gross_salary" required="" placeholder="Enter gross salay" class="form-control" id="prTaxes" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_gross.'" readonly' ; else { if(isset($_REQUEST['gross_salary'])) echo "readonly value = ".$_REQUEST['gross_salary'];} ?> >
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-5"></div>
                                                <div class="col-sm-2">
                                                    <label>Deductions</label>
                                                </div>
                                                <div class="col-sm-5"></div>   
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="prTaxes">Loan</label>
                                                        <input type="number" name="loan" required="" placeholder="Enter loan" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$loan_de.'" readonly' ; else { if(isset($_REQUEST['loan'])) echo "readonly value = ".$_REQUEST['loan'];} ?>>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="prTaxes">Absent Deduction</label>
                                                        <input type="number" name="i_t" required="" placeholder="Enter I.T" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$absent_deduction.'" readonly' ; else { if(isset($_REQUEST['i_t'])) echo "readonly value = ".$_REQUEST['i_t'];} ?>>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="prTaxes">Late Deuctio</label>
                                                        <input type="text" name="s_w_f" required="" placeholder="Enter S.W.F" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$late_deduction.'" readonly' ; else { if(isset($_REQUEST['s_w_f'])) echo "readonly value = ".$_REQUEST['s_w_f'];} ?>>
                                                    </div>
                                                </div>

                                            <div class="form-group">
                                                <label for="prTaxes">Leave W/O pay</label>
                                                <input type="number" name="leave_pay" required="" placeholder="Enter leave W/O pay" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$absent_deduction.'" readonly' ; else { if(isset($_REQUEST['leave_pay'])) echo "readonly value = ".$_REQUEST['leave_pay'];} ?>>
                                            </div>

                                            <div class="form-group">
                                                <label for="prTaxes">Net pay</label>
                                                <input type="number" name="net_pay" required="" placeholder="Enter net pay" class="form-control" id="prTaxes" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$net_pay.'" readonly' ; else { if(isset($_REQUEST['net_pay'])) echo "readonly value = ".$_REQUEST['net_pay'];} ?>>
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
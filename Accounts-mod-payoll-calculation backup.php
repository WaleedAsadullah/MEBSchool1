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
                                            <?php
                                            // ---------------
                                            if (isset($_REQUEST['submit'])) {
                                            $sql = 'INSERT INTO `ac_payroll_calculation`(`payroll_id`, `user_id`, `user_date`, `gr_number`, `name`, `designation`, `attendance`, `basic_salary`, `house_ra`, `utility`, `convey_allow`, `gross_salary`, `loan`, `i_t`, `s_w_f`, `advance`, `leave_pay`, `net_pay`,`type`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['gr_number'].'\', \''.$_REQUEST['name'].'\', \''.$_REQUEST['designation'].'\', \''.$_REQUEST['attendance'].'\', \''.$_REQUEST['basic_salary'].'\', \''.$_REQUEST['house_ra'].'\', \''.$_REQUEST['utility'].'\', \''.$_REQUEST['convey_allow'].'\', \''.$_REQUEST['gross_salary'].'\', \''.$_REQUEST['loan'].'\', \''.$_REQUEST['i_t'].'\', \''.$_REQUEST['s_w_f'].'\', \''.$_REQUEST['advance'].'\', \''.$_REQUEST['leave_pay'].'\', \''.$_REQUEST['net_pay'].'\', \''.$_REQUEST['type'].'\')';
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
                                            $sql = 'SELECT `payroll_id`"ID",`type`"Type", `gr_number`"Gr No.", `name`"Employee Name", `designation`"Designation", `attendance`"Attendance", `basic_salary`"Basic salary", `house_ra`"House R/A", `utility`"Utility", `convey_allow` "Convey Allow", `gross_salary`"Gross Salary", `loan` "Loan", `i_t`"IT", `s_w_f`"S.W.F", `advance`"Advance", `leave_pay`"Leave Pay" ,`net_pay`"Net pay" FROM `ac_payroll_calculation`';
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
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "Staff" ) echo "selected";  ?>  value="Staff">Staff</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "Teacher" ) echo "selected";  ?> value="Teacher">Teacher</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group text-right m-b-0">
                                            <button type="submit" name="submit2" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                        </form>
                                    <form action="Accounts-mod-payoll-calculation.php#formadd" method="post" id="submitted2">
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
                                    <form action="Accounts-mod-payoll-calculation.php#formadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Teacher ID","gr_number2","Teacher_records_id","name","ad_teacher_records",NULL);
                                        
                                   echo'<div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                   </form>';
                               }} ?>
<?php
if(isset($_REQUEST['gr_number2'])){
    if($_REQUEST['settype'] == "Teacher"){
    $conn = connect_db();
    $sql_s = 'SELECT `Teacher_records_id`, `user_id`, `user_date`, `name`, `cnic`, `position`, `office`, `age`, `start`, `salary`, `house`, `utility`, `allow`, `gross`, `phone_number`, `address`, `comment` FROM `ad_teacher_records` WHERE  `Teacher_records_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['Teacher_records_id'];
    $value_name =  $row['name'];
    $value_salary =  $row['salary'];
    $value_position =  $row['position'];
    $value_house = $row['house'];
    $value_utility = $row['utility'];
    $value_allow = $row['allow'];
    $value_gross = $row['gross'];
}}
?>

<?php if(isset($_REQUEST['settype'])){
    if( $_REQUEST['settype']=="Staff"){

    $settype = $_REQUEST['settype'];
    echo '
                                    <form action="Accounts-mod-payoll-calculation.php#formadd" method="post" id="submitted">';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Employee ID","gr_number2","employee_record_id","name","ad_employee_record",NULL);
                                        
                                   echo'<div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                   </form>';
                               }}?>
<?php
if(isset($_REQUEST['gr_number2'])){
    if( $settype == "Staff"){
    $conn = connect_db();
    $sql_s = 'SELECT `employee_record_id`, `user_id`, `user_date`, `name`, `gr_no`, `cnic`, `position`, `assigned_section`, `age`, `start`, `salary`, `house`, `utility`, `allow`, `gross`, `phone_number`, `address`, `comment` FROM `ad_employee_record` WHERE  `employee_record_id` = '.$_REQUEST['gr_number2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['employee_record_id'];
    $value_name =  $row['name'];
    $value_salary =  $row['salary'];
    $value_position =  $row['position'];
    $value_house = $row['house'];
    $value_utility = $row['utility'];
    $value_allow = $row['allow'];
    $value_gross = $row['gross'];

    $sql_loan = 'SELECT sum(`loan_amount`)"amount", `laon_installment_amount` FROM `ac_employee_loan` WHERE `employee_id` = '.$_REQUEST['gr_number2'].' and `type` = "'.$settype.'"';
    // echo $sql_loan;
    $result_loan = mysqli_query($conn,$sql_loan);
    $row_laon = mysqli_fetch_assoc($result_loan);
    $sum_of_total_loan = $row_laon['amount'];
    $installment = $row_laon['laon_installment_amount'];
    if(gettype($sum_of_total_loan)=="NULL"){
        $sum_of_total_loan = 0;
    echo 'Loan Amount is Zero';}else;{echo 'sum of loan amount '.$sum_of_total_loan. ' and the installment is '.$installment.'<br>';}

    $sql_pay_loan = 'SELECT sum(`loan`)"pay_laon" FROM `ac_payroll_calculation` WHERE `gr_number`  = '.$_REQUEST['gr_number2'].' and `type` = "'.$settype.'"';
    // echo $sql_pay_loan;

    $result_pay_loan = mysqli_query($conn,$sql_pay_loan);
    $row_pay_loan = mysqli_fetch_assoc($result_pay_loan);
    $sum_of_pay_loan = $row_pay_loan['pay_laon'];
    echo 'sum of pay loan '.$sum_of_pay_loan.'<br>';

    if(gettype($sum_of_pay_loan)  == "NULL" )
        {

            $sum_of_pay_loan = 0;
            $balance = $sum_of_total_loan - $sum_of_pay_loan;
            echo 'outstanding loan(not pay any installment) '.$balance.'<br>';
        }
    else{
            $balance = $sum_of_total_loan - $sum_of_pay_loan;
            echo 'outstanding loan'.$balance.'<br>';
        }

if( $balance <= $sum_of_total_loan && $balance >=$installment){
  $loan_de = $installment;
  echo "Loan Deduction".$loan_de."<br>";
}else{$loan_de=$balance ; echo "Loan Deduction".$loan_de."<br>"; }

    $sql_p = 'SELECT count(`status`)"Total Present" FROM `ad_employee_attendance` WHERE `date` >= "2020-09-01" and `date` <= "2020-09-30" and `status` = "Present" and `id_num` = '.$_REQUEST['gr_number2'].' ';
    $result_p = mysqli_query($conn,$sql_p);
    $row_p = mysqli_fetch_assoc($result_p);
    $present = $row_p['Total Present'];
    echo'Total Present '.$present ."<br>";

    $sql_a = 'SELECT count(`status`)"Total Absent" FROM `ad_employee_attendance` WHERE `date` >= "2020-09-01" and `date` <= "2020-09-30" and `status` = "Absent" and `id_num` = '.$_REQUEST['gr_number2'].' ';
    $result_a = mysqli_query($conn,$sql_a);
    $row_a = mysqli_fetch_assoc($result_a);
    $Absent = $row_a['Total Absent'];
    echo'Total Absent '.$Absent ."<br>";

    $sql_l = 'SELECT count(`status`)"Total Late" FROM `ad_employee_attendance` WHERE `date` >= "2020-09-01" and `date` <= "2020-09-30" and `status` = "Late" and `id_num` = '.$_REQUEST['gr_number2'].' ';
    $result_l = mysqli_query($conn,$sql_l);
    $row_l = mysqli_fetch_assoc($result_l);
    $Late = $row_l['Total Late'];
    echo'Total Late '.$Late ."<br>";

    $sql_e = 'SELECT count(`status`)"Total Excused" FROM `ad_employee_attendance` WHERE `date` >= "2020-09-01" and `date` <= "2020-09-30" and `status` = "Excused" and `id_num` = '.$_REQUEST['gr_number2'].' ';
    $result_e = mysqli_query($conn,$sql_e);
    $row_e = mysqli_fetch_assoc($result_e);
    $Excused = $row_e['Total Excused'];
    echo'Total Excused '.$Excused ."<br>";

    echo "Number of entries ".$total_number_of_entries = $present + $Absent + $Late + $Excused ."<br>";
// loan part 
    $sql_loan = 'SELECT `employee_loan_id`, `user_id`, `user_date`, `employee_id`, `employee_name`, `loan_amount`, `loan_start`, `laon_installment`, `type`, `laon_installment_amount` FROM `ac_employee_loan` WHERE `employee_id`  = '.$_REQUEST['gr_number2'].'';
    $resultloan = mysqli_query($conn,$sql_loan);
    $rowloan = mysqli_fetch_assoc($resultloan);
    $laon_of_this_amount = $rowloan['laon_installment_amount'];
    echo "Loan Installment ".$laon_of_this_amount."<br>";







// $d=cal_days_in_month(CAL_GREGORIAN,9,2020);
// echo "There was $d days in sep 2020<br>";

$date = '2020-09-01';
$end = '2020-09-' . date('t', strtotime($date)); //get end date of month
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
echo "Number of Sunday of this month ".$num_of_sunday."<br>";

echo "Number of days in this month ".$day_num."<br>";

echo "Number of working days in this month ".$working_days = $day_num - $num_of_sunday."<br>";

echo "Per day basic salary ".$basic_salary_per = (float)$value_salary/(float)$working_days."<br>";
echo "Per day gross salary ".$gross_salary_per = (float)$value_gross/(float)$working_days."<br>";

echo "Absent Deduction ".(float)$absent_deduction=(float)$Absent*(float)$gross_salary_per;
echo"<br>";
echo "Late Deduction ".(float)$late_deduction=(float)($Late/2)*(float)$gross_salary_per."<br>";

echo "Net Pay ".(float)$net_pay = (float)$value_gross - (float)$absent_deduction - (float)$late_deduction - (float)$loan_de;


}}

?>



                                        <form action="Accounts-mod-payoll-calculation.php" method="post">
                                            <input type="hidden" <?php if(isset($_REQUEST['settype']))echo 'value="'.$_REQUEST['settype'].'" readonly' ; else { if(isset($_REQUEST['type'])) echo "readonly value = ".$_REQUEST['type'];} ?> name="type">


                                            <div class="form-group">
                                                <label for="prID">Employee code  </label>
                                                <input type="text" name="gr_number" required="" placeholder="Enter employee code" class="form-control" id="prID" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_id.'" readonly' ; else { if(isset($_REQUEST['gr_number'])) echo "readonly value = ".$_REQUEST['gr_number'];} ?>>
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
                                                        <label for="prTaxes">I.T</label>
                                                        <input type="number" name="i_t" required="" placeholder="Enter I.T" class="form-control" id="prTaxes" value="<?php if(isset($_REQUEST['i_t'])) echo $_REQUEST['i_t'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="prTaxes">S.W.F</label>
                                                        <input type="number" name="s_w_f" required="" placeholder="Enter S.W.F" class="form-control" id="prTaxes" value="<?php if(isset($_REQUEST['s_w_f'])) echo $_REQUEST['s_w_f'] ?>">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="prTaxes">Advance</label>
                                                        <input type="number" name="advance"  required="" placeholder="Enter advance" class="form-control" id="prTaxes"  value="<?php if(isset($_REQUEST['advance'])) echo $_REQUEST['advance'] ?>">
                                                    </div>
                                                </div> -->
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
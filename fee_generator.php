<?php
include_once("db_functions.php");
function find_concession($student_id)
{
 

return query_to_array("SELECT * FROM `ad_fee_concession` WHERE `student_id` = $student_id");


}
$generate_fee_for_month = "September";
$generate_fee_for_year = "2020";
$class_id = 19;
$class_fee = query_to_array("SELECT * FROM `ad_class_fee` WHERE `class_id` = $class_id");
$students = query_to_array("SELECT * FROM `ad_assign_student_class` WHERE `assign_class` = $class_id");
//$student_fee = query_to_array("SELECT * FROM `ad_fee_concession`,`ad_assign_student_class` WHERE `student_id` = `gr_no` and `assign_class` = $class_id");


$generate_fee = query_to_array("SELECT * FROM `ac_generate_fee_class` WHERE `class_id` = $class_id and `which_month` = \"$generate_fee_for_month\" and `year` = \"$generate_fee_for_year\"");

$ok_to_print = 1;
if(!isset($class_fee) || ($class_fee == "no result")) {
	echo "Class fee not set. Set class fee here <br>";
$ok_to_print = 0;
}
else
print_r($class_fee);
if(!isset($students) || ($students == "no result")) {
	echo "Student not assigend to class. Assign student to class here  <br>";
$ok_to_print = 0;
}
else
print_r($students);

if(!isset($generate_fee) || ($generate_fee == "no result")) {echo "Generate instructions not set. Set generate instructions here <br>";
$ok_to_print = 0;
}
else
print_r($generate_fee);

if($ok_to_print)
{


	for($students_count = 0; $students_count< count($students) ;$students_count++)
	{


$student_fee = find_concession($students[$students_count]['gr_no']);
	if(!isset($student_fee) || ($student_fee == "no result")) {
		echo "student has no concession <br>";
//$ok_to_print = 0;
$student_fee = null;
}
else
print_r($student_fee);
$fee = 0;
$monfee = 0; $admfee = 0;
$examfee = 0;
$miscfee = 0;$specialfee = 0;$annualfee = 0;$feesibdisc = 0;$feeza= 0;
$beg_challan = ' <div class="halfpage">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="assets/images/med-logo.png" width="70px" style="padding-top: 12px" />
                    </div>
                    <div class="col-lg-6">
                        <h4><strong>The MEB School</strong></h4>
                    </div>
                    <div class="col-lg-3" >
                        <p style="margin: 0px">Ph  : 36333824</p>
                        <p style="margin: 0px">    36336335</p>
                        <hr>
                        <p style="font-weight: bold" ><u>';
                       // Student Copy
                        $ending_challan = '</u></p>
                    </div>
                </div>
                <div class="innercontent">
                    <div style="width: 330px">';
                        
        






$ending_challan .=  '<p>F Roll No. <span><u>Ep1866051</u></span></p>
                        <p>S.no <span><u>178</u></span></p>
                        <p>Class : <span><u>8th</u></span></p>
                        <p>G.R No. <span><u>3349</u></span></p>
                        <p>Name of Student :<span><u>'.$students[$students_count]['name'].'</u></span></p>';


                $ending_challan .=  '        <hr>
                        <p>Fees for the Month</p>
                        <p>Admission Fee/Re-Admission Fee</p>
                        <p>Student Fund</p>
                        <p>Fine</p>
                        <p>Mics</p>
                        <p>Total</p>
                    </div>
                    <div>
                         <table>
                            <thead>
                                <tr>
                                    <th>Rs.</th>
                                    <th>Ps.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>2000/-</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>2500/-</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>0/-</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>0/-</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>0/-</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>4500/-</th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-lg-6"><p>Date : <span><u>7/6/2020</u></span></p></div>
                    <div class="col-lg-6"><p>Cashier :<span><u>Kashif</u></span></p></div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer"><p style="color: white; font-size: 10px; font-weight: 100 ;margin-bottom : 0px; padding: 2px;">Fees once received, will not be refunded and not transferable not adjustable</p></div>
                    </div>
                </div>
            </div>';
echo "Student name".." id(".$students[$students_count]['gr_no'].") class id =".$students[$students_count]['assign_class'];
echo "<br>";
echo "Fee for month".$generate_fee[0]['which_month']." year = ".$generate_fee[0]['year'] ; 
echo "<br>";

if(isset($generate_fee) && ($generate_fee[0]['month']=="yes"))
echo "Monthly fee(actual)=".$class_fee[0]['monthly_fee']." less concession = ".$student_fee[0]['monthly_con']." net=".($monfee = $class_fee[0]['monthly_fee']-$student_fee[0]['monthly_con']);
echo "<br>";
if(isset($generate_fee) && ($generate_fee[0]['admission']=="yes"))
echo "Admission fee(actual)=".$class_fee[0]['admission_fee']." less concession = ".$student_fee[0]['admission_con']." net=".($admfee =$class_fee[0]['admission_fee']-$student_fee[0]['admission_con']);
echo "<br>";
if(isset($generate_fee) && ($generate_fee[0]['exam']=="yes"))
echo "Exam fee(actual)=".$class_fee[0]['exam']." less concession = ".$student_fee[0]['exam_con']." net=".($examfee =$class_fee[0]['exam']-$student_fee[0]['exam_con']);
echo "<br>";
if(isset($generate_fee) && ($generate_fee[0]['mics']=="yes"))
echo "Misc fee(actual)=".$class_fee[0]['misc']." less concession = ".$student_fee[0]['misc_con']." net=".($miscfee =$class_fee[0]['misc']-$student_fee[0]['misc_con']);
echo "<br>";
if(isset($generate_fee) && ($generate_fee[0]['other']=="yes"))
echo "Special fee(actual)=".$class_fee[0]['special']." less concession = ".$student_fee[0]['special_con']." net=".($specialfee =$class_fee[0]['special']-$student_fee[0]['special_con']);
echo "<br>";
if(isset($generate_fee) && ($generate_fee[0]['annual']=="yes"))
echo "Annual fee(actual)=".$class_fee[0]['annual']." less concession = ".$student_fee[0]['annual_con']." net=".($annualfee =$class_fee[0]['annual']-$student_fee[0]['annual_con']);
echo "<br>";

echo "Sibling discount fee(actual)=".($feesibdisc =$student_fee[0]['sibling_dis']);
echo "<br>";
echo "Zakat adjustment (actual)=".($feeza =$student_fee[0]['zakat_adj']);
echo "<br>";
$fee = $monfee + $admfee +$examfee +$miscfee +$specialfee +$annualfee -$feesibdisc -$feeza ;
echo "Net total fee for month =". $fee;
echo "<br>";
}
}

?>
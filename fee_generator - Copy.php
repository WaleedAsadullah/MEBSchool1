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
echo "<br>";
echo "<br>";
echo "Student name".$students[$students_count]['name']." id(".$students[$students_count]['gr_no'].") class id =".$students[$students_count]['assign_class'];
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
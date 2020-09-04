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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px">  Generate Fee  For Class </h4>
                                        <div class="row">
                                            <div class="col-sm-12 text-right">
                                                <p class="text-muted">To Set Fee Instruction <a href="Accounts-mod-fee-setting-for-class.php" class="text-primary m-l-5"><b> Click Here</b></a></p>
                                            </div>
                                        </div>
                                    <div class="table-responsive" id="view">
                                        <!-- tablesaw table m-b-0 tablesaw-columntoggle table-bordered -->
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // -------------------
                                            //echo "test";
                                            if(isset($_REQUEST['submit'])){


$generate_fee_for_month = $_REQUEST['which_month'];
$generate_fee_for_year = $_REQUEST['year'];
$class_id = $_REQUEST['class_id'];
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
// print_r($class_fee);
if(!isset($students) || ($students == "no result")) {
    // echo "Student not assigend to class. Assign student to class here  <br>";
$ok_to_print = 0;
}
else
// print_r($students);

if(!isset($generate_fee) || ($generate_fee == "no result")) {echo "Generate instructions not set. Set generate instructions here <br>";
$ok_to_print = 0;
}
else
// print_r($generate_fee);

if($ok_to_print)
{


$t=time();
//echo($t . "<br>");
$time_now = date("Y-m-d h:i:s",$t);
//2020-09-03 13:21:13

    for($students_count = 0; $students_count< count($students) ;$students_count++)
    {


$student_fee = find_concession($students[$students_count]['gr_no']);
    if(!isset($student_fee) || ($student_fee == "no result")) {
        echo "student has no concession <br>";
//$ok_to_print = 0;
$student_fee = array();
$student_fee[0]['fee_concession_id']=0;
$student_fee[0]['monthly_con'] = 0;
  $student_fee[0]['admission_con'] = 0;
   $student_fee[0]['exam_con'] = 0;
    $student_fee[0]['misc_con'] = 0;
     $student_fee[0]['special_con'] = 0;
      $student_fee[0]['annual_con'] =0;
        $student_fee[0]['sibling_dis'] = 0;
        $student_fee[0]['zakat_adj'] = 0;


}
else
// print_r($student_fee);
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
else {
    $class_fee[0]['monthly_fee'] = 0;
 $student_fee[0]['monthly_con'] = 0;
 
}
echo "<br>";
if(isset($generate_fee) && ($generate_fee[0]['admission']=="yes"))
echo "Admission fee(actual)=".$class_fee[0]['admission_fee']." less concession = ".$student_fee[0]['admission_con']." net=".($admfee =$class_fee[0]['admission_fee']-$student_fee[0]['admission_con']);
else { $class_fee[0]['admission_fee'] = 0;
 $student_fee[0]['admission_con'] = 0;
}
echo "<br>";
if(isset($generate_fee) && ($generate_fee[0]['exam']=="yes"))
echo "Exam fee(actual)=".$class_fee[0]['exam']." less concession = ".$student_fee[0]['exam_con']." net=".($examfee =$class_fee[0]['exam']-$student_fee[0]['exam_con']);
else { $class_fee[0]['exam'] = 0;
 $student_fee[0]['exam_con'] = 0;
}
echo "<br>";
if(isset($generate_fee) && ($generate_fee[0]['mics']=="yes"))
echo "Misc fee(actual)=".$class_fee[0]['misc']." less concession = ".$student_fee[0]['misc_con']." net=".($miscfee =$class_fee[0]['misc']-$student_fee[0]['misc_con']);
else {$class_fee[0]['misc'] = 0;
 $student_fee[0]['misc_con'] = 0;
}
if(isset($generate_fee) && ($generate_fee[0]['other']=="yes"))
echo "Special fee(actual)=".$class_fee[0]['special']." less concession = ".$student_fee[0]['special_con']." net=".($specialfee =$class_fee[0]['special']-$student_fee[0]['special_con']);
else { $class_fee[0]['special'] = 0;
 $student_fee[0]['special_con'] = 0;
      } 
echo "<br>";
echo "<br>";
if(isset($generate_fee) && ($generate_fee[0]['annual']=="yes"))
echo "Annual fee(actual)=".$class_fee[0]['annual']." less concession = ".$student_fee[0]['annual_con']." net=".($annualfee =$class_fee[0]['annual']-$student_fee[0]['annual_con']);
else { $class_fee[0]['annual'] = 0;
$student_fee[0]['annual_con'] =0;
}
echo "<br>";

echo "Sibling discount fee(actual)=".($feesibdisc =$student_fee[0]['sibling_dis']);
echo "<br>";
echo "Zakat adjustment (actual)=".($feeza =$student_fee[0]['zakat_adj']);
echo "<br>";
$fee = $monfee + $admfee +$examfee +$miscfee +$specialfee +$annualfee -$feesibdisc -$feeza ;
echo "Net total fee for month =". $fee;
echo "<br>";
    

$sql = 'INSERT INTO `ac_fee_collection`(`fee_collection_id`, `user_id`, `user_date`, `which_month`, `year`, `class_id`, `class_name`, `section`, `studend_id`, `student_name`, `month_fee`, `month_con`, `admission_fee`, `admission_con`, `exam_fee`, `exam_con`, `misc_fee`, `misc_con`, `other_fee`, `other_con`, `annual_fee`, `annual_con`, `monfee`, `admfee`, `examfee`, `miscfee`, `specialfee`, `annualfee`, `feesibdisc`, `feeza`, `fee`,`concsession_id`,`generate_id`) VALUES (NULL,\'';

$sql .= get_curr_user();

$sql .= '\',\''. $time_now.'\',\''.$generate_fee_for_month.'\', \''.$generate_fee_for_year.'\', \''.$class_id.'\', \''.$class_fee[0]['class_name'].'\', \''.$class_fee[0]['section_name'].'\', \''.$students[$students_count]['gr_no'].'\', \''.$students[$students_count]['name'].'\', \''.$class_fee[0]['monthly_fee'].'\', \''.$student_fee[0]['monthly_con'].'\', \''.$class_fee[0]['admission_fee'].'\', \''.$student_fee[0]['admission_con'].'\', \''.$class_fee[0]['exam'].'\', \''.$student_fee[0]['exam_con'].'\', \''.$class_fee[0]['misc'].'\', \''.$student_fee[0]['misc_con'].'\', \''.$class_fee[0]['special'].'\', \''.$student_fee[0]['special_con'].'\', \''.$class_fee[0]['annual'].'\', \''.$student_fee[0]['annual_con'].'\', \''.$monfee.'\', \''.$admfee.'\', \''.$examfee.'\', \''.$miscfee.'\', \''.$specialfee.'\', \''.$annualfee.'\', \''.$feesibdisc.'\', \''.$feeza.'\', \''.$fee.'\', \''.$student_fee[0]['fee_concession_id'].'\', \''.$generate_fee[0]['generate_fee_class_id'].'\')';

insert_query($sql);


}
}

                                            }
                                            // --------------------------
                                            ///edit code
                                            check_edit("ac_fee_collection","user_date");
                                            edit_display("ac_fee_collection","user_date");
                                            //end of edit code -shift view below delete
                                            // --------------------------
// print_r($_REQUEST);
                                            if(isset($_REQUEST['deleteid'])){ 
                                                $echo_check = $sql = 'DELETE FROM `ac_fee_collection` WHERE `ac_fee_collection`.`user_date` = "'.str_replace("___"," ",$_REQUEST['deleteid']).'"';

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = '
                                            SELECT `user_date` "Run date" ,`which_month`"Which Month", `year`"Of Year", `class_id`"Class ID", `class_name`"Class Name", `section`"Section", count(`class_id`) "Number Of Records Generated" FROM `ac_fee_collection` group by `user_date` ORDER BY `user_date` DESC';
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px">   Generate Fee  For Class  </h4>
                                    <br>
                                        <form action="Accounts-mod-fee-generate-class.php#formadd" method="post" id="submitted">
                                        <div class="form-group">
                                            <label for="">Year</label>
                                            <input type="number" name="year" required=""  class="form-control" id="prVacation" value="<?php if (isset($_REQUEST['date_booking'])) echo $_REQUEST['date_booking']; else echo (date("Y")); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Fee For Month</label>
                                            <select type="text" name="which_month" required="" class="form-control" id=>
                                                <option value="January" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "January" ) echo "selected";  ?> >January</option>
                                                <option value="February" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "February" ) echo "selected";  ?>>February</option>
                                                <option value="March" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "March" ) echo "selected";  ?>>March</option>
                                                <option value="April" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "April" ) echo "selected";  ?>>April</option>
                                                <option value="May" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "May" ) echo "selected";  ?>>May</option>
                                                <option value="June" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "June" ) echo "selected";  ?>>June</option>

                                                <option value="July" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "July" ) echo "selected";  ?>>July</option>
                                                <option value="August" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "August" ) echo "selected";  ?>>August</option>
                                                <option value="September" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "September" ) echo "selected";  ?>>September</option>
                                                <option value="October" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "October" ) echo "selected";  ?>>October</option>
                                                <option value="November" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "November" ) echo "selected";  ?>>November</option>

                                                <option value="December" <?php if (isset($_REQUEST['which_month']) && $_REQUEST['which_month']== "December" ) echo "selected";  ?>>December</option>
                                            </select>
                                        </div>

                                        <?php



                                        dropDownConditional3section("Class", "class_id","class_id","class_name","section","ad_class",Null);
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                            <button type="submit" name="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
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
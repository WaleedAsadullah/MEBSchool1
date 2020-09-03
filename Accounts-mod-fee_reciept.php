<?php
include_once('session_end.php');

include_once("db_functions.php");

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
        	.mainpage{
        		text-align: center;

        	}
        	.halfpage{
        		width:500px;
        		height: 780px;
        		margin: auto;
        		padding: 40px;
                padding-top: 35px;
        		border :2px solid #95B9C7;
        		box-shadow: 0 0 10px rgba(0, 0, 0, .15);
                display: inline-block;
                text-align: left;
        		
        	}
        	body{
        		background-color: white;
        		padding-top: 20px;
        	}
            h4{
                font-family: 'Roboto', sans-serif;
                color:#264a7d;
                text-align: center;
            }
            p{
                font-family: 'Roboto', sans-serif;
                color: rgb(50,50,50);
                font-size: 14px;
            }
            th, td {
                border: 1px solid black;
                border-collapse: collapse;
                width: 70px
            }
            table{
                position: relative;
                top: 155px;
            }
            th{
                padding: 6px;
                color: rgb(50,50,50);
                font-weight: normal;
            }
            .innercontent{
                display: inline-flex;
                margin-top: 50px;
            }
            table>thead>tr>th , table>thead {
                border: none;
            }
            span{
                margin-left:7px
            }
            .footer{
                background-color: rgb(30,30,30);
                border-radius: 50px;
                position: relative;
                top: 20px;
                left: 0px;
                text-align: center;
                padding: 8px 30px 8px;
                margin-top: 8px
            }
        </style>
	</head>


	<body>
        <div class="mainpage">



<?php 

//if(isset($_REQUEST[dateid]))
// search using date
$print_data = query_to_array("SELECT * FROM `ac_fee_collection` where `fee_collection_id` = 22  ");
//print_r($print_data);

// Array ( [0] => Array ( [fee_collection_id] => 1 [user_id] => 2 [user_date] => 2020-09-03 10:57:21 [which_month] => September [year] => 2020 [class_id] => 19 [class_name] => 2 [section] => Girls [studend_id] => 92 [student_name] => Danish Khan [month_fee] => 500 [month_con] => 0 [admission_fee] => 600 [admission_con] => 0 [exam_fee] => 700 [exam_con] => 0 [misc_fee] => 800 [misc_con] => 0 [other_fee] => 900 [other_con] => 0 [annual_fee] => 1000 [annual_con] => 0 [monfee] => 500 [admfee] => 0 [examfee] => 0 [miscfee] => 800 [specialfee] => 900 [annualfee] => 1000 [feesibdisc] => 0 [feeza] => 0 [fee] => 3200 ) [1] => Array ( [fee_collection_id] => 2 [user_id] => 2 [user_date] => 2020-09-03 10:57:21 [which_month] => September [year] => 2020 [class_id] => 19 [class_name] => 2 [section] => Girls [studend_id] => 55 [student_name] => Waleed Asad [month_fee] => 500 [month_con] => 100 [admission_fee] => 600 [admission_con] => 90 [exam_fee] => 700 [exam_con] => 80 [misc_fee] => 800 [misc_con] => 70 [other_fee] => 900 [other_con] => 60 [annual_fee] => 1000 [annual_con] => 50 [monfee] => 400 [admfee] => 0 [examfee] => 0



for($i=0;$i<count($print_data);$i++)
{
$concession_id = $print_data[$i]['concsession_id'] ;
$sno = $print_data[$i]['fee_collection_id'] ;
$which_month = $print_data[$i]['which_month'] ;
$year = $print_data[$i]['year'] ;
$class_name = $print_data[$i]['class_name'] ;
$studend_id = $print_data[$i]['studend_id'] ;
$section = $print_data[$i]['section'] ;
$student_name = $print_data[$i]['student_name'] ;
$month_fee = $print_data[$i]['month_fee'] ;
$month_con = $print_data[$i]['month_con'] ;
$admission_fee = $print_data[$i]['admission_fee'] ;
$admission_con = $print_data[$i]['admission_con'] ;
$exam_fee = $print_data[$i]['exam_fee'] ;
$exam_con = $print_data[$i]['exam_con'] ;
$misc_fee = $print_data[$i]['misc_fee'] ;
$misc_con = $print_data[$i]['misc_con'] ;

$other_fee = $print_data[$i]['other_fee'] ;
$other_con = $print_data[$i]['other_con'] ;

$annual_fee = $print_data[$i]['annual_fee'] ;
$annual_con = $print_data[$i]['annual_con'] ;

$misc_fee = $print_data[$i]['misc_fee'] ;
$misc_con = $print_data[$i]['misc_con'] ;

$monfee = $print_data[$i]['monfee'] ;
$admfee = $print_data[$i]['admfee'] ;

$examfee = $print_data[$i]['examfee'] ;
$miscfee = $print_data[$i]['miscfee'] ;

$specialfee = $print_data[$i]['specialfee'] ;
$annualfee = $print_data[$i]['annualfee'] ;

$feesibdisc = $print_data[$i]['feesibdisc'] ;
$feeza = $print_data[$i]['feeza'] ;

$fee = $print_data[$i]['fee'] ;







 $echo_string_start = '
            <div class="halfpage">
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
                        
$echo_string = '</u></p>
                    </div>
                </div>
                <div class="innercontent">
                    <div style="width: 33%">
                    <div class = "row" >
                        <div class = "col-sm-6" >
                            <p>S.no <span><u>'.$sno.'</u></span></p>
                        </div>
                        <div class = "col-sm-6" >
                            <p>Class : <span><u>'.$class_name.'</u></span></p>
                        </div>
                    </div>
                        <p>G.R No. <span><u>'.$studend_id.'</u></span></p>
                        <p>Name of Student :<span><u>'.$student_name.'</u></span></p>
                        <p>Fee For:<span><u>'.$which_month.'</u></span><span><u>'.$year.'</u></span></p>
                        <hr>
                        <p>Fees for the Month</p>
                        <p>Admission Fee/Re-Admission Fee</p>
                        <p>Exams and Other Activities</p>
                        <p>Misc</p>
                        <p>Other Charges</p>
                        <p>Annual Charges</p>
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
                                    <th>'.$month_fee.'</th>'; if($concession_id) $echo_string .='
                                    <th>'.$month_con.'</th>
   '; $echo_string .='                                 <th>'.$monfee.'</th
                                </tr>
                                <tr>
                                    <th>'.$admission_fee.'</th>'; if($concession_id) $echo_string .='
                                    <th>'.$admission_con.'</th>'; $echo_string .='
                                    <th>'.$admfee.'</th
                                </tr>

                                <tr>
                                    <th>'.$exam_fee.'</th>'; if($concession_id) $echo_string .='
                                    <th>'.$exam_con.'</th>
    '; $echo_string .='                                <th>'.$examfee.'</th
                                </tr>

                                <tr>
                                    <th>'.$misc_fee.'</th>'; if($concession_id) $echo_string .='
                                    <th>'.$misc_con.'</th>
    '; $echo_string .='                                <th>'.$miscfee.'</th
                                </tr>

                                <tr>
                                    <th>'.$other_fee.'</th>'; if($concession_id) $echo_string .='
                                    <th>'.$other_con.'</th>
   '; $echo_string .='                                 <th>'.$specialfee.'</th
                                </tr>

                                <tr>
                                    <th>'.$annual_fee.'</th>'; if($concession_id) $echo_string .='
                                    <th>'.$annual_con.'</th>
  '; $echo_string .='                                  <th>'.$annualfee.'</th>
                                </tr>

                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>'.$fee.'</th>
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
            echo $echo_string_start." Student Copy ".$echo_string ;
            echo $echo_string_start." Bank Copy ".$echo_string ;
            echo $echo_string_start." Admin Copy ".$echo_string ;
            //echo str_replace("", "", $echo_string);
           // echo str_replace("Student Copy", "", $echo_string);
           }
?>
        </div>
	</body>
</html>';

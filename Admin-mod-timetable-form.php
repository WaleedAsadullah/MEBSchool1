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
        <!-- X-editable css -->
        <link type="text/css" href="assets/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>
    <style >
         td,th{text-align: center,}
    </style>
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


            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                             <div class="col-lg-12">
                                <div class="card-box">
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="Admin-mod-timetable-management.php" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >View</button></a>
                                        
                                    </div>
                                </div>
                            </div>

                                    <!-- <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Time table </h4> -->
                                    <br>

                                    <!-- <div class="table-responsive">
                                        <table   id="sample_data"
                                        class="table table-bordered table-striped"
                                        style="width: 100%;"> -->
                                        <?php
                                            // -------------------
                                            //echo "test";
                                            if(isset($_REQUEST['submit'])){

                                            for($i=1;$i<7;$i++){

                                            $day = explode("|", $_REQUEST['day'.$i]);

                                            $day_value = $day[1];
                                            $day = $day[0];

                                            $sql = 'INSERT INTO `ad_timetable`(`time_id`, `user_id`, `user_date`, `class_id`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`, `period7`, `period8`, `period9`, `period10`, `day`, `day_value`, `comments`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['class_id'].'\', \''.$_REQUEST['period1'.$i].'\', \''.$_REQUEST['period2'.$i].'\', \''.$_REQUEST['period3'.$i].'\', \''.$_REQUEST['period4'.$i].'\', \''.$_REQUEST['period5'.$i].'\', \''.$_REQUEST['period6'.$i].'\', \''.$_REQUEST['period7'.$i].'\', \''.$_REQUEST['period8'.$i].'\', \''.$_REQUEST['period9'.$i].'\', \''.$_REQUEST['period10'.$i].'\', \''.$day.'\', \''.$day_value.'\', \''.$_REQUEST['comments'].'\')';
                                            // echo $sql;
                                            insert_query($sql);
                                            }}
                                            // --------------------------
//                                             ///edit code
//                                             check_edit("ad_timetable","time_id");
//                                             edit_display("ad_timetable","time_id");
//                                             //end of edit code -shift view below delete
//                                             // --------------------------

//                                             if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_timetable` WHERE `ad_timetable`.`time_id` = '.$_REQUEST['deleteid'];

//                                             insert_query($sql);
//                                             // echo "done deleting";
//                                                 }
//                                             // $sql = "SELECT * FROM `ac_annual_appraisal`";

//                                             $sql = 'SELECT  `time_id`,`class_id`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`, `period7`, `period8`, `period9`, `period10`, `day`, `day_value`, `comments` FROM `ad_timetable`';
//                                             // display_query($sql);

// function display_query_timetable($sql)
// {

//  $conn = connect_db();
//   $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row

  
// //get_current_form();
                                               
//    $i = 0;                                     
//   while($row = $result->fetch_assoc()) {
//     if($i==0)
//     {
// echo '
//                 <thead>
//                   <tr>
//                     <th>S.No</th>
//                     <th></th>
//                     <th></th>
//                     <th></th>
//                     <th></th>';
// $row_data = array_keys($row);
// $id_column = "";
// for($j=0;$j<count($row_data);$j++){

//   if($j==0) $id_column = $row_data[$j];

//     echo  "<th>".$row_data[$j]."</th>"; }
                                                   
//     echo   '</tr>
//          </thead>
//       <tbody>';



//     }
//   $i++;

  
//     echo '<tr>
//               <td>'.$i.'</td>
//               <td style="text-align:center;"><a style="color:rgb(16,196,105);" href="'.$_SERVER['PHP_SELF'].'?editid='.$row[$id_column].'"><i class="zmdi zmdi-edit"></i></a></td>
            
//               <td style="text-align:center;"><a style="color:rgb(255,87,90);" href="'.$_SERVER['PHP_SELF'].'?deleteid='.str_replace(" ","___",$row[$id_column]).'"><i class="fa fa-trash-o" onclick="return confirm(\'Are you sure?\')"></i></a></td>
//               <td style="text-align:center;"><a style="color:rgb(120,108,150);" href="" ><i  class="zmdi zmdi-local-printshop"></i></a></td>
//               <td style="text-align:center;"><a style="color:rgb(30,108,180);" href="" ><i class="zmdi zmdi-copy"></i></a></td>';


// for($k=0;$k<count($row_data);$k++){ 
//     if(substr($row_data[$k],0,3) == 'per'){
//         $sql_name = 'SELECT `subject_name` FROM `ad_subject` WHERE `subject_id` = '.$row[$row_data[$k]].'';
//         $result_name = mysqli_query($conn,$sql_name);
//         $row_name = mysqli_fetch_assoc($result_name);
//         // echo  '<td>'.$row_name['subject_name'].'</td>'
//         echo '<td data-name="'.$row_data[$k].'" class="'.$row_data[$k].'" data-type="text" data-pk="'.$row[$row_data[0]].'">'.$row_name['subject_name'].'</td>';
//            }
//     else{
//     echo '<td data-name="'.$row_data[$k].'" class="'.$row_data[$k].'" data-type="text" data-pk="'.$row[$row_data[0]].'">'.$row[$row_data[$k]].'</td>';}
// }

//    echo  '</tr>';
//   }

//     echo '   </tbody>';
// } else {
//   echo "0 results";
// }
    

// }
//  $sql = 'SELECT  `time_id`,`class_id`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`, `period7`, `period8`, `period9`, `period10`, `day`, `day_value`, `comments` FROM `ad_timetable`';
// display_query_timetable($sql);

                                            ?>
                                        <!-- </table>
                                    </div> -->
                        </div>   
                    </div>
                </div>
            </div>

            <div class="content-page" id="formadd">
                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Time Table </h4>
                                    <br>
                                    <form action="Admin-mod-timetable-form.php" method="post">

                                        <div class="row">
                                            <div class="col-sm-2">
                                                <?php
                                                dropDownConditional3section("Class and Section", "class_id","class_id","class_name","section","ad_class",Null);
                                                 ?>      
                                            </div>
                                            <div class="col-sm-1 p-t-5 p-b-0">
                                                <br>
                                                <h4 align="center" class="p-t-5 p-b-0" >Period 1</h4>
                                            </div>
                                            <div class="col-sm-1 p-t-5 p-b-0">
                                                <br>
                                                <h4 align="center" class="p-t-5 p-b-0" >Period 2</h4>
                                            </div>
                                            <div class="col-sm-1 p-t-5 p-b-0">
                                                <br>
                                                <h4 align="center" class="p-t-5 p-b-0" >Period 3</h4>
                                            </div>
                                            <div class="col-sm-1 p-t-5 p-b-0">
                                                <br>
                                                <h4 align="center" class="p-t-5 p-b-0" >Period 4</h4>
                                            </div>
                                            <div class="col-sm-1 p-t-5 p-b-0">
                                                <br>
                                                <h4 align="center" class="p-t-5 p-b-0" >Period 5</h4>
                                            </div>
                                            <div class="col-sm-1 p-t-5 p-b-0">
                                                <br>
                                                <h4 align="center" class="p-t-5 p-b-0" >Period 6</h4>
                                            </div>
                                            <div class="col-sm-1 p-t-5 p-b-0">
                                                <br>
                                                <h4 align="center" class="p-t-5 p-b-0" >Period 7</h4>
                                            </div>
                                            <div class="col-sm-1 p-t-5 p-b-0">
                                                <br>
                                                <h4 align="center" class="p-t-5 p-b-0" >Period 8</h4>
                                            </div>
                                            <div class="col-sm-1 p-t-5 p-b-0">
                                                <br>
                                                <h4 align="center" class="p-t-5 p-b-0" >Period 9</h4>
                                            </div>
                                            <div class="col-sm-1 p-t-5 p-b-0">
                                                <br>
                                                <h4 align="center" class="p-t-5 p-b-0" >Period 10</h4>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <br>
                                                    <h4 align="center" class="p-b-5" ><b>Monday</b></h4>
                                                    <input type="hidden" name="day1" value="Monday|1">
                                                    <!-- <shiddent name="day" required="" class="form-control select2" >
                                                        <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Monday" ) echo "selected";  ?>  value="Monday|1">Monday</option>

                                                        <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Tuesday" ) echo "selected";  ?>  value="Tuesday|2">Tuesday</option>

                                                        <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Wednesday" ) echo "selected";  ?>  value="Wednesday|3">Wednesday</option>

                                                        <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Thursday" ) echo "selected";  ?>  value="Thursday|4">Thursday</option>
                                                        <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Friday" ) echo "selected";  ?>  value="Friday|5">Friday</option>

                                                        <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Saturday" ) echo "selected";  ?>  value="Saturday|6">Saturday</option>
                                                    </select> -->
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period11","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period21","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period31","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period41","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period51","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period61","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period71","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period81","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period91","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period101","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                    <h4 align="center" class="p-b-5" ><b>Tuesday</b></h4>
                                                    <input type="hidden" name="day2" value="Tuesday|2">
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period12","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period22","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period32","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period42","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period52","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period62","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period72","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period82","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period92","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period102","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                    <h4 align="center" class="p-b-5" ><b>Wednesday</b></h4>
                                                    <input type="hidden" name="day3" value="Wednesday|3">
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period13","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period23","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period33","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period43","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period53","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period63","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period73","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period83","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period93","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period103","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                    <h4 align="center" class="p-b-5" ><b>Thursday</b></h4>
                                                    <input type="hidden" name="day4" value="Thursday|4">
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period14","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period24","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period34","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period44","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period54","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period64","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period74","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period84","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period94","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period104","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                    <h4 align="center" class="p-b-5" ><b>Friday</b></h4>
                                                    <input type="hidden" name="day5" value="Friday|5">
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period15","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period25","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period35","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period45","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period55","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period65","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period75","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period85","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period95","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period105","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                    <h4 align="center" class="p-b-5" ><b>Saturday</b></h4>
                                                    <input type="hidden" name="day6" value="Saturday|6">
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period16","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period26","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period36","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period46","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period56","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period66","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period76","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period86","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period96","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            <div class="col-sm-1">
                                                <?php
                                                dropDownConditional2WithoutId("","period106","subject_id","subject_name","ad_subject",NULL);
                                                ?>
                                            </div>
                                            
                                        </div>

                                        



                                        
                                        <div class="form-group">
                                            <label for="lcDateOfBirthW">Comment</label>
                                            <textarea type="textarea" name="comments" row = "2"placeholder="Enter Comments...." 
                                            class="form-control select2" 
                                            ><?php if(isset($_REQUEST['comments'])) echo $_REQUEST['comments']?></textarea>
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

        <!-- Editable js -->
        <script src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
        <script src="assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
        <script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>
        <!-- init -->
        <script src="assets/pages/datatables.editable.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        
        <?php include_once('script.php') ?>
</body>
</html>

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


        <!-- X-editable css -->
        <link type="text/css" href="assets/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">

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

        <script src="assets/js/modernizr.min.js"></script>
    <style >
         td,th{text-align: center}
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
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" >
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Time table </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table  class="table table-striped m-b-0">
                                                                                        <?php
                                            // -------------------
                                            //echo "test";
                                            if(isset($_REQUEST['submit'])){

                                            $day = explode("|", $_REQUEST['day']);

                                            $day_value = $day[1];
                                            $day = $day[0];

                                            $sql = 'INSERT INTO `ad_timetable`(`time_id`, `user_id`, `user_date`, `class_id`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`, `period7`, `period8`, `period9`, `period10`, `period11`, `period12`, `period13`, `period14`, `period15`, `period16`, `period17`, `period18`, `period19`, `period20`, `day`, `day_value`, `comments`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['class_id'].'\', \''.$_REQUEST['period1'].'\', \''.$_REQUEST['period2'].'\', \''.$_REQUEST['period3'].'\', \''.$_REQUEST['period4'].'\', \''.$_REQUEST['period5'].'\', \''.$_REQUEST['period6'].'\', \''.$_REQUEST['period7'].'\', \''.$_REQUEST['period8'].'\', \''.$_REQUEST['period9'].'\', \''.$_REQUEST['period10'].'\', \''.$_REQUEST['period11'].'\', \''.$_REQUEST['period12'].'\', \''.$_REQUEST['period13'].'\', \''.$_REQUEST['period14'].'\', \''.$_REQUEST['period15'].'\', \''.$_REQUEST['period16'].'\', \''.$_REQUEST['period17'].'\', \''.$_REQUEST['period18'].'\', \''.$_REQUEST['period19'].'\', \''.$_REQUEST['period20'].'\', \''.$day.'\', \''.$day_value.'\', \''.$_REQUEST['comments'].'\')';
                                            // echo $sql;
                                            insert_query($sql);
                                            }
                                            // --------------------------
                                            ///edit code
                                            check_edit("ad_timetable","time_id");
                                            edit_display("ad_timetable","time_id");
                                            //end of edit code -shift view below delete
                                            // --------------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_timetable` WHERE `ad_timetable`.`time_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `time_id`, `user_id`, `user_date`, `class_id`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`, `period7`, `period8`, `period9`, `period10`, `period11`, `period12`, `period13`, `period14`, `period15`, `period16`, `period17`, `period18`, `period19`, `period20`, `day`, `day_value`, `comments` FROM `ad_timetable`';
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
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" >
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Time table </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table  class="table table-striped m-b-0">
                                            <thead>
                                            <tr>
                                                <th>Class | Time</th>
                                                <th>8:00-8:45</th>
                                                <th>8:45-9:30</th>
                                                <th>9:30-10:15</th>
                                                <th>10:15-11:00</th>
                                                <th>11:00-11:45</th>
                                                <th>11:45-12:45</th>
                                                <th>12:45-1:30</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Class 1</td>
                                                    <td>Maths<br>(Sir xyz)</td>
                                                    <td>Science<br>(Sir xyz)</td>
                                                    <td>English<br>(Sir xyz)</td>
                                                    <td>Break<br>(Sir xyz)</td>
                                                    <td>Islamiat<br>(Sir xyz)</td>
                                                    <td>Urdu<br>(Sir xyz)</td>
                                                    <td>Pst<br>(Sir xyz)</td>

                                                </tr>
                                                <tr>
                                                    <td>Class 2</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>

                                                </tr>
                                                <tr>
                                                    <td>Class 3</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                <tr>
                                                    <td>Class 4</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>
                                                <tr>
                                                    <td>Class 5</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 6</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 7</td>
                                                    <td >Maths<br>(Sir Aslam)</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 7</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 8</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 9</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 10</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
            <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Time Table </h4>
                                    <br>
                                    <form action="Admin-mod-timetable-management.php" method="post">


                                        <?php
                                        dropDownConditional3section("Class and Section", "class_id","class_id","class_name","section","ad_class",Null);

                                         ?>

                                        <div class="form-group">
                                            <label for="">Day</label>
                                            <select name="day" required="" class="form-control select2" >
                                                <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Monday" ) echo "selected";  ?>  value="Monday|1">Monday</option>

                                                <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Tuesday" ) echo "selected";  ?>  value="Tuesday|2">Tuesday</option>

                                                <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Wednesday" ) echo "selected";  ?>  value="Wednesday|3">Wednesday</option>

                                                <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Thursday" ) echo "selected";  ?>  value="Thursday|4">Thursday</option>
                                                <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Friday" ) echo "selected";  ?>  value="Friday|5">Friday</option>

                                                <option <?php if (isset($_REQUEST['day']) && $_REQUEST['day']== "Saturday" ) echo "selected";  ?>  value="Saturday|6">Saturday</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 1","period1","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div>
                                            <div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 2","period2","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div>
                                            <div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 3","period3","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div>
                                            <div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 4","period4","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div>
                                            <div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 5","period5","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div>
                                            <div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 6","period6","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 7","period7","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 8","period8","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 9","period9","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 10","period10","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 11","period11","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 12","period12","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 13","period13","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 14","period14","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 15","period15","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 16","period16","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 17","period17","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 18","period18","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 19","period19","subject_id","subject_name","ad_subject",NULL);
                                        ?>
                                            </div><div class="col-sm-2">
                                        <?php

                                        dropDownConditional2WithoutId("Period 20","period20","subject_id","subject_name","ad_subject",NULL);
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

        <script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script>

        <?php include_once('script.php') ?>
</body>
</html>

<!-- SELECT `time_id`, a.`user_id`, a.`user_date`, a.`class_id`,b.`class_name`,b.`section`, a.`teacher`,c.name, a.`subject`,d.`subject_name`, `timing`, `comments` FROM `ad_timetable`a,`ad_class`b,`ad_teacher_records`c,`ad_subject`d  WHERE a.`class_id` = b.`class_id`AND a.`teacher` = c.`Teacher_records_id` AND a.`subject` = d.`subject_id` -->
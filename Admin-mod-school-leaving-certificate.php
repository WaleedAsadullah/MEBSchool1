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
    </head>
    <body class="fixed-left">
        <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php");
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Admin-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->

            <!-- content -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                     <div style="text-align: center" >
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light m-b-5"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light m-b-5" > Export </button></a>
                                    </div>
                                </div>
                            </div>
                            <!-- form -->
                                <div class="col-lg-12">
                                    <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> School Leaving Certificate</h4>
                                    <br>
                                    

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ----------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                            // print_r($_REQUEST);
                                            
                                            $sql = 'INSERT INTO `ad_school_leaving_certificate` (`school_leaving_certificate_id`, `user_id`, `user_date`, `name`, `surname`, `place_birth`, `date_of_birth`, `birth_word`, `last_school`, `date_of_admission`, `progress`, `conduct`, `leaving_date`, `class_studing`, `since`, `reason`, `remarks`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['name'].'\', \''.$_REQUEST['surname'].'\', \''.$_REQUEST['place_birth'].'\', \''.$_REQUEST['date_of_birth'].'\', \''.$_REQUEST['birth_word'].'\', \''.$_REQUEST['last_school'].'\', \''.$_REQUEST['date_of_admission'].'\', \''.$_REQUEST['progress'].'\', \''.$_REQUEST['conduct'].'\', \''.$_REQUEST['leaving_date'].'\', \''.$_REQUEST['class_studing'].'\', \''.$_REQUEST['since'].'\', \''.$_REQUEST['reason'].'\', \''.$_REQUEST['remarks'].'\')';
                                            // echo $sql;

                                            insert_query($sql);
                                            }
                                            // ----------------

                                            ///edit code
                                            check_edit("ad_school_leaving_certificate","school_leaving_certificate_id");
                                            edit_display("ad_school_leaving_certificate","school_leaving_certificate_id");
                                            //end of edit code -shift view below delete

                                            // ----------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_school_leaving_certificate` WHERE `ad_school_leaving_certificate`.`school_leaving_certificate_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `school_leaving_certificate_id` "ID", `name`"Name", `surname`"Surname", `place_birth`"Place of Birth", `date_of_birth`"Date of Birth", `birth_word` "Date of Birth (in words)", `last_school`"Last school attended", `date_of_admission`"Date of Admission", `progress`"Progress in studies", `conduct`"Conduct", `leaving_date`"Date of leaving school", `class_studing`"Class in which studying", `since`"and since when", `reason`"Reason of leaving school", `remarks`"Remarks" FROM `ad_school_leaving_certificate`';
                                            display_query($sql);

                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- form end -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- table -->
             <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> School Leaving Certificate Form </h4>
                                    <br><form action="Admin-mod-school-leaving-certificate.php#formadd" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Student ID","gr_num2","addmission_id","name_of_student","ad_admission",NULL);
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                            
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>

<?php
if(isset($_REQUEST['gr_num2']) || isset($_REQUEST['submit'])){
    $conn = connect_db();
    $sql_s = 'SELECT `addmission_id`,`user_time`, `class`, `name_of_student`, `father_name`, `surname`, `date_of_birth`, `place_of_birth`, `date_of_birth_words`, `last_school_class` FROM `ad_admission` WHERE `addmission_id` = '.$_REQUEST['gr_num2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['addmission_id'];
    $value_date = $row['user_time'];
    $value_class = $row['class'];
    $value_name =  $row['name_of_student'];
    $value_fname =  $row['father_name'];
    $value_date_of_birth =  $row['date_of_birth'];
    $value_surname =  $row['surname'];
    $value_place_of_birth =  $row['place_of_birth'];
    $value_last_school_class =  $row['last_school_class'];
    $value_bitrh_words = $row['date_of_birth_words'];
}
?>

                                    <form action="Admin-mod-school-leaving-certificate.php" method="post" >

                                        <div class="form-group">
                                            <label for="lcName">1. Name of the pupil in full</label>
                                            <input type="text" name="name" required placeholder="Enter name of the pupil in full" class="form-control"
                                           <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_name.'" readonly' ; else {if(isset($_REQUEST['name'])) echo'value="'.$_REQUEST['name'].'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="father'sname">2. Race and caste with surname</label>
                                            <input type="text" name="surname" required
                                                   placeholder="Enter race and caste with surname" class="form-control" id="adfathersname" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_surname.'"' ; else {if(isset($_REQUEST['surname'])) echo'value="'.$_REQUEST['surname'].'" readonly';} ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="lcPlaceOfBirth">3. Place of birth</label>
                                            <input id="lcPlaceOfBirth" type="text" name="place_birth" placeholder="Enter place of birth"
                                                   class="form-control"  <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_place_of_birth.'" readonly' ; else {if(isset($_REQUEST['place_birth'])) echo'value="'.$_REQUEST['place_birth'].'" readonly';} ?>>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lcDateOfBirthF">4. Date of birth (in figures)</label>
                                                    <input type="date" name="date_of_birth" required  placeholder="Enter date of birth" class="form-control" id="lcDateOfBirthF"
                                                    <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_date_of_birth.'" readonly' ; else {if(isset($_REQUEST['date_of_birth'])) echo'value="'.$_REQUEST['date_of_birth'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lcDateOfBirthW">Date of birth (in words)</label>
                                                    <input type="text" required name="birth_word" placeholder="Enter in words" class="form-control" id="lcDateOfBirthW"<?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_bitrh_words.'" readonly' ; else {if(isset($_REQUEST['birth_word'])) echo'value="'.$_REQUEST['birth_word'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="lcLastSchool">5.Last school attended</label>
                                            <input  type="text" required name="last_school" placeholder="Enter last school attended " class="form-control" id="lcLastSchool" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_last_school_class.'" ' ; else {if(isset($_REQUEST['last_school'])) echo'value="'.$_REQUEST['last_school'].'" ';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="lcDAteAdmission">6. Date of Admission</label>
                                            <input type="date" name="date_of_admission" required placeholder="Enter date of admission" class="form-control" id="lcDAteAdmission" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_date.'" readonly' ; else {if(isset($_REQUEST['date_of_admission'])) echo'value="'.$_REQUEST['date_of_admission'].'" readonly';} ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="lcLastSchool">7.progress in studies</label>
                                            <input  type="text" name="progress" placeholder="Enter progress in studies" class="form-control" id="lcLastSchool" value="<?php if(isset($_REQUEST['progress'])) echo $_REQUEST['progress']  ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="lcConduct">8. Conduct</label>
                                            <input  type="text" name="conduct" placeholder="Enter conduct" class="form-control" id="lcConduct" value="<?php if(isset($_REQUEST['conduct'])) echo $_REQUEST['conduct'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="lcDateOfLeaving">9. Date of leaving school</label>
                                            <input  type="date" name="leaving_date" required placeholder="Enter date of leaving school" class="form-control" id="lcConduct"   value="<?php if (isset($_REQUEST['leaving_date'])) echo $_REQUEST['leaving_date']; else echo (date("Y-m-d")); ?>">
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lcClassInWhich">10. Class in which studying</label>
                                                    <input type="text" name="class_studing" required placeholder="Enter class in which studying" class="form-control" id="lcClassInWhich" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_class.'" readonly' ; else {if(isset($_REQUEST['class_studing'])) echo'value="'.$_REQUEST['class_studing'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lcWhen">and since when</label>
                                                    <input type="text" name="since" required placeholder="Enter since when" class="form-control" id="lcWhen"
                                                           value="<?php if(isset($_REQUEST['since'])) echo $_REQUEST['since'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="lcReason">11. Reason of leaving school</label>
                                            <input  type="text" name="reason" required placeholder="Enter reason of leaving school" class="form-control" id="lcReason" value="<?php if(isset($_REQUEST['reason'])) echo $_REQUEST['reason'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="lcRemarks">12. Remarks</label>
                                            <textarea id="lcRemarks" name="remarks" class="form-control" rows="2" placeholder="Enter remarks ...."><?php if(isset($_REQUEST['remarks'])) echo $_REQUEST['remarks'] ?></textarea>
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
                            </div><!-- end col -->
                        </div>

                    </div>
                </div>
            <!-- table end -->

            <!-- content end -->

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

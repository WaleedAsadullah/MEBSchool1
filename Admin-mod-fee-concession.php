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
<body class="smallscreen fixed-left-void">
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fee Concession</h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ------------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                                // print_r($_REQUEST);
                                                $sql = 'INSERT INTO `ad_fee_concession`(`fee_concession_id`, `user_id`, `user_date`, `student_id`,`student_name`, `monthly_con`, `admission_con`, `exam_con`, `misc_con`, `special_con`, `annual_con`, `sibling_dis`, `zakat_adj`, `from_zakat_account_id`, `comment`) VALUES (NULL,\'';
                                                $sql .= get_curr_user();
                                                $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['student_id'].'\', \''.$_REQUEST['student_name'].'\', \''.$_REQUEST['monthly_con'].'\', \''.$_REQUEST['admission_con'].'\', \''.$_REQUEST['exam_con'].'\', \''.$_REQUEST['misc_con'].'\', \''.$_REQUEST['special_con'].'\', \''.$_REQUEST['annual_con'].'\', \''.$_REQUEST['sibling_dis'].'\', \''.$_REQUEST['zakat_adj'].'\', \''.$_REQUEST['from_zakat_account_id'].'\', \''.$_REQUEST['comment'].'\')';
                                                // echo $sql;
                                                insert_query($sql);
                                            }

                                            // ------------------------

                                            ///edit code
                                            check_edit("ad_fee_concession","fee_concession_id");
                                            edit_display("ad_fee_concession","fee_concession_id");
                                            //end of edit code -shift view below delete

                                            // ------------------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_fee_concession` WHERE `ad_fee_concession`.`fee_concession_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `fee_concession_id`"ID", `student_id`"Student ID",`student_name`"Student Name", `monthly_con`"Monthy Concession", `admission_con`"Admission Concession", `exam_con`"Exams and Other Activities Concession", `misc_con`"Mics Concession", `special_con`"Other Charges Concession", `annual_con`"Annual Concession", `sibling_dis`"Sibling Discount", `zakat_adj`"Zakat Adjustment", `from_zakat_account_id`"Zakat Account ID", `comment`"comments" FROM `ad_fee_concession` order by `fee_concession_id` DESC';
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
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fee Concession </h4>
                                    <br>
                                        <form action="Admin-mod-fee-concession.php#formadd" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Student ID","gr_no2","addmission_id","name_of_student","ad_admission",NULL);
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <p class="text-muted">Can't Find Student? <a href="Admin-mod-admission-management.php" class="text-primary m-l-5"><b> Add a Student Here</b></a></p>
                                        </div>
                                    </div>

<?php
if(isset($_REQUEST['gr_no2']) || isset($_REQUEST['student_id'])){
    $conn = connect_db();

    if(isset($_REQUEST['gr_no2'])){
        $gr_no2 = $_REQUEST['gr_no2'];
    }else {
        $gr_no2 = $_REQUEST['student_id'];
    }

    $sql_s = 'SELECT `ad_admission`.`memon`"cast",`ad_admission`.`which_memon`"which_cast",`ad_admission`.`addmission_id`"ID",`ad_admission`.`name_of_student`"name",`ad_assign_student_class`.`assign_class`"assign_class",`ad_class`.`class_name`,`ad_class`.`section` FROM `ad_admission`, `ad_assign_student_class`,`ad_class` WHERE `ad_assign_student_class`.`gr_no` ='.$gr_no2.' AND `ad_admission`.`addmission_id` = '.$gr_no2.' AND `ad_class`.`class_id` = `ad_assign_student_class`.`assign_class` ' ;
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    
    // echo $row['assign_class'];
    $value_id = $row['ID'];
    $value_name =  $row['name'];
    $value_class =  $row['class_name'];
    $value_cast =  $row['cast'];
    $value_which_cast =  $row['which_cast'];

    $sql = 'SELECT `class_fee_id`,`monthly_fee`, `admission_fee`, `exam`, `misc`, `special`, `annual`, `class_id` FROM `ad_class_fee` WHERE `class_id` = '.$row['assign_class'].'' ;
    $result2 = mysqli_query($conn,$sql);
    $row2 = mysqli_fetch_assoc($result2);

    

    $value_month = $row2['monthly_fee'];
    $value_admission =  $row2['admission_fee'];
    $value_exam =  $row2['exam'];
    $value_muisc =  $row2['misc'];
    $value_special =  $row2['special'];
    $value_annual =  $row2['annual'];
}
?>
                            <div class="row">
                                <form>
                                <div class="col-sm-6" style="padding-top: 380px ">
                                    <div class="form-group">
                                            <label for="">Monthly Fee</label>
                                            <input type="number" name="monthly_fee" required="" placeholder="Enter monthly fee" class="form-control" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_month.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_month.'" readonly';} ?>>
                                        </div>
                                    
                               
                                        <div class="form-group">
                                            <label for="">Admission Fee</label>
                                            <input type="number" name="admission_fee" required="" placeholder="Enter admission fee" class="form-control" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_admission.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_month.'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Exams and Other Activities</label>
                                            <input type="number" name="exam" placeholder="Enter exams and other activities charges" class="form-control" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_exam.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_month.'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Mics</label>
                                            <input type="number" name="misc" placeholder="Enter  mics charges" class="form-control" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_muisc.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_month.'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Other Charges</label>
                                            <input type="number" name="special" placeholder="Enter  other charges" class="form-control" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_special.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_month.'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Annual</label>
                                            <input type="number" name="annual" placeholder="Enter  annual charges" class="form-control" <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_annual.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_month.'" readonly';} ?>>
                                        </div>
                                </div>
                                </form>
                                <div class="col-sm-6" >
                                    <form action="Admin-mod-fee-concession.php" method="post">

                                        <div class="form-group">
                                            <label for="">Student ID</label>
                                            <input type="text" name="student_id" placeholder="Enter student id" class="form-control"
                                        <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_id.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$_REQUEST['student_id'].'" readonly';} ?>>
                                        </div>



                                        <div class="form-group">
                                            <label for="">Student Name</label>
                                            <input type="text" name="student_name" placeholder="Enter student name" class="form-control"
                                        <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_name.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_name.'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Memon</label>
                                            <input type="text" name="cast" placeholder="Yes or No" class="form-control"
                                        <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_cast.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_cast.'" readonly';} ?>>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Cast</label>
                                            <input type="text" name="which_cast" placeholder="Enter cast" class="form-control"
                                        <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_which_cast.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_which_cast.'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Class</label>
                                            <input type="text" name="class_name" placeholder="Enter class " class="form-control"
                                        <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_class.'" readonly' ;else { if(isset($_REQUEST['student_id']))echo'value="'.$value_class.'" readonly';} ?>>
                                        </div>


                                        <div class="form-group">
                                            <label for="">Monthly Fee Concession</label>
                                            <input type="number" name="monthly_con" required="" placeholder="Enter monthly fee concession" class="form-control" value="<?php if(isset($_REQUEST['monthly_con'])) echo $_REQUEST['monthly_con']?>">
                                        </div>
                                    
                               
                                        <div class="form-group">
                                            <label for="">Admission Fee Concession</label>
                                            <input type="number" name="admission_con" required="" placeholder="Enter admission fee concession" class="form-control" value="<?php if(isset($_REQUEST['admission_con'])) echo $_REQUEST['admission_con']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Exams and Other Activities Concession</label>
                                            <input type="number" name="exam_con" placeholder="Enter exams and other activities charges concession" class="form-control" value="<?php if(isset($_REQUEST['exam_con'])) echo $_REQUEST['exam_con']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Mics Concession</label>
                                            <input type="number" name="misc_con" placeholder="Enter  mics charges concession" class="form-control" value="<?php if(isset($_REQUEST['misc_con'])) echo $_REQUEST['misc_con']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Other Charges Concession</label>
                                            <input type="number" name="special_con" placeholder="Enter  other charges concession" class="form-control" value="<?php if(isset($_REQUEST['special_con'])) echo $_REQUEST['special_con']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Annual Concession</label>
                                            <input type="number" name="annual_con" placeholder="Enter  annual charges concession" class="form-control" value="<?php if(isset($_REQUEST['annual_con'])) echo $_REQUEST['annual_con']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Sibling Discount</label>
                                            <input type="number" name="sibling_dis" placeholder="Enter  sibling discount" class="form-control" value="<?php if(isset($_REQUEST['sibling_dis'])) echo $_REQUEST['sibling_dis']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Zakat Adjustment</label>
                                            <input type="number" name="zakat_adj" placeholder="Enter  zakat adjustment" class="form-control" value="<?php if(isset($_REQUEST['zakat_adj'])) echo $_REQUEST['zakat_adj']?>">
                                        </div>



                                        <?php 

                                        dropDownConditionalUnsumit("From Zakat Account","from_zakat_account_id","doner_id","doner_name","doner_zakat",Null);



                                        ?>


                                    

                                        <div class="form-group">
                                            <label for="">Comments</label>
                                            <input type="text" name="comment" placeholder="Enter comments ....."  class="form-control"  value="<?php if(isset($_REQUEST['comment'])) echo $_REQUEST['comment']?>">
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
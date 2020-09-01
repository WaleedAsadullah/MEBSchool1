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

        <style>
            th,td{
                text-align: center;
            }
        </style>
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
                            <div class="col-lg-12">
                                <div class="card-box">
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Class Fee </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ------------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                                // print_r($_REQUEST);
                                                $sql = 'INSERT INTO `ad_class_fee`(`class_fee_id`, `user_id`, `user_date`, `monthly_fee`, `admission_fee`, `exam`, `misc`, `special`, `annual`, `class_id`, `class_name`, `date_of_setting`, `section_name`, `comment`) VALUES (NULL,\'';
                                                $sql .= get_curr_user();
                                                $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['monthly_fee'].'\', \''.$_REQUEST['admission_fee'].'\', \''.$_REQUEST['exam'].'\', \''.$_REQUEST['misc'].'\', \''.$_REQUEST['special'].'\', \''.$_REQUEST['annual'].'\', \''.$_REQUEST['class_id'].'\', \''.$_REQUEST['class_name'].'\', \''.$_REQUEST['date_of_setting'].'\', \''.$_REQUEST['section_name'].'\', \''.$_REQUEST['comment'].'\')';
                                                // echo $sql;
                                                insert_query($sql);
                                            }

                                            // ------------------------

                                            ///edit code
                                            check_edit("ad_class_fee","class_fee_id");
                                            edit_display("ad_class_fee","class_fee_id");
                                            //end of edit code -shift view below delete

                                            // ------------------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_class_fee` WHERE `ad_class_fee`.`class_fee_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `class_fee_id`"ID", `monthly_fee`"Monthly Fee", `admission_fee`"Admission Fee", `exam` "Exams and Other Activities", `misc`"Mics", `special`"Other Charges", `annual`"Annual Charges", `class_id`"Class ID", `class_name`"Class Name", `date_of_setting`"Date of Setting", `section_name`"Section Name", `comment` FROM `ad_class_fee` order by `class_fee_id` DESC';
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
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Class Fee </h4>
                                    <br>
                                        <form action="Admin-mod-class-fee.php#formadd" method="post" id="submitted">
                                        <?php
                                        dropDownConditional3section("Class", "class_id2","class_id","class_name","section","ad_class",Null);
                                        ?>
                                        
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <p class="text-muted">Can't Find Class? <a href="Admin-mod-class.php" class="text-primary m-l-5"><b> Add a Class Here</b></a></p>
                                        </div>
                                    </div>
<?php
if(isset($_REQUEST['class_id2'])){
    $conn = connect_db();
    $sql_s = 'SELECT `class_id`, `class_name`, `section` FROM `ad_class` WHERE `class_id` = '.$_REQUEST['class_id2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['class_id'];
    $value_name =  $row['class_name'];
    $value_section =  $row['section'];
}
?>
                                    <form action="Admin-mod-class-fee.php" method="post">

                                        <div class="form-group">
                                            <label for="">Class ID</label>
                                            <input type="number" name="class_id" placeholder="Enter class id" class="form-control"
                                        <?php if(isset($_REQUEST['class_id2']))echo 'value="'.$value_id.'" readonly' ;else { if(isset($_REQUEST['class_id']))echo'value="'.$_REQUEST['class_id'].'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Class Name</label>
                                            <input type="text" name="class_name" placeholder="Enter class name" class="form-control"
                                        <?php if(isset($_REQUEST['class_id2']))echo 'value="'.$value_name.'" readonly' ;else { if(isset($_REQUEST['class_name']))echo'value="'.$_REQUEST['class_name'].'" readonly';} ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Section</label>
                                            <input type="text" name="section_name" placeholder="Enter section" class="form-control"
                                        <?php if(isset($_REQUEST['class_id2']))echo 'value="'.$value_section.'" readonly' ;else { if(isset($_REQUEST['section']))echo'value="'.$_REQUEST['section'].'" readonly';} ?>>
                                        </div>


                                        <div class="form-group">
                                            <label for="">Monthly Fee</label>
                                            <input type="number" name="monthly_fee" required="" placeholder="Enter monthly fee" class="form-control" value="<?php if(isset($_REQUEST['name'])) echo $_REQUEST['name']?>">
                                        </div>
                                    
                               
                                        <div class="form-group">
                                            <label for="">Admission Fee</label>
                                            <input type="number" name="admission_fee" required="" placeholder="Enter admission fee" class="form-control" value="<?php if(isset($_REQUEST['number'])) echo $_REQUEST['number']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Exams and Other Activities</label>
                                            <input type="number" name="exam" placeholder="Enter exams and other activities charges" class="form-control" value="<?php if(isset($_REQUEST['email'])) echo $_REQUEST['email']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Mics</label>
                                            <input type="text" name="misc" placeholder="Enter  mics charges" class="form-control" value="<?php if(isset($_REQUEST['address'])) echo $_REQUEST['address']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Other Charges</label>
                                            <input type="number" name="special" placeholder="Enter  other charges" class="form-control" value="<?php if(isset($_REQUEST['address'])) echo $_REQUEST['address']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Annual</label>
                                            <input type="number" name="annual" placeholder="Enter  annual charges" class="form-control" value="<?php if(isset($_REQUEST['address'])) echo $_REQUEST['address']?>">
                                        </div>



                                        <div class="form-group">
                                            <label for="">Date of Setting</label>
                                            <input type="date" name="date_of_setting" required=""  class="form-control"  value="<?php if (isset($_REQUEST['date'])) echo $_REQUEST['date']; else echo (date("Y-m-d")); ?>">
                                        </div>


                                    

                                        <div class="form-group">
                                            <label for="">Comments</label>
                                            <input type="text" name="comment" placeholder="Enter comments ....."  class="form-control"  value="<?php if(isset($_REQUEST['comments'])) echo $_REQUEST['comments']?>">
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
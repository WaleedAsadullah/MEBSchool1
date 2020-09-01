<?php
include_once('session_end.php');
?>
<!DOCTYPE html>
<htm>
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
    <!-- table -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
<?php
$con = connect_db();

echo '
            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Choose File</h4>
                        </div>
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info btn w-md waves-effect waves-light" name="import"> Import </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';

if(isset($_POST["import"]) ){
        
$filename=$_FILES["file"]["tmp_name"];    
 if($_FILES["file"]["size"] > 0)
 {
    $file = fopen($filename, "r");
    
      while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
       {
         $sql = 'INSERT INTO `ad_course_planning` (`course_planning_id`, `user_id`, `user_date`, `class`, `subject`, `date`, `title`, `details`) VALUES (NULL,\'';
        $sql .= get_curr_user();
        $sql .= '\', CURRENT_TIMESTAMP,"'.$getData[0].'","'.$getData[1].'","'.$getData[2].'","'.$getData[3].'","'.$getData[4].'")';
        $result = mysqli_query($con, $sql);

    // if(!isset($result))
    // {
    //   echo "<script type=\"text/javascript\">
    //       alert(\"Invalid File:Please Upload CSV File.\");
    //       </script>";    
    // }
    // else {
    //     echo "<script type=\"text/javascript\">
    //     alert(\"CSV File has been successfully Imported.\");
    //   </script>";
    // }
       }
  
       fclose($file);  
 }
}
?>
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="#formadd" > <button  type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                        <a><button type="button" class="btn btn-purple btn w-md waves-effect waves-light"  data-toggle="modal" data-target="#con-close-modal" > Import </button></a>
                                    </div>
                                </div>
                            </div>
                            <!-- form -->
                                <div class="col-lg-12">
                                    <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> Course planning </h4>
                                    <br>

                                    
                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // -------------------
                                            //echo "test";
                                            if(isset($_REQUEST['submit'])){
                                            //print_r($_REQUEST);
                                            $sql = 'INSERT INTO `ad_course_planning` (`course_planning_id`, `user_id`, `user_date`, `class`, `subject`, `date`, `title`, `details`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['class'].'\', \''.$_REQUEST['subject'].'\', \''.$_REQUEST['date'].'\', \''.$_REQUEST['title'].'\', \''.$_REQUEST['details'].'\')';
                                            // echo $sql;
                                            insert_query($sql);
                                            }
                                            // --------------------------
                                            ///edit code
                                            check_edit("ad_course_planning","course_planning_id");
                                            edit_display("ad_course_planning","course_planning_id");
                                            //end of edit code -shift view below delete
                                            // --------------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_course_planning` WHERE `ad_course_planning`.`course_planning_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `course_planning_id`"ID", `class`"Class", `subject`"Subject", `date`"Date", `title`"Title", `details`"Details" FROM `ad_course_planning`';
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
    <!-- table end -->


            <!-- table -->
             <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;">Course planning</h4>
                                    <form action="Admin-mod-course-planning.php" method="post">

                                        <div class="form-group">
                                            <label for="cpClass">Class</label>
                                            <input type="text" name="class" required placeholder="Enter class" class="form-control" id="cpClass"
                                            value="<?php if(isset($_REQUEST['class'])) echo $_REQUEST['class']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="cpSubject">Subject</label>
                                            <input type="text" name="subject" required
                                                   placeholder="Enter subject" class="form-control" id="cpSubject"
                                                   value="<?php if(isset($_REQUEST['subject'])) echo $_REQUEST['subject']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="cpDate">Date</label>
                                            <input id="cpDate" type="date" name="date" placeholder="Enter date" required
                                                   class="form-control"
                                                   value="<?php if (isset($_REQUEST['date'])) echo $_REQUEST['date']; else echo (date("Y-m-d")); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="cpTitle">Title</label>
                                            <input type="text" name="title" 
                                                   placeholder="Enter title" class="form-control" id="cpTitle"
                                                   value="<?php if(isset($_REQUEST['title'])) echo $_REQUEST['title']?>">
                                        </div>
                                          
                                        <div class="form-group">
                                            <label for="lcDateOfBirthW">Details</label>
                                            <textarea type="textarea" name="details" row = "2"placeholder="Enter details" 
                                            class="form-control" id="lcDateOfBirthW"
                                            ><?php if(isset($_REQUEST['details'])) echo $_REQUEST['details']?></textarea>
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
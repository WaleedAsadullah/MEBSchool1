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
        <!-- form Uploads -->
        <link href="assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
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
                            include_once("teacher-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->


        <!-- content -->
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Home Work</h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                    <?php
if(isset($_FILES['file'])){

print_r($_FILES);

///file upload code
if((isset($_FILES['file']['name']) && $_FILES['file']['name'] == "")){}
else { 
$target_dir = "assets/home_work/".rand(10,1000000)."_";
$target_file = $target_dir. basename($_FILES["file"]["name"]);

// $target_file = trim(basename(stripslashes($target_file)), ".\x00..\x20");

$target_file = str_replace(" ","",$target_file);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["file"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// // Check file size
// if ($_FILES["file"]["size"] > 2000000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    $uploadedok = true;
  } else {
     $uploadedok = false;
  }
$_REQUEST['file'] = $target_file ;
}
}



                                            if(isset($_REQUEST['submit'])){

                                                // if($uploadedok) {
                                            // print_r($_REQUEST);
                                            $sql = 'INSERT INTO `th_home_work`(`th_home_work_id`, `user_id`, `user_date`, `class`, `subject`, `date`, `work`, `file`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['class'].'\', \''.$_REQUEST['subject'].'\', \''.$_REQUEST['date'].'\', \''.$_REQUEST['work'].'\', \''.$_REQUEST['file'].'\')';
                                            // echo $sql;
                                            insert_query($sql);
                                                }

                                            // ---------------

                                            ///edit code
                                            check_edit("th_home_work","th_home_work_id");
                                            edit_display("th_home_work","th_home_work_id");
                                            //end of edit code -shift view below delete

                                            // ---------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `th_home_work` WHERE `th_home_work`.`th_home_work_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `th_home_work_id`"ID", `class`"Class", `subject`"Subject", `date`"Date", `work`"Home Work" , `file`"File" FROM `th_home_work`';
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Home Work </h4>
                                    <br>
                                    <form action="Teacher-mod-homework.php#formadd" method="post" id="submitted" >
                                        <?php
                                        dropDownConditional("Class","class","assign_class","ad_teacher_assign","WHERE `teacher_id` = ".$_SESSION['id']." ORDER BY `ad_teacher_assign`.`assign_class` ASC");
                                        echo'<div class="form-group text-right m-b-0">
                                            <button type="submit" name="submit2" class="btn btn-default waves-effect waves-light m-l-5">
                                            Submit
                                            </button>
                                        </div>
                                    </form>';

                                        if (isset($_REQUEST['class'])){
                                            $class_set = $_REQUEST['class'];
                                        dropDownSimple("Subject","subject","assign_subject","ad_teacher_assign","WHERE `assign_class` = ".$_REQUEST['class']." AND `teacher_id` = ".$_SESSION['id']." ORDER BY `ad_teacher_assign`.`assign_subject` ASC");
                                        }
                                        ?>
                                    
                                    <form action="teacher-mod-homework.php" method="post" enctype="multipart/form-data">

                                        

                                        <input type="hidden" name="class" value="<?php  ?>">
                               
                                        
                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Date</label>
                                            <input type="date" name="date" required="" placeholder="Enter link" class="form-control"  value="<?php if (isset($_REQUEST['date'])) echo $_REQUEST['date']; else echo (date("Y-m-d")); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Home work</label>
                                            <input type="text" name="work"  placeholder="Enter home work" class="form-control" value="<?php if(isset($_REQUEST['work'])) echo $_REQUEST['work']?>">
                                        </div>
                                        <div class="col-md-12">
                                            <div style="align-content: center;">
                                                <h4 class="header-title m-t-0 m-b-30">File</h4>
                                                <!--  -->
                                                <input id="file" name="file" type="file" class="dropify" data-max-file-size="10M" />
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group text-right m-t-0">
                                            <br>
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

        <script>
            $("#sci").click(function(){
            $("#scinone").toggleClass("ol1n");
            })
            $("#maths").click(function(){
            $("#mathsnone").toggleClass("ol1n");
            })
            $("#eng").click(function(){
            $("#engnone").toggleClass("ol1n");
            })
        </script>
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
            <!-- file assets home_work/js -->
        <script src="assets/plugins/fileuploads/js/dropify.min.js"></script>
        <script type="text/javascript">
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                },
                error: {
                    'fileSize': 'The file size is too big (1M max).'
                }
            });
        </script>
        <?php include_once('script.php') ?>
</body>
</html>






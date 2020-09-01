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
                <!-- form Uploads -->
        <link href="assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />

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
<body class="fixed-left-void">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php")
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Superadmin-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                     <div style="text-align: center" >
                                         <a  href="admin-mod-student-addmission-form.php" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light m-b-5"  >+ Addmission</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light m-b-5" > Export </button></a>
                                    </div>
                                </div>
                            </div>

                            <!-- input form -->


                            <!-- input form -->
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> Addmission Sheet </h4>
                                    <br>

                                    <div class="table-responsive">
                                         <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered " id="adadmissiontable">
                                            <?php
                                            // -------------------------
                                            // echo "test";
  if(isset($_FILES['logo'])){

print_r($_FILES);

///file upload code
$target_dir = "logo/".rand(10,1000000)."_";
$target_file = $target_dir. basename($_FILES["logo"]["name"]);

// $target_file = trim(basename(stripslashes($target_file)), ".\x00..\x20");

$target_file = str_replace(" ","",$target_file);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["logo"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["logo"]["size"] > 2000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
    // echo "The file ". basename( $_FILES["logo"]["name"]). " has been uploaded.";
    $uploadedok = true;
  } else {
     $uploadedok = false;
    echo "Sorry, there was an error uploading your file.";
  }
}
$_REQUEST['logo'] = $target_file ;
}



                                            if(isset($_REQUEST['submit'])){

if( $uploadedok) {
//////
    
                                            // print_r($_REQUEST);

                                            $sql = 'INSERT INTO `sa_logo_and_name`(`logo_and_name_id`, `user_id`, `user_date`, `logo`, `name`) VALUES (NULL,\'';
                                            $sql .= get_current_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['logo']. '\', \''.$_REQUEST['name']. '\')';
                                            // echo $sql;
                                            insert_query($sql);
                                        }

                                    }
                                    // else echo "Image filee did not uplaod properly. Try again";
                                            // -------------------------
                                            ///edit code
                                            check_edit("sa_logo_and_name","logo_and_name_id");
                                            edit_display("sa_logo_and_name","logo_and_name_id");
                                            //end of edit code -shift view below delete

                                            // --------------------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `sa_logo_and_name` WHERE `sa_logo_and_name`.`logo_and_name_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }

                                            $sql = 'SELECT `logo_and_name_id`,`logo`, `name` FROM `sa_logo_and_name`';
                                            display_query($sql);
                                            // ------------------------------
                                            ?>
                                  
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                            
                </div>
            </div>


            <!--  -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Admission Form </h4>
                                    
                                    <?php

                                        
                                    ?>
                                    <form action="Superadmin-mod-logo-and-name.php" method="post" enctype="multipart/form-data" >

                                        <div class="row ">
                                            <div class="col-md-8" style="padding-top: 6%;">
                                                <div class="row" >
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                            <label for="nameofthestudent">Name of School</label>
                                                            <input type="text" name="name" required
                                                            placeholder="Enter name" class="form-control" id="adnameofthestudent"
                                                            value="<?php if (isset($_REQUEST['name'])) echo $_REQUEST['name'];  ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div style="align-content: center;">
                                                    <h4 class="header-title m-t-0 m-b-30">Max File size</h4>
                                                    <?php if (isset($_REQUEST['logo'])) echo "<img class = 'img1' style = 'height:190px ;' src=".$_REQUEST['logo'].">";  ?>
                                                    <input id="logo" name="logo" type="file" class="dropify" data-max-file-size="10M" required="" />
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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
            </div>
            <!--  -->

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


        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <!-- for checking form -->
            <!-- file uploads js -->
        <script src="assets/plugins/fileuploads/js/dropify.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

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

</body>
</html>
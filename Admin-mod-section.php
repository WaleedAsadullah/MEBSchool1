<?php include_once('session_end.php'); ?>
<!DOCTYPE html>
<html>
<head>

        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.png">

          <?php //include_once("title.php") ?>

        <!-- Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">
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
                            include_once('db_functions.php')
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Admin-mod-sidemenu.php");

                    ?>

                    <!-- Sidebar -->





            <div class="content-page" >
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                     <div style="text-align: center" >
                                        <div class="row" >
                                            <div class="col-sm-4" ></div>
                                            <div class="col-sm-2">
                                                <a href="#formadd">
                                                    <button type="button" class="btn btn-primary btn w-md waves-effect waves-light m-b-5" style="margin-left: 33%" >+  Add
                                                    </button>
                                                </a>
                                            </div>
                                             <div class="col-sm-2" >
                                                <form action="export.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                                    <input type="hidden" name="Export" value="SELECT `section_id`, `section_name`,`location` FROM `ad_section` order by `section_id` desc">
                                                    <input type="hidden" name="title" value="ID|Section Name|Location">
                                                    <input type="hidden" name="name_file" value="section">
                                                    <input type="hidden" name="link" value="Admin-mod-section.php">
                                                    <a> 
                                                        <button type="submit" name="export" value="CSV Export" class="btn btn-info btn w-md waves-effect waves-light" style="margin-right: 33%" >CSV Export </button>
                                                    </a>
                                                </form>
                                            </div>
                                            <div class="col-sm-4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Sections </h4>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ---------------
                                            if (isset($_REQUEST['submit'])) {
                                            $sql = 'INSERT INTO `ad_section`(`section_id`,`location`, `section_name`, `comment`) VALUES (NULL,\''.$_REQUEST['location'].'\',\''.$_REQUEST['section_name'].'\', \''.$_REQUEST['comment'].'\')';
                                            insert_query($sql);
                                                }
                                            // -------------------

                                            ///edit codes
                                            check_edit("ad_section","section_id");
                                            edit_display("ad_section","section_id");
                                            //end of edit code -shift view below delete

                                            // -------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_section` WHERE `ad_section`.`section_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `section_id`"ID" , `section_name` "Section Name",`location`"Location", `comment` "Comments" FROM `ad_section` order by `section_id` desc';
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
                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Section </h4>

                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


                                            <div class="form-group">
                                                <label for="prID">Section Name</label>
                                                <input type="text" name="section_name" required="" placeholder="Enter class names" class="form-control" id="prID" value="<?php if(isset($_REQUEST['section_name'])) echo $_REQUEST['section_name'] ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label for="prID">Location</label>
                                                <input type="text" name="location" required="" placeholder="Enter Location" class="form-control" id="prID" value="<?php if(isset($_REQUEST['location'])) echo $_REQUEST['location'] ?>" >
                                            </div>
                                        
                                   
                                            <div class="form-group">
                                                <label for="prName">Comments</label>
                                                <input type="text" name="comment" placeholder="Enter comment ..... " class="form-control" id="prName" value="<?php if(isset($_REQUEST['comment'])) echo $_REQUEST['comment'] ?>" >
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
            <!-- Form end -->


                <!-- footer -->
                <?php 
                    include_once("footer.php")
                ?>
                   


                               
    </div>

       
        <?php //include_once('script.php') ?>
</body>
</html>
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

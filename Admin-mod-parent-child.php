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
                  <!--Chartist Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/chartist/dist/chartist.min.css">

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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Parent Child </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable2" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ------------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                                // print_r($_REQUEST);
                                                $sql = 'INSERT INTO `ad_parent_child`(`parent_child_id`, `user_id`, `user_date`, `parent_name`, `child_id`, `child_name`, `relationship`, `update_date`) VALUES (NULL,\'';
                                                $sql .= get_curr_user();
                                                $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['parent_name'].'\', \''.$_REQUEST['child_id'].'\', \''.$_REQUEST['child_name'].'\', \''.$_REQUEST['relationship'].'\', \''.$_REQUEST['update_date'].'\')';
                                                // echo $sql;
                                                insert_query($sql);
                                            }

                                            // ------------------------

                                            ///edit code
                                            check_edit("ad_parent_child","parent_child_id");
                                            edit_display("ad_parent_child","parent_child_id");
                                            //end of edit code -shift view below delete

                                            // ------------------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_parent_child` WHERE `ad_parent_child`.`parent_child_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `parent_child_id`"ID", `parent_name`"Parent Name", `child_id`"Child ID", `child_name`"Child Name", `relationship`"Relationship", `update_date`"Update Date" FROM `ad_parent_child`';
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Parent Child</h4>
                                    <br>
                                    <form action="Admin-mod-parent-child.php#formadd" method="post">
                                        <?php
                                        dropDownConditional2("Child ID","child_id2","addmission_id","name_of_student","ad_admission",NULL);
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
if(isset($_REQUEST['child_id2'])){
    $conn = connect_db();
    $sql_s = 'SELECT `addmission_id`,`name_of_student`,`father_name` FROM `ad_admission` WHERE `addmission_id` = '.$_REQUEST['child_id2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);
    $value_name =  $row['name_of_student'];
    $value_id = $row['addmission_id'];
    $value_fname =  $row['father_name'];
}
?>
                                    <form action="Admin-mod-parent-child.php"method="post">
                                     
                                        <div class="form-group">
                                            <label for="">Parent Name</label>
                                            <input type="text" name="parent_name" required="" placeholder="Enter parent name" class="form-control"  <?php if(isset($_REQUEST['child_id2']))echo 'value="'.$value_fname.'" readonly' ;else{ if(isset($_REQUEST['parent_name'])) echo 'value="'.$_REQUEST['parent_name'].'" readonly';} ?>>
                                        </div>
                                    
                               
                                        <div class="form-group">
                                            <label for="hbAddress">Child ID</label>
                                            <input type="text" name="child_id" required="" placeholder="Enter child id" class="form-control" id="prName" <?php if(isset($_REQUEST['child_id2']))echo 'value="'.$value_id.'" readonly' ;else{ if(isset($_REQUEST['child_id'])) echo 'value="'.$_REQUEST['child_id'].'" readonly';} ?>>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-group">Child Name</label>
                                            <input type="text" name="child_name" required="" placeholder="Enter child name" class="form-control"  <?php if(isset($_REQUEST['child_id2']))echo 'value="'.$value_name.'" readonly' ;else{ if(isset($_REQUEST['child_name'])) echo 'value="'.$_REQUEST['child_name'].'" readonly';} ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Relationship</label>
                                            <select type="text" name="relationship" required="" class="form-control" id="zarelationship">
                                                <option value="Son" <?php if(isset($_REQUEST['relationship']) && $_REQUEST['relationship'] == 'Son') echo "selected" ?>>Son</option>
                                                <option value="Daughter" <?php if (isset($_REQUEST['relationship']) && $_REQUEST['relationship']== "Daughter" ) echo "selected";  ?>>Daughter</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="hbRentAmount">Update Date</label>
                                            <input type="date" name="update_date" required="" placeholder="Enter update date....." class="form-control" value="<?php if (isset($_REQUEST['update_date'])) echo $_REQUEST['update_date']; else echo (date("Y-m-d")); ?>">
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
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable2').dataTable();
                $('#datatable2-keytable').DataTable( { keys: true } );
                $('#datatable2-responsive').DataTable();
                $('#datatable2-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatabl2e-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();

        </script>
                <!--Chartist Chart-->
        <script src="assets/plugins/chartist/dist/chartist.min.js"></script>
        <script src="assets/plugins/chartist/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="assets/pages/jquery.chartist.init.js"></script>
        <?php include_once('script.php') ?>
</body>
</html>
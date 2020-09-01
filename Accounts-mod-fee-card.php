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
</head>
<body class="smallscreen fixed-left-void">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php");
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Accounts-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->

            <!-- fee card -->

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

                            <!-- input form -->


                            <!-- input form -->
                                <div class="col-lg-12">
                                    <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fees Card Table</h4>
                                    <div class="table-responsive">
                                        <table id="datatable2" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php

                                            // ----------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit3'])){
                                            // print_r($_REQUEST);
                                            $sql3 = 'INSERT INTO `ac_fee_card` (`fee_card_id`, `user_id`, `user_date`, `from_year`, `till_year`, `name`, `father_name`, `class`, `section`, `address`, `phone`, `cell`) VALUES (NULL,\'';
                                            $sql3 .= get_curr_user();
                                            $sql3 .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['from_year'].'\', \''.$_REQUEST['till_year'].'\', \''.$_REQUEST['name'].'\', \''.$_REQUEST['father_name'].'\', \''.$_REQUEST['class'].'\', \''.$_REQUEST['section'].'\', \''.$_REQUEST['address'].'\', \''.$_REQUEST['phone'].'\', \''.$_REQUEST['cell'].'\')';
                                            // echo $sql;
                                            insert_query($sql3);
                                            }


                                            // ----------------

                                            ///edit code
                                            check_edit("ac_fee_card","fee_card_id");
                                            edit_display("ac_fee_card","fee_card_id");
                                            //end of edit code -shift view below delete

                                            // ----------------


                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_fee_card` WHERE `ac_fee_card`.`fee_card_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `fee_card_id`"ID", `from_year`"From year", `till_year`"Till year", `name`"Student\'s Name", `father_name`"Father\'s Name", `class`"Class", `section`"Section", `address`"Address", `phone`"Phone", `cell`"Cell" FROM `ac_fee_card';
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


             <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fee card Form </h4>
                                    <br>
                                    <form action="Accounts-mod-fee-card.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">From year </label>
                                                    <input type="number" name="from_year" required="" placeholder="Enter start year" class="form-control" id="feSno" value="<?php if(isset($_REQUEST['from_year'])) echo $_REQUEST['from_year']?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feRollNo">Till year </label>
                                                    <input type="number" name="till_year" required="" placeholder="Enter till valid year" class="form-control" id="feRollNo" value="<?php if(isset($_REQUEST['till_year'])) echo $_REQUEST['till_year']?>">
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feNameOfStudent">Student's Name</label>
                                                    <input id="feNameOfStudent" name="name" type="text" placeholder="Enter name of student" required="" class="form-control"  value="<?php if(isset($_REQUEST['name'])) echo $_REQUEST['name']?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">  
                                                <div class="form-group">
                                                    <label for="feClass">Father's Name</label>
                                                    <input id="feClass" name="father_name" type="text" placeholder="Enter name of father" class="form-control" value="<?php if(isset($_REQUEST['father_name'])) echo $_REQUEST['father_name']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">Class </label>
                                                    <input type="text" name="class" required="" placeholder="Enter class" class="form-control" id="feSno" value="<?php if(isset($_REQUEST['class'])) echo $_REQUEST['class']?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feRollNo">Section</label>
                                                    <input type="text" name="section" placeholder="Enter section" class="form-control"   value="<?php if(isset($_REQUEST['section'])) echo $_REQUEST['section']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="feClass">Address</label>
                                            <input id="feClass" type="text" name="address" placeholder="Enter address" class="form-control"  value="<?php if(isset($_REQUEST['address'])) echo $_REQUEST['address']?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feNameOfStudent">Phone No.</label>
                                                    <input id="feNameOfStudent" name="phone" type="tel" placeholder="Enter phone number"  class="form-control" value="<?php if(isset($_REQUEST['phone'])) echo $_REQUEST['phone']?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">  
                                                <div class="form-group">
                                                    <label for="feClass">Cell</label>
                                                    <input id="feClass" name="cell" type="tel" placeholder="Enter cell number" class="form-control" value="<?php if(isset($_REQUEST['cell'])) echo $_REQUEST['cell']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-right m-b-0 m-t-10">
                                            <?php 
                                            code_submit3();
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
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- isotope filter plugin -->
        <script type="text/javascript" src="assets/plugins/isotope/dist/isotope.pkgd.min.js"></script>

        <!-- Magnific popup -->
        <script type="text/javascript" src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>

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
        <?php include_once('script.php') ?>



</body>
</html>
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
                            include_once("Accounts-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->

    <!-- table discounted fee -->
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> Brother/Sister Discount ON Fee Table </h4>
                                    <div class="table-responsive">
                                        <table class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered" id="adadmissiontable">
                                            <?php
                                            if (isset($_REQUEST['submit'])){
                                            // ---------------
                                             $sql2 = 'INSERT INTO `ac_bro_sis_discount` (`bro_sis_discount_id`, `user_id`, `user_date`, `gr_num_1`, `gr_num_2`, `discounted_fee_2`, `gr_num_3`, `discounted_fee_3`, `gr_num_4`, `discounted_fee_4`, `gr_num_5`, `discounted_fee_5`, `school_1`, `school_2`, `school_3`, `school_4`, `school_5`)VALUES (NULL,\'';
                                                $sql2 .= get_curr_user();
                                                $sql2 .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['gr_num_1'].'\', \''.$_REQUEST['gr_num_2'].'\', \''.$_REQUEST['discounted_fee_2'].'\', \''.$_REQUEST['gr_num_3'].'\', \''.$_REQUEST['discounted_fee_3'].'\', \''.$_REQUEST['gr_num_4'].'\', \''.$_REQUEST['discounted_fee_4'].'\', \''.$_REQUEST['gr_num_5'].'\', \''.$_REQUEST['discounted_fee_5'].'\', \''.$_REQUEST['school_1'].'\', \''.$_REQUEST['school_2'].'\', \''.$_REQUEST['school_3'].'\', \''.$_REQUEST['school_4'].'\', \''.$_REQUEST['school_5'].'\')';
                                                // echo $sql;
                                                insert_query($sql2);
                                                }
                                            // -------------------

                                            ///edit code
                                            check_edit("ac_bro_sis_discount","bro_sis_discount_id");
                                            edit_display("ac_bro_sis_discount","bro_sis_discount_id");
                                            //end of edit code -shift view below delete

                                            // -------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_bro_sis_discount` WHERE `ac_bro_sis_discount`.`bro_sis_discount_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `bro_sis_discount_id`, `user_id`, `user_date`, `gr_num_1`, `gr_num_2`, `discounted_fee_2`, `gr_num_3`, `discounted_fee_3`, `gr_num_4`, `discounted_fee_4`, `gr_num_5`, `discounted_fee_5`, `school_1`, `school_2`, `school_3`, `school_4`, `school_5`FROM ac_bro_sis_discount ';
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
        
    <!-- table discounted fee end -->


    <!-- table -->
             <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> Brother/Sister Discount ON Fee </h4>
                                    <hr>


                                    <form action="Accounts-mod-fee-discount.php" method="post">

                                        <div class="row">
                                            <div class="col-lg-2"><h4 class="header-title" style="text-align: center; font-size: 50px; padding: 10px; font-weight: 300 ; margin-top: 70px"> 1 </h4></div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                     <div class="form-group">
                                                        <label for="deNAmeTop">Name of the student of the top class</label>
                                                        <input type="text" name="name1" required placeholder="" class="form-control"
                                                         value="<?php if(isset($_REQUEST['name1'])) echo $_REQUEST['name1']?>">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">Class</label>
                                                                <input type="text" name="class1" required placeholder="" class="form-control" value="<?php if(isset($_REQUEST['class1'])) echo $_REQUEST['class1']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">School</label>
                                                                <input type="text" name="school_1" required="" placeholder="" class="form-control" value="<?php if(isset($_REQUEST['school_1'])) echo $_REQUEST['school_1']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">GR #</label>
                                                                <input type="text" name="gr_num_1" required="" placeholder="" class="form-control" id="lcnName" value="<?php if(isset($_REQUEST['gr_num_1'])) echo $_REQUEST['gr_num_1']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4"> <div class="form-group">
                                                            <label for="lcName">Full Fee</label>
                                                            <input type="text" name="fee1" required="" class="form-control" id="lcnName"value="<?php if(isset($_REQUEST['fee1'])) echo $_REQUEST['fee1']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                        
                                        <div class="row">
                                            <div class="col-lg-2"><h4 class="header-title" style="text-align: center; font-size: 50px; padding: 10px; font-weight: 300 ; margin-top: 70px"> 2 </h4></div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                     <div class="form-group">
                                                        <label for="lcName">Name of the student</label>
                                                        <input type="text" name="name2" required placeholder="" class="form-control"
                                                        value="<?php if(isset($_REQUEST['name2'])) echo $_REQUEST['name2']?>">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">Class</label>
                                                                <input type="text" name="class2" required
                                                                       placeholder="" class="form-control" value="<?php if(isset($_REQUEST['class2'])) echo $_REQUEST['class2']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">School</label>
                                                                <input type="text" name="school_2" parsley-trigger="change" required
                                                                       placeholder="" class="form-control" value="<?php if(isset($_REQUEST['school_2'])) echo $_REQUEST['school_2']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">GR #</label>
                                                                <input type="text" name="gr_num_2" required
                                                                       placeholder="" class="form-control" value="<?php if(isset($_REQUEST['gr_num_2'])) echo $_REQUEST['gr_num_2']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4"> 
                                                            <div class="form-group">
                                                            <label for="lcName">Full Fee</label>
                                                            <input type="text" name="fee2" parsley-trigger="change" required
                                                                   placeholder="" class="form-control" value="<?php if(isset($_REQUEST['fee2'])) echo $_REQUEST['fee2']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                            <label for="lcName">Discounted Fee</label>
                                                            <input type="text" name="discounted_fee_2" required
                                                                   placeholder="" class="form-control"value="<?php if(isset($_REQUEST['discounted_fee_2'])) echo $_REQUEST['discounted_fee_2']?>">
                                                           </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                    <hr>
                                    <div class="row">
                                            <div class="col-lg-2"><h4 class="header-title" style="text-align: center; font-size: 50px; padding: 10px; font-weight: 300 ; margin-top: 70px"> 3 </h4></div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                     <div class="form-group">
                                                        <label for="lcName">Name of the student</label>
                                                        <input type="text" name="name3" parsley-trigger="change" required
                                                               placeholder="" class="form-control"value="<?php if(isset($_REQUEST['name3'])) echo $_REQUEST['name3']?>">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">Class</label>
                                                                <input type="text" name="class3" required
                                                                       placeholder="" class="form-control"value="<?php if(isset($_REQUEST['class3'])) echo $_REQUEST['class3']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">School</label>
                                                                <input type="text" name="school_3" required
                                                                       placeholder="" class="form-control" value="<?php if(isset($_REQUEST['school_3'])) echo $_REQUEST['school_3']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">GR #</label>
                                                                <input type="text" name="gr_num_3"  required
                                                                       placeholder="" class="form-control"
                                                                       value="<?php if(isset($_REQUEST['gr_num_3'])) echo $_REQUEST['gr_num_3']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                            <label for="lcName">Full Fee</label>
                                                            <input type="text" name="fee3" required placeholder="" class="form-control" value="<?php if(isset($_REQUEST['fee3'])) echo $_REQUEST['fee3']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                            <label for="lcName">Discounted Fee</label>
                                                            <input type="text" name="discounted_fee_3" required placeholder="" class="form-control" value="<?php if(isset($_REQUEST['discounted_fee_3'])) echo $_REQUEST['discounted_fee_3']?>" >

                                                           </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                            <div class="col-lg-2"><h4 class="header-title" style="text-align: center; font-size: 50px; padding: 10px; font-weight: 300 ; margin-top: 70px"> 4 </h4></div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                     <div class="form-group">
                                                        <label for="lcName">Name of the student</label>
                                                        <input type="text" name="name4" parsley-trigger="change" required
                                                               placeholder="" class="form-control"value="<?php if(isset($_REQUEST['name4'])) echo $_REQUEST['name4']?>">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">Class</label>
                                                                <input type="text" name="class4"  required placeholder="" class="form-control" value="<?php if(isset($_REQUEST['class4'])) echo $_REQUEST['class4']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">School</label>
                                                                <input type="text" name="school_4" required
                                                                       placeholder="" class="form-control" value="<?php if(isset($_REQUEST['school_4'])) echo $_REQUEST['school_4']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">GR #</label>
                                                                <input type="text" name="gr_num_4" parsley-trigger="change" required
                                                                       placeholder="" class="form-control" value="<?php if(isset($_REQUEST['gr_num_4'])) echo $_REQUEST['gr_num_4']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">Full Fee</label>
                                                                <input type="text" name="fee4" required placeholder="" class="form-control" value="<?php if(isset($_REQUEST['fee4'])) echo $_REQUEST['fee4']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                            <label for="lcName">Discounted Fee</label>
                                                            <input type="text" name="discounted_fee_4"required placeholder="" class="form-control" value="<?php if(isset($_REQUEST['discounted_fee_4'])) echo $_REQUEST['discounted_fee_4']?>">
                                                           </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <hr>
                                    <div class="row">
                                            <div class="col-lg-2"><h4 class="header-title" style="text-align: center; font-size: 50px; padding: 10px; font-weight: 300 ; margin-top: 70px"> 5 </h4></div>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                     <div class="form-group">
                                                        <label for="lcName">Name of the student</label>
                                                        <input type="text" name="name5" required placeholder="" class="form-control"
                                                        value="<?php if(isset($_REQUEST['name5'])) echo $_REQUEST['name5']?>">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">Class</label>
                                                                <input type="text" name="class5" required placeholder="" class="form-control"value="<?php if(isset($_REQUEST['class5'])) echo $_REQUEST['class5']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">School</label>
                                                                <input type="text" name="school_5" required placeholder="" class="form-control" value="<?php if(isset($_REQUEST['school_5'])) echo $_REQUEST['school_5']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">GR #</label>
                                                                <input type="text" name="gr_num_5" required placeholder="" class="form-control" value="<?php if(isset($_REQUEST['gr_num_5'])) echo $_REQUEST['gr_num_5']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lcName">Full Fee</label>
                                                                <input type="text" name="fee5" required placeholder="" class="form-control" value="<?php if(isset($_REQUEST['fee5'])) echo $_REQUEST['fee5']?>" >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <label for="lcName">Dsicounted Fee</label>
                                                                <input type="text" name="discounted_fee_5" required placeholder="" class="form-control" value="<?php if(isset($_REQUEST['discounted_fee_5'])) echo $_REQUEST['discounted_fee_5']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
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
            <!-- table end -->
    
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
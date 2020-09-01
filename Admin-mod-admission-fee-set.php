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

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fees Table</h4>

                                    <div class="table-responsive">
                                        <!-- tablesaw table m-b-0 tablesaw-columntoggle table-bordered -->
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // -------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                            // print_r($_REQUEST);
                                            $sql = 'INSERT INTO `ad_student_fee`(`student_fee_id`, `user_id`, `user_date`, `admitted_class`, `admission_fee`, `activities_fee`, `tution_fee`, `total`, `gr_no`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['admitted_class'].'\', \''.$_REQUEST['admission_fee'].'\', \''.$_REQUEST['activities_fee'].'\', \''.$_REQUEST['tution_fee'].'\', \''.$_REQUEST['total'].'\', \''.$_REQUEST['gr_no'].'\')';
                                                // echo $sql;
                                            insert_query($sql);
                                                }
                                            //----------------------

                                            ///edit code
                                            check_edit("ad_student_fee","student_fee_id");
                                            edit_display("ad_student_fee","student_fee_id");
                                            //end of edit code -shift view below delete

                                            // ---------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ad_student_fee` WHERE `ad_student_fee`.`student_fee_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `student_fee_id`"ID",`gr_no`"Gr No.", `admitted_class`"Admitted Class", `admission_fee`"Admission Fee", `activities_fee`"Activities Fee", `tution_fee`"Tution Fee", `total`"Total" FROM `ad_student_fee`';
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> For Office Use Only </h4>
                                    <form action="Admin-mod-admission-fee-set.php#formadd" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Student ID","gr_no2","addmission_id","name_of_student","ad_admission",NULL);
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                                
                                                <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                    Submit
                                                </button>
                                            </div>
                                    </form>

<?php
if(isset($_REQUEST['gr_no2'])){
    $conn = connect_db();
    $sql_s = 'SELECT `addmission_id`,`name_of_student`,`father_name`,`class`,`surname`, `guardian_name`, `cnic_guradian`, `occupation_of_father`,`address` FROM `ad_admission` WHERE `addmission_id` = '.$_REQUEST['gr_no2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['addmission_id'];
    $value_name =  $row['name_of_student'];
    $value_class =  $row['class'];
}
?>

                                    <form action="Admin-mod-admission-fee-set.php" >

                                        <div class="form-group">
                                            <label for="adAdmittedClass">Admitted Class</label>
                                            <input type="text" name="admitted_class" required
                                                   placeholder="Enter admitted class" class="form-control" id="adAdmittedClass"  <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_class.'" ' ;else { if(isset($_REQUEST['admitted_class'])) echo'value="'.$_REQUEST['admitted_class'].'" ';} ?>>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="adAdmissionFeeRs">Admission Fee Rs</label>
                                                    <input type="number" name="admission_fee" required
                                                           placeholder="Enter admission fee" class="form-control" id="adAdmissionFeeRs"  value="<?php if(isset($_REQUEST['admission_fee'])) echo $_REQUEST['admission_fee']?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="adRNo">GR No.</label>
                                                    <input id="adRNo" name="gr_no" type="text" placeholder="Enter r no." required
                                                           class="form-control"  <?php if(isset($_REQUEST['gr_no2']))echo 'value="'.$value_id.'" readonly' ;else { if(isset($_REQUEST['gr_no'])) echo'value="'.$_REQUEST['gr_no'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="adExamFee">Activities & Examination Fee Rs.</label>
                                            <input  type="number" name="activities_fee" required class="form-control" id="adExamFee" placeholder=" Enter activities & examination fee"  value="<?php if(isset($_REQUEST['activities_fee'])) echo $_REQUEST['activities_fee']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="adTutionFee">Tution Fee Rs.</label>
                                            <input  type="number" required name="tution_fee"
                                                           placeholder="Enter activities & xamination fee" class="form-control" id="adTutionFee"  value="<?php if(isset($_REQUEST['tution_fee'])) echo $_REQUEST['tution_fee']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="adTotalFee">Total Rs.</label>
                                            <input  type="number" required name="total" 
                                                           placeholder="Enter activities & xamination fee" class="form-control" id="adTotalFee"  value="<?php if(isset($_REQUEST['total'])) echo $_REQUEST['total']?>">
                                        </div>
                                        <br>
                                        <label><strong>Document Submitted</strong></label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="checkbox checkbox-info">
                                                    <input id="adBirthCertificate" type="checkbox">
                                                    <label for="adBirthCertificate">1. Birth Certificate</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="checkbox checkbox-info">
                                                    <input id="adPhotographs" type="checkbox">
                                                    <label for="adPhotographs">2. Six Passport Size Photographs of Student (in school uniform)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="checkbox checkbox-info">
                                                    <input id="adTC" type="checkbox">
                                                    <label for="adTC">3. School Leaving Certificate</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="checkbox checkbox-info">
                                                    <input id="adCnicCopy" type="checkbox">
                                                    <label for="adCnicCopy">4. CNIC Photo Copy of Parents</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkbox checkbox-info">
                                            <input id="adNadra" type="checkbox">
                                            <label for="adNadra">5. NADRA Regisration Certificate</label>
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
                <!-- for office use only -->
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
        <!-- print -->
            <script>
            function myPrint(addFrmPrint) {
                var printdata = document.getElementById(addFrmPrint);
                newwin = window.open("");
                newwin.document.write(printdata.outerHTML);
                newwin.print();
                newwin.close();
            }
            function deleteTable(addFrmPrint){
                var row = document.getElementById("addFrmPrint");
                row.deleteRow(0);
            }
    </script>


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
        <?php include_once('script.php') ?>





</body>
</html>
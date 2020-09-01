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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Hall Booking </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable2" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ------------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                                // print_r($_REQUEST);
                                                $sql = 'INSERT INTO `ac_hall_booking` (`hall_booking`, `user_id`, `user_date`, `name`, `address`, `phone`, `date_booking`, `rent`, `advance`, `location`, `date_event`, `guest`, `waiter`, `female_waiter`, `is_adv_given`) VALUES (NULL,\'';
                                                $sql .= get_curr_user();
                                                $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['name'].'\', \''.$_REQUEST['address'].'\', \''.$_REQUEST['phone'].'\', \''.$_REQUEST['date_booking'].'\', \''.$_REQUEST['rent'].'\', \''.$_REQUEST['advance'].'\', \''.$_REQUEST['location'].'\', \''.$_REQUEST['date_event'].'\', \''.$_REQUEST['guest'].'\', \''.$_REQUEST['waiter'].'\', \''.$_REQUEST['female_waiter'].'\', \''.$_REQUEST['is_adv_given'].'\')';
                                                // echo $sql;
                                                insert_query($sql);
                                            }

                                            // ------------------------

                                            ///edit code
                                            check_edit("ac_hall_booking","hall_booking");
                                            edit_display("ac_hall_booking","hall_booking");
                                            //end of edit code -shift view below delete

                                            // ------------------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_hall_booking` WHERE `ac_hall_booking`.`hall_booking` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `hall_booking`"ID", `name`"Name", `address`"Address", `phone`"Phone",`date_booking`"Date of booking", `rent`"Rent", `advance`"Advance", `location`"Location", `date_event`"Date of event", `guest`"Number of guest", `waiter`"Waiter are required ?", `female_waiter`"If female waiter required ?", `is_adv_given`"Advance that can given" FROM `ac_hall_booking';
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Hall Booking Form </h4>
                                    <br>
                                    <form action="Accounts-mod-hall-booking.php" method="post">


                                        <div class="form-group">
                                            <label for="hbName">Name</label>
                                            <input type="text" name="name" required="" placeholder="Enter name" class="form-control" id="hbName" value="<?php if(isset($_REQUEST['name'])) echo $_REQUEST['name']?>">
                                        </div>
                                    
                               
                                        <div class="form-group">
                                            <label for="hbAddress">Address</label>
                                            <input type="text" name="address" required="" placeholder="Enter address" class="form-control" id="prName" value="<?php if(isset($_REQUEST['address'])) echo $_REQUEST['address']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbPhone">Phone</label>
                                            <input type="tel" name="phone" required="" placeholder="Enter phone" class="form-control" id="prRegular" value="<?php if(isset($_REQUEST['phone'])) echo $_REQUEST['phone']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbDateOfBooking">Date of booking</label>
                                            <input type="date" name="date_booking" required=""  class="form-control" id="prVacation" value="<?php if (isset($_REQUEST['date_booking'])) echo $_REQUEST['date_booking']; else echo (date("Y-m-d")); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbRentAmount">Rent amount</label>
                                            <input type="number" name="rent" required="" placeholder="Enter rent amount" class="form-control" id="hbRentAmount"value="<?php if(isset($_REQUEST['rent'])) echo $_REQUEST['rent']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbAdvance">Advance paid</label>
                                            <input type="number" name="advance"required="" placeholder="Enter advance paid" class="form-control" id="hbAdvance" value="<?php if(isset($_REQUEST['advance'])) echo $_REQUEST['advance']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbLocation">Location</label>
                                            <input type="text" name="location" required="" placeholder="Enter location" class="form-control" id="hbLocation" value="<?php if(isset($_REQUEST['location'])) echo $_REQUEST['location']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbDateOfEvent">Date of event</label>
                                            <input type="date" name="date_event" required="" placeholder="Enter location" class="form-control" id="hbDateOfEvent" value="<?php if(isset($_REQUEST['date_event'])) echo $_REQUEST['date_event']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbNumberOfGuest">Number of guest</label>
                                            <input type="text" name="guest" required="" placeholder="Enter date of event" class="form-control" id="hbDateOfEvent" value="<?php if(isset($_REQUEST['guest'])) echo $_REQUEST['guest']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbWaiter">Waiter are required ?</label>
                                            <select class="form-control" id="hbWaiter" name="waiter">
                                                <option value="yes"<?php if(isset($_REQUEST['waiter']) && $_REQUEST['waiter'] == 'yes') echo "selected" ?>>Yes</option>
                                                <option value="no" <?php if(isset($_REQUEST['waiter']) && $_REQUEST['waiter'] == 'no') echo "selected" ?> >No</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="hbFemaleWaiter">If female waiter required ?</label>
                                            <select class="form-control" id="hbFemaleWaiter" name="female_waiter">
                                                <option value="yes" <?php if(isset($_REQUEST['female_waiter']) && $_REQUEST['female_waiter'] == 'yes') echo "selected" ?>>Yes</option>
                                                <option value="no" <?php if(isset($_REQUEST['female_waiter']) && $_REQUEST['female_waiter'] == 'no') echo "selected" ?> >No</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="hbFemaleWaiter">Advance that can given</label>
                                            <select class="form-control" id="hbFemaleWaiter" name="is_adv_given">
                                                <option value="yes" <?php if(isset($_REQUEST['is_adv_given']) && $_REQUEST['is_adv_given'] == 'yes') echo "selected" ?> >Yes</option>
                                                <option value="no" <?php if(isset($_REQUEST['is_adv_given']) && $_REQUEST['is_adv_given'] == 'no') echo "selected" ?> >No</option>
                                            </select>
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
        <?php include_once('script.php') ?>
</body>
</html>
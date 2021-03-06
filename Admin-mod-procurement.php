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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Procurement </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ------------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                                // print_r($_REQUEST);
                                                $sql = 'INSERT INTO `procurement`(`prourement_id`, `by_user`, `item`, `description`, `expected_price`, `item_quantity`, `date_req`, `approval_status`, `date_approved`, `done_by`, `on_date`, `status`) VALUES (NULL,\'';
                                                $sql .= get_curr_user();
                                                $sql .= '\', \''.$_REQUEST['item'].'\', \''.$_REQUEST['description'].'\', \''.$_REQUEST['expected_price'].'\', \''.$_REQUEST['item_quantity'].'\', \''.$_REQUEST['date_req'].'\', \''.$_REQUEST['approval_status'].'\', \''.$_REQUEST['date_approved'].'\', \''.$_REQUEST['done_by'].'\', \''.$_REQUEST['on_date'].'\', \''.$_REQUEST['status'].'\')';
                                                // echo $sql;
                                                insert_query($sql);
                                            }

                                            // ------------------------

                                            ///edit code
                                            check_edit("procurement","prourement_id");
                                            edit_display("procurement","prourement_id");
                                            //end of edit code -shift view below delete

                                            // ------------------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `procurement` WHERE `procurement`.`prourement_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `prourement_id`"ID", `by_user`"User", `item`"Item", `description`"Description", `expected_price`"Expected Price", `item_quantity`"Item Quantity", `date_req`"Date Request", `approval_status`"Approval Status", `date_approved`"Date Approved", `done_by`"Done By", `on_date`"On Date", `status`"Status" FROM `procurement`';
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Procurement </h4>
                                    <br>
                                    <form action="Admin-mod-procurement.php" method="post">


                                        <div class="form-group">
                                            <label for="hbName">Item</label>
                                            <input type="text" name="item" required="" placeholder="Enter item" class="form-control" id="hbName" value="<?php if(isset($_REQUEST['item'])) echo $_REQUEST['item']?>">
                                        </div>
                                    
                               
                                        <div class="form-group">
                                            <label for="hbAddress">Description</label>
                                            <input type="text" name="description" required="" placeholder="Enter description" class="form-control" id="prName" value="<?php if(isset($_REQUEST['description'])) echo $_REQUEST['description']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbPhone">Expected Price</label>
                                            <input type="number" name="expected_price" required="" placeholder="Enter expected price" class="form-control" id="prRegular" value="<?php if(isset($_REQUEST['expected_price'])) echo $_REQUEST['expected_price']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hbRentAmount">Item Quantity</label>
                                            <input type="number" name="item_quantity" required="" placeholder="Enter  item quantity" class="form-control" id="hbRentAmount"value="<?php if(isset($_REQUEST['item_quantity'])) echo $_REQUEST['item_quantity']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Date Request</label>
                                            <input type="date" name="date_req" required=""  class="form-control"  value="<?php if (isset($_REQUEST['date_req'])) echo $_REQUEST['date_req']; else echo (date("Y-m-d")); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Approval Status</label>
                                            <input type="text" name="approval_status" required=""  class="form-control"  value="<?php if(isset($_REQUEST['approval_status'])) echo $_REQUEST['approval_status']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Date Approved</label>
                                            <input type="date" name="date_approved" required=""  class="form-control"  value="<?php if(isset($_REQUEST['date_approved'])) echo $_REQUEST['date_approved']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Done By</label>
                                            <input type="text" name="done_by" required=""  class="form-control"  value="<?php if(isset($_REQUEST['done_by'])) echo $_REQUEST['done_by']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">On Date</label>
                                            <input type="date" name="on_date" required=""  class="form-control"  value="<?php if(isset($_REQUEST['on_date'])) echo $_REQUEST['on_date']?>">
                                        </div>

                                        



                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" required="" class="form-control" >
                                                <option <?php if (isset($_REQUEST['status']) && $_REQUEST['status']== "Initiated" ) echo "selected";  ?>  value="Initiated">Initiated</option>

                                                <option <?php if (isset($_REQUEST['status']) && $_REQUEST['status']== "Approved" ) echo "selected";  ?>  value="Approved">Approved</option>

                                                <option <?php if (isset($_REQUEST['status']) && $_REQUEST['status']== "Invite Quotations" ) echo "selected";  ?>  value="Invite Quotations">Invite Quotations</option>

                                                <option <?php if (isset($_REQUEST['status']) && $_REQUEST['status']== "Shortlisted" ) echo "selected";  ?>  value="Shortlisted">Shortlisted</option>
                                                <option <?php if (isset($_REQUEST['status']) && $_REQUEST['status']== "Order Placed" ) echo "selected";  ?>  value="Order Placed">Order Placed</option>

                                                <option <?php if (isset($_REQUEST['status']) && $_REQUEST['status']== "Order Delivered" ) echo "selected";  ?>  value="Order Delivered">Order Delivered</option>

                                                <option <?php if (isset($_REQUEST['status']) && $_REQUEST['status']== "Cancelled" ) echo "selected";  ?>  value="Cancelled">Cancelled</option>
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
        <?php include_once('script.php') ?>
</body>
</html>
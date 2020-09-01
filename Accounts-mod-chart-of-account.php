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


        <!-- Custom box css -->
        <link href="assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet">


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
        print_r($date = explode("/",$getData[4]));
echo $sql_date = $date[2]."-".$date[0]."-".$date[1];
         $sql = 'INSERT INTO `ac_receivable_chart_of_account` (`char_of_account_id`, `user_id`, `user_date`, `account`, `acount_name`, `type`, `detail`, `report_data`) VALUES (NULL,\'';
        $sql .= get_curr_user();
        $sql .= '\', CURRENT_TIMESTAMP,"'.$getData[0].'","'.$getData[1].'","'.$getData[2].'","'.$getData[3].'","'.$sql_date.'")';
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



                            <div class="col-lg-12">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Chart Of Account </h4>

                                    <div class="table-responsive">
                                        <!-- tablesaw table m-b-0 tablesaw-columntoggle table-bordered -->
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ---------------
                                            if (isset($_REQUEST['submit'])) {
                                            $sql = 'INSERT INTO `ac_receivable_chart_of_account` (`char_of_account_id`, `user_id`, `user_date`, `account`, `acount_name`, `type`, `detail`, `report_data`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['account'].'\', \''.$_REQUEST['acount_name'].'\', \''.$_REQUEST['type'].'\', \''.$_REQUEST['detail'].'\', \''.$_REQUEST['report_data'].'\')';
                                            insert_query($sql);
                                                }
                                            // -------------------

                                            ///edit code
                                            check_edit("ac_receivable_chart_of_account","char_of_account_id");
                                            edit_display("ac_receivable_chart_of_account","char_of_account_id");
                                            //end of edit code -shift view below delete

                                            // -------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_receivable_chart_of_account` WHERE `ac_receivable_chart_of_account`.`char_of_account_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `char_of_account_id`"ID", `account`"Account", `acount_name` "Account name", `type` "Type", `detail`"Detail", `report_data`"Report date" FROM `ac_receivable_chart_of_account` Order by `char_of_account_id` DESC ';
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Chart Of Account </h4>

                                        <form action="Accounts-mod-chart-of-account.php" method="post" id="submitted">


                                            <div class="form-group">
                                                <label for="prID">Account</label>
                                                <input type="text" name="account" required="" placeholder="Enter account number" class="form-control" id="prID" value="<?php if(isset($_REQUEST['account'])) echo $_REQUEST['account'] ?>" >
                                            </div>
                                        
                                   
                                            <div class="form-group">
                                                <label for="prName">Account Name</label>
                                                <input type="text" name="acount_name" required="" placeholder="Enter account name" class="form-control" id="prName" value="<?php if(isset($_REQUEST['acount_name'])) echo $_REQUEST['acount_name'] ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="prRegular">Type</label>
                                                <select type="text" name="type" parsley-trigger="change" required="" class="form-control" id="zaPreviously">
                                                    <option <?php if (isset($_REQUEST['type']) && $_REQUEST['type']== "Assets" ) echo "selected";  ?>  value="Assets">Assets</option>
                                                    <option <?php if (isset($_REQUEST['type']) && $_REQUEST['type']== "Liability" ) echo "selected";  ?> value="Liability">Liability</option>
                                                    <option <?php if (isset($_REQUEST['type']) && $_REQUEST['type']== "Equity" ) echo "selected";  ?> value="Equity">Equity</option>
                                                    <option <?php if (isset($_REQUEST['type']) && $_REQUEST['type']== "Revenue" ) echo "selected";  ?> value="Revenue">Revenue</option>
                                                    <option <?php if (isset($_REQUEST['type']) && $_REQUEST['type']== "Expenses" ) echo "selected";  ?> value="Expenses">Expenses</option>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="prVacation">Group</label>
                                                <select type="text" name="detail" parsley-trigger="change" required="" class="form-control" id="zaPreviously">
                                                    <option <?php if (isset($_REQUEST['detail']) && $_REQUEST['detail']== "Detail" ) echo "selected";  ?> value="Detail">Detail</option>
                                                    <option <?php if (isset($_REQUEST['detail']) && $_REQUEST['detail']== "Summary" ) echo "selected";  ?> value="Summary">Summary</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="prSick">Report Date</label>
                                                <input type="date" name="report_data"  required="" placeholder="Enter report date" class="form-control" id="prSick" value="<?php if (isset($_REQUEST['report_data'])) echo $_REQUEST['report_data']; else echo (date("Y-m-d")); ?>" >
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
        <?php include_once('script.php') ?>
</body>
</html>
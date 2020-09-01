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
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-box table-responsive">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Asset Liability </h4>

                                    <div class="table-responsive">
                                        <!-- tablesaw table m-b-0 tablesaw-columntoggle table-bordered -->
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ---------------
                                            if (isset($_REQUEST['submit'])) {
                                            $sql = 'INSERT INTO `ac_asset_liab`(`ac_asset_liab_id`, `user_id`, `user_date`, `date_of_ac_asset_liab`, `account_id`, `account_title`,`type`, `ac_asset_liab_by_scction`, `ac_asset_liab_amount`, `check_by`, `paid_using`, `paid_amount`, `comments`, `check_date`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['date_of_ac_asset_liab'].'\', \''.$_REQUEST['account_id'].'\', \''.$_REQUEST['account_title'].'\', \''.$_REQUEST['type'].'\', \''.$_REQUEST['ac_asset_liab_by_scction'].'\', \''.$_REQUEST['ac_asset_liab_amount'].'\', \''.$_REQUEST['check_by'].'\', \''.$_REQUEST['paid_using'].'\', \''.$_REQUEST['paid_amount'].'\', \''.$_REQUEST['comments'].'\', \''.$_REQUEST['check_date'].'\')';
                                            insert_query($sql);
                                                }
                                            // -------------------

                                            ///edit code
                                            check_edit("ac_asset_liab","ac_asset_liab_id");
                                            edit_display("ac_asset_liab","ac_asset_liab_id");
                                            //end of edit code -shift view below delete

                                            // -------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_asset_liab` WHERE `ac_asset_liab`.`ac_asset_liab_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }
                                            // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `ac_asset_liab_id`"ID",`date_of_ac_asset_liab`"Date of Asset liability", `account_id`"Account ID", `account_title`"Account Title",`type`"Type", `ac_asset_liab_by_scction`"Asset Liability by Section", `ac_asset_liab_amount`"Asset Liability Amount", `check_by`"Check By", `paid_using`"Paid Using", `paid_amount`"Paid Amount", `comments`"Comments", `check_date` "Check Date" FROM `ac_asset_liab ';
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Asset Liability Form </h4>
                                    <br>
                                    
                                    <form action="Accounts-mod-asset.php#formadd" method="post" id="submitted2">
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <select id="settype" name="settype" required="" class="form-control" >
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "" ) echo "selected";  ?>  value="">-Select</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "Assets" ) echo "selected";  ?>  value="Assets">Assets</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "Liability" ) echo "selected";  ?> value="Liability">Liability</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "Equity" ) echo "selected";  ?> value="Equity">Equity</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>

<?php if(isset($_REQUEST['settype'])){

    $settype = $_REQUEST['settype'];
    echo '
                                    <form action="Accounts-mod-asset.php#formadd" method="post" id="submitted">
                                    ';
                                    if (isset($_REQUEST['settype']) ) echo '<input type="hidden" value="'.$_REQUEST['settype'].'" name="settype">';
                                        dropDownConditional2("Account ID","account2","account","acount_name","ac_receivable_chart_of_account",'WHERE `type` = "'.$settype.'"');
                                        
                                   echo'<div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                   </form>
                                   <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <p class="text-muted">Can\'t Find Account? <a href="Accounts-mod-chart-of-account.php" class="text-primary m-l-5"><b> Add a Account Here</b></a></p>
                                        </div>
                                    </div>';
                               } ?>
<?php
if(isset($_REQUEST['account2'])){
    $conn = connect_db();
    $sql_s = 'SELECT `char_of_account_id`, `user_id`, `user_date`, `account`, `acount_name`, `type`, `detail`, `report_data` FROM `ac_receivable_chart_of_account` WHERE  `account` = '.$_REQUEST['account2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_account = $row['account'];
    $value_name =  $row['acount_name'];
    $value_type =  $row['type'];
}
?>

                                        <form action="Accounts-mod-asset.php" method="post">


                                            <div class="form-group">
                                                <label for="prID">Date of Asset liability </label>
                                                <input type="date" name="date_of_ac_asset_liab" required="" placeholder="Enter date of asset liability" class="form-control" id="prID" value="<?php if (isset($_REQUEST['date_of_ac_asset_liab'])) echo $_REQUEST['date_of_ac_asset_liab']; else echo (date("Y-m-d")); ?>">
                                            </div>
                                        
                                   
                                            <div class="form-group">
                                                <label for="prName">Account ID</label>
                                                <input type="text" name="account_id" required="" placeholder="Enter account id" class="form-control" id="prName" <?php if(isset($_REQUEST['account2']))echo 'value="'.$value_account.'" readonly' ; else { if(isset($_REQUEST['account_id'])) echo " readonly value = ".$_REQUEST['account_id'];} ?> >
                                            </div>

                                            <div class="form-group">
                                                <label for="prName">Account Title</label>
                                                <input type="text" name="account_title" required="" placeholder="Enter account title" class="form-control" id="prName" <?php if(isset($_REQUEST['account2']))echo 'value="'.$value_name.'" readonly' ; else {if(isset($_REQUEST['account_title'])) echo " readonly value = ".$_REQUEST['account_title'];} ?> >
                                            </div>

                                            <div class="form-group">
                                                <label for="prName">Account Type</label>
                                                <input type="text" name="type" required="" placeholder="Enter account title" class="form-control" id="prName" <?php if(isset($_REQUEST['account2']))echo 'value="'.$value_type.'" readonly' ; else {if(isset($_REQUEST['type'])) echo " readonly value = ".$_REQUEST['type'];} ?> >
                                            </div>

                                            <?php
                                            dropDownSimple("Asset / Liability By Section","ac_asset_liab_by_scction","section_name","ad_section",NULL);
                                            ?>

                                            <div class="form-group">
                                                <label for="prName">Asset / Liability Amount</label>
                                                <input type="number" name="ac_asset_liab_amount" required="" placeholder="Enter amount" class="form-control" id="prName" value="<?php if(isset($_REQUEST['ac_asset_liab_amount'])) echo $_REQUEST['ac_asset_liab_amount'] ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="prName">Check By</label>
                                                <input type="text" name="check_by" required="" placeholder="Enter check by" class="form-control" id="prName" value="<?php if(isset($_REQUEST['check_by'])) echo $_REQUEST['check_by'] ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="prName">Paid Using</label>
                                                <input type="text" name="paid_using" placeholder="Enter paid using" class="form-control" id="prName" value="<?php if(isset($_REQUEST['paid_using'])) echo $_REQUEST['paid_using'] ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="prName">Paid Amount</label>
                                                <input type="number" name="paid_amount" placeholder="Enter paid amount" class="form-control" id="prName" value="<?php if(isset($_REQUEST['paid_amount'])) echo $_REQUEST['paid_amount'] ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="prName">Check Date</label>
                                                <input type="date" name="check_date" required="" placeholder="Enter check date" class="form-control" id="prName" value="<?php if (isset($_REQUEST['check_date'])) echo $_REQUEST['check_date']; else echo (date("Y-m-d")); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="prName">Comments</label>
                                                <input type="text" name="comments" placeholder="Enter comments" class="form-control" id="prName" value="<?php if(isset($_REQUEST['comments'])) echo $_REQUEST['comments'] ?>" >
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
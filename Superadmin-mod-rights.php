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
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light m-b-5"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light m-b-5" > Export </button></a>
                                    </div>
                                </div>
                            </div>

                            <!-- input form -->


                            <!-- input form -->
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> Give Rights</h4>
                                    <br>

                                    <div class="table-responsive">
                                         <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered" >
                                            <?php
                                            if(isset($_REQUEST['submit'])){
                                                $data =  $_REQUEST['data'];
                                                $data = explode("|", $data);
                                                print_r($data);
                                                $id_link = $data[0];
                                                $title = $data[1];
                                                $class = $data[2];
                                                $link = $data[3];
    
                                            // print_r($_REQUEST);

                                            $sql = 'INSERT INTO `rights`(`right_id`, `user_type_id`, `user_type`, `form_name`, `icon`, `form_prioirty`, `form_location`, `insert_form`, `edit_form`, `delete_form`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', \''.$_REQUEST['user_type']. '\', \''.$title. '\', \''.$class. '\', \''.$_REQUEST['form_prioirty']. '\', \''.$link. '\', \''.$_REQUEST['insert_form']. '\', \''.$_REQUEST['edit_form']. '\', \''.$_REQUEST['delete_form']. '\')';
                                            // echo $sql;
                                            insert_query($sql);
                                        }
                                    // else echo "Image filee did not uplaod properly. Try again";
                                            // -------------------------
                                            ///edit code
                                            check_edit("rights","right_id");
                                            edit_display("rights","right_id");
                                            //end of edit code -shift view below delete

                                            // --------------------------
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `rights` WHERE `rights`.`right_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                            // echo "done deleting";
                                                }

                                            $sql = 'SELECT `right_id`"ID", `user_type_id`"User ID", `user_type`"Type", `form_name`"Title", `icon`"Icon", `form_prioirty`"Ordering Prioirty", `form_location`"Link", `insert_form`"Insert (Yes or No)", `edit_form`"Edit (Yes or No)", `delete_form`"Delete (Yes or No)" FROM `rights` order by `right_id`';
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
            <div class="content-page" id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Give Rights </h4>
                                     <form action="Superadmin-mod-rights.php" method="post">

                                        <?php
                                        dropDownSimple("User Type","user_type","type_name","type",NULL);

$conn = connect_db();
$sql_id = 'SELECT `link_id`, `name`, `class`, `link` FROM `link`'; 

echo'
    <div class="form-group">
      <label for="">Title</label>
      <select type="text"  name="data" class="form-control select2">';
 $result_id = mysqli_query($conn ,$sql_id);
  
  while($row_id = mysqli_fetch_assoc($result_id)) {
    echo'
            <option 
            value="'.$row_id['link_id'].'|'.$row_id['name'].'|'.$row_id['class'].'|'.$row_id['link'].'">'.$row_id['name'].' Link('.$row_id['link'].')</option>';
  }
            echo'
        </select>
</div>';

                                        ?>
                                        <div class="form-group">
                                            <label for="hbRentAmount">Prioirty(Ordering Sidemenu)</label>
                                            <input type="number" name="form_prioirty" required="" placeholder="Enter prioirty" class="form-control" id="hbRentAmount"value="<?php if(isset($_REQUEST['form_prioirty'])) echo $_REQUEST['form_prioirty']?>">
                                        </div>

                                         <div class="form-group">
                                            <label for="">Insert Form</label>
                                             <select type="text" name="insert_form"   required  class="form-control">
                                                    <option value="0" <?php if (isset($_REQUEST['insert_form']) && $_REQUEST['insert_form']== "0" ) echo "selected";  ?>>No</option>
                                                    <option value="1" <?php if (isset($_REQUEST['insert_form']) && $_REQUEST['insert_form']== "1" ) echo "selected";  ?>>Yes</option>
                                                </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Edit Form</label>
                                             <select type="text" name="edit_form"   required  class="form-control">
                                                    <option value="0" <?php if (isset($_REQUEST['edit_form']) && $_REQUEST['edit_form']== "0" ) echo "selected";  ?>>No</option>
                                                    <option value="1" <?php if (isset($_REQUEST['edit_form']) && $_REQUEST['edit_form']== "1" ) echo "selected";  ?>>Yes</option>
                                                </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Delete Form</label>
                                             <select type="text" name="delete_form"   required  class="form-control">
                                                    <option value="0" <?php if (isset($_REQUEST['delete_form']) && $_REQUEST['delete_form']== "0" ) echo "selected";  ?>>No</option>
                                                    <option value="1" <?php if (isset($_REQUEST['delete_form']) && $_REQUEST['delete_form']== "1" ) echo "selected";  ?>>Yes</option>
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
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
        
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
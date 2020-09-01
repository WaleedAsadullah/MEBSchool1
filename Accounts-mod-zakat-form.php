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
        <style>
            body{
                height: 100%;
            }
        </style>


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
                                    <a href="#"></a>
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
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fees Concession Table</h4>

                                    <div class="table-responsive">
                                        <!-- tablesaw table m-b-0 tablesaw-columntoggle table-bordered -->
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php

                                            // ----------------------

                                            // echo "test";
                                            if(isset($_REQUEST['submit'])){
                                            // print_r($_REQUEST);
                                            $sql = 'INSERT INTO `ac_zakat_form` ( `zakat_form_id`, `user_id`, `user_date`, `name`, `class`, `gr_num`, `father_name`, `grand_father`, `surname`, `community_name`,  `grandian_cnic`, `contact`, `grandian_occupation`, `grandian_salary`, `eligible`, `relationship`, `address`, `free_ship`, `dependents`) VALUES (NULL,\'';
                                            $sql .= get_curr_user();
                                            $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['name'].'\', \''.$_REQUEST['class'].'\', \''.$_REQUEST['gr_num'].'\', \''.$_REQUEST['father_name'].'\', \''.$_REQUEST['grand_father'].'\', \''.$_REQUEST['surname'].'\', \''.$_REQUEST['community_name'].'\', \''.$_REQUEST['grandian_cnic'].'\', \''.$_REQUEST['contact'].'\', \''.$_REQUEST['grandian_occupation'].'\', \''.$_REQUEST['grandian_salary'].'\', \''.$_REQUEST['eligible'].'\', \''.$_REQUEST['relationship'].'\', \''.$_REQUEST['address'].'\', \''.$_REQUEST['free_ship'].'\', \''.$_REQUEST['dependents'].'\')';
                                                // echo $sql;
                                            insert_query($sql);
                                                }

                                            // ---------------------

                                            ///edit code
                                            check_edit("ac_zakat_form","zakat_form_id");
                                            edit_display("ac_zakat_form","zakat_form_id");
                                            //end of edit code -shift view below delete

                                            // ---------------------

                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_zakat_form` WHERE `ac_zakat_form`.`zakat_form_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                                    // echo "done deleting";
                                                }
                                               // $sql = "SELECT * FROM `ac_annual_appraisal`";

                                            $sql = 'SELECT `zakat_form_id`"ID", `name` "Student\'s Name", `class`"Class", `gr_num` "Gr No.", `father_name`"Father\'s Name", `grand_father`"Grand Father\'s Name", `surname`"Surname", `community_name`"Community Name", `grandian_cnic`"Grandian CNIC", `contact`"Contact / Phone Number", `grandian_occupation`"Grandian\'s Occupation", `grandian_salary`"Monthly Income", `eligible`"Is the Student Eligible For Zakat ?", `relationship`"Gradian\'s Name and Relationship", `address`"Residential Address of Guardian", `free_ship`"Previously granted free ship ?", `dependents`"Number of Dependents" FROM `ac_zakat_form` ';
                                            display_query($sql);

                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>>
        





             <div class="content-page"  id="formadd">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box" >
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Fees Concession Form </h4>
                                    <br>
                                    <form action="Accounts-mod-zakat-form.php#formadd" method="post" id="submitted">
                                        <?php
                                        dropDownConditional2("Student ID","gr_num2","addmission_id","name_of_student","ad_admission",NULL);
                                        ?>
                                        <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>

<?php
if(isset($_REQUEST['gr_num2'])){
    $conn = connect_db();
    $sql_s = 'SELECT `addmission_id`,`name_of_student`,`father_name`,`class`,`surname`, `guardian_name`, `cnic_guradian`, `occupation_of_father`,`address` FROM `ad_admission` WHERE `addmission_id` = '.$_REQUEST['gr_num2'].' ';
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['addmission_id'];
    $value_name =  $row['name_of_student'];
    $value_fname =  $row['father_name'];
    $value_class =  $row['class'];
    $value_surname =  $row['surname'];
    $value_guardian_name =  $row['guardian_name'];
    $value_cnic_guradian =  $row['cnic_guradian'];
    $value_occupation_of_father =  $row['occupation_of_father'];
    $value_address =  $row['address'];
}
?>
                                    <form action="Accounts-mod-zakat-form.php" method="post" >
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaStudentsName">Student's Name </label>
                                                    <input type="text" name="name" placeholder="Enter student's name" class="form-control" id="zaStudentsName" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_name.'" readonly' ; else {if(isset($_REQUEST['name'])) echo'value="'.$_REQUEST['name'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="zaClass">Class </label>
                                                    <input type="text" name="class" required="" placeholder="Enter your class" class="form-control" id="emailAddress" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_class.'" readonly' ;else {if(isset($_REQUEST['class']))  echo'value="'.$_REQUEST['class'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="userName">Student ID</label>
                                                    <input type="text" name="gr_num" required="" placeholder="Enter GR#" class="form-control" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_id.'" readonly' ;else {if(isset($_REQUEST['gr_num']))  echo'value="'.$_REQUEST['gr_num'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaFathersName">Father's Name</label>
                                                    <input id="zaFathersName" name="father_name" type="text" placeholder="Enter father's name" required="" class="form-control" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_fname.'" readonly' ;else {if(isset($_REQUEST['father_name']))  echo'value="'.$_REQUEST['father_name'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">  
                                                <div class="form-group">
                                                    <label for="zaGrandFathersName">Grand Father's Name</label>
                                                    <input id="zaGrandFathersName" name="grand_father" type="text" placeholder="Enter grand father's name" class="form-control" value="<?php if(isset($_REQUEST['grand_father'])) echo $_REQUEST['grand_father']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaSurname">Surname</label>
                                                    <input id="zaSurname" name="surname" type="text" placeholder="Enter surname"  class="form-control" data-parsley-id="8" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_surname.'" readonly' ; else {if(isset($_REQUEST['surname']))  echo'value="'.$_REQUEST['surname'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaCommunityName">Community Name</label>
                                                    <input id="zaCommunityName" name="community_name" type="text" placeholder="Enter grand father's name" class="form-control" value="<?php if(isset($_REQUEST['community_name'])) echo $_REQUEST['community_name']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaGrandiansCnic">Grandian's CNIC</label>
                                                    <input id="zaGrandiansCnic" name="grandian_cnic" type="text" placeholder="Enter grandian CNIC" required="" class="form-control" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_cnic_guradian.'" readonly' ;else {if(isset($_REQUEST['grandian_cnic']))  echo'value="'.$_REQUEST['grandian_cnic'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaContactPhoneNumber">Contact / Phone Number</label>
                                                    <input id="zaContactPhoneNumber" name="contact" type="tel" placeholder="Enter contact number" required="" class="form-control" value="<?php if(isset($_REQUEST['contact'])) echo $_REQUEST['contact']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaGrandiansCnic">Grandian's Occupation</label>
                                                    <input id="zaGrandiansOccupation" name="grandian_occupation" type="text" placeholder="Enter grandian's occupation" required="" class="form-control" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_occupation_of_father.'" readonly' ;else {if(isset($_REQUEST['grandian_occupation']))  echo'value="'.$_REQUEST['grandian_occupation'].'" readonly';} ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaMonthlyIncome">Monthly Income</label>
                                                    <input id="zaMonthlyIncome" name="grandian_salary" type="number" placeholder="Enter monthly income" required="" class="form-control" value="<?php if(isset($_REQUEST['grandian_salary'])) echo $_REQUEST['grandian_salary']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaEligible">Is the Student Eligible For Zakat ?</label>
                                                    <select type="text" name="eligible" required="" placeholder="Eligible or not" class="form-control" id="zaEligible">
                                                        <option value="yes" <?php if(isset($_REQUEST['eligible']) && $_REQUEST['eligible'] == 'yes') echo "selected" ?>>Yes</option>
                                                        <option value="no" <?php if (isset($_REQUEST['eligible']) && $_REQUEST['eligible']== "no" ) echo "selected";  ?>>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaGradiansNameAndRelationship">Gradian's Name and Relationship</label>
                                                    <input id="zaGradiansNameAndRelationship" name="relationship"  type="text" placeholder="Enter grandian's name and relationship" required="" class="form-control" value="<?php if(isset($_REQUEST['relationship'])) echo $_REQUEST['relationship']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="zaAddressOfGuardian">Residential Address of Guardian</label>
                                            <input id="zaAddressOfGuardian" name="address" type="text" placeholder="Enter residential address of guardian" class="form-control" <?php if(isset($_REQUEST['gr_num2']))echo 'value="'.$value_address.'" readonly' ;else {if(isset($_REQUEST['address']))  echo'value="'.$_REQUEST['address'].'" readonly';} ?>>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaPreviously">Previously granted free ship ?</label>
                                                    <select type="text" name="free_ship" parsley-trigger="change" required="" placeholder="Eligible or not" class="form-control" id="zaPreviously">
                                                        <option value="yes" <?php if (isset($_REQUEST['free_ship']) && $_REQUEST['free_ship']== "yes" ) echo "selected";  ?> >Yes</option>
                                                        <option value="no" <?php if (isset($_REQUEST['free_ship']) && $_REQUEST['free_ship']== "no" ) echo "selected";  ?>>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zaNumberOfDependents">Number of Dependents </label>
                                                    <input id="zaNumberOfDependents" name="dependents" type="number" placeholder="Enter Monthly Income" class="form-control" value="<?php if(isset($_REQUEST['dependents'])) echo $_REQUEST['dependents']?>">
                                                </div>
                                            </div>
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
            $(window).load(function(){
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                });
            });
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        </script>

        <?php include_once('script.php') ?>



        

</body>
</html>
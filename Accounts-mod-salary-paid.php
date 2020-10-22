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





            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="#formadd" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px;"> Salary Paid </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered ">
                                            <?php
                                            // ---------------
                                            if (isset($_REQUEST['submit'])) {
                                            $sql = 'UPDATE `ac_payroll_calculation` SET `paid_status` = '.$_REQUEST["status"].' WHERE `ac_payroll_calculation`.`payroll_id` ='.$_REQUEST['voucher_num'].' ';
                                            insert_query($sql);
                                                }

                                            // -------------------
                                    
                                            ///edit code
                                            check_edit("ac_payroll_calculation","payroll_id");
                                            edit_display("ac_payroll_calculation","payroll_id");
                                            //end of edit code -shift view below delete

                                            // ---------------------
                                                
                                            if(isset($_REQUEST['deleteid']) && is_numeric($_REQUEST['deleteid'])){ $sql = 'DELETE FROM `ac_payroll_calculation` WHERE `ac_payroll_calculation`.`payroll_id` = '.$_REQUEST['deleteid'];

                                            insert_query($sql);
                                                    // echo "done deleting";
                                                    }
                                               // $sql = "SELECT * FROM `ac_annual_appraisal`";
                                            $sql = 'SELECT `payroll_id`"ID",`type`"Type", `gr_number`"Gr No.", `name`"Employee Name", `designation`"Designation",`net_pay`"Net pay" ,`paid_status`"Paid Status" FROM `ac_payroll_calculation` order by `payroll_id` DESC';
function display_query_salary($sql)
{

 $conn = connect_db();
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row

  
get_current_form();
                                               
   $i = 0;                                     
  while($row = $result->fetch_assoc()) {
    if($i==0)
    {
echo '
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th></th>
                    <th></th>
                    <th></th>';
$row_data = array_keys($row);
$id_column = "";
for($j=0;$j<count($row_data);$j++){

  if($j==0) $id_column = $row_data[$j];

    echo  "<th>".$row_data[$j]."</th>"; }
                                                   
    echo   '</tr>
         </thead>
      <tbody>';

 //echo '';



//print_r($row);



    }
  $i++;

  
    echo '<tr>
              <td>'.$i.'</td>';
$label2 = $row[$row_data[count($row_data)-1]];
if($label2== 0){
echo'
             <td style="text-align:center;"><a style="color:rgb(255,87,90);" href="'.$_SERVER['PHP_SELF'].'?deleteid='.$row[$id_column].'"><i class="fa fa-trash-o"></i></a></td>
              <td style="text-align:center;"><a style="color:rgb(120,108,150);" href="" ><i  class="zmdi zmdi-local-printshop"></i></a></td>
              <td style="text-align:center;"><a style="color:rgb(30,108,180);" href="" ><i class="zmdi zmdi-copy"></i></a></td>';}
if($label2== 1){
echo'
              <td><span class="label label-success">Paid<span></td>
              <td style="text-align:center;"><a style="color:rgb(120,108,150);" href="" ><i  class="zmdi zmdi-local-printshop"></i></a></td>
              <td style="text-align:center;"><a style="color:rgb(30,108,180);" href="" ><i class="zmdi zmdi-copy"></i></a></td>';}


for($k=0;$k<count($row_data)-1;$k++){


echo  '<td>'.$row[$row_data[$k]].'</td>';}

$label = $row[$row_data[count($row_data)-1]];
if($label== 1){ $x = 'label label-success' ; $s = "Paid";} elseif($label== 0 ){ $x = 'label label-danger' ; $s = "Unpiad";}else{$x ='';}
echo  '<td><span class="'.$x.'">'.$s.'<span></td>';

   echo  '</tr>';
  }

    echo '   </tbody>';
} else {
  echo "0 results";
}
    

}
display_query_salary($sql);

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
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Salary Paid </h4>
                                    <br>
                                        
                                    <form action="Accounts-mod-salary-paid.php#formadd" method="post" id="submitted2">
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <select id="settype" name="settype" required="" class="form-control" >
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "" ) echo "selected";  ?>  value="">-Select</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "staff" ) echo "selected";  ?>  value="staff">staff</option>
                                                <option <?php if (isset($_REQUEST['settype']) && $_REQUEST['settype']== "teacher" ) echo "selected";  ?> value="teacher">teacher</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group text-right m-b-0">
                                                
                                            <button type="submit" class="btn btn-default waves-effect waves-light m-l-5">
                                                Submit
                                            </button>
                                        </div>
                                    </form>

<?php if(isset($_REQUEST['settype'])){

$condition = 'Where `type` = "'.$_REQUEST['settype'].'" group by `gr_number` ORDER BY `payroll_id` ASC';
echo '<form action="Accounts-mod-salary-paid.php#formadd" method="post">';
        dropDownConditional2("Employee ID","gr_number2","gr_number","name","ac_payroll_calculation",$condition);
echo '
        <div class="form-group text-right m-b-0">
            <button type="submit" name="submit2" class="btn btn-default waves-effect waves-light m-l-5">
                Submit
            </button>
        </div>
        </form>';
                               } ?>
<?php
if(isset($_REQUEST['gr_number2'])){
    $conn = connect_db();
    $sql_s = 'SELECT `payroll_id`, `user_id`, `user_date`, `which_month`, `which_year`, `gr_number`, `name`, `designation`, `attendance`, `basic_salary`, `house_ra`, `utility`, `convey_allow`, `gross_salary`, `loan`, `i_t`, `s_w_f`, `leave_pay`, `net_pay`, `type`, `paid_status` FROM `ac_payroll_calculation` WHERE `gr_number`= '.$_REQUEST['gr_number2'].' order by `payroll_id` DESC ';
    echo$sql_s;
    $result = mysqli_query($conn,$sql_s);
    $row = mysqli_fetch_assoc($result);

    $value_id = $row['payroll_id'];
    $value_gr = $row['gr_number'];
    $value_name =  $row['name'];
    $value_designation =  $row['designation'];
    $value_salary_year =  $row['which_year'];
    $value_salary_month = $row['which_month'];
    $value_net_pay = $row['net_pay'];
    $value_paid_status = $row['paid_status'];

}
?>




                                        <form action="Accounts-mod-salary-paid.php" method="post">
                                            <input type="hidden" <?php if(isset($_REQUEST['settype']))echo 'value="'.$_REQUEST['settype'].'" readonly' ; else { if(isset($_REQUEST['type'])) echo "readonly value = ".$_REQUEST['type'];} ?> name="type">

                                            <div class="form-group">
                                                <label for="">Voucher No. </label>
                                                <input type="number" name="voucher_num" required="" placeholder="Enter voucher no." class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_id.'" readonly' ; else { if(isset($_REQUEST['gr_number'])) echo "readonly value = ".$_REQUEST['gr_number'];} ?>>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="prID">Employee ID  </label>
                                                        <input type="text" name="gr_number" required="" placeholder="Enter employee code" class="form-control" id="prID" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_gr.'" readonly' ; else { if(isset($_REQUEST['gr_number'])) echo "readonly value = ".$_REQUEST['gr_number'];} ?>>
                                                    </div>
                                                </div>
                                        
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Employee Name </label>
                                                        <input type="text" name="name" required="" placeholder="Enter employee name" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_name.'" readonly' ; else { if(isset($_REQUEST['name'])) echo "readonly value = ".$_REQUEST['name'];} ?>>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="prRegular">Designation</label>
                                                        <input type="text" name="designation" required="" placeholder="Enter designation" class="form-control" id="prRegular" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_designation.'" readonly' ; else { if(isset($_REQUEST['designation'])) echo "readonly value = ".$_REQUEST['designation'];} ?>>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="prVacation">Salary of Year</label>
                                                        <input type="number" name="attendance" parsley-trigger="change" required="" placeholder="Enter attendance" class="form-control" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_salary_year.'" readonly' ; else { if(isset($_REQUEST['attendance'])) echo "readonly value = ".$_REQUEST['attendance'];} ?>>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6" >
                                                    <div class="form-group">
                                                        <label for="prSick">Salary of Month</label>
                                                        <input type="tetx" name="basic_salary" required="" placeholder="Enter basic salary" class="form-control" id="prSick" <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_salary_month.'" readonly' ; else { if(isset($_REQUEST['basic_salary'])) echo "readonly value = ".$_REQUEST['basic_salary'];} ?> >
                                                    </div>                                
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="zaClass">Net Pay</label>
                                                <input type="number" name="house_ra" required="" placeholder="Enter house R/A" class="form-control" id="prOvertime"  <?php if(isset($_REQUEST['gr_number2']))echo 'value="'.$value_net_pay.'" readonly' ; else { if(isset($_REQUEST['house_ra'])) echo "readonly value = ".$_REQUEST['house_ra'];} ?> >
                                            </div>

                                            
                                            <div class="card-box" style="margin-top: 15px; margin-bottom: 15px; display: block; border: 2px solid #4e5b62">
                                            <div>
                                                <label>Rating</label>
                                            </div>
                                            <div class="radio radio-inline radio-danger">
                                                <input type="radio" id="inlineRadio31" value="0" name="status" required=""
                                                 <?php if (isset($_REQUEST['gr_number2']) &&$value_paid_status == 0 ) echo "checked";  ?>>
                                                <label for="inlineRadio31"> Unpiad </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input type="radio" id="inlineRadio32" value="1" name="status" 
                                                 <?php if (isset($_REQUEST['gr_number2']) && $value_paid_status== 1 ) echo "checked";  ?>>
                                                <label for="inlineRadio32"> Paid </label>
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
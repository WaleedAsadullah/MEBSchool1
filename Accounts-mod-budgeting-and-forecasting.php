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
                            include_once("db_functions.php")
                    ?>

                    <!-- header -->
        
 

                    <!--- Sidemenu -->
                    <?php 
                            include_once("Accounts-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->




            <!-- Budgeting  form -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="admin-mod-student-addmission-form.php" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30"></h4>
                                    <h4 class="header-title" style="text-align: center; font-size: 22px; padding: 10px"> Estimated Budget</h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Date/Year</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Salary</th>
                                                <th>KE-Bill school</th>
                                                <th>KE-Bill lawn</th>
                                                <th>Phone Bill</th>
                                                <th>Water tax</th>
                                                <th>EOBI</th>
                                                <th>Social security</th>
                                                <th>Gratuity</th>
                                                <th>Leave encasement</th>
                                                <th>Property tax</th>
                                                <th>Petty cash</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                                
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>
                                                    <th><input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></th>




                                                </tr>

                                                <tr>
                                                    <td>1</td>
                                                    <th>Jul-19</th>
                                                    <td><i class="zmdi zmdi-edit"></i></td>
                                                    <td><i class="zmdi zmdi-delete" onclick="deleteTable('addFrmPrint')"></i></td>
                                                    <td><a href="print-fee.php"><i class="zmdi zmdi-local-printshop" onclick="myPrint('addFrmPrint')"></i></a></td>
                                                    <td><i class="zmdi zmdi-copy"></i></td>
                                                    <td>752571</td>
                                                    <td>33517</td> 
                                                    <td></td>   
                                                    <td>6431</td>
                                                    <td>32517</td>
                                                    <td>26250</td>
                                                    <td>23328</td>
                                                    <td>106375</td>
                                                    <td>9277</td>
                                                    <td>45455</td>
                                                    <td>152321</td>
                                                    <th>1188137</th>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <th>Aug-19</th>
                                                    <td><i class="zmdi zmdi-edit"></i></td>
                                                    <td><i class="zmdi zmdi-delete" onclick="deleteTable('addFrmPrint')"></i></td>
                                                    <td><a href="print-fee.php"><i class="zmdi zmdi-local-printshop" onclick="myPrint('addFrmPrint')"></i></a></td>
                                                    <td><i class="zmdi zmdi-copy"></i></td>
                                                    <td>752571</td>
                                                    <td>33517</td> 
                                                    <td></td>   
                                                    <td>6431</td>
                                                    <td>32517</td>
                                                    <td>26250</td>
                                                    <td>23328</td>
                                                    <td>106375</td>
                                                    <td>9277</td>
                                                    <td>45455</td>
                                                    <td>152321</td>
                                                    <th>1188137</th>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <th>Sep-19</th>
                                                    <td><i class="zmdi zmdi-edit"></i></td>
                                                    <td><i class="zmdi zmdi-delete" onclick="deleteTable('addFrmPrint')"></i></td>
                                                    <td><a href="print-fee.php"><i class="zmdi zmdi-local-printshop" onclick="myPrint('addFrmPrint')"></i></a></td>
                                                    <td><i class="zmdi zmdi-copy"></i></td>
                                                    <td>752571</td>
                                                    <td>33517</td> 
                                                    <td></td>   
                                                    <td>6431</td>
                                                    <td>32517</td>
                                                    <td>26250</td>
                                                    <td>23328</td>
                                                    <td>106375</td>
                                                    <td>9277</td>
                                                    <td>45455</td>
                                                    <td>152321</td>
                                                    <th>1188137</th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th>Total</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                    <th>9017883</th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th>Avg per Month</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                    <th>819808</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Income form end -->

             <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>

                                    <h4 class="header-title" style="text-align: center; font-size: 22px; padding: 10px"> Estimated Budget</h4>
                                    <br>
                                    <br>
                                    <?php 

                                    if (isset($_REQUEST['submit'])) {
                                        $sql = 'INSERT INTO `ac_budgeting` (`estimated_budget_id`, `user_id`, `user_date`, `date`, `salary`, `ke_bill_school`, `ke_bill_lawn`, `phone_bill`, `water_tax`, `eobi`, `social_security`, `gratuity`, `leave_encasement`, `property_tax`, `petty_cash`) VALUES (NULL,\'';
                                        $sql .= get_curr_user();
                                        $sql .= '\', CURRENT_TIMESTAMP, \''.$_REQUEST['date'].'\', \''.$_REQUEST['salary'].'\', \''.$_REQUEST['ke_bill_school'].'\', \''.$_REQUEST['ke_bill_lawn'].'\', \''.$_REQUEST['phone_bill'].'\', \''.$_REQUEST['water_tax'].'\', \''.$_REQUEST['eobi'].'\', \''.$_REQUEST['social_security'].'\', \''.$_REQUEST['gratuity'].'\', \''.$_REQUEST['leave_encasement'].'\', \''.$_REQUEST['property_tax'].'\', \''.$_REQUEST['petty_cash'].'\')';
                                        insert_query($sql);
                                    }

                                    ?>

                                    <form action="Accounts-mod-budgeting-and-forecasting.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="feSno">Date</label>
                                                    <input type="date" name="date" required="" class="form-control" id="feSno"
                                                     value="<?php if (isset($_REQUEST['date'])) echo $_REQUEST['date']; else echo (date("Y-m-d")); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="feSno">Salary</label>
                                            <input type="number" name="salary" required="" class="form-control" id="feSno"
                                            value="<?php if(isset($_REQUEST['salary'])) echo $_REQUEST['salary'] ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">KE-Bill school</label>
                                                    <input type="number" name="ke_bill_school" required="" class="form-control" id="feSno" 
                                                    value="<?php if(isset($_REQUEST['ke_bill_school'])) echo $_REQUEST['ke_bill_school'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">KE-Bill lawn</label>
                                                    <input type="number" name="ke_bill_lawn" required="" class="form-control" id="feSno"
                                                    value="<?php if(isset($_REQUEST['ke_bill_lawn'])) echo $_REQUEST['ke_bill_lawn'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">Phone Bill</label>
                                                    <input type="number" name="phone_bill" required="" class="form-control" id="feSno"
                                                    value="<?php if(isset($_REQUEST['phone_bill'])) echo $_REQUEST['phone_bill'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">Water Tax</label>
                                                    <input type="number" name="water_tax" required="" class="form-control" id="feSno"
                                                    value="<?php if(isset($_REQUEST['water_tax'])) echo $_REQUEST['water_tax'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">EOBI</label>
                                                    <input type="number" name="eobi" required="" class="form-control" id="feSno"
                                                    value="<?php if(isset($_REQUEST['eobi'])) echo $_REQUEST['eobi'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">Social security</label>
                                                    <input type="number" name="social_security" required="" class="form-control" id="feSno"
                                                    value="<?php if(isset($_REQUEST['social_security'])) echo $_REQUEST['social_security'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">Gratuity</label>
                                                    <input type="number" name="gratuity" required="" class="form-control" id="feSno"
                                                    value="<?php if(isset($_REQUEST['gratuity'])) echo $_REQUEST['gratuity'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">Leave Encasement</label>
                                                    <input type="number" name="leave_encasement" required="" class="form-control" id="feSno" 
                                                    value="<?php if(isset($_REQUEST['leave_encasement'])) echo $_REQUEST['leave_encasement'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">Property Tax</label>
                                                    <input type="number" name="property_tax" required="" class="form-control" id="feSno"
                                                    value="<?php if(isset($_REQUEST['property_tax'])) echo $_REQUEST['property_tax'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="feSno">Petty Cash</label>
                                                    <input type="number" name="petty_cash" required="" class="form-control" id="feSno"
                                                    value="<?php if(isset($_REQUEST['petty_cash'])) echo $_REQUEST['petty_cash'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                     
                                        <div class="form-group text-right m-b-0 m-t-10">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" name="submit">
                                                Submit
                                            </button>
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
        <?php include_once('script.php') ?>

</body>
</html>
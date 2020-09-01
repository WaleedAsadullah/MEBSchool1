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


        <style>
            th,td {
                text-align: center;
            }
        </style>

    </head>
    <style>
        table>thead>tr>th{
            text-align: center;
        }
    </style>
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


            <!-- Income form -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <?php

                                    if(isset($_REQUEST['submit'])){
                                        $start = $_REQUEST['s_date'];
                                        $end = $_REQUEST['e_date'];
                                    }else{
                                        $start = "2019-08-20";
                                        $end = "2021-08-20";
                                    }
                                    ?>

                                    <form action="Accounts-mod-profit-and-loss.php" method="post">
                                        <div class="row" >
                                            <div class="col-lg-5" >
                                                <div class="form-group">
                                                    <label for="prID">Start Date</label>
                                                    <input type="date" name="s_date" required=""  class="form-control" id="prID" value="<?php if(isset($_REQUEST['s_date'])) echo $_REQUEST['s_date'] ?>" >
                                                </div>
                                            </div>
                                                
                                            <div class="col-lg-5" >
                                                <div class="form-group">
                                                    <label for="prName">End Date</label>
                                                    <input type="date" name="e_date" required=""  class="form-control" id="prID" value="<?php if(isset($_REQUEST['e_date'])) echo $_REQUEST['e_date'] ?>" >
                                                </div>
                                            </div>

                                            <div class="col-lg-2" style="margin-top: 2%" >       
                                                <div class="form-group text-center" >
                                                    <button type="submit" name="submit" class="btn btn-default waves-effect waves-light" >
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-page">
                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Expenditure Statement (Detailed)</h4>

                                    <div class="table-responsive">
                                        <table class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered">
                                            <thead>
                                                <th>Type</th>
                                                <th>Title</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $conn = connect_db();
                                                $sql = 'SELECT `type`, `account_title`, SUM(`exp_amount`) FROM `ac_rev_exp` WHERE `type` = "Revenue" AND `date_of_rev_exp` <= "'.$end.'" AND `date_of_rev_exp` >= "'.$start.'" GROUP BY `account_title`';
                                                $result = mysqli_query($conn,$sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo'<tr>
                                                        <th>'.$row['type'].'</th>
                                                        <td>'.$row['account_title'].'</td>
                                                        <td>'.$row['SUM(`exp_amount`)'].'</td>
                                                        </tr>';
                                            }
                                            ?>                                            
                                            </tbody>
                                            <thead>
                                            <?php
                                                $conn2 = connect_db();
                                                $sql2 = 'SELECT  SUM(`exp_amount`) FROM `ac_rev_exp` WHERE `type` = "Revenue" AND `date_of_rev_exp` <= "'.$end.'" AND `date_of_rev_exp` >= "'.$start.'"';
                                                $result2 = mysqli_query($conn2,$sql2);
                                                while($row2 = mysqli_fetch_assoc($result2)){
                                                    echo'<tr>
                                                        <th colspan=2 >Total</th>
                                                        <td>'.$row2['SUM(`exp_amount`)'].'</td>
                                                        </tr>';
                                            }
                                            ?> 
                                            </thaed>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content-page">
                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Income Statement (Detailed)</h4>

                                    <div class="table-responsive">
                                        <table class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered">
                                            <thead>
                                                <th>Type</th>
                                                <th>Title</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $conn = connect_db();
                                                $sql = 'SELECT `type`, `account_title`, SUM(`exp_amount`) FROM `ac_rev_exp` WHERE `type` = "Expenses" AND `date_of_rev_exp` <= "'.$end.'" AND `date_of_rev_exp` >= "'.$start.'" GROUP BY `account_title`';
                                                $result = mysqli_query($conn,$sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo'<tr>
                                                        <th>'.$row['type'].'</th>
                                                        <td>'.$row['account_title'].'</td>
                                                        <td>'.$row['SUM(`exp_amount`)'].'</td>
                                                        </tr>';
                                            }
                                            ?>                                            
                                            </tbody><thead>
                                            <?php
                                                $conn2 = connect_db();
                                                $sql2 = 'SELECT  SUM(`exp_amount`) FROM `ac_rev_exp` WHERE `type` = "Expenses" AND `date_of_rev_exp` <= "'.$end.'" AND `date_of_rev_exp` >= "'.$start.'"';
                                                $result2 = mysqli_query($conn2,$sql2);
                                                while($row2 = mysqli_fetch_assoc($result2)){
                                                    echo'<tr>
                                                        <th colspan=2 >Total</th>
                                                        <td>'.$row2['SUM(`exp_amount`)'].'</td>
                                                        </tr>';
                                            }
                                            ?> 
                                            </thaed>
                                        </table>
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

        <!--Chartist Chart-->
        <script src="assets/plugins/chartist/dist/chartist.min.js"></script>
        <script src="assets/plugins/chartist/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="assets/pages/jquery.chartist.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>


</body>
</html>
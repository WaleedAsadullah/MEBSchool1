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


        <!-- X-editable css -->
        <link type="text/css" href="assets/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">

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
<body class="fixed-left">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php")
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
                            <div class="col-lg-12" >
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Time table </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="mainTable" class="table table-striped m-b-0">
                                            <thead>
                                            <tr>
                                                <th>Class | Time</th>
                                                <th>8:00-8:45</th>
                                                <th>8:45-9:30</th>
                                                <th>9:30-10:15</th>
                                                <th>10:15-11:00</th>
                                                <th>11:00-11:45</th>
                                                <th>11:45-12:45</th>
                                                <th>12:45-1:30</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Class 1</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>

                                                </tr>
                                                <tr>
                                                    <td>Class 2</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>

                                                </tr>
                                                <tr>
                                                    <td>Class 3</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                <tr>
                                                    <td>Class 4</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>
                                                <tr>
                                                    <td>Class 5</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 6</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 7</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 7</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 8</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 9</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                                <tr>
                                                    <td>Class 10</td>
                                                    <td>Maths</td>
                                                    <td>Science</td>
                                                    <td>English</td>
                                                    <td>Break</td>
                                                    <td>Islamiat</td>
                                                    <td>Urdu</td>
                                                    <td>Pst</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                       
                        
                            
                    </div>
                </div>
            </dir>
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="zmdi zmdi-close-circle-o"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll" tabindex="5001" style="overflow: hidden; outline: none;">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="zmdi zmdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            <div id="ascrail2001" class="nicescroll-rails" style="width: 8px; z-index: 999; cursor: default; position: absolute; top: 57px; left: 232px; height: 789px; display: none;"><div style="position: relative; top: 0px; float: right; width: 6px; height: 0px; background-color: rgb(152, 166, 173); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2001-hr" class="nicescroll-rails" style="height: 8px; z-index: 999; top: 838px; left: 0px; position: absolute; cursor: default; display: none;"><div style="position: relative; top: 0px; height: 6px; width: 0px; background-color: rgb(152, 166, 173); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div></div></div>
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

        <!-- Editable js -->
        <script src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
        <script src="assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
        <script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>
        <!-- init -->
        <script src="assets/pages/datatables.editable.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script>

        <?php include_once('script.php') ?>
</body>
</html>
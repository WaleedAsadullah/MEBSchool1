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
            h1{
                font-size: 50px;
            }
            .i{
                font-size: 4em;
            }
            button{
                height:100px;
                width:100px;
                margin: 20px;
            }
        </style>
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
                            include_once("Parents-mod-sidemenu.php")
                    ?>

                    <!-- Sidebar -->



            <!--  -->
            <!--  -->
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <br>

                                         <?php
                                         $conn = connect_db();

                                         $sql = 'SELECT `addmission_id`, `user_id`, `user_time`, `class`, `GR_No`, `name_of_student`, `father_name`, `surname`, `guardian_name`, `relationship`, `religion`, `address`, `phone`, `cell_no`, `e_mail`, `ice_no`, `occupation_of_father`, `monthly_income`, `cnic_guradian`, `date_of_birth`, `place_of_birth`, `date_of_birth_words`, `admission_saught`, `admission_granted`, `last_school_class`, `profile_picture` FROM `ad_admission` WHERE addmission_id = '.$_SESSION['student_id'].'';

                                         $result = mysqli_query($conn, $sql);

                                         $row = mysqli_fetch_assoc($result);

                                         echo'
                                <div class="bg-picture card-box">
                                    <div class="profile-info-name">
                                        <img src="'.$row['profile_picture'].'"
                                         class="img-thumbnail" alt="profile-image">
                                        <div class="profile-info-detail">
                                            <h3 class="m-t-0 m-b-0">'.$row['name_of_student'].'</h3>
                                            <p class="text-muted m-b-20"><i></i></p>
                                            <div class="text-left">

                                            <p class="text-muted font-13"><strong>Class :</strong> '.$row['class'].' <span class="m-l-15"> </span></p>
                                            <p class="text-muted font-13"><strong>Gr No. :</strong> '.$row['addmission_id'].'<span class="m-l-15"> </span></p>

                                            <p class="text-muted font-13"><strong>Mobile(ICE) :</strong> '.$row['ice_no'].'<span class="m-l-15">(123) 123 1234</span></p>

                                            <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">coderthemes@gmail.com</span></p>

                                            <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15">USA</span></p>
                                        </div>
                                    <div class="clearfix"></div>
                                    </div>
                                </div>
                                </div>';

                                         ?>

                                <div class="bg-picture card-box">
                                    
                                    <div class="profile-info-name">
                                        <img src="assets/images/profile.jpg"
                                         class="img-thumbnail" alt="profile-image">
                                        <div class="profile-info-detail">
                                            <h3 class="m-t-0 m-b-0">Alexandra Clarkson</h3>
                                            <p class="text-muted m-b-20"><i>Web Designer</i></p>
                                            <div class="text-left">
                                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15"> <?php echo $_SESSION['name']; ?> </span></p>
                                            <p class="text-muted font-13"><strong>Gr No. :</strong> <span class="m-l-15"> <?php echo $_SESSION['gr_no']; ?> </span></p>

                                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">(123) 123 1234</span></p>

                                            <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">coderthemes@gmail.com</span></p>

                                            <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15">USA</span></p>
                                        </div>
                                    <div class="clearfix"></div>
                                    </div>
                                </div>
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


        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

</body>
</html>
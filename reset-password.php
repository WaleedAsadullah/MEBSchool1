<?php
ob_start();
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.png">

        <?php include_once('title.php') ?>

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
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                 <div><img src="assets/images/med-logo.png" width="40%"></div>
                <a href="index.php" class="logo"><span>M.E.B<span> School</span></span></a>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Reset Password</h4>

					<!-- <p class="text-muted m-b-0 font-13 m-t-20"> </p> -->
                </div>
                <div class="panel-body">
                    <?php
                   $token = $_GET['token'];
                    include_once('db_functions.php');
                    $conn = connect_db();
                    if(isset($_REQUEST['submit'])){
                        $pass = mysqli_real_escape_string(connect_db(), $_POST['pass']);
                        $cpass = mysqli_real_escape_string(connect_db(), $_POST['cpass']);
                        $pas = password_hash($pass, PASSWORD_BCRYPT);
                        $cpas = password_hash($cpass, PASSWORD_BCRYPT);
                            if( $pass ==  $cpass){

                            $sql = "UPDATE `ad_add_user` SET `pass`='".$pas."',`cpass`='".$cpas."' where `token` = '".$token."'";
                            if (mysqli_query(connect_db(),$sql)) {
                                echo '<script>
                                        alert("Password Update Successfully")
                                    </script>';
                                echo '
                                    <script>
                                        location.replace(\'index.php\');
                                    </script>';
                            }

                            }else{
                                echo '<script>
                                        alert("Password Are Not Same")
                                    </script>';
                            }
                        }
                    ?>
                    <form class="form-horizontal m-t-20" method="post" action="">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="pass" required="" placeholder="Enter New Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="cpass" required="" placeholder="Enter Confirm Password">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20 m-b-0">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" name="submit" type="submit">Reset Password</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <!-- end card-box -->

			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="text-muted">Already have account?<a href="index.php" class="text-primary m-l-5"><b>Sign In</b></a></p>
				</div>
			</div>

        </div>
        <!-- end wrapper page -->


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
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

	</body>
</html>
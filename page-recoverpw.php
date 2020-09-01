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

					<p class="text-muted m-b-0 font-13 m-t-20">Enter your email address and we'll send you an email with instructions to reset your password.  </p>
                </div>
                <div class="panel-body">
                    <?php
                    include_once('db_functions.php');
                    $conn = connect_db();
                    if(isset($_REQUEST['submit'])){
                        $email = mysqli_real_escape_string($conn,$_REQUEST['email']);

                        $e_mailquary = "select * from ad_add_user where e_mail='$e_mail'";
                        $query = mysqli_query(connect_db(),$e_mailquary);
                        $e_mailcount = mysqli_num_rows($query);
                        if($e_mailcount){

                        }else echo 'Not Email Found';
                    }
                    ?>
                    <form class="form-horizontal m-t-20" action="index.php">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email" required="" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20 m-b-0">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" name="submit" type="submit">Send Email</button>
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
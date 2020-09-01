<!DOCTYPE html>
<html style="background-color: white">
<head >
	 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- App title -->
        <?php include_once("title.php") ?>

        <!-- App CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

        <style>
        	body{
        		background-color: white;
        		margin-top: 20px
        	}
        	.page{
        		width:800px;
        		height: 1020px;
        		margin: auto;
        		padding: 40px;
        		border :5px solid #95B9C7;
        		box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        		background-color: ;
        	}
        	h3{
        		font-family: 'Roboto', sans-serif;
        		color:#264a7d;
        		text-align: center;
        	}
        	h4{
        		margin-top: 50px;
        		text-align: center;
        		padding: 10px;
        		border: 2px solid #264a7d;
        		border-radius: 50px;
        		color:#264a7d;
        		font-weight:bold;
        	}
        	p{
        		font-family: 'Roboto', sans-serif;
        		color: rgb(50,50,50);
        		font-size: 15px;
        		padding-top: 3px;

        	}
        	span{
        		color:#264a7d;
        		padding-left: 3px;
        		padding-right: 3px;
        	}
        	.headimg{
        		position:absolute;
        		top:-40px;
        		right:-30px;
        	}
        	.footer{
        		background-color:#264a7d;
        	}
        </style>
</head>
<body>
    <div class="page">
    	<div class="row">
    		<div class="col-lg-12" >
    			<img src="assets/images/form-head.png" class="headimg" width="790px">
    		</div>
    	</div>
    	<h3><strong>The MEB School</strong></h3>
    	<div style="text-align: center;">
    		<img src="assets/images/med-logo.png" width="150px" style="margin: 5px" />
  		</div>
  		<div class="row" >
  			<div class="col-lg-3" ></div>
  			<div class="col-lg-6" >
  				<h4><i>ADMISSION FORM</i></h4>
  			</div>
  			<div class="col-lg-3" >
  				<div >
  					<img src="assets/images/users/avatar-1.jpg" width="150px" height="150px"  style="border: 1px solid black" />
  				</div>
  			</div>
  		</div>
  		<p>Class : <span><u>5th</u></span></p>
  		<p>G.R No. : <span><u>0987645</u></span></p>
  		<p>1. Name of Student : <span><u>Fazal Khan</u></span></p>
  		<div class="row">
  			<div class="col-lg-8">
  				<p>2. Father's Name : <span><u>Ali Khan</u></span></p>
  			</div>
  			<div class="col-lg-4">
  				<p>Surname : <span><u>Khan</u></span></p>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-lg-8">
  				<p>3. Guardian's Name : <span><u>Ali khan</u></span></p>
  			</div>
  			<div class="col-lg-8">
  				<p>Relationship :<span><u>Father</u></span></p>
  			</div>
  		</div>
  		<p>4. Religion :<span><u>Islam</u></span></p>
  		<p>5. Address :<span><u>Plot 123, Block 5 , Gulshan-e-iqbal, Karachi</u></span></p>
  		<div class="row">
  			<div class="col-lg-6">
  				<p>Phone(Res.) :<span><u>02136866543</u></span></p>
  			</div>
  			<div class="col-lg-6">
  				<p>Cell No. :<span><u>03456789659</u></span></p>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-lg-6">
  				<p>E-mail :<span><u>fazalkahna@gmail.com</u></span></p>
  			</div>
  			<div class="col-lg-6">
  				<p>ICE (in case Emergency) # :<span><u>03005678543</u></span></p>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-lg-6">
  				<p>6. Occupation of Father / Guardian :<span><u>Clerk</u></span></p>

  			</div>
  			<div class="col-lg-6">
  				<p>Monthly Income Rs. :<span><u>50,000</u></span></p>
  			</div>
  		</div>
  		<p>7. C.N.I.C No. of Father & Guardian :<span><u>4210178781244</u></span></p>
  		<div class="row">
  			<div class="col-lg-6">
  				<p>8. Date of Birth (In figures) :<span><u>12/25/1998</u></span></p>

  			</div>
  			<div class="col-lg-6">
  				<p>Place of Bith :<span><u>Karachi</u></span></p>
  			</div>
  		</div>
  		<p>Date of Birth (In words) :<span><u>december twelve nineteen ninety-eight</u></span></p>
  		<p>9. Addmission saught for class :<span><u>6th</u></span></p>
  		<p>10. Admission granted for class :<span><u>5th</u></span></p>
  		<p>11. last School & Class Attended :<span><u>sun acadmey & 4th</u></span></p>
    </div>
</body>
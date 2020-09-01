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
            .mainpage{
                text-align: center;

            }
            .halfpage{
                width:800px;
                height: 1160px;
                margin: auto;
                padding: 40px;
                border :2px solid #95B9C7;
                box-shadow: 0 0 10px rgba(0, 0, 0, .15);
                display: inline-block;
                text-align: left;
                
            }
            body{
                background-color: white;
                font-family: 'Roboto', sans-serif;
            }
            p{
                font-family: 'Roboto', sans-serif;
                color: rgb(50,50,50);
                font-size: 14px;
            }
            .rectangular{
                width: 720px;
                border: 2px solid #264a7d;
                padding: 20px 20px 10px;
            }
            span{
                margin-left:7px;
                color:#264a7d;
            }
            .numberbox{
                margin: auto;
                width: 60px;
                height: 82px;
                border: 2px solid #264a7d;;
            }
            h4{
                margin-top: 28px;
                font-family: 'Roboto', sans-serif;
                color:#264a7d;
                text-align: center;
                font-weight: 900;
                font-size: 30px
            }
            h3{
                font-family: 'Roboto', sans-serif;
                color:#264a7d;
                text-align: center;
                font-size: 30px;
                margin: 0px 0px 0px;
                }
            /*}
            table>thead>tr>th,table>tbody>tr>td,th{
                
                padding: 5px 20px 5px;
            }
            }
            th,td{
                width: 100px;
            }
            table{
                margin: auto;
                border-collapse: collapse
            }
            table,th,td{

                border: 1px solid black;
            }
            th{
                color:#264a7d;
            }
            td{
                color: rgb(50,50,50);
            }*/
        </style>

    </head>
    <body>
        <div class="mainpage">
            <div class="halfpage">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="assets/images/med-logo.png" width="100px">
                    </div>
                    <div class="col-lg-6" >
                        <h3><strong>The MEB School</strong></h3>
                    </div>
                    <div class="col-lg-3">
                        <p style="margin-bottom: 0px ; font-size: 10px">St-5,Block-3,F.B Area, Karachi</p>
                        <p style="padding-top: 0px ;font-size: 10px">Ph: 6336335 , 6333824</p>
                    </div>
                </div>
                <br>
                <!-- content -->
                <div class="rectangular">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="numberbox">
                                <h4>1</h4>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Name of the student of the top class :<span><u>Abdullah Asad</u></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Class :<span><u>8th</u></span></p>
                                </div>
                                <div class="col-lg-5">
                                    <p>School :<span><u>MEB School</u></span></p>
                                </div>
                                <div class="col-lg-3">
                                    <p>GR# :<span><u>0908</u></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Full Fee :<span><u>1500/-</u></span></p>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- end content -->
                <br>
                <!-- content -->
                <div class="rectangular">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="numberbox">
                                <h4>2</h4>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Name of the student of the top class :<span><u>Waleed Asad</u></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Class :<span><u>6th</u></span></p>
                                </div>
                                <div class="col-lg-5">
                                    <p>School :<span><u>MEB School</u></span></p>
                                </div>
                                <div class="col-lg-3">
                                    <p>GR# :<span><u>0907</u></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Full Fee :<span><u>1500/-</u></span></p>
                                </div>
                                <div class="col-lg-4">
                                    <p>Discounted Fee : <span><u>1000/-</u></span></p>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- end content -->
                <br>
                <!-- content -->
                <div class="rectangular">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="numberbox">
                                <h4>3</h4>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Name of the student of the top class :<span><u>Waleed Asad</u></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Class :<span><u>6th</u></span></p>
                                </div>
                                <div class="col-lg-5">
                                    <p>School :<span><u>MEB School</u></span></p>
                                </div>
                                <div class="col-lg-3">
                                    <p>GR# :<span><u>0907</u></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Full Fee :<span><u>1500/-</u></span></p>
                                </div>
                                <div class="col-lg-4">
                                    <p>Discounted Fee : <span><u>1000/-</u></span></p>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- end content -->
                <br>
                <!-- content -->
                <div class="rectangular">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="numberbox">
                                <h4>4</h4>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Name of the student of the top class :<span><u>Waleed Asad</u></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Class :<span><u>6th</u></span></p>
                                </div>
                                <div class="col-lg-5">
                                    <p>School :<span><u>MEB School</u></span></p>
                                </div>
                                <div class="col-lg-3">
                                    <p>GR# :<span><u>0907</u></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Full Fee :<span><u>1500/-</u></span></p>
                                </div>
                                <div class="col-lg-4">
                                    <p>Discounted Fee : <span><u>1000/-</u></span></p>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- end content -->
                <br>
                <!-- content -->
                <div class="rectangular">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="numberbox">
                                <h4>5</h4>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Name of the student of the top class :<span><u>Waleed Asad</u></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Class :<span><u>6th</u></span></p>
                                </div>
                                <div class="col-lg-5">
                                    <p>School :<span><u>MEB School</u></span></p>
                                </div>
                                <div class="col-lg-3">
                                    <p>GR# :<span><u>0907</u></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Full Fee :<span><u>1500/-</u></span></p>
                                </div>
                                <div class="col-lg-4">
                                    <p>Discounted Fee : <span><u>1000/-</u></span></p>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- end content -->

                <br>
                <br>
                <div style="border-top: 1px dashed #264a7d; margin-top: "></div>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-lg-7">
                        <p>Father's Name : <span>_______________________________________________</span></p>
                    </div>
                    <div class="col-lg-5">
                        <p>Cell phone : <span>________________________________</span></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Address : <span>______________________________________________________________________________________________________</span></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-7">
                        <p>Date : <span>_________________________________________________________</span></p>
                    </div>
                    <div class="col-lg-5">
                        <p>Signature : <span>_________________________________</span></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <p>School Remarks : <span>______________________________________________________________________________________________</span></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
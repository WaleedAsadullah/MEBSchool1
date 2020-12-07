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

        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- X-editable css -->
        <link type="text/css" href="assets/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>
    <style >
         td,th{text-align: center,}
    </style>
    </head>
<body class="fixed-left">
    <div id="wrapper" class="enlarged">


                    <!--- header -->
                    <?php 
                            include_once("header.php");
                            include_once("db_functions.php")
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
                             <div class="col-lg-12">
                                <div class="card-box">
                                     <div class="m-t-5 m-b-5" style="text-align: center" >
                                         <a  href="Admin-mod-timetable-form.php" > <button type="button" class="btn btn-primary btn w-md waves-effect waves-light"  >+ Add</button></a>
                                        <a> <button type="button" class="btn btn-info btn w-md waves-effect waves-light" > Export </button></a>
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
                            <div class="col-lg-12" >
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Time table </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="sample_data"
                                        class="table table-bordered table-striped"
                                        style="width: 100%;" >
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Day</th>
                                                    <th>Period 1</th>
                                                    <th>Period 2</th>
                                                    <th>Period 4</th>
                                                    <th>Period 5</th>
                                                    <th>Period 6</th>
                                                    <th>Period 7</th>
                                                    <th>Period 8</th>
                                                    <th>Period 9</th>
                                                    <th>Period 10</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>

<script type="text/javascript" language="javascript">

$(document).ready(function(){
    var dataTable = $('#sample_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order":[],
        "ajax":{
            url:"fetch.php",
            type:"POST",
        },
        createdRow:function(row, data, rowIndex)
        {
            $.each($('td', row), function(colIndex){
                if(colIndex == 1)
                {
                    $(this).attr('data-name', 'day');
                    $(this).attr('class', 'day');
                    $(this).attr('data-type', 'text');
                    $(this).attr('data-pk', data[0]);
                }
                if(colIndex == 2)
                {
                    $(this).attr('data-name', 'period1');
                    $(this).attr('class', 'period1');
                    $(this).attr('data-type', 'text');
                    $(this).attr('data-pk', data[0]);
                }
                if(colIndex == 3)
                {
                    $(this).attr('data-name', 'period2');
                    $(this).attr('class', 'period2');
                    $(this).attr('data-type', 'select');
                    $(this).attr('data-pk', data[0]);
                }
                if(colIndex == 4)
                {
                    $(this).attr('data-name', 'period3');
                    $(this).attr('class', 'period3');
                    $(this).attr('data-type', 'select');
                    $(this).attr('data-pk', data[0]);
                }
                if(colIndex == 5)
                {
                    $(this).attr('data-name', 'period4');
                    $(this).attr('class', 'period4');
                    $(this).attr('data-type', 'select');
                    $(this).attr('data-pk', data[0]);
                }
                if(colIndex == 6)
                {
                    $(this).attr('data-name', 'period5');
                    $(this).attr('class', 'period5');
                    $(this).attr('data-type', 'select');
                    $(this).attr('data-pk', data[0]);
                }
                if(colIndex == 7)
                {
                    $(this).attr('data-name', 'period6');
                    $(this).attr('class', 'period6');
                    $(this).attr('data-type', 'select');
                    $(this).attr('data-pk', data[0]);
                }
                if(colIndex == 8)
                {
                    $(this).attr('data-name', 'period7');
                    $(this).attr('class', 'period3');
                    $(this).attr('data-type', 'select');
                    $(this).attr('data-pk', data[0]);
                }
                if(colIndex == 9)
                {
                    $(this).attr('data-name', 'period8');
                    $(this).attr('class', 'period3');
                    $(this).attr('data-type', 'select');
                    $(this).attr('data-pk', data[0]);
                }
                if(colIndex == 10)
                {
                    $(this).attr('data-name', 'period9');
                    $(this).attr('class', 'period9');
                    $(this).attr('data-type', 'select');
                    $(this).attr('data-pk', data[0]);
                }
                if(colIndex == 11)
                {
                    $(this).attr('data-name', 'period10');
                    $(this).attr('class', 'period10');
                    $(this).attr('data-type', 'select');
                    $(this).attr('data-pk', data[0]);
                }
            });
        }
    });

    $('#sample_data').editable({
        container:'body',
        selector:'td.day',
        url:'update.php',
        title:'First Name',
        type:'POST',
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });

    $('#sample_data').editable({
        container:'body',
        selector:'td.period1',
        url:'update.php',
        title:'Last Name',
        type:'POST',
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });

    $('#sample_data').editable({
        container:'body',
        selector:'td.period2',
        url:'update.php',
        title:'Gender',
        type:'POST',
        datatype:'json',
        source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data').editable({
        container:'body',
        selector:'td.period3',
        url:'update.php',
        title:'Gender',
        type:'POST',
        datatype:'json',
        source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data').editable({
        container:'body',
        selector:'td.period4',
        url:'update.php',
        title:'Gender',
        type:'POST',
        datatype:'json',
        source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data').editable({
        container:'body',
        selector:'td.period5',
        url:'update.php',
        title:'Gender',
        type:'POST',
        datatype:'json',
        source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data').editable({
        container:'body',
        selector:'td.period6',
        url:'update.php',
        title:'Gender',
        type:'POST',
        datatype:'json',
        source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data').editable({
        container:'body',
        selector:'td.period7',
        url:'update.php',
        title:'Gender',
        type:'POST',
        datatype:'json',
        source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data').editable({
        container:'body',
        selector:'td.period8',
        url:'update.php',
        title:'Gender',
        type:'POST',
        datatype:'json',
        source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data').editable({
        container:'body',
        selector:'td.period9',
        url:'update.php',
        title:'Gender',
        type:'POST',
        datatype:'json',
        source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data').editable({
        container:'body',
        selector:'td.period10',
        url:'update.php',
        title:'Gender',
        type:'POST',
        datatype:'json',
        source:[{value: "Male", text: "Male"}, {value: "Female", text: "Female"}],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
}); 
</script>
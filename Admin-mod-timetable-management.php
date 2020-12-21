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
<!--             <div class="content-page">
                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" >
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px"> Time table </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="sample_data".$js.""
                                        class="table table-bordered table-striped"
                                        style="width: 100%;" > -->
<?php
function display_query_timetable($sql)
{

$conn = connect_db();
$sql_class = 'SELECT `class_id` FROM `ad_timetable` GROUP BY `class_id`';
$result_class = mysqli_query($conn,$sql_class);
$class = [];
while($row_class = mysqli_fetch_assoc($result_class)){
    array_push($class,$row_class['class_id']);
}
$php_var = sizeof($class);

for ($f=0; $f < sizeof($class) ; $f++) { 


echo'         <div class="content-page">
                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" >
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-5" style="text-align: center; font-size: 22px; padding: 10px">';
                                    $sql_sec = 'SELECT b.`section_name`"section", a.`class_name` "class"FROM `ad_class`a,`ad_section`b WHERE a.`section` =b.`section_id` and `class_id` = '.$class[$f].'';
                                    $result_sec = mysqli_query($conn,$sql_sec);
                                    $row_sec = mysqli_fetch_assoc($result_sec);
                                    echo $row_sec['section'] ." (".$row_sec['class'].")";


                                echo' </h4>
                                    <br>

                                    <div class="table-responsive">
                                        <table id="sample_data'.$f.'"
                                        class="table table-bordered table-striped"
                                        style="width: 100%;" >';


$sql = substr($sql,0,159);
$sql = $sql.'WHERE `class_id` = '.$class[$f].' order by `day_value` ';                                    
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
                                               
   $i = 0;                                     
  while($row = $result->fetch_assoc()) {
    if($i==0)
    {
echo '
                <thead>
                  <tr>
                    ';
$row_data = array_keys($row);
$id_column = "";
for($j=1;$j<count($row_data);$j++){

  if($j==1) $id_column = $row_data[$j];

    echo  "<th>".$row_data[$j]."</th>"; }
                                                   
    echo   '</tr>
         </thead>
      <tbody>';



    }
  $i++;

  
    // echo '<tr>
    //           <td>'.$i.'</td>
    //           <td style="text-align:center;"><a style="color:rgb(16,196,105);" href="'.$_SERVER['PHP_SELF'].'?editid='.$row[$id_column].'"><i class="zmdi zmdi-edit"></i></a></td>
            
    //           <td style="text-align:center;"><a style="color:rgb(255,87,90);" href="'.$_SERVER['PHP_SELF'].'?deleteid='.str_replace(" ","___",$row[$id_column]).'"><i class="fa fa-trash-o" onclick="return confirm(\'Are you sure?\')"></i></a></td>
    //           <td style="text-align:center;"><a style="color:rgb(120,108,150);" href="" ><i  class="zmdi zmdi-local-printshop"></i></a></td>
    //           <td style="text-align:center;"><a style="color:rgb(30,108,180);" href="" ><i class="zmdi zmdi-copy"></i></a></td>';


for($k=1;$k<count($row_data);$k++){ 
    if(substr($row_data[$k],0,3) == 'per'){
        $sql_name = 'SELECT `subject_name` FROM `ad_subject` WHERE `subject_id` = '.$row[$row_data[$k]].'';
        $result_name = mysqli_query($conn,$sql_name);
        $row_name = mysqli_fetch_assoc($result_name);
        // echo  '<td>'.$row_name['subject_name'].'</td>'
        echo '<td data-name="'.$row_data[$k].'" class="'.$row_data[$k].'" data-type="select" data-pk="'.$row[$row_data[0]].'">'.$row_name['subject_name'].'</td>';
           }
    elseif(substr($row_data[$k],0,3) == 'Day'){
    echo '<th data-name="'.$row_data[$k].'" class="'.$row_data[$k].'" data-type="text" data-pk="'.$row[$row_data[0]].'">'.$row[$row_data[$k]].'</th>';}
    else{
    echo '<td data-name="'.$row_data[$k].'" class="'.$row_data[$k].'" data-type="text" data-pk="'.$row[$row_data[0]].'">'.$row[$row_data[$k]].'</td>';}
}

   echo  '</tr>';
  }

    echo '   </tbody>
    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
} else {
  echo "0 results";
}
    

}}

$sql = 'SELECT  `time_id`,`day`"Day", `period1`, `period2`, `period3`, `period4`, `period5`, `period6`, `period7`, `period8`, `period9`, `period10` FROM `ad_timetable`';
display_query_timetable($sql); 
                                           ?>
                                        



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

        <!-- <script>
            $('#mainTable').editableTableWidPOST().numericInputExample().find('td:first').focus();
        </script> -->

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


    // $('#sample_data0').editable({
    //     container:'body',
    //     selector:'th.Day',
    //     url:'update.php',
    //     title:'First Name',
    //     type:'POST',
    //     validate:function(value){
    //         if($.trim(value) == '')
    //         {
    //             return 'This field is required';
    //         }
    //     }
    // });
<?php
$conn = connect_db();
$sql_class = 'SELECT `class_id` FROM `ad_timetable` GROUP BY `class_id`';
$result_class = mysqli_query($conn,$sql_class);
$class = [];
while($row_class = mysqli_fetch_assoc($result_class)){
    array_push($class,$row_class['class_id']);
}
$php_var = sizeof($class);

for ($js=0; $js < $php_var ; $js++) { 
    # code...

echo "
    $('#sample_data".$js."').editable({
        container:'body',
        selector:'td.period1',
        url:'update.php',
        title:'Period-1',
        type:'POST',
        datatype:'json',
        source:[";
        
        $sql_name = 'SELECT `subject_id`,`subject_name` FROM `ad_subject` where `class_id` = '.$class[$js].' ';
        $result_name = mysqli_query($conn,$sql_name);
        while ($row_name = mysqli_fetch_assoc($result_name)){
            echo' {value:"'.$row_name['subject_id'].'", text:"'.$row_name['subject_name'].'"},'; }
       echo"
        ],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });

    $('#sample_data".$js."').editable({
        container:'body',
        selector:'td.period2',
        url:'update.php',
        title:'Period-2',
        type:'POST',
        datatype:'json',
        source:[";
        
        $sql_name = 'SELECT `subject_id`,`subject_name` FROM `ad_subject` where `class_id` = '.$class[$js].' ';
        $result_name = mysqli_query($conn,$sql_name);
        while ($row_name = mysqli_fetch_assoc($result_name)){
            echo' {value:"'.$row_name['subject_id'].'", text:"'.$row_name['subject_name'].'"},'; }
        echo"
       
        ],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data".$js."').editable({
        container:'body',
        selector:'td.period3',
        url:'update.php',
        title:'Period-3',
        type:'POST',
        datatype:'json',
        source:[";
        
        $sql_name = 'SELECT `subject_id`,`subject_name` FROM `ad_subject` where `class_id` = '.$class[$js].' ';
        $result_name = mysqli_query($conn,$sql_name);
        while ($row_name = mysqli_fetch_assoc($result_name)){
            echo' {value:"'.$row_name['subject_id'].'", text:"'.$row_name['subject_name'].'"},'; }
        echo"
       
        ],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data".$js."').editable({
        container:'body',
        selector:'td.period4',
        url:'update.php',
        title:'Period-4',
        type:'POST',
        datatype:'json',
        source:[";
        
        $sql_name = 'SELECT `subject_id`,`subject_name` FROM `ad_subject` where `class_id` = '.$class[$js].' ';
        $result_name = mysqli_query($conn,$sql_name);
        while ($row_name = mysqli_fetch_assoc($result_name)){
            echo' {value:"'.$row_name['subject_id'].'", text:"'.$row_name['subject_name'].'"},'; }
        echo"
       
        ],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data".$js."').editable({
        container:'body',
        selector:'td.period5',
        url:'update.php',
        title:'Period-5',
        type:'POST',
        datatype:'json',
        source:[";
        
        $sql_name = 'SELECT `subject_id`,`subject_name` FROM `ad_subject` where `class_id` = '.$class[$js].' ';
        $result_name = mysqli_query($conn,$sql_name);
        while ($row_name = mysqli_fetch_assoc($result_name)){
            echo' {value:"'.$row_name['subject_id'].'", text:"'.$row_name['subject_name'].'"},'; }
        echo"
       
        ],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data".$js."').editable({
        container:'body',
        selector:'td.period6',
        url:'update.php',
        title:'Period-6',
        type:'POST',
        datatype:'json',
        source:[";
        
        $sql_name = 'SELECT `subject_id`,`subject_name` FROM `ad_subject` where `class_id` = '.$class[$js].' ';
        $result_name = mysqli_query($conn,$sql_name);
        while ($row_name = mysqli_fetch_assoc($result_name)){
            echo' {value:"'.$row_name['subject_id'].'", text:"'.$row_name['subject_name'].'"},'; }
        echo"
       
        ],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data".$js."').editable({
        container:'body',
        selector:'td.period7',
        url:'update.php',
        title:'Period-8',
        type:'POST',
        datatype:'json',
        source:[";
        
        $sql_name = 'SELECT `subject_id`,`subject_name` FROM `ad_subject` where `class_id` = '.$class[$js].' ';
        $result_name = mysqli_query($conn,$sql_name);
        while ($row_name = mysqli_fetch_assoc($result_name)){
            echo' {value:"'.$row_name['subject_id'].'", text:"'.$row_name['subject_name'].'"},'; }
        echo"
       
        ],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data".$js."').editable({
        container:'body',
        selector:'td.period8',
        url:'update.php',
        ttitle:'Period-8',
        type:'POST',
        datatype:'json',
        source:[";
        
        $sql_name = 'SELECT `subject_id`,`subject_name` FROM `ad_subject` where `class_id` = '.$class[$js].' ';
        $result_name = mysqli_query($conn,$sql_name);
        while ($row_name = mysqli_fetch_assoc($result_name)){
            echo' {value:"'.$row_name['subject_id'].'", text:"'.$row_name['subject_name'].'"},'; }
        echo"
       
        ],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data".$js."').editable({
        container:'body',
        selector:'td.period9',
        url:'update.php',
        title:'Period-9',
        type:'POST',
        datatype:'json',
        source:[";
        
        $sql_name = 'SELECT `subject_id`,`subject_name` FROM `ad_subject` where `class_id` = '.$class[$js].' ';
        $result_name = mysqli_query($conn,$sql_name);
        while ($row_name = mysqli_fetch_assoc($result_name)){
            echo' {value:"'.$row_name['subject_id'].'", text:"'.$row_name['subject_name'].'"},'; }
        echo"
       
        ],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });
    $('#sample_data".$js."').editable({
        container:'body',
        selector:'td.period10',
        url:'update.php',
        title:'Period-10',
        type:'POST',
        datatype:'json',
        source:[";
        
        $sql_name = 'SELECT `subject_id`,`subject_name` FROM `ad_subject` where `class_id` = '.$class[$js].' ';
        $result_name = mysqli_query($conn,$sql_name);
        while ($row_name = mysqli_fetch_assoc($result_name)){
            echo' {value:"'.$row_name['subject_id'].'", text:"'.$row_name['subject_name'].'"},'; }
        echo"
       
        ],
        validate:function(value){
            if($.trim(value) == '')
            {
                return 'This field is required';
            }
        }
    });";}
    ?>
}); 
</script>
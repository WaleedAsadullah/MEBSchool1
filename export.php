<?php  

include_once('connect_db.php');
$conn = connect_db();
 if(isset($_POST["export"])) 
 {  
            
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename='.$_POST['name_file'].'.csv');  
          $output = fopen("php://output", "w"); 
          $title = explode("|",$_POST['title']);
         
          fputcsv($output, $title);  
          $query = $_POST["Export"];  
          $result = mysqli_query($conn, $query);  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
          // header('location : C:\xampp\htdocs\school\Admin-mod-section.php');
     }
 ?>  
<?php
function connect_db(){
$type = 0;//1 = online
  if($type == 0){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schoolmeb";
  }
  if($type == 1){
    $servername = "localhost";
    $username = "mebschool";
    $password = "mebschool";
    $dbname = "mebschool";
      }


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

  echo $conn->connect_error;
  
  return "error";
}

return $conn;

}
 ?>
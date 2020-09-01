<?php 
include_once("db_functions.php");
$result_array = array();
/* Create connection */
$conn = connect_db();
/* Check connection  */
if ($conn->connect_error) {
     die("Connection to database failed: " . $conn->connect_error);
}
/* SQL query to get results from database */
$sql = "SELECT `class`, `name_of_student` FROM `ad_admission`";
$result = $conn->query($sql);
/* If there are results from database push to result array */
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($result_array, $row);
    }
}
/* send a JSON encded array to client */
header('Content-type: application/json');
echo json_encode($result_array);
$conn->close();
?>
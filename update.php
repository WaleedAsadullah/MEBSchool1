<?php

//update.php

include('database_connection.php');

$query = "
UPDATE ad_timetable 
SET ".$_POST["name"]." = '".$_POST["value"]."' 
WHERE time_id = '".$_POST["pk"]."'
";

$connect->query($query);

?>

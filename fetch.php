<?php

//fetch.php

include('database_connection.php');

$column = array("time_id", "day", "period1", "period2", "period3","period4","period5","period6","period7","period8","period9","period10");

$query = "SELECT * FROM ad_timetable ";

if(isset($_POST["search"]["value"]))
{
	$query .= '
	WHERE day LIKE "%'.$_POST["search"]["value"].'%" 
	OR period1 LIKE "%'.$_POST["search"]["value"].'%" 
	OR period2 LIKE "%'.$_POST["search"]["value"].'%" 
	OR period3 LIKE "%'.$_POST["search"]["value"].'%" 
	OR period4 LIKE "%'.$_POST["search"]["value"].'%" 
	OR period5 LIKE "%'.$_POST["search"]["value"].'%" 
	OR period6 LIKE "%'.$_POST["search"]["value"].'%" 
	OR period7 LIKE "%'.$_POST["search"]["value"].'%" 
	OR period8 LIKE "%'.$_POST["search"]["value"].'%" 
	OR period9 LIKE "%'.$_POST["search"]["value"].'%" 
	OR period10 LIKE "%'.$_POST["search"]["value"].'%" 
	';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY time_id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
	$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$result = $connect->query($query . $query1);

$data = array();

foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row['time_id'];
	$sub_array[] = $row['day'];
	$sub_array[] = $row['period1'];
	$sub_array[] = $row['period2'];
	$sub_array[] = $row['period3'];
	$sub_array[] = $row['period4'];
	$sub_array[] = $row['period5'];
	$sub_array[] = $row['period6'];
	$sub_array[] = $row['period7'];
	$sub_array[] = $row['period8'];
	$sub_array[] = $row['period9'];
	$sub_array[] = $row['period10'];
	$data[] = $sub_array;
}

function count_all_data($connect)
{
	$query = "SELECT * FROM ad_timetable";

	$statement = $connect->prepare($query);

	$statement->execute();

	return $statement->rowCount();
}

$output = array(
	'draw'		=>	intval($_POST['draw']),
	'recordsTotal'	=>	count_all_data($connect),
	'recordsFiltered'	=>	$number_filter_row,
	'data'		=>	$data
);

echo json_encode($output);

?>
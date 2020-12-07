
<html>
	<head>
		<title>In-Place Editing in DataTable with X-Editable using PHP Ajax</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
	</head>
	<body>
		<div class="container">
			<h3 align="center">In-Place Editing in DataTable with X-Editable using PHP Ajax</h3>
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">Sample Data</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="sample_data" class="tablesaw table m-b-0 tablesaw-columntoggle table-bordered">
							<thead>
								<tr>
									<th>ID</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Gender</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		<br />
		<br />
	</body>
</html>

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
					$(this).attr('data-name', 'first_name');
					$(this).attr('class', 'first_name');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}
				if(colIndex == 2)
				{
					$(this).attr('data-name', 'last_name');
					$(this).attr('class', 'last_name');
					$(this).attr('data-type', 'text');
					$(this).attr('data-pk', data[0]);
				}
				if(colIndex == 3)
				{
					$(this).attr('data-name', 'gender');
					$(this).attr('class', 'gender');
					$(this).attr('data-type', 'select');
					$(this).attr('data-pk', data[0]);
				}
			});
		}
	});

	$('#sample_data').editable({
		container:'body',
		selector:'td.first_name',
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
		selector:'td.last_name',
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
		selector:'td.gender',
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
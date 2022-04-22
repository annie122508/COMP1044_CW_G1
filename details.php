<!DOCTYPE html>
<html>
	<head>
		<title>Update Borrow Details</title>
	</head>

	<body>
	<table border="2">
	
	<tr>
		<th>borrow_details_id</th>
		<th>book_id</th>
		<th>borrow_id</th>
		<th>borrow_status</th>
		<th>date_return</th>
	</tr>
	
	<?php
	$con = mysqli_connect('localhost','root','');
	mysqli_select_db($con,'library');

	$query = "select * from borrowdetails";
	$data = mysqli_query($conn,$query);
	$total = mysqli_num_rows($data);
	
	if($total!=0)
	{
		while($result = mysqli_fetch_array($data))
		{
			echo"
			<tr>
				<td>".$result['borrow_details_id']."</td>
				<td>".$result['book_id']."</td>
				<td>".$result['borrow_id']."</td>
				<td>".$result['borrow_status']."</td>
				<td>".$result['date_return']."</td>
				<td><a href ="updatedetails.php?borrow_details_id=$result['borrow_details_id'] & book_id=$result['book_id'] & borrow_id=$result['borrow_id'] & borrow_status=$result['borrow_status'] & date_return=$result['date_return']">update</td>
			</tr>"; 
		}
	}
	else
	{
		echo "No records found";
	}
	?>
	
	</table>

	</body>

</html>	
	
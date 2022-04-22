<?php
$borrow_details_id = $_GET['borrow_details_id'];
$book_id = $_GET['book_id'];
$borrow_id = $_GET['borrow_id'];
$borrow_status = $_GET['borrow_status'];
$date_return = $_GET['date_return'];
?>

<html>
	<head>
		<title>updatedetails</title>
	</head>
	
	<body>
	<form action="" method="GET">
	<table border="0" bgcolor="black" align="center">
	
		<tr>
			<td>borrow_details_id</td>
			<td><input type="text" value="<?php echo "$borrow_details_id" ?>" name="borrow_details_id" required></td>
		</tr>
		<tr>
			<td>book_id</td>
			<td><input type="text" value="<?php echo "$book_id" ?>" name="book_id" required></td>
		</tr>
		<tr>
			<td>borrow_id</td>
			<td><input type="text" value="<?php echo "$borrow_id" ?>" name="borrow_id" required></td>
		</tr>
		<tr>
			<td>borrow_status</td>
			<td><input type="text" value="<?php echo "$borrow_status" ?>" name="borrow_status" required></td>
		</tr>
		<tr>
			<td>date_return</td>
			<td><input type="text" value="<?php echo "$date_return" ?>" name="date_return" required></td>
		</tr>
	</table>
	</form>
	</body>
</html>
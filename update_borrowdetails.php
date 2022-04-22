<?php
//connect with MYSQL
	$con = mysqli_connect('localhost','root','');
	//Select Database
	mysqli_select_db($con,'library');
	
	//UPDATE QUERY
	$sql = "UPDATE borrowdetails SET book_id='$_POST[book_id]', borrow_id='$_POST[borrow_id]', borrow_status='$_POST[borrow_status]', date_return='$_POST[date_return]' WHERE borrow_datails_id='$_POST[borrow_details_id]';
	
	//Execute the query
	if (mysqli-query($con,$sql))
		header("refresh:1; url=borrowdetails.php");
	else
		echo "Not Update";
?>
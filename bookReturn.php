<?php
	include "conn/session.php";
	include "conn/connect_db.php";
	
	$borrow_id=$_POST['borrow_id'];
		
	//Update data.	
	$sql = "UPDATE borrowdetails SET borrow_status='Returned', date_return=CURRENT_TIMESTAMP() WHERE borrow_id = '$borrow_id'";
	$message="Book return successfully.";
	
	//If user click Return Book button.
	if(isset($_POST['returnBook'])){
		mysqli_query($con, $sql);	
		echo "<script type='text/javascript'>
		alert('$message');
		window.location.href='borrowdetails.php';</script>";
		mysqli_close($con);
	}
?>
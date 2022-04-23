<?php
	//Start session.
	include "conn/session.php";
	
	//Connect to database.
	include "conn/connect_db.php";
	
	//Get data input.
	$borrow_id=$_POST['borrow_id'];
		
	//Update data.	
	$sql = "UPDATE borrowdetails SET borrow_status='Pending',date_return=NULL WHERE borrow_id = '$borrow_id'";
	$message="Book Pending.";
	
	//If user click Set to Pending button.
	if(isset($_POST['bookPending'])){
		mysqli_query($con, $sql);		
		echo "<script type='text/javascript'>
		alert('$message');
		window.location.href='borrowdetails.php';</script>";
		mysqli_close($con);
	}
?>
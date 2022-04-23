<?php 
	//Start session.
	include "conn/session.php";
	
	//Connect to database.
	include "conn/connect_db.php";

	//Get data.
	$borrow_id=$_POST['borrow_id'];

	//Delete data.
	$sql1="	DELETE FROM borrowdetails 
			WHERE borrow_id='$borrow_id'";
	$message="Record succesfully delete.";
	
	if(isset($_POST['deletedata'])){
		mysqli_query($con, $sql1);
		echo "<script type='text/javascript'>
		alert('$message');
		window.location.href='borrowdetails.php';</script>";
		mysqli_close($con);
	}
?>

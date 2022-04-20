<?php	
	if (isset($_POST['go'])){
	require "conn/connect_db.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql="SELECT * FROM user WHERE username= '$username' AND '$password'= '$password'";
	$run = mysqli_query($con,$sql);
	$outcome = mysqli_num_rows($run);
	$outcome2 = mysqli_num_rows(mysqli_query($con,"SELECT * FROM user WHERE username= '".$username."' AND password !='".$password."'"));
	
		if($outcome2 > 0) {
			echo ("<script language='javascript'>
			window.alert('Wrong password.');
			window.location.href='login_page.php';</script>");	
		}elseif($outcome == 0) {
			echo("<script language='javascript'>
			window.alert('User not found.');
			window.location.href='login_page.php';</script>");	
		}elseif($outcome > 0) {
			session_start();
			$_SESSION['username'] = $_POST['username'];
			echo("<script language='javascript'>
			window.alert('Successfully login.');
			window.location.href='main_page.html';</script>");	
		}
	}

?>

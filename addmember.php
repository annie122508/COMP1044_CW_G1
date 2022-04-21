<?php
session_start();
?>

<?php
include 'conn/connect_db.php';
if(isset($_POST['submit'])){
	$MemberID=$_POST['member_id'];
	$Firstname = $_POST['firstname'];
	$Lastname = $_POST['lastname'];
	$Gender = $_POST['gender'];
	$Address = $_POST['address'];
	$Contact = $_POST['contact'];
	$TypeID = $_POST['type_id'];
	$typeID = "SELECT type_id FROM member where type_id = $TypeID";
	$YearLevel = $_POST['year_level'];
	$Status = $_POST['status'];

	//insert data
	
	$sql = "INSERT INTO member (member_id,firstname,lastname,gender,address,contact,type_id,year_level,status)
			VALUES ('$MemberID','$Firstname','$Lastname','$Gender','$Address','$Contact','$typeID','$YearLevel','$Status')";
	
	$result =mysqli_query($con,$sql);
	if(!$result){
		die("ERROR".mysqli_error($con));
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Book</title>
<link rel="stylesheet"href="add.css">
</head>
<body>
<div class="wrapper">
		<div class="multi_color_border"></div>
		<div class="top_nav">
			<div class="left">
				<div class="logo"><p>Online Library<br>Management System</p></div>
			</div>	
		
			<div class="right">
				<ul>
					<li><a href="#">SIGN UP</a></li>
					<li><a href="#">LOGIN</a></li>
				</ul>
			</div>
		</div>

		<div class="bottom_nav">
			<ul>
				<li><a href="#">DASHBOARD</a></li>
				<li><a href="#">CATEGORIES</a></li>
				<li><a href="#">AUTHORS</a></li>
				<li><a href="#">BOOKS</a></li>
				<li><a href="#">ISSUE BOOKS</a></li>
				<li><a href="#">CHANGE PASSWORD</a></li>
			</ul>
		</div>
	</div>
<div class="add-member">
	<form action="addmember.php" method="post">
	<input type="text" class="input-field" placeholder="Member ID">
	<input type="text" class="input-field" placeholder="Firstname">
	<input type="text" class="input-field" placeholder="Lastname">
	<input type="text" class="input-field" placeholder="Gender">
	<input type="text" class="input-field" placeholder="Address">
	<input type="text" class="input-field" placeholder="Contact">
	<input type="text" class="input-field" placeholder="type ID">
	<input type="text" class="input-field" placeholder="year level">
	<input type="text" class="input-field" placeholder="Status">
	<button type="submit" name="submit">submit</button>

	</form>
</div>
</body>

	<style>
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		list-style: none;
		text-decoration: none;
		font-family: 'Georgia', sans-serif;
	}
	body{
		background-color:#fff;
		font-family:sans-serif;
	}
	
	
	.wrapper .multi_color_border{
		width: 100%;
		height: 5px;
		background: linear-gradient(to right, #626567 0%, #186A3B 25%,
			#909497 25%, #239B56 50%, #239B56 50%, #909497 75%,
			#186A3B 75%, #626567 100%)
	}

	.wrapper .top_nav{
		width: 100%;
		height: 65px;
		background: #ccc;
		padding: 0 50px;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	
	.wrapper .top_nav .left{
		display: flex;
		align-items: center;
	}
	
	.wrapper .top_nav .left .logo p{
		font-size: 24px;
		font-weight: bold;
		color: #494949;
		margin-right: 25px;
		font-family: 'Georgia', cursive;
	}
	
	.wrapper .top_nav .right ul{
		display: flex;
	}
	
	.wrapper .top_nav .right ul li{
		margin: 0 12px;
	}
	
	.wrapper .top_nav .right ul li:last-child{
		background: #37a000;
		margin-right: 0;
		border-radius: 2px;
		text-transform: uppercase;
		letter-spacing: 3px;
	}
	
	.wrapper .top_nav .right ul li a{
		display: flex;
		padding: 8px 10px;
		color: #666666;
	}
	
	.wrapper .top_nav .right ul li:last-child a{
		color: #fff;
	}
	
	.wrapper .top_nav .right ul li:hover:last-child{
		background: #494949
	}
	
	.wrapper .bottom_nav{
		width: 100%;
		background: #f9f9f9;
		height: 45px;
		padding: 0 50px;
	}
	
	.wrapper .bottom_nav ul{
		width:100%;
		height: 45px;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	
	.wrapper .bottom_nav ul li a{
		color: #494949;
		letter-spacing: 2px;
		text-transform: uppercase;
		font-size: 12px;
	}
	
	.add-member{
		width:550px;
		background-color:#fff;
		box-shadow:0 0 20px 0 #999;
		top:75%;
		left:50%;
		transform:translate(-50%,-50%);
		position:absolute;
	
	}
	form{
		margin:30px;
		width:200px;
	}
	.input-field{
		width:450px;
		height:30px;
		margin-top:23px;
		padding-left:10px;
		border:1px solid #777;
		border-radius:14px;
		outline:none;
	
	}
	.btn{
		border-radiu:20px;
		color:#fff;
		margin-top:18px;
		padding:10px;
		background-color:#47c35a;
		font-size:12px;
		border:none;
		cursor:pointer:
	}
	</style>

</html>

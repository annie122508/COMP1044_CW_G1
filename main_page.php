<?php
include 'conn/session.php'
?>

<!DOCTYPE html>
<html>
<head>
<title>Main page</title>
<link rel="stylesheet"href="css/mainpage.css">

</head>
<body>
	<script>
		function alert() {
			return confirm("Are you sure to logout?");
		}
	</script>


<div class="wrapper">
		<div class="multi_color_border"></div>
		<div class="top_nav">
			<div class="left">
				<div class="logo"><p>Online Library<br>Management System</p></div>
			</div>	
		
			<div class="right">
				<ul>
					<li><a href="conn/destroy.php" return onclick="alert()" >LOGOUT</a></li>
				</ul>
			</div>
		</div>

		<div class="bottom_nav">
			<ul>
				<li><a href="main_page.php">DASHBOARD</a></li>
				<li><a href="search_member.php">Search member</a></li>
				<li><a href="search.php">Search book</a></li>
				<li><a href="addbook.php">Add book</a></li>
				<li><a href="addmember.php">Add member</a></li>
				<li><a href="books.php">Book List</a></li>
				<li><a href="members.php">Member List</a></li>
				<li><a href="borrowdetails.php">Borrow Details</a></li>
			</ul>
		</div>
	</div>
	<br>
	<center><h1>Welcome to Night Moon Library</h1></center>
	<div class="flex-container">
	<div class="flip-card">
		<div class="flip-card-inner">
			<div class="flip-card-front">
				<img src="images/searchmember.png" alt="Avatar" style="width:130px;height:130px;">
			</div>
			<div class="flip-card-back">
				<br>
				<br>
				<h2><a href="search_member.php">Search Member</a></h2>
			
      
			</div>
		</div>
	</div>
	
	<div class="flip-card">
		<div class="flip-card-inner">
			<div class="flip-card-front">
				<img src="images/searchbook.png" alt="Avatar" style="width:130px;height:130px;">
			</div>
			<div class="flip-card-back">
				<br>
				<br>
				<h2><a href="search_book.php">Search Book</a></h2>
				
			</div>
		</div>
	</div>
	
	<div class="flip-card">
		<div class="flip-card-inner">
			<div class="flip-card-front">
				<img src="images/addbook.png" alt="Avatar" style="width:130px;height:130px;">
			</div>
			<div class="flip-card-back">
			<br>
			<br>
				<h2><a href="addbook.php">Add Book</a></h2>
				
      
			</div>
		</div>
	</div>

	<div class="flip-card">
		<div class="flip-card-inner">
			<div class="flip-card-front">
				<img src="images/addmember.png" alt="Avatar" style="width:140px;height:140px;">
			</div>
			<div class="flip-card-back">
				<br>
				<br>
				<h2><a href="addmember.php">Add Member</a></h2>
				
      
			</div>
		</div>
	</div>

</div>

		<div class="flip-card3">
			<div class="flip-card-inner3">
				<div class="flip-card-front3">
					
				</div>
				<div class="flip-card-back3">
					
		
				</div>
			</div>
		</div>
	

	<div class="flex-container4">
		<div class="flip-card">
			<div class="flip-card-inner">
				<div class="flip-card-front">
					<img src="images/borrowbook.png" alt="Avatar" style="width:130px;height:130px;">
				</div>
				<div class="flip-card-back">
				<br>	
				<br>
				<h2><a href="borrowdetails.php">Borrow Book</a></h2>
		
				</div>
			</div>
		</div>
	</div>

	<div class="flex-container5">
		<div class="flip-card">
			<div class="flip-card-inner">
				<div class="flip-card-front">
					<img src="images/member.png" alt="Avatar" style="width:130px;height:130px;">
				</div>
				<div class="flip-card-back">
				<br>
				<br>
				<h2><a href="members.php">Member List</a></h2>
					
				</div>
			</div>
		</div>
	</div>

	<div class="flex-container6">
		<div class="flip-card">
			<div class="flip-card-inner">
				<div class="flip-card-front">
					<img src="images/book.png" alt="Avatar" style="width:135px;height:135px;">
				</div>
				<div class="flip-card-back">
				<br>
				<br>
				<h2><a href="books.php">Book List</a></h2>
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>
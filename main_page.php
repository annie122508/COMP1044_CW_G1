<?php
    include "conn/session.php"
?>

<!DOCTYPE html>
<html>
<head>
<title>Main page</title>
<link rel="stylesheet"href="css/main_page.css">

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
				<li><a href="main_page.html">DASHBOARD</a></li>
				<li><a href="search_member.php">Search member</a></li>
				<li><a href="search.php">Search book</a></li>
				<li><a href="addbook.php">Add book</a></li>
				<li><a href="addmember.php">Add member</a></li>
				<li><a href="books.php">Book List</a></li>
				<li><a href="members.php">Member List</a></li>
				<li><a href="borrowlist.php">Borrow Details</a></li>
			</ul>
		</div>
	</div>
	<div class="flex-container">
	<div class="flip-card">
		<div class="flip-card-inner">
			<div class="flip-card-front">
				<img src="images/book.png" alt="Avatar" style="width:100px;height:100px;">
			</div>
			<div class="flip-card-back">
				<h1>Books listed</h1>
				<h2>2</h2>
      
			</div>
		</div>
	</div>
	<div class="flip-card">
		<div class="flip-card-inner">
			<div class="flip-card-front">
				<img src="images/user.png" alt="Avatar" style="width:100px;height:100px;">
			</div>
			<div class="flip-card-back">
				<h1>Authors listed</h1>
				<h2>2</h2>
      
			</div>
		</div>
	</div>
	<div class="flip-card">
		<div class="flip-card-inner">
			<div class="flip-card-front">
				<img src="images/users.png" alt="Avatar" style="width:100px;height:100px;">
			</div>
			<div class="flip-card-back">
				<h2>Registered users</h2>
				<h2>6</h2>
      
			</div>
		</div>
	</div>
	<div class="flip-card">
		<div class="flip-card-inner">
			<div class="flip-card-front">
				<img src="images/file.png" alt="Avatar" style="width:100px;height:100px;">
			</div>
			<div class="flip-card-back">
				<h2>Listed categories</h2>
				<h2>6</h2>
      
			</div>
		</div>
	</div>
	</div>

</body>
</html>

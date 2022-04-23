<?php

if(isset($_POST['search']))
{
	$myInput = $_POST['myInput'];
	$query = "SELECT * FROM `member` WHERE CONCAT (`member_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `type_id`, `year_level`, `status`) LIKE '%".$myInput."%'";
	$search_result = filterTable($query);
}
else
{
	$query = "SELECT * FROM `member`";
	$search_result = filterTable($query);
}

function filterTable($query)
{
	$connect = mysqli_connect("localhost", "root", "", "library");
	$filter_Result = mysqli_query($connect, $query);
	return $filter_Result;
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Search Member Engine</title>  
		<link rel="stylesheet" type="text/css" href="css/searchmember.css">	
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
				<li><a href="conn/destroy.php" onclick=" return alert()">LOGOUT</a></li>
				</ul>
			</div>
		</div>

		<div class="bottom_nav">
			<ul>
				<li><a href="main_page.php">DASHBOARD</a></li>
				<li><a href="search_member.php">Search member</a></li>
				<li><a href="search_book.php">Search book</a></li>
				<li><a href="addbook.php">Add book</a></li>
				<li><a href="addmember.php">Add member</a></li>
				<li><a href="books.php">Book List</a></li>
				<li><a href="members.php">Member List</a></li>
				<li><a href="borrowdetails.php">Borrow Details</a></li>
			</ul>
		</div>
	</div>
	
	<div class="search">
		<form action="search_member.php" method="post">
			<h1>Member Search Engine</h1>
				<div class="search_box">
					<input type="text" class="input" name="myInput" placeholder="Search by id, firstname, lastname, gender, type...">
					<input type="submit" class="click" name="search" value="search"><br><br>
				</div>
			<table>
				<tr bgcolor="#9bbad3">
					<th>member_id</th>
					<th>firstname</th>
					<th>lastname</th>
					<th>gender</th>
					<th>address</th>
					<th>contact</th>
					<th>type_id</th>
					<th>year_level</th>
					<th>status</th>
				</tr>

				<?php while($row = mysqli_fetch_array($search_result)):?>
				<tr>
					<td><?php echo $row['member_id'];?></td>
					<td><?php echo $row['firstname'];?></td>
					<td><?php echo $row['lastname'];?></td>
					<td><?php echo $row['gender'];?></td>
					<td><?php echo $row['address'];?></td>
					<td><?php echo $row['contact'];?></td>					
					<td><?php echo $row['type_id'];?></td>
					<td><?php echo $row['year_level'];?></td>
					<td><?php echo $row['status'];?></td>
				</tr>
				
				<?php 
				endwhile;
				?>

				<?php if(mysqli_num_rows($search_result)<=0)
				echo "<center>No members found in the library </center><br><br>" ;
				?>

			</table>
		</form>
	</div>
	
	</body>
</html> 
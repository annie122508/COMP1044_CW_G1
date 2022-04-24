<?php

if(isset($_POST['search']))
{
	$myInput = $_POST['myInput'];
	$query = "SELECT * FROM `book` WHERE CONCAT(`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `date_added`, `status`) LIKE '%".$myInput."%'";
	$search_result = filterTable($query);
}
else
{
	$query = "SELECT * FROM `book`";
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
		<title>Search Engine</title>  
	<link rel="stylesheet" href="css/searchbook.css">
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
		<form action="search_book.php" method="post">
			<h1>Book Search Engine</h1>
				<div class="search_box">
					<input type="text" class="input" name="myInput" placeholder="Search by book title, author name, ISBN, publisher...">
					<input type="submit" class="click" name="search" value="search"><br><br>
				</div>
			<table width= "1550px">
				<center>
				<tr bgcolor= #9bbad3>
					<th>BOOK ID</th>
					<th>BOOK TITLE</th>
					<th>CATEGORY ID</th>
					<th>AUTHOR</th>
					<th>BOOK COPIES</th>
					<th>BOOK PUBLICATION</th>
					<th>PUBLISHER NAME</th>
					<th>ISBN</th>
					<th>COPYRIGHT YEAR</th>
					<th>DATE ADDED</th>
					<th>STATUS</th>
				</tr>
				</center>

				<?php while($row = mysqli_fetch_array($search_result)):?>
				<tr>
					<td><?php echo $row['book_id'];?></td>
					<td><?php echo $row['book_title'];?></td>
					<td><?php echo $row['category_id'];?></td>
					<td><?php echo $row['author'];?></td>
					<td><?php echo $row['book_copies'];?></td>
					<td><?php echo $row['book_pub'];?></td>
					<td><?php echo $row['publisher_name'];?></td>
					<td width="15%"><?php echo $row['isbn'];?></td>
					<td><?php echo $row['copyright_year'];?></td>
					<td><?php echo $row['date_added'];?></td>
					<td><?php echo $row['status'];?></td>
				</tr>
				
				<?php 
				endwhile;
				?>

				<?php if(mysqli_num_rows($search_result)<=0)
				echo "<center>No books found in the library.</center><br><br>" ;
				?>

			</table>
		</form>
	</div>
	
	</body>
</html>
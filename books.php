<?php
include 'conn/session.php'
?>

<html>
<head>
<meta charset="utf-8">
<title>Night Moon Library</title>
<link rel="stylesheet" type="text/css" href="css/book_css.css">
</head>

<body>
	
<script>
		function alert() {
			return confirm("Are you sure to logout?");
		}
		function deletecheck() {
			return confirm("Are you sure you want to delete?")
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

<table width='1500' align='center' border='5'>
	<h1>Book List</h1>
	<tr bgcolor= #9bbad3>
		<th width="5%">BOOK ID</th>
		<th width="15%">BOOK TITLE</th>
		<th width="15%">AUTHOR</th>
		<th width="9%">BOOK COPIES</th>
		<th width="20%">BOOK PUBLICATION</th>
		<th width="20%">PUBLISHER NAME</th>
		<th width="9%">ISBN</th>
		<th width="9%">COPYRIGHT YEAR</th>
		<th width="10%">DATE RECEIVED</th>
		<th width="9%">DATE ADDED</th>
		<th width="9%">STATUS</th>
		<th width="20%">DELETE BOOK</th>
		<th width="9%">Edit</th>
   </tr>
   <tr>
 <?php
include 'conn/connect_db.php';
   $qr = "SELECT * from `book`";
   $run = mysqli_query($con, $qr);
 while(($row=mysqli_fetch_array($run)))
 {
	$book_id = $row['book_id'];
	$book_name = $row['book_title'];
	$author=$row['author'];
	$book_copies=$row['book_copies'];
	$book_publication=$row['book_pub'];
	$publisher_name = $row['publisher_name'];
	$isbn = $row['isbn'];
	$copyright_year=$row['copyright_year'];
	$date_receive=$row['date_receive'];
	$date_added=$row['date_added'];
	$status=$row['status'];	
 ?>
  <center><td><center><?php echo $book_id ;?></center></td>
  <td><center><?php echo $book_name ;?></center></td>
  <td><center><?php echo $author; ?></center></td>
  <td><center><?php echo $book_copies; ?></center></td>
  <td><center><?php echo $book_publication; ?></center></td>
  <td><center><?php echo $publisher_name; ?></center></td>
  <td width="20%"><center><?php echo $isbn; ?></center></td>
  <td><center><?php echo $copyright_year ?></center></td>
  <td><center><?php echo $date_receive; ?></center></td>
  <td><center><?php echo $date_added; ?></center></td>
  <td><center><?php echo $status; ?></center></td>
  <td><center><form name ="button1" action="deletebook.php" method="POST">
		  <input type="hidden" name="book_id" value="<?php echo $book_id; ?>"/>
		  <input id="f1" type="submit" name="deletedata" value="Delete" onclick="return deletecheck();"/>
 	</form>
	 <td><center><form name ="button2" action="updatebook.php" method="POST">
		  <input type="hidden" name="book_id" value="<?php echo $book_id; ?>"/>
		  <input id="f1" type="submit" name="update" value="Edit"/>
 	</form>
 </tr>
 <?php } ?>
 </table>
<br>
 </div>
 </div>
</body>
</html>

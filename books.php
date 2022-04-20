<?php
include 'conn/session.php'
?>

<html>
<head>
<meta charset="utf-8">
<title>Shiba Library</title>
<link rel="stylesheet" type="text/css" href="book_css.css">
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

<table width='800' align='center' border='5'>
   <tr bgcolor='arsenic'>
		<th>BOOK ID</th>
		<th>BOOK NAME</th>
		<th>AUTHOR</th>
		<th>PUBLICATION</th>
		<th>DELETE BOOK</th>
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
	$pub = $row['publisher'];
 ?>
  <center><td><center><?php echo $book_id ;?></center></td>
  <td><center><?php echo $book_name ;?></center></td>
  <td><center><?php echo $author; ?></center></td>
  <td><center><?php echo $pub; ?></center></td>
  <td><center><form name ="button1" action="deletebook.php" method="POST">
		  <input type="hidden" name="book_id" value="<?php echo $book_id; ?>"/>
		  <input type="submit" name="deletedata" value="Delete" onclick="return checkDelete();"/>
 	</form>
 </tr>
 <?php } ?>
 </table>
<br>
 </div>
 </div>
</body>
</html>
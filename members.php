<?php
include 'conn/session.php'
?>

<html>
<head>
<meta charset="utf-8">
<title>Member List</title>
<link rel="stylesheet" type="text/css" href="css/member_css.css">
</head>

<body>
<script>
		function alert() {
			return confirm("Are you sure to logout?");
		}
		function deletecheck() {
			return confirm("Are you sure you want to delete?");
		}
		function editcheck() {
			return confirm("Are you sure you want to edit?");
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

	<h1>Member List</h1>
<table width='1500' align='center' border='5'>
   <tr bgcolor='#9bbad3'>
		<th>Member ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Address</th>
        <th>Contact</th>
        <th>Year Level</th>
        <th>Status</th>
        <th>Delete Member</th>
		<th>Edit</th>
   </tr>
   <tr>
 <?php
include 'conn/connect_db.php';
   $qr = "SELECT * from `member`";
   $run = mysqli_query($con, $qr);
 while(($row=mysqli_fetch_array($run)))
 {
	$member_id = $row['member_id'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$gender = $row['gender'];
    $address = $row['address'];
    $contact = $row['contact'];
    $year_level = $row['year_level'];
    $status = $row['status'];
 ?>
  <center><td><center><?php echo $member_id ;?></center></td>
  <td><center><?php echo $firstname ;?></center></td>
  <td><center><?php echo $lastname; ?></center></td>
  <td><center><?php echo $gender; ?></center></td>
  <td><center><?php echo $address; ?></center></td>
  <td><center><?php echo $contact; ?></center></td>
  <td><center><?php echo $year_level; ?></center></td>
  <td><center><?php echo $status; ?></center></td>
  <td><center><form name ="button1" action="deletemember.php" method="POST">
		  <input type="hidden" name="member_id" value="<?php echo $member_id; ?>"/>
		  <input id="f1" type="submit" name="deletedata" value="Delete" onclick="return deletecheck();"/>
 	</form>
	 <td><center><form name ="button2" action="updatemember.php" method="POST">
		  <input type="hidden" name="member_id" value="<?php echo $member_id; ?>"/>
		  <input id="f1" type="submit" name="update" value="Edit" onclick="return editcheck();"/>
 	</form>
 </tr>
 <?php } ?>
 </table>
<br>
 </div>
 </div>
</body>
</html>


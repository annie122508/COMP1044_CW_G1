<?php
include 'conn/session.php'
?>

<html>
<head>
<meta charset="utf-8">
<title>Shiba Library</title>
<link rel="stylesheet" type="text/css" href="member_css.css">
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
		<th>Member ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Address</th>
        <th>Contact</th>
        <th>Year Level</th>
        <th>Status</th>
        <th>Delete Member</th>
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
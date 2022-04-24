<?php
	session_start();
	include "conn/connect_db.php";

	if(isset($_POST['update'])){
		//Get data input.
		$member_id=$_POST['member_id'];
		$sql1 = "SELECT * FROM member 
				JOIN type USING (type_id)
				WHERE member_id='$member_id'";  
		$result=mysqli_query($con,$sql1);
		$row=mysqli_fetch_array($result);
		$member_id=htmlspecialchars($row['member_id'],ENT_QUOTES);
		$firstname=htmlspecialchars($row['firstname'],ENT_QUOTES);
		$lastname=htmlspecialchars($row['lastname'],ENT_QUOTES);
		$gender=htmlspecialchars($row['gender'],ENT_QUOTES);
		$address=htmlspecialchars($row['address'],ENT_QUOTES);
		$contact=htmlspecialchars($row['contact'],ENT_QUOTES);
		$borrowertype=htmlspecialchars($row['borrower_type'],ENT_QUOTES);
		$borrowertypeid=htmlspecialchars($row['type_id'],ENT_QUOTES);
		$year_level=htmlspecialchars($row['year_level'],ENT_QUOTES);
		$status=htmlspecialchars($row['status'],ENT_QUOTES);
		
		
		//Get borrower type name.   
		$sqlTypeName = "SELECT type_id, borrower_type FROM type";
		$resultTypeName = mysqli_query($con,$sqlTypeName);
?>
<html>
	<head>
		<title>Update member data</title>
		<link rel="stylesheet" type="text/css" href="css/updatemember.css">
		<script>
			function validateForm(){
				var firstName = document.getElementById("firstName").value;
				var lastName = document.getElementById("lastName").value;
				var gender = document.getElementById("gender").value;
				var address = document.getElementById("address").value;
				var contact = document.getElementById("contact").value;
				var borrowerType = document.getElementById("borrowerType").value;
				var yearLevel = document.getElementById("yearLevel").value;
				
				if (firstName == "") {
					alert("Please key in your first name.");
					return false;
				}else if (lastName == "") {
					alert("Please key in your last name.");
					return false;
				}else if (gender == "") {
					alert("Please select your gender.");
					return false;
				}else if (address == "") {
					alert("Please key in your address.");
					return false;
				}else if (contact == "") {
					alert("Please key in your contact.");
					return false;
				}else if (borrowerType == "") {
					alert("Please select user type.");
					return false;
				}else if (yearLevel == "") {
					alert("Please select your year level.");
					return false;
				}else  {
					return true;
				}
			}
		</script>
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
					<li><a href="#">LOGOUT</a></li>
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
				<li><a href="borrowlist.php">Borrow Details</a></li>
			</ul>
		</div>
	</div>
	
		<h1><ins>Update member data</ins><h1>
		<form method="POST">
		<table>
			<tr>
				<td bgcolor= #9bbad3>Member ID:</td> 
				<td><b><?php print $member_id;?></b><input id="memberId" type="hidden" name="memberid" value='<?php print $member_id;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>First Name:</td> 
				<td><input id="firstName" name="firstname" type="text" value='<?php print $firstname;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Last Name:</td> 
				<td><input id="lastName" name="lastname" type="text" value='<?php print $lastname;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Gender:</td>
					<td><select id="gender" name="gender">
					<option value="<?php print $gender;?>"><?php print $gender;?></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					</td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Address:</td> 
				<td><input id="address" name="address" type="text" value='<?php print $address;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Contact:</td> 
				<td><input id="contact" name="contact" type="text" value='<?php print $contact;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Borrower Type:</td>
					<td><select id="borrowerType" name="borrowertype">
					<option value="<?php print $borrowertypeid;?>"><?php print $borrowertype;?></option>
					<?php
					while($rowTypeName=mysqli_fetch_array($resultTypeName)):
					?>
						<option value='<?php echo $rowTypeName[0]?>'><?php echo $rowTypeName[1]?></option>
					<?php
						endwhile;
					?>
					</td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Year level:</td>
					<td><select id="yearLevel" name="yearLevel">
					<option value="<?php print $year_level;?>"><?php print $year_level;?></option>
					<option value="Faculty">Faculty</option>
					<option value="First Year">First Year</option>
					<option value="Second Year">Second Year</option>
					<option value="Third Year">Third Year</option>
					<option value="Fourth Year">Fourth Year</option>
					</td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Status:</td>
					<td><select id="status" name="status">
					<option value="<?php print $status;?>"><?php print $status;?></option>
					<option value="Active">Active</option>
					<option value="Banned">Banned</option>
					</td>
			</tr>
			</table>	
				<input id="f2" name="edit" onclick="return validateForm()" type="submit" name="Update" value="Update">
		</form>
	</body>
</html>
<?php
	}
	
	if(isset($_POST['edit'])){
		//Get data.
		$member_id=$_POST['memberid'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$gender=$_POST['gender'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];
		$TypeId=$_POST['borrowertype'];
		$yearLevel=$_POST['yearLevel'];
		$status=$_POST['status'];			
		
		//Update data.	
		$sql2 = "UPDATE member SET firstname='$firstname', lastname='$lastname', gender='$gender', 
				address='$address', contact='$contact', type_id='$TypeId',
				year_level='$yearLevel', status='$status' 
				WHERE member_id='$member_id'";
		mysqli_query($con, $sql2);	
		echo("<script language='javascript'>
		window.alert('Member update succesfully.');
		window.location.href='members.php';</script>");
		
	}
	
	mysqli_close($con);
?>
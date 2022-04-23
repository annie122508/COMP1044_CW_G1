<?php
	include "conn/session.php";
	include "conn/connect_db.php";
	$sqlbook = "SELECT * FROM book";
	$sqlbookresult = mysqli_query($con,$sqlbook);
	$sqlmember = "SELECT * FROM member";
	$sqlmemberresult = mysqli_query($con,$sqlmember);
?>
<html>
	<head>
		<title>Borrow List</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/borrowdetails.css">
	</head>
	<script language="JavaScript" type="text/javascript">
		function validateform(){
				var bookTitle = document.getElementById("bookTitle").value;
				var memberName = document.getElementById("memberName").value;
				var dueDate = document.getElementById("dueDate").value;
				if (bookTitle == "") {
					alert("Please select book title.");
					return false;
				}else if (memberName == "") {
					alert("Please select book borrower.");
					return false;
				}else if (dueDate == "") {
					alert("Please select a dateline.");
					return false;
				}else  {
					return true;
				}
			}	

		function checkDelete(){
			return confirm('Are you sure you want to delete this record?');
		}

		function whattheheck() {
			return confirm("Are you sure to logout?");
		}

	</script>

	<body>
	<div class="bg-image"></div>
	<div class="wrapper">
		<div class="multi_color_border"></div>
		<div class="top_nav">
			<div class="left">
				<div class="logo"><p>Online Library<br>Management System</p></div>
			</div>	
		
			<div class="right">
				<ul>
				<li><a href="conn/destroy.php" onclick=" return whattheheck()">LOGOUT</a></li>
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
		<h1>Borrow Books</h1>
		<form method="POST">
			<table>
			<tr>
				<td style="background-color: #9bbad3; text-align:left; font-weight: bold ;">Book Title:</td>
					<td style="text-align:left;"><select id="bookTitle" name="booktitle">
					<option value="">Book</option>
					<?php
					while($rowBookTitle=mysqli_fetch_array($sqlbookresult)):
					?>
						<option value='<?php echo $rowBookTitle[0]?>'><?php echo $rowBookTitle[1]?></option>
					<?php
						endwhile;
					?>
					</td>
			</tr>
			<tr>
				<td style="background-color: #9bbad3; text-align:left; font-weight: bold" >Borrower Name:</td>
					<td style="text-align:left;"><select id="memberName" name="membername">
					<option value="">Borrower Name</option>
					<?php
					while($rowMemberNameId=mysqli_fetch_array($sqlmemberresult)):
					?>
						<option value='<?php echo $rowMemberNameId[0]?>'><?php echo $rowMemberNameId[0],'  ', $rowMemberNameId[1], ' ', $rowMemberNameId[2]?></option>
					<?php
						endwhile;
					?>
					</td>
			</tr>
			<tr>
				<td style="background-color: #9bbad3; text-align:left; font-weight: bold">Estimate Date Return:</td>
				<td style="text-align:left; font-weight:bold"><input id="dueDate" name="duedate" type="date"></td>
			</tr>
			</table>
            <input id="f2" onclick="return validateform()" name="submit" value="Borrow" type="submit">
		</form>
	<h1>Borrow List</h1>
<?php
	print "<table border='1'>";
	print "<tr>";
	print "<th style=\"background-color:#9bbad3;\">Borrow ID</th>";
	print "<th style=\"background-color:#9bbad3;\">Book Title</th>";
	print "<th style=\"background-color:#9bbad3;\">Borrower First Name</th>";
	print "<th style=\"background-color:#9bbad3;\">Borrower Last Name</th>";
	print "<th style=\"background-color:#9bbad3;\">Date Borrow</th>";
	print "<th style=\"background-color:#9bbad3;\">Due Date</th>";
	print "<th style=\"background-color:#9bbad3;\">Borrow Status</th>";
	print "<th style=\"background-color:#9bbad3;\">Date Return</th>";
	print "<th style=\"background-color:#9bbad3;\"colspan='3'>Action</th>";

	$sql=mysqli_query($con,"SELECT * FROM borrowdetails JOIN book USING (book_id) JOIN (borrow JOIN member USING (member_id)) USING (borrow_id)");

	
	while($fetch=mysqli_fetch_array($sql)):
	$borrow_id=$fetch['borrow_id'];

	//Display data.
	print "<tr>";
	print "<td>".$fetch['borrow_id']."</td>";
	print "<td>".$fetch['book_title']."</td>";
	print "<td>".$fetch['firstname']."</td>";
	print "<td>".$fetch['lastname']."</td>";
	print "<td>".$fetch['date_borrow']."</td>";
	print "<td>".$fetch['due_date']."</td>";
	print "<td>".$fetch['borrow_status']."</td>";
	print "<td>".$fetch['date_return']."</td>";
?>
	<td>
		<form name="returnBook" action="bookReturn.php" method="POST">
			<input type="hidden" name="borrow_id" value="<?php echo $borrow_id; ?>"/>
			<input id="f1" type="submit" name="returnBook" value="Return Book"/>
		</form>
	</td>
	<td>
		<form name="bookPending" action="bookPending.php" method="POST">
			<input type="hidden" name="borrow_id" value="<?php echo $borrow_id; ?>"/>
			<input id="f1" type="submit" name="bookPending" value="Set to Pending"/>
		</form>
	</td>
	<td>
		<form name="deletedata" action="deleteBorrow.php" method="POST">
			<input type="hidden" name="borrow_id" value="<?php echo $borrow_id; ?>"/>
			<input id="f1" type="submit" name="deletedata" value="Delete" onclick="return checkDelete();"/>
		</form>
	</td>
<?php
	echo "</tr>\n";
	endwhile;
	mysqli_free_result($sql);
	?>
	
		</table>
	</body>
</html>

<?php
	if(isset($_POST['submit'])){
		//Get input values.	
		$bookId = $_POST['booktitle'];
		$memberId = $_POST['membername'];
		
		$date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
		$borrowDate = $date->format('Y-m-d H:i:s');
		$duedate = $_POST['duedate'];
		$borrowStatus = 'pending';
		
		//Insert data.	
		$sql1 = "INSERT INTO borrow(member_id, date_borrow, due_date) 
				VALUES ('$memberId','$borrowDate','$duedate')";
		$select = "SELECT * FROM borrow WHERE member_id = '$memberId' && date_borrow='$borrowDate' && due_date = '$duedate' ";
		mysqli_query($con, $sql1);
		$bummy = mysqli_query($con, $select);
		$fetch2=mysqli_fetch_array($bummy);
		$borrow_id2=$fetch2['borrow_id'];

        $sql2 = "INSERT INTO borrowdetails (book_id, borrow_id, borrow_status)
                VALUES ('$bookId', '$borrow_id2', '$borrowStatus')";
		mysqli_query($con, $sql2);
		echo("<script language='javascript'>
		window.alert('Sucess to borrow book.');
		window.location.href='borrowdetails.php';</script>");
	}
	mysqli_close($con);
?>
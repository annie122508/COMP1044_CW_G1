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
		<title>Borrow New Book</title>
        <link rel="stylesheet" type="text/css" href="css/borrowbook.css"> 
        
		<script>
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
					alert("Please select duedate.");
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
					<li><a href="#">LOGIN</a></li>
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
		<h1><ins>Borrow Book</ins></h1>
		<form method="POST">
			<table>
			<tr>
				<td bgcolor= #9bbad3>Book Title:</td>
					<td><select id="bookTitle" name="booktitle">
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
				<td bgcolor= #9bbad3>Borrower Name:</td>
					<td><select id="memberName" name="membername">
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
				<td bgcolor= #9bbad3>Estimate Date Return:</td>
				<td><input id="dueDate" name="duedate" type="date"></td>
			</tr>
			</table>
            <input id="f2" onclick="return validateform()" name="submit" value="Borrow" type="submit">
		</form>
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
        $sql2 = "INSERT INTO borrowdetails (book_id, borrow_status)
                VALUES ('$bookId', $borrowStatus')";
		mysqli_query($con, $sql1);	
		echo("<script language='javascript'>
		window.alert('Sucess to borrow book.');
		window.location.href='borrowbook.php';</script>");
		
	}
	mysqli_close($con);
?>
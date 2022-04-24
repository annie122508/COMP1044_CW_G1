<?php
session_start();
?>

<?php
	include "conn/connect_db.php";

	if(isset($_POST['update'])){
		$book_id=$_POST['book_id'];
		$sql1 = "SELECT * FROM book 
				JOIN category USING (category_id)
				WHERE book_id='$book_id'";
		$result=mysqli_query($con,$sql1);
		$row=mysqli_fetch_array($result);
		$book_title=htmlspecialchars($row['book_title'],ENT_QUOTES);
		$category_id=htmlspecialchars($row['category_id'],ENT_QUOTES);
		$classname=htmlspecialchars($row['classname'],ENT_QUOTES);
		$author=htmlspecialchars($row['author'],ENT_QUOTES);
		$book_copies=htmlspecialchars($row['book_copies'],ENT_QUOTES);
		$book_pub=htmlspecialchars($row['book_pub'],ENT_QUOTES);
		$publisher_name=htmlspecialchars($row['publisher_name'],ENT_QUOTES);
		$isbn=htmlspecialchars($row['isbn'],ENT_QUOTES);
		$copyright_year=htmlspecialchars($row['copyright_year'],ENT_QUOTES);
		$date_receive=htmlspecialchars($row['date_receive'],ENT_QUOTES);
		$date_added=htmlspecialchars($row['date_added'],ENT_QUOTES);
		$status=htmlspecialchars($row['status'],ENT_QUOTES);
		
		//Get borrower type name.
		$sqlCategoryName = "SELECT category_id , classname FROM category";
		$resultCategoryName = mysqli_query($con,$sqlCategoryName);
?>
<html>
	<head>
		<title>Update Book</title>
		<link rel="stylesheet" type="text/css" href="css/updatebook.css">
		<script>
			function alert() {
			return confirm("Are you sure to logout?");
		}
			function validateForm(){
				var bookTitle = document.getElementById("bookTitle").value;
				var category = document.getElementById("category").vaule;
				var author = document.getElementById("author").value;
				var bookCopies = document.getElementById("bookCopies").value;
				var bookPub = document.getElementById("bookPub").value;
				var publisherName = document.getElementById("publisherName").value;
				var isbn = document.getElementById("isbn").value;
				var copyrightYear = document.getElementById("copyrightYear").value;
				var status = document.getElementById("status").value;
				
				if (bookTitle == "") {
					alert("Please key in book title.");
					return false;
				}else if (category == "") {
					alert("Please select book category.");
					return false;
				}else if (author == "") {
					alert("Please key in book's author.");
					return false;
				}else if (bookCopies == "") {
					alert("Please key in number of book copies.");
					return false;
				}else if (bookCopies < 0) {
					alert("Please key in non negative number for book copies.");
					return false;
				}else if (bookPub == "") {
					alert("Please key in book pub.");
					return false;
				}else if (publisherName == "") {
					alert("Please key in book publisher name.");
					return false;
				}else if (isbn == "") {
					alert("Please key in isbn.");
					return false;
				}else if (copyrig	htYear == "") {
					alert("Please key in copyright year.");
					return false;
				}else if (copyrightYear < 1901 || copyrightYear > 2155) {
					alert("Please key in copyright year between 1900 and 2099.");
					return false;
				}else if (status == "") {
					alert("Please select book status.");
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
		
		<h1><ins>Update Book</ins><h1>
		<form method="POST">
		<table>
			<tr>
				<td bgcolor= #9bbad3>Book ID:</td> 
				<td><b><?php print $book_id;?></b><input name="bookid" type="hidden" size="50" value='<?php print $book_id;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Book Title:</td> 
				<td><input id="bookTitle" name="booktitle" type="text" size="50" value='<?php print $book_title;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Category:</td> 
				<td><select id="categoryType" name="categorytype" >
					<option value="<?php print $category_id;?>"><?php print $classname;?></option>
					<?php
					while($rowCtegoryName=mysqli_fetch_array($resultCategoryName)):
					?>
						<option value='<?php echo $rowCtegoryName[0]?>'><?php echo $rowCtegoryName[1]?></option>
					<?php
						endwhile;
					?>
					</td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Author:</td>
				<td><input id="author" name="author" type="text" size="50" value='<?php print $author;?>'></td>
			</tr>
			<tr><td bgcolor= #9bbad3>Book Copies:</td> 
				<td><input id="bookCopies" name="book_copies" type="number" min="0" size="50" value='<?php print $book_copies;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Book pub:</td>
				<td><input id="bookPub" name="bookpub" size="50" type="text" value='<?php print $book_pub;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Publisher name:</td>
				<td><input id="publisherName" name="publishername" size="50" type="text" value='<?php print $publisher_name;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>isbn:</td>
				<td><input id="isbn" name="isbn" size="50" type="text" value='<?php print $isbn;?>'></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Copyright year:</td>
				<td><input id="copyrightYear" name="copyrightyear" size="50" type="number" min="1901" max="2155" step="1" value='<?php print $copyright_year;?>'></td>

			</tr>
			<tr>
				<td bgcolor= #9bbad3>Date recieve:</td>
				<td><input name="daterecieve" type="hidden" value='<?php print $date_receive;?>'><?php print $date_receive;?></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Date added:</td>
				<td><input name="dateadded" type="hidden" value='<?php print $date_added;?>'><?php print $date_added;?></td>
			</tr>
			<tr>
				<td bgcolor= #9bbad3>Status:</td>
					<td><select id="status" name="status" >
					<option value='<?php print $status;?>'><?php print $status;?></option>
					<option value="New">New</option>
					<option value="Archive">Archive</option>
					<option value="Damage">Damage</option>
					<option value="Lost">Lost</option>
					<option value="Old">Old</option>
					</td>
			</tr>
			</table>
				<td><input id="f2" name="edit" onclick= "return validateForm()" type="submit" name="Update" value="Update"></td>
		</form>
	</body>
</html>
<?php
	}
	
	if(isset($_POST['edit'])){
		//Get data.
		$book_id=$_POST['bookid'];
		$book_title=$_POST['booktitle'];
		$category_id=$_POST['categorytype'];
		$author=$_POST['author'];
		$book_copies=$_POST['book_copies'];
		$book_pub=$_POST['bookpub'];
		$publisher_name=$_POST['publishername'];
		$isbn=$_POST['isbn'];
		$copyright_year=$_POST['copyrightyear'];
		$date_receive=$_POST['daterecieve'];
		$date_added=$_POST['dateadded'];
		$status=$_POST['status'];		
		
		//Update data.	
		$sql = "UPDATE book SET book_title ='$book_title', category_id='$category_id',
				author='$author',book_copies='$book_copies',book_pub='$book_pub',
				publisher_name='$publisher_name',isbn='$isbn',copyright_year='$copyright_year',
				date_receive='$date_receive',date_added='$date_added',status='$status' 
				WHERE book_id='$book_id'";
		mysqli_query($con, $sql);	
		echo("<script language='javascript'>
		window.alert('Book update succesfully.');
		window.location.href='books.php';</script>");
		
	}
	
	mysqli_close($con);
?>
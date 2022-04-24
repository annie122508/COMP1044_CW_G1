<?php
session_start();
?>

<?php
include 'conn/connect_db.php';
if(isset($_POST['submit'])){
	$BookName = $_POST['book_title'];
	$CategoryID = $_POST['category_id'];
	$Author = $_POST['author'];
	$Bookcopies = $_POST['book_copies'];
	$BookPub = $_POST['book_pub'];
	$Publisher = $_POST['publisher_name'];
	$ISBN = $_POST['isbn'];
	$Copyright = $_POST['copyright_year'];
	$DateReceived = $_POST['date_receive'];
	$DateAdded = $_POST['date_added'];
	$status = $_POST['status'];


	//insert data
	
	$sql = "INSERT INTO book (book_title, category_id, author,book_copies,book_pub,publisher_name,isbn,copyright_year,date_receive,date_added,`status`)
			VALUES ('$BookName','$CategoryID','$Author','$Bookcopies','$BookPub','$Publisher','$ISBN','$Copyright','$DateReceived','$DateAdded','$status')";
    
	$result=mysqli_query($con,$sql);

	if ($result) {
		echo "<script>window.alert('New record created successfully.');</script>";
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$con->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Book</title>
<link rel="stylesheet" type="text/css" href="css/addbook.css">
<script>
	function validationForm(){
		
			var book_title = document.getElementById("book_title").value;
			var category_id = document.getElementById("category_id").value;
			var author = document.getElementById("author").value;
            var book_copies = document.getElementById("book_copies").value;
            var book_pub = document.getElementById("book_pub").value;
            var publisher_name  = document.getElementById("publisher_name").value;
			var isbn = document.getElementById("isbn").value;
			var copyright_year = document.getElementById("copyright_year").value;
			var date_receive = document.getElementById("date_receive").value;
			var date_added = document.getElementById("date_added").value;
			var status = document.getElementById("status").value;

            if ( book_title == "" ) {
				    alert("Please fill in the blank of the book title.");
					return false;
				}
			else if(category_id == "" ){	
					alert("Please fill in the blank of the category id.");
					return false;
				}
			else if(author == "" ){	
					alert("Please fill in the blank of the author.");
					return false;
				}
			else if(book_copies =="" ){	
					alert("Please fill in the blank of the book_copies.");
					return false;
				}
			else if(book_pub =="" ){	
					alert("Please fill in the blank of the book_pub.");
					return false;
				}
			else if(publisher_name == "" ){	
					alert("Please fill in the blank of the publisher_name.");
					return false;
				}
			else if(isbn == "" ){	
					alert("Please fill in the blank of the isbn.");
					return false;
				}	
			else if(copyright_year == "" ){	
					alert("Please fill in the blank of the copyright_year.");
					return false;
				}
			else if(date_receive == ""){	
				alert("Please fill in the blank of the date_receive.");
				return false;
				}

			else if(date_added == ""){	
				alert("Please fill in the blank of the date_added.");
				return false;
				}

			else if(status == ""){	
				alert("Please fill in the blank of the status.");
				return false;
				}
				else {
                    return true;
                }
			}
</script>
</head>
<body>
<script>
		function bullshit() {
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
				<li><a href="conn/destroy.php" onclick=" return bullshit()">LOGOUT</a></li>
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
	<h1>Add Books</h1>
<div class="add-book">
	<form method="POST">
	<input type="text"  id="book_title" placeholder="Book Name" name="book_title">
	<input type="text"  id="category_id"  placeholder="Category ID" name="category_id">
	<input type="text"  id="author" placeholder="Author" name="author">
	<input type="text"  id="book_copies" placeholder="Book copies" name="book_copies">
	<input type="text"  id="book_pub" placeholder="Book Pub" name="book_pub">
	<input type="text"  id="publisher_name" placeholder="Publisher" name="publisher_name">
	<input type="text"  id="isbn" placeholder="ISBN" name="isbn">
	<input type="text"  id="copyright_year" placeholder="Copyright" name="copyright_year">
	<input type="text"  id="date_receive" placeholder="date received" name="date_receive">
	<input type="text"  id="date_added" placeholder="date added "name="date_added">
	<input  type="text" id="status" placeholder="status" name="status">
	<input onclick="return validationForm()" id="button" type="submit" name="submit" value="Submit"></button>
	</form>
	<style>
		
	</style>
</div>
</body>

</html>
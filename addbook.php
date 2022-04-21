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
	//$message = "Successfully added";

	//insert data
	
	$sql = "INSERT INTO book (book_title,category_id,author,book_copies,book_pub,publisher_name,isbn,copyright_year,date_receive,date_added,`status`)
			VALUES ('$BookName','$CategoryID','$Author','$Bookcopies','$BookPub','$Publisher','$ISBN','$Copyright','$DateReceived','$DateAdded','$status')";
    
	$result= mysqli_query($con,$sql);
	$message="Successfully added the book";
	$message2="Unable to add the data into the database";

	if ($result) {
		echo "<script type='text/javascript'>
    	alert('$message');
   		window.location.href='addbook.php'; </script>";
		} else {
		echo "<script type='text/javascript'>
    	alert('$message2');
   		window.location.href='addbook.php'; </script> " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
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
<title>Add Book</title>

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
<div class="add-book">
	<form method="POST">
	<input type="text" class="input-field" id="book_title" placeholder="Book Name" name="book_title">
	<input type="text" class="input-field" id="category_id" placeholder="Category ID" name="category_id">
	<input type="text" class="input-field" id="author" placeholder="Author" name="author">
	<input type="text" class="input-field" id="book_copies" placeholder="Book copies" name="book_copies">
	<input type="text" class="input-field" id="book_pub" placeholder="Book Pub" name="book_pub">
	<input type="text" class="input-field" id="publisher_name" placeholder="Publisher" name="publisher_name">
	<input type="text" class="input-field" id="isbn" placeholder="ISBN" name="isbn">
	<input type="text" class="input-field" id="copyright_year" placeholder="Copyright" name="copyright_year">
	<input type="text" class="input-field" id="date_receive" placeholder="date received" name="date_receive">
	<input type="text" class="input-field" id="date_added" placeholder="date added "name="date_added">
	<input class="input-field" type="text" id="status" placeholder="status" name="status">
	<button onclick="return validationForm()" type="submit"  id="button" name="submit">submit</button>

	</form>
</div>
</body>
<style>
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		list-style: none;
		text-decoration: none;
		font-family: 'Georgia', sans-serif;
	}
body{
	background-color:#fff;
	font-family:sans-serif;
}
	
	
	.wrapper .multi_color_border{
		width: 100%;
		height: 5px;
		background: linear-gradient(to right, #626567 0%, #186A3B 25%,
			#909497 25%, #239B56 50%, #239B56 50%, #909497 75%,
			#186A3B 75%, #626567 100%)
	}

	.wrapper .top_nav{
		width: 100%;
		height: 65px;
		background: #ccc;
		padding: 0 50px;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	
	.wrapper .top_nav .left{
		display: flex;
		align-items: center;
	}
	
	.wrapper .top_nav .left .logo p{
		font-size: 24px;
		font-weight: bold;
		color: #494949;
		margin-right: 25px;
		font-family: 'Georgia', cursive;
	}
	
	.wrapper .top_nav .right ul{
		display: flex;
	}
	
	.wrapper .top_nav .right ul li{
		margin: 0 12px;
	}
	
	.wrapper .top_nav .right ul li:last-child{
		background: #37a000;
		margin-right: 0;
		border-radius: 2px;
		text-transform: uppercase;
		letter-spacing: 3px;
	}
	
	.wrapper .top_nav .right ul li a{
		display: flex;
		padding: 8px 10px;
		color: #666666;
	}
	
	.wrapper .top_nav .right ul li:last-child a{
		color: #fff;
	}
	
	.wrapper .top_nav .right ul li:hover:last-child{
		background: #494949
	}
	
	.wrapper .bottom_nav{
		width: 100%;
		background: #f9f9f9;
		height: 45px;
		padding: 0 50px;
	}
	
	.wrapper .bottom_nav ul{
		width:100%;
		height: 45px;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	
	.wrapper .bottom_nav ul li a{
		color: #494949;
		letter-spacing: 2px;
		text-transform: uppercase;
		font-size: 12px;
	}
	
.add-book{
	width:550px;
	background-color:#fff;
	box-shadow:0 0 20px 0 #999;
	top:75%;
	left:50%;
	transform:translate(-50%,-50%);
	position:absolute;
	
}
form{
	margin:30px;
	width:200px;
}
.input-field{
	width:450px;
	height:30px;
	margin-top:23px;
	padding-left:10px;
	border:1px solid #777;
	border-radius:14px;
	outline:none;
	
}
.btn{
	border-radiu:20px;
	color:#fff;
	margin-top:18px;
	padding:10px;
	background-color:#47c35a;
	font-size:12px;
	border:none;
	cursor:pointer:
}

#button {
		width:450px;
		height:30px;
		margin-top:23px;
		padding-left:10px;
		border:1px solid #777;
		border-radius:14px;
		outline:none;
		cursor: pointer;
	}
</style>
</html>
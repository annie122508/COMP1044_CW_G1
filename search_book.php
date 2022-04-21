<?php

if(isset($_POST['search']))
{
	$myInput = $_POST['myInput'];
	$query = "SELECT * FROM `book` WHERE CONCAT(`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `date_added`, `status`) LIKE '%".$myInput."%'";
	$search_result = filterTable($query);
}
else
{
	$query = "SELECT * FROM `book`";
	$search_result = filterTable($query);
}

function filterTable($query)
{
	$connect = mysqli_connect("localhost", "root", "", "library");
	$filter_Result = mysqli_query($connect, $query);
	return $filter_Result;
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Search Engine</title>  
	<style>
	
	table, tr, th, td{
		border-collapse: collapse;
		text-align: center;
		border: 2px solid #4682B4;
		padding-top: 5px;
		padding-right: 5px;
		padding-bottom: 5px;
		padding-left: 5px;
		font-family: 'Rockwell';
		margin: 25px 75px 25px 75px;
		font-size: 14px;
	}
	
	</style>
	
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
	
	<div class="search">
		<form action="search_book.php" method="post">
			<h1>Book Search Engine</h1>
				<div class="search_box">
					<input type="text" class="input" name="myInput" placeholder="Search by book title, author name, ISBN, publisher...">
					<input type="submit" class="click" name="search" value="search"><br><br>
				</div>
			<table>
				<center>
				<tr>
					<th width="9%">book_id</th>
					<th width="9%">book_title</th>
					<th width="9%">category_id</th>
					<th width="9%">author</th>
					<th width="9%">book_copies</th>
					<th width="9%">book_pub</th>
					<th width="9%">publisher_name</th>
					<th width="10%">isbn</th>
					<th width="9%">copyright_year</th>
					<th width="9%">date_added</th>
					<th width="9%">status</th>
				</tr>
				</center>

				<?php while($row = mysqli_fetch_array($search_result)):?>
				<tr>
					<td><?php echo $row['book_id'];?></td>
					<td><?php echo $row['book_title'];?></td>
					<td><?php echo $row['category_id'];?></td>
					<td><?php echo $row['author'];?></td>
					<td><?php echo $row['book_copies'];?></td>
					<td><?php echo $row['book_pub'];?></td>
					<td><?php echo $row['publisher_name'];?></td>
					<td width="15%"><?php echo $row['isbn'];?></td>
					<td><?php echo $row['copyright_year'];?></td>
					<td><?php echo $row['date_added'];?></td>
					<td><?php echo $row['status'];?></td>
				</tr>
				
				<?php 
				endwhile;
				?>

				<?php if(mysqli_num_rows($search_result)<=0)
				echo "<center>No books found in the library </center><br><br>" ;
				?>

			</table>
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
	
	.search h1{
		margin: 50px 0px 20px 0px;
		font-size: 30px;
		text-align: center;
	}
	
	.search .search_box{
		position: relative;
		padding: 20px 50px;
		text-align: center;
	}
		
	.search .search_box .input{
		width: 450px;
		height: 55px;
		border: 1px solid #4682B4;
		padding: 15px 30px;
		border-radius: 30px;
		color: #000000;
		font-size: 15px;
		outline: none;
	}
	
	.search .search_box .click{
		position: absolute;
		cursot: pointer;
		width: 120px;
		height: 55px;
		background: #7690da;
		color: #000000;
		border: 1px solid #4682B4;
		font-size: 15px;
		outline: none;
		font-weight: bold;
		border-radius: 30px;
	}
		
	</style>

</html>
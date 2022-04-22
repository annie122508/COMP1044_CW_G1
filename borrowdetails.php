<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Member Record</title>  
	
	<style>
	
	table, tr, th, td{
		border-collapse: collapse;
		margin: 0 auto;
		text-align: center;
		border: 2px solid #4682B4;
		padding: 5px 5px 5px 5px;
		font-family: 'Rockwell';
	}
	
	</style>
	
</head>

<body>

<?php
	//Connect with MYSQL
	$con = mysqli_connect('localhost','root','');
	//Select Database
	mysqli_select_db($con,'library');
	
	//SELECT QUERY
	$sql = "SELECT * FROM borrowdetails";
	
	//Execute the query
	$records = mysqli_query($con,$sql);
?>
	
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
	
	<div class="update">
		<form action="update_borrowdetails.php" method="post">
			<h1>Borrow Details Update</h1>
				<div class="update_form">
					<input type="text" class="input" name="borrow_details_id" placeholder="borrow_details_id"><br><br>
					<input type="text" class="input" name="book_id" placeholder="book_id"><br><br>
					<input type="text" class="input" name="borrow_id" placeholder="borrow_id"><br><br>
					<input type="text" class="input" name="borrow_status" placeholder="borrow_status"><br><br>
					<input type="text" class="input" name="date_return" placeholder="date_return"><br><br>
					<input type="submit" class="click" name="update" value="renew"><br><br>
				</div>
		</form>
	
		<table>
			<tr>
				<th>borrow_details_id</th>
				<th>book_id</th>
				<th>borrow_id</th>
				<th>borrow_status</th>
				<th>date_return</th>
			</tr>

			<?php while($row = mysqli_fetch_array($records)):?>
			<tr>
				<td><?php echo $row['borrow_details_id'];?></td>
				<td><?php echo $row['book_id'];?></td>
				<td><?php echo $row['borrow_id'];?></td>
				<td><?php echo $row['borrow_status'];?></td>
				<td><?php echo $row['date_return'];?></td>
			</tr>
	
			<?php
			endwhile;
			?>
	
		</table>
	</div>
	
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
	
	.update h1{
		margin: 50px 0px 20px 0px;
		font-size: 30px;
		text-align: center;
	}
	
	.update .update_form{
		padding: 20px 50px;
		text-align: center;
	}
		
	.update .update_box .input{
		width: 400px;
		height: 55px;
		border: 1px solid #4682B4;
		padding: 15px 30px;
		border-radius: 30px;
		color: #000000;
		font-size: 15px;
		outline: none;
	}
	
	.update .update_box .click{
		cursot: pointer;
		width: 400px;
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

</body>

</html>
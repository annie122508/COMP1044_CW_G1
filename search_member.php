<?php

if(isset($_POST['search']))
{
	$myInput = $_POST['myInput'];
	$query = "SELECT * FROM `member` WHERE CONCAT (`member_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `type_id`, `year_level`, `status`) LIKE '%".$myInput."%'";
	$search_result = filterTable($query);
}
else
{
	$query = "SELECT * FROM `member`";
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
		<title>Search Member Engine</title>  
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
		<form action="search_member.php" method="post">
			<h1>Member Search Engine</h1>
				<div class="search_box">
					<input type="text" class="input" name="myInput" placeholder="Search by id, firstname, lastname, gender, type...">
					<input type="submit" class="click" name="search" value="search"><br><br>
				</div>
			<table>
				<tr>
					<th>member_id</th>
					<th>firstname</th>
					<th>lastname</th>
					<th>gender</th>
					<th>address</th>
					<th>contact</th>
					<th>type_id</th>
					<th>year_level</th>
					<th>status</th>
				</tr>

				<?php while($row = mysqli_fetch_array($search_result)):?>
				<tr>
					<td><?php echo $row['member_id'];?></td>
					<td><?php echo $row['firstname'];?></td>
					<td><?php echo $row['lastname'];?></td>
					<td><?php echo $row['gender'];?></td>
					<td><?php echo $row['address'];?></td>
					<td><?php echo $row['contact'];?></td>					
					<td><?php echo $row['type_id'];?></td>
					<td><?php echo $row['year_level'];?></td>
					<td><?php echo $row['status'];?></td>
				</tr>
				
				<?php 
				endwhile;
				?>

				<?php if(mysqli_num_rows($search_result)<=0)
				echo "<center>No members found in the library </center><br><br>" ;
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
		width: 400px;
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

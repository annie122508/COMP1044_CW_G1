<?php
include "conn/session.php";
?>


<?php
include 'conn/connect_db.php';
if(isset($_POST['submit'])){
	$Firstname = $_POST['Firstname'];
	$Lastname = $_POST['Lastname'];
	$type_id = $_POST['type_id'];
	$Gender = $_POST['Gender'];
	$Address = $_POST['address'];
	$Contact = $_POST['contact'];
	$Year_level = $_POST['year_level'];

	//insert data
	
	$sql = "INSERT INTO member (firstname, lastname , `type_id`, gender, `address`, contact, year_level)
			VALUES ('$Firstname','$Lastname','$type_id','$Gender','$Address','$Contact','$Year_level')";
    
	$result=mysqli_query($con,$sql);

	if ($result) {
		echo "New record created successfully";
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$con->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<script>
	function validationForm(){
			var Gender = document.getElementById("Gender").value;
			var Firstname = document.getElementById("Firstname").value;
			var Lastname = document.getElementById("Lastname").value;
            var Address = document.getElementById("Address").value;
            var type_id = document.getElementById("type_id").value;
            var Contact = document.getElementById("Contact").value;
            if (Firstname == "" || Lastname == "" || Gender == "" || type_id =="" || Address =="" || Contact == "") {
				    alert("Please fill in the blanks.");
					return false;
				}else {
                    return true;
                }
			}	
	</script>
<title>Add Member</title>
<link rel="stylesheet" type="text/css" href="css/addmember.css">

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
<div class="add-member">
	<form method="POST">
	<input type="text" id="Firstname" name="Firstname" placeholder="Firstname">
	<input type="text" id="Lastname" name="Lastname" placeholder="Lastname">
    <input type="text" id="type_id" placeholder="Type ID" name="type_id">
    <!-- type id must be valid with database -->
	<input type="text" id="Gender" name="Gender" placeholder="Gender">
	<input type="text" id="Address" name="address" placeholder="Address">
	<input type="text" id="Contact" name="contact" placeholder="Contact">
    <input type="text" id="Year_level" name="year_level" placeholder="Year Level">
    <input onclick="return validationForm()" id="button" type="submit" name="submit" value="Submit"></button>
        </form>
</div>

<script>

</script>
</body>


</html>
<?php
include "conn/connect_db.php";
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <link rel="stylesheet" href="css/login_page.css">
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/1164/1164713.png"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
  <title>Library</title>
  <script>
            function validateForm(){
				var user = document.getElementById("name").value;
				var pwd = document.getElementById("myInput").value;
				if (user == "") {
					alert("Please enter username");
					return false;
				}else if (pwd == "")  {
					alert("Please enter password");
					return false;
				}else  {
					return true;
				}
			}
  </script>
</head>

<body>
<div id="bg"></div>
<div id="ug"><img src="images/Librarypic.png" alt=""></div>

<div id="mainButton">
    <form name="input" method="post" autocomplete="off" >
	
	<div class="btn-text" onclick="openForm()">Sign In</div>
	<div class="modal"> 
		<div class="close-button" onclick="closeForm()">x</div>
		<div class="form-title">Sign In</div>
		<div class="input-group">
			<input type="text" id="name" name="username" onblur="checkInput(this)" />
			<label for="name">Username</label>
		</div>
		<div class="input-group">
			<input type="password" required id="myInput" name="password" onblur="checkInput(this)"/>
			<label for="password">Password</label>
            <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
		</div>
		<div class="form-button">
            <input type="submit" formaction="login_process.php" onclick="return validateForm()" value="Go" name="go">	
        </div>
	</div>
</form>
</div>
</section>

<script>
var button = document.getElementById('mainButton');

var openForm = function() {
	button.className = 'active';
};

var checkInput = function(input) {
	if (input.value.length > 0) {
		input.className = 'active';
	} else {
		input.className = '';
	}
};


var closeForm = function() {
	button.className = '';
};

const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#myInput');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');


});
</script>
</body>
</html>

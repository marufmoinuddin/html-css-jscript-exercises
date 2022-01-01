<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="css/register.css">
<link rel = "icon" href ="https://img.icons8.com/color/48/000000/treatment-plan.png" type = "image/x-icon">
</head>
<body>
<div id="container">
	<img id="bannerpic" src="Untitled-2.png">
	<div id="form" class="center">
			<form action="" method="post" id="registration">
				<table class="center" border="0" width="300px" height="60px">
				<tr><td><center><h3>Register</h3></center></td></tr>
				<tr><td></td></tr>
				<tr><td><label>Name:</label></td></tr>
				<tr><td><input type="text" id="name" name="name"></input></td></tr>
				<tr><td><label>NID:</label></td></tr>
				<tr><td><input type="text" id="nid" name="nid"></input></td></tr>
				<tr><td><label>Date of Birth:</label></td></tr>
				<tr><td><input type="text" id="dob" name="dob" placeholder="dd-mm-yyyy"></input></td></tr>
				<tr><td><label>Gender:</label></td><tr>
				<tr><td>
					<input type="radio" id="genderm" name="gender" value="Male"></input>
					<label for="genderm">Male</label>
				</td></tr>
				<tr><td>
					<input type="radio" id="genderf" name="gender" value="Female"></input>
					<label for="genderf">Female</label>
				</td></tr>
				<tr><td><label>Address:</label></td></tr>
				<tr><td><input type="text" id="address" name="address"></input></td></tr>
				<tr><td><label>Phone:</label></td></tr>
				<tr><td><input type="number" id="phone" name="phone"></input></td></tr>
				<tr><td><label>Password:</label></td></tr>
				<tr><td><input type="text" id="password" name="pass"></input></td></tr>
				<tr><td><button type="submit" name="register" value="yes">Register</button></td></tr>
				</table>
			</form>
			
			<?php
				if (isset($_POST['register'])){
					require_once('dbconnect.php');
					
					$nid = $_POST['nid'];
					$pass = $_POST['pass'];
					$n = $_POST['name'];
					$g = $_POST['gender'];
					$dob = $_POST['dob'];
					$age = '21';
					//$age = date_diff(date_create($dob), date_create('now'));
					$add = $_POST['address'];
					$p = $_POST['phone'];
					
					
					$sql = "INSERT INTO user VALUES( '$nid', '$pass', '$n', '$g', '$dob', '$age', '$add', '$p')";
					//echo $sql; 
					$result = mysqli_query($conn, $sql);
	
					//check if this insertion is happening in the database
					if(mysqli_affected_rows($conn)){ ?>
						<script>document.getElementById("registration").style.display="none";</script>
						<center><b><br><br><br><br><br><br><br>Account registered!</b><br><br><br><br><br><br><br>
						
					<?php 
					}
					else{
						echo "Insertion Failed";
					}
			} ?>
			<div id="logreg">
		<center>Already have an account? <a href="login.php"><button>Login</button></a></center><br>
		<center>Skip login? <b>Some features will be missing.</b> <button onclick="document.location.href='dashboard.php';return false;">Skip</button></a></center></div>
	</div>
</div>
</body>
</html>
<html>
<head>
<title>Login</title>
<link rel = "icon" href ="https://img.icons8.com/color/48/000000/treatment-plan.png" type = "image/x-icon">
<link rel="stylesheet" href="css/index.css">
</head>
<body>
<div id="container">
	<img id="bannerpic" src="Untitled-2.png">
	<div id="form" class="center">
		<form action="" spellcheck="false" method="post">
			<table class="center" border="0" width="300px" height="60px">
			<tr><td><center><h3>Login</h3></center></td></tr>
			<tr><td></td></tr>
			<tr><td><label>NID:</label></td></tr>
			<tr><td><input type="text" id="name" name="nid"></input></td></tr>
			<tr><td><label>Password:</label></td><tr>
			<td><input type="password" id="password" name="pass"></input></td></tr>
			<tr><td><button type="submit" value="signin" name="loggedin">Sign in</button></td></tr>
			</table>
		</form>
		<?php 
		if (isset($_POST['loggedin'])){
			require_once('dbconnect.php');
			if(isset($_POST['nid']) && isset($_POST['pass'])){
				$n = $_POST['nid'];
				$p = $_POST['pass'];

				$sql = "SELECT * FROM user WHERE NID = '$n' AND Password = '$p'";

				$result = mysqli_query($conn, $sql);
				?>
				<form id="form2" action="dashboard.php" method="post"><input type="hidden" name="loggedin" value="no"></form>
				
				<?php 
				if(mysqli_num_rows($result) !=0 ){
					?>
					<script type="text/javascript">
						document.getElementById('form2').submit(); 
					</script>

					<?php
				}
				else{ ?> <center><b>Incorrect username or password</b><br><br><br><br></center><br>
					<?php
					}
			}
		} ?>
		
		<center>Don't have an account? <button onclick="document.location.href='register.php';return false;">Register</button></a></center><br>
		<center>Skip login? <b>Some features will be missing.</b> <button onclick="document.location.href='dashboard.php';return false;">Skip</button></a></center>
	</div>
</div>
</body>
</html>
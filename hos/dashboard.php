<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<div id="container">
	<img id="bannerpic" src="Untitled-2.png">
	<div id="nav">
		<table class="menu"><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		<?php if (isset($_POST['loggedin'])){ ?>
		<td style="white; cursor: pointer;" onclick="document.location.href='login.php';return false;">Log out</td>
		<?php } else { ?>
		<td style="color:white; cursor: pointer;" onclick="document.location.href='login.php';return false;">Login</td>
		<?php } ?>
		</tr></table>
	</div>
	<br><br>
	
	<div id="form">
		<table  class="query center" border="" style="border-collapse: collapse;">
			<tr>
				<td>
					<form action="hospital_query.php" method="post">
					<?php if (isset($_POST['loggedin'])){ ?> <input type="hidden" name="loggedin" value="signin"> <?php } ?>
						<button type="submit"><img class="icon" src="https://img.icons8.com/color/48/000000/hospital-3.png"/></button><br>Hospital Information
					</form>
				</td>
				<td><img class="icon" src="https://img.icons8.com/color/48/000000/organization.png"/><br>Diagnostic Center Information</td>
				<td><img class="icon" src="https://img.icons8.com/color/48/000000/doctor-male--v1.png"/><br>Doctor Information</td>
			</tr>
			<?php if (isset($_POST['loggedin'])){ ?>
			<tr>
				<td><img class="icon" src="https://img.icons8.com/color/48/000000/hospital-bed.png"/><br>Book Bed</td>
				<td><img class="icon" src="https://img.icons8.com/color/48/000000/health-checkup.png"/><br>Reserve Test</td>
				<td><img class="icon" src="https://img.icons8.com/color/48/000000/planner.png"/><br>Book Doctor's Appointment</td>
			</tr>
			<tr>
				<td colspan="3"><img class="icon" src="https://img.icons8.com/color/48/000000/treatment-plan.png"/><br>Patient Records</td>
			</tr>
			<?php } 
			else{ ?>
			<tr>
			<td><img class="signinreq" src="https://img.icons8.com/color/48/000000/hospital-bed.png"/><br>Book Bed [Login]</td>
				<td><img class="signinreq" src="https://img.icons8.com/color/48/000000/health-checkup.png"/><br>Reserve Test [Login]</td>
				<td><img class="signinreq" src="https://img.icons8.com/color/48/000000/planner.png"/><br>Book Doctor's Appointment [Login]</td>
			</tr>
			<tr>
				<td colspan="3"><img class="signinreq" src="https://img.icons8.com/color/48/000000/treatment-plan.png"/><br>Patient Records [Login]</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
</body>
</html>
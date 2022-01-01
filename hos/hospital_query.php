<html>
<head>
<title>Hospital Query</title>
<link rel="stylesheet" href="css/hospital_query.css">
</head>
<body>
<div id="container">
	<img id="bannerpic" src="Untitled-2.png">
	<div class="nav">
		<table class="menu">
		<tr>
			<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			<form action="dashboard.php" method="post">
				<?php if (isset($_POST['loggedin'])){ ?> <input type="hidden" name="loggedin" value="signin"> <?php } else { }?> 
				<td><button style="submit"><font style="color:white">Dashboard</font></button></td>
			</form>
		</tr>
		</table>
	</div>
	<div id="form">
		<form action="" method="post">
			<table border="0" style="border-collapse: collapse;" class="query center">
				<tr><td colspan="6"><center><h3>Hospital Query</h3></center></td></tr>
				<tr>
				<td><label>Location:</label></td>
				<td>
						<select name="places" id="places">
						<option value="All" <?php if (isset($_POST['hosquery'])){ if($_POST['places'] == 'All'){ echo "selected";}} ?>>All</option>
						<option value="thana1" <?php if (isset($_POST['hosquery'])){ if($_POST['places'] == 'thana1'){ echo "selected";}} ?>>thana1</option>
						<option value="thana2" <?php if (isset($_POST['hosquery'])){ if($_POST['places'] == 'thana2'){ echo "selected";}} ?>>thana2</option>
						<option value="thana3" <?php if (isset($_POST['hosquery'])){ if($_POST['places'] == 'thana3'){ echo "selected";}} ?>>thana3</option>
						</select>
				</td>
					<td><label>Department:</label></td>
					<td>
						<select name="dept" id="dept">
						<option value="All" <?php if (isset($_POST['hosquery'])){ if($_POST['dept'] == 'All'){ echo "selected";}} ?>>All</option>
						<option value="Cardiology" <?php if (isset($_POST['hosquery'])){ if($_POST['dept'] == 'Cardiology'){ echo "selected";}} ?>>Cardiology</option>
						<option value="Urology"<?php if (isset($_POST['hosquery'])){ if($_POST['dept'] == 'Urology'){ echo "selected";}} ?>>Urology</option>
						</select>
					</td>
					<td><label>Bed:</label></td>
					<td>
						<select name="bed" id="bed">
						<option value="All" <?php if (isset($_POST['hosquery'])){ if($_POST['bed'] == 'All'){ echo "selected";}} ?>>All</option>
						<option value="Available" <?php if (isset($_POST['hosquery'])){ if($_POST['bed'] == 'Available'){ echo "selected";}} ?>>Available</option>
						<option value="Unavailable" <?php if (isset($_POST['hosquery'])){ if($_POST['bed'] == 'Unavailable'){ echo "selected";}} ?>>Unavailable</option>
						</select>
					</td>
				</tr>
				<?php 
				if (isset($_POST['loggedin'])){ ?> <input type="hidden" name="loggedin" value="signin">
				<?php } ?>
				<tr><td colspan="6"><center><button type="submit" value="hospitalq" name="hosquery">Filter</center></button></td></tr>
			</table>
		</form>
		<?php
		if (isset($_POST['hosquery'])){
		require_once('dbconnect.php');
		$p = $_POST['places'];
		$d = $_POST['dept'];
		$b = $_POST['bed'];

		$sql = "SELECT Name,Thana,Speciality,Available_Beds FROM Hospital";
		if (isset($p) && $p != 'All'){
			$sql .= " WHERE Thana = '$p'";
			if (isset($d) && $d != 'All'){
			$sql .= " AND Speciality = '$d'";}
			if (isset($b) && $b == "Available"){
			$sql .= " AND Available_Beds > 0";}
			if (isset($b) && $b == "Unavailable"){
			$sql .= " AND Available_Beds = 0";}
		}
		elseif (isset($d) && $d != 'All'){
			$sql .= " WHERE Speciality = '$d'";
			if (isset($p) && $p != 'All'){
			$sql .= " AND Thana = '$p'";}
			if (isset($b) && $b == "Available"){
			$sql .= " AND Available_Beds > 0";}
			if (isset($b) && $b == "Unavailable"){
			$sql .= " AND Available_Beds = 0";}
		}
		elseif ($b == "Available"){
			$sql .= " WHERE Available_Beds > 0";
			if (isset($p) && $p != 'All'){
			$sql .= " AND Thana = '$p'";}
			if (isset($d) && $d != 'All'){
			$sql .= " AND Speciality = '$d'";}
		}
		elseif ($b == "Unavailable"){
			$sql .= " WHERE Available_Beds = 0";
			if (isset($p) && $p != 'All'){
			$sql .= " AND Thana = '$p'";}
			if (isset($d) && $d != 'All'){
			$sql .= " AND Speciality = '$d'";}
		}
		else{}

		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
		?>
		<table rules = "none" border="1" class="query center result" style="border-collapse: collapse; text-align:center;">
			<tr>
				<th>Hospital</th>
				<th>Location</th>
				<th>Department</th>
				<th>Bed</th>
			</tr>
			<?php
			while($row = mysqli_fetch_array($result)){
			?>

			<tr>
				<td>  <?php echo $row[0]; ?> </td>
				<td>  <?php echo $row[1]; ?> </td>
				<td>  <?php echo $row[2]; ?> </td>
				<td>  <?php echo $row[3]; ?> </td>
			</tr>

			<?php } ?>
		</table>
		<?php }
		else{
			?>
			
			<table border="0" class="query center fail" style="border-collapse: collapse; text-align:center;">
			<tr>
				<td colspan="4">
				<center><h3>Results</h3>
				<font  size="3.5px">0 Results Found<br><img class="icon" src="https://img.icons8.com/color/48/000000/nothing-found.png"/><br><br></font>
			</tr>
			</center>
			</table>
			<?php } 
		} ?>
	</div>
</div>
</body>
</html>
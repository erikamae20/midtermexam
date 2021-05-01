<!DOCTYPE html>
<html>
<head>
	<title>Activity Logs</title>
	<link rel = "stylesheet" href = "indexx.css">
</head>
<body><center>
	<h1>Activity Logs</h1>
	<div class="main">
		
		<table>
		<tr>
			<th>ID</th>
			<th>User</th>
			<th>Activity</th>
			<th>Time</th>
		</tr>
		<?php  
		$con = mysqli_connect('localhost','root','','reg');
		$query = ("SELECT * FROM logs");
		$result = mysqli_query($con,$query);
		while($row=mysqli_fetch_array($result)){
		?>
		<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['username']; ?></td>
		<td><?php echo $row['activity']; ?></td>
		<td><?php echo $row['time']; ?></td>
		
		</tr>
		<?php
		}
?>

	</table>
</div>
	 <button type="button" name="logout"><a href = "login.php">LOGOUT</button>
	</center>
</body>
</html>
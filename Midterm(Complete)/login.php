<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<?php include 'db.php';?>
<body>
	<div class="hero">
		<div class="form-box">
		<div class="button-box">
			<div id="btn"></div>
			<button type="button" class="toggle-btn" onclick="login()">Log In</button>
			<button type="button" class="toggle-btn" onclick="register()">Register</button>
			</div>
			<div class="social-icons">
			<img src="f.jpg">
			<img src="i.jpg">
			<img src="t.jpg">
		</div>
		<form id="login" class="input-group" action="" name="Login_Form">
			<input type="text" name="user" placeholder="Username" required>
			<input type="password" name="pass" placeholder="Password" required>
			<input type="submit" name="submit" value="LOGIN">
			<br>
			<center><p class="message">Forgot Password? <a href="change.php">Click here</a></p></center>
		</form>

		<form id="register" class="input-group" name="Signup_Form" action="" method="post">
			<input type="email" name="name" placeholder="Email" required>
			<input type="text" name="usern" placeholder="Username" required>
			<input type="password" name="passw" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one(1) number and one(1) uppercase and lowercase letter, and at least 8 or more characters" required>
			<input type="password" name="pass1" placeholder="Confirm Password" required>
			<input type="checkbox" name="checkbox" required=""><span>I agree to the terms and conditions.</span>
			<input type="submit" name="submit-btn" value="REGISTER">
		</form>
		</div>
	</div>

	<script>
		var x = document.getElementById("login");
		var y = document.getElementById("register");
		var z = document.getElementById("btn");

		function register(){
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "115px";
		}
		function login(){
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0px";
		}
	</script>

	<?php
	session_start();
      if(isset($_REQUEST["submit"])){
      $username=$_REQUEST["user"];
      $password=$_REQUEST["pass"];
      $act = "Logged in";

$link = NEW MySQLi('Localhost','root','','reg');
    $tb1="SELECT * FROM admin WHERE user = '$username' and pass = '$password'";
	if($result=mysqli_query($link,$tb1)){
  	$check = mysqli_num_rows($result);
	}
	if($check>0){
  	header ('Location: index.php');
  
	}

      $tb2="SELECT * FROM regtable WHERE username = '$username'";
      $result = mysqli_query($con,$tb2)or die(mysqli_error());
      $num_row = mysqli_num_rows($result);
      $row=mysqli_fetch_array($result);

      if($num_row == 1) {
      	$tb3="SELECT * FROM regtable WHERE password = '$password'";
	      $result = mysqli_query($con,$tb3)or die(mysqli_error());
	      $num_row1 = mysqli_num_rows($result);
	      $row1=mysqli_fetch_array($result);
	      if($num_row1 == 1){
	      
	      	$query = "INSERT INTO logs(username,activity) values ('$username','$act')";
  			$resultset = mysqli_query($link, $query);
  			header ('Location: authentication.php');
  			$_SESSION['user'] = $username;
  			$_SESSION['pass'] = $password;
      	
      		}
      	else {
      		
      		echo '<script>alert("Wrong Password!")</script>';
      	
      	}
  }
      else{
      echo '<script>alert("User does not exist!")</script>';
        exit;
    }
      
      }
?>





<?php
		if(isset($_POST['submit-btn'])){
		$n1=$_POST['name'];
		$n2=$_POST['usern'];
		$n3=$_POST['passw'];

		if(($_POST['passw'])==($_POST['pass1'])){
		  $stmt="INSERT INTO regtable (fullname,username,password)VALUES('$n1','$n2','$n3')";
		  if(mysqli_query($con,$stmt)){
		  echo '<script>alert("Registered successfully!")</script>';
		}
		}
		else{
		  echo '<script>alert("Password did not match")</script>';
		}
		}
?>

</body>
</html>
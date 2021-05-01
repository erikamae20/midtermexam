<?php
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"reg");

?>



<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<link rel = "stylesheet" href = "changee.css">

</head>
<body>
  <div class="login-page">
  <div class="form">
 
    <form class="login-form" method="post">
      <input type="text" placeholder="Enter your Email" name = "email" required="" />
      <input type="text" placeholder="Enter your Username" name = "user" required="" />
      <input type="password" placeholder="Enter Your New Password" name = "new" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one(1) number and one(1) uppercase and lowercase letter, and at least 8 or more characters" required="" />
      <input type="password" placeholder="Confirm Password" name = "cpwd" required="" />

      <button type  = "submit" name = "change">Change Password</a></button>
      
<p class="message">Not registered? <a href="login.php">Create an account</a></p>
    </form>
  </div>
</div>

<?php
if(isset($_POST['change'])){
  $email = $_POST['email'];
  $us = $_POST['user'];
  $pa= $_POST['new'];
  $conf = $_POST['cpwd'];
  $act = "Change Password";

    $tb1="SELECT * FROM regtable WHERE fullname = '$email' and username = '$us'";
    if($result=mysqli_query($link,$tb1)){
    $check = mysqli_num_rows($result);
    }
    if($check>0){
 
       if(($_POST['new'])==($_POST['cpwd'])){

        $tb2= "UPDATE regtable set password = '$_POST[new]' where username = '$us'";
          if(mysqli_query($link,$tb2)){
          $query = "INSERT INTO logs(username,activity) values ('$us','$act')";
          $resultset = mysqli_query($link, $query);


   header ('Location: login.php');
  }
  else{
  echo '<script>alert("Change Password Failed")</script>'; 
  }
}
else{
  echo '<script>alert("Password did not match!")</script>'; 
  }
}
  else{
  echo '<script>alert("Wrong/Unmatched Email/Username")</script>'; 
  }

}
?>

</body>
</html>
<!DOCTYPE html>
<html>
  <head>
     <title>WELCOME! </title>
     <link href="home.css" rel="stylesheet">
  </head>

  <body>
  <form method="post">
  <ul>
    <li><a href="home.html">Home</a></li>
    <li><a href="#news">News</a></li>
    <li><a href="#contact">Contact</a></li>
    <li style="float:right"><input type="submit" name="logout" id="logout" value="logout"></li>
  </ul>
<br>
<br>
<br>
<br>
<br>
<form class="home">
<center><h4> Congratulations! You have logged in to admin and password protected page. Enjoy! </h4></center>
</form>

</form>

<?php
session_start();
if(isset($_POST['logout']))
{
$hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "reg";

  $connect = mysqli_connect($hostname, $username, $password, $dbname);

  $y = $_SESSION['user'];
  $act = "Logged out";
    
  $query = "INSERT INTO logs(username, activity) values ('$y','$act')";

  $result = mysqli_query($connect, $query);

  if($result)
  {
    header('Location: login.php');
  }
  else
  {
    echo "fail";

  }

  mysqli_close($connect);

}
?>
</body>
</html>
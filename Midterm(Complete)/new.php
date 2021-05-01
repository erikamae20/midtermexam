<!-- get user data from login -->
<?php
session_start();
include 'db.php';
if($_SESSION["user"]==true)
{
  echo "<center><h1>WELCOME, </h1></center>"."<center><h2>".$_SESSION["user"]."</h2></center>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Code Verification</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>




<!-- modal -->
<center><div class="container">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Get your code!</button>
<form method="post">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Verification Code</h4>
        </div>
        <div class="modal-body">
                  <?php 
                    $phpvar="30"; 
                  ?> 
                      <script>
                      function countDown(secs,elem) {
                      var element = document.getElementById(elem);
                      element.innerHTML = "Timer: "+secs+" seconds";
                      if(secs < 1) {
                      clearTimeout(timer);
                      element.innerHTML = '<h2>Ended</h2>';
                      element.innerHTML += '<a href="new.php">Reset</a>';
                      $("#btn-submit").attr("disabled", true);
                      }
                      secs--;
                      var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);
                      }
                      </script>
                      <div id="status"style="font-size:20px;"></div>
                      <script>countDown(<?php echo $phpvar; ?>,"status");</script>

           <input type="text" name="mode" id="time" placeholder="Enter code"><br><br>
           <?php
           
            $code=rand(111111,999999);

            
          
            echo($code);
              ?>

        </div>
        <div class="modal-footer">
       <input type="submit" class="btn btn-default" id="btn-submit" name="submitt" value="Submit">
        </div>
        </div>
      </div>
    </div>
  
</div>
</form>
</div>
</center>


<!-- For date created -->





<!-- Insert data into verify database -->

<?php
    if(isset($_POST['submitt'])){
        header ('Location: home.php');
    
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "reg";

  $connect = mysqli_connect($hostname, $username, $password, $dbname);
  $y = $_SESSION['user'];
  $x = $_SESSION['pass'];
  $code = $_POST['code'];
    
  $query = "INSERT INTO verify(user, pass, vkey) values ('$y','$x','$code')";

  $result = mysqli_query($connect, $query);

  if($result)
  {
    header('Location: logout.php');
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
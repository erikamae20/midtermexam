<?php
session_start();
include 'db.php';
if($_SESSION["user"]==true)
{
  echo "<center><h1>WELCOME, ".$_SESSION["user"]."</h1></center>";
}


?>


<!DOCTYPE html>
<html>
<head>
  <title> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel = "stylesheet"
      href = "authentication.css">

</head>

<body background="cvsuimus.jpg">

  <div class="login-page">
  <div class="form">
      <form  method= "post" class="login-form" action = "">
        <div class="modal-body">
          <?php 

                      $phpvar="300"; 
                      ?> 
                      <script>
                      function countDown(secs,elem) {
                      var element = document.getElementById(elem);
                      element.innerHTML = "Timer: "+secs+" seconds";
                      if(secs < 1) {
                      clearTimeout(timer);
                      element.innerHTML = '<h2>Ended</h2>';
                      element.innerHTML += '<a href="authentication.php">Reset</a>';
                      $("#btn-submit").attr("disabled", true);
                      $("#text").attr("disabled", true);
                      }
                      secs--;
                      var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);
                      }
                      </script>
                      <div id="status"style="font-size:20px;"></div>
                      <script>countDown(<?php echo $phpvar; ?>,"status");</script>
                    </div>

    <input type = "text" class = "text" name = "coded" value = "<?php 
      $rand = rand(100000,999999);
      echo $rand;
    
    ?>">
    <input type = "text" class = "text" name = "code" id="text" placeholder = "Enter Code" required="">
    <br><br>
    <button type  = "submit" name = "submitt" id="btn-submit">Submit</button>
   </form>
  </div>
    
</div>



<?php
          $ran = $_POST['coded'];
          $code = $_POST['code'];
          $user=$_SESSION["user"];
          $tb2="SELECT * FROM regtable WHERE username = '$user'";
          $result = mysqli_query($con,$tb2)or die(mysqli_error());
          $num_row = mysqli_num_rows($result);
          $row = mysqli_fetch_array($result,MYSQLI_NUM);
          $id=$row[0];



if(isset($_POST['submitt'])){
    if(($_POST['coded'])==($_POST['code'])){
      $stmt="INSERT INTO verify (user_id,user,code)VALUES('$id','$user','$code')";
      if(mysqli_query($con,$stmt)){
        header ('Location: home.php');
      }
    }
    else{
      echo '<script>alert("Wrong Code")</script>';
  
    }
         
}



?>


</body>
</html>

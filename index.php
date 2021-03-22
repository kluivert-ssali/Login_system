<?php 
session_start();
  include("connection.php");
  include("functions.php");

  $user_data = check_login($con);
  

?>

<!DOCTYPE html>
<html>
<head>
   <title>My site</title>
</head>
<body>
   <a href="logout.php">LogOut</a>
   <h1>this is kingslayer</h1>

   <br>
   Hello, <?php echo $user_data['user_name']; ?><br><br>
</body>

</html>
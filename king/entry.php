<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>king.com</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <style>
           img {
                width: 50%;
                height: 50%;
           }
           
           
           </style>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center"><img src="https://www.logolynx.com/images/logolynx/8b/8b8813aa1d4b54712a15b2e69c71bece.png"></h3>  
                <br />  
                <?php  
                echo '<h1>Welcome - '.$_SESSION["username"].'</h1>';  
                echo '<label><a href="logout.php">Logout</a></label>';  
                ?>  
           </div>  
      </body>  
 </html>  
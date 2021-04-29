<?php  
 $connect = mysqli_connect("localhost", "root", "", "king");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:entry.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {    $name = mysqli_real_escape_string($connect, $_POST["name"]);
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $Email = mysqli_real_escape_string($connect, $_POST["Email"]);
           $password = mysqli_real_escape_string($connect, $_POST["password"]);
           $cpassword = mysqli_real_escape_string($connect, $_POST["cpassword"]);
           if ($password != $cpassword) 
               {
                    echo '<script>alert("Please check your passwords")</script>';
               } 
           else{
               $password = md5($password);  
               $query = "INSERT INTO user (name, username, Email, password) VALUES('$name','$username','$Email','$password')";  
               if(mysqli_query($connect, $query))  
               {  
                    echo '<script>alert("Registration Done")</script>';  
               }  

           } 
           
      }
 }  
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password); 
             
           $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                header("location:entry.php");  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';
               
           }  
      }  
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
                <h3 align="center"><img src="https://www.logolynx.com/images/logolynx/8b/8b8813aa1d4b54712a15b2e69c71bece.png" ></h3>  
                <br />  
                <?php  
                if(isset($_GET["action"]) == "login")  
                {  
                ?>  
                <h3 align="center">Login</h3>  
                <br />  
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="index.php">Register</a></p>  
                </form>  
                <?php       
                }  
                else  
                {  
                ?>  
                <h3 align="center">Register</h3>  
                <br />  
                <form method="post"> 
                     <label>Enter Name</label>
                     <input type="text" name="name" class="form-control" />
                     <br /> 
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Email Address</label>
                     <input type="Email" name="Email" class="form-control" />
                     <br />
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <label>Confirm Password</label>
                     <input type="password" name="cpassword" class="form-control">
                     <br />
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="index.php?action=login">Login</a></p>  
                </form>  
                <?php
                

                }  
                ?>  
           </div>  
      </body>  
 </html>  

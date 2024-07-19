<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Pinterest | Login</title>
    <?php require "essentials/_navbar.php";
          require "essentials/_connection.php";
          if($_SERVER["REQUEST_METHOD"]=="POST")
          {
            $email=$_POST["email"];
            $password=$_POST["password"];
            $sql="SELECT * FROM users WHERE email='$email'";
            $res=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($res);
            if($num==1)
            {
            $row=mysqli_fetch_assoc($res);
            if(password_verify($password,$row['password']))
            {
              session_start();
              $_SESSION['email']=$email;
              $_SESSION['uid']=$row["UID"];
              header("Location: home.php");
            }
            else
            {
              echo '<div class="alert alert-danger" role="alert">
  Invalid Credentials
</div>
';
            }
            }
            else
            {
              echo '<div class="alert alert-danger" role="alert">
  Invalid Credentials
</div>
';
            }
          }
    ?>  
</head>
  <div class="container mar-50" style="text-align:center">
    <h2>Login</h2>
  </div>
  <div class="container" >
  <form action="_login.php" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php
  include "essentials/_footer.php";
   ?>
  </body>
</html>
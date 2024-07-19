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
            $cpassword=$_POST["cpassword"];
            if($password!=$cpassword)
            {
                echo '<div class="alert alert-danger" role="alert">
  Passwords do not match.
</div>
';
            }
            else
            {
                $hash=password_hash($password,PASSWORD_DEFAULT);
                $sql="INSERT INTO users(email,password) VALUES('$email','$hash')";
                $res=mysqli_query($conn,$sql);
                if(!$res)
                {
                    echo '<div class="alert alert-danger" role="alert">
                    Server down.
                  </div>
                  ';
                }
            }
          }
    ?>  
</head>
  <div class="container mar-50" style="text-align:center">
    <h2>Signup</h2>
  </div>
  <div class="container" >
  <form action="_signup.php" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
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
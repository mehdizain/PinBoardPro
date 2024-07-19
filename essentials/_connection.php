<?php
$conn=mysqli_connect("localhost","root","","pinterest");
if(!$conn)
{
    echo '<div class="alert alert-danger" role="alert"><h4>
  Our server is temporarily down! Try again!
</h4></div>
';
}
?>
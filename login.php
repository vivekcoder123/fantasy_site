<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap1.min.css">
  </head>
  <body>
    <div class="container mt-5">
      <form method="post" action="">
     <div class="form-group">
       <input type="text" name="username" placeholder="Enter username" class="form-control">
     </div>
     <div class="form-group">
       <input type="text" name="password" placeholder="Enter password" class="form-control">
     </div>
     <input type="submit" name="submit" value="Log In" class="btn btn-primary">
   </form>
    </div>
  </body>
</html>
<?php

if(isset($_POST['submit'])){

$host='localhost';
$dbname='blog';
$pass='';
$un='root';

$username=$_POST['username'];
$password=$_POST['password'];
$connection=mysqli_connect($host,$un,$pass,$dbname);
$select_query=mysqli_query($connection,"SELECT * from users_players WHERE username='$username' and password='$password' ");
if(!$select_query){
  die("Connection Error");
}
$rows=mysqli_num_rows($select_query);
if($rows==1){
$row=mysqli_fetch_assoc($select_query);
$_SESSION['user_id']=$row['id'];
header("Location:index.php");

}
else{
  echo "Password and username does not exist";
}

}

 ?>

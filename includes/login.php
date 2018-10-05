<?php include "db.php"; ?>
<?php session_start(); ?>

<?php

if(isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

$username=mysqli_real_escape_string($connection,$username);
$password=mysqli_real_escape_string($connection,$password);

$query="SELECT * from users WHERE username='$username' ";
$select_query=mysqli_query($connection,$query);
if(!$select_query){
  die("Connection error ".mysqli_error($connection));
}

while($row=mysqli_fetch_array($select_query)){

  $db_username=$row['username'];
  $db_password=$row['user_password'];
  $db_role=$row['user_role'];

}

if(($username !== $db_username) || ($password !== $db_password) ){
header('Location:../index.php');
}else{
$_SESSION['username']=$db_username;
$_SESSION['password']=$db_password;
$_SESSION['user_role']=$db_role;
if(isset($_SESSION['user_role'])){
  if($_SESSION['user_role']!=='admin'){
    header('Location:../index.php');
  }else if($_SESSION['user_role']=='admin'){
    header('Location:../admin');
  }
}

}

}

 ?>

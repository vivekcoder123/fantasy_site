<?php

if(isset($_POST['create_user'])){

$user_firstname=$_POST['user_firstname'];
$user_lastname=$_POST['user_lastname'];
$user_role=$_POST['user_role'];
// $post_image=$_FILES['image']['name'];
// $post_image_temp=$_FILES['image']['tmp_name'];
$username=$_POST['username'];
$user_email=$_POST['user_email'];
$user_password=$_POST['user_password'];
// $post_date=date('d-m-y');

// move_uploaded_file($post_image_temp,"../images/$post_image");

$insert="INSERT INTO `users`(`user_id`, `user_firstname`, `user_lastname`, `user_role`, `username`, `user_email`,`user_password`)
VALUES ('','$user_firstname','$user_lastname','$user_role','$username','$user_email','$user_password')";

$user_insert=mysqli_query($connection,$insert);
confirmQuery($user_insert);

}

 ?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
  <label for="title">Firstname</label>
  <input type="text" name="user_firstname" class="form-control">
</div>

<div class="form-group">
  <label for="lastname">Lastname</label>
  <input type="text" name="user_lastname" class="form-control">
</div>

<div class="form-group">
    <label for="user_role">User Role</label>
    <select name="user_role" id="">

    <option value="admin">admin</option>
    <option value="subscriber">subscriber</option>

    </select>

</div>


<!-- <div class="form-group">
  <label for="post_image">Post Image</label>
  <input type="file" name="image">
</div>
-->

<div class="form-group">
  <label for="username">Username</label>
  <input type="text" name="username" class="form-control">
</div>

<div class="form-group">
  <label for="email">Email</label>
  <input type="email" name="user_email" class="form-control">
</div>

<div class="form-group">
  <label for="password">Password</label>
  <input type="password" name="user_password" class="form-control">
</div>

<div class="form-group">
  <input type="submit" name="create_user" class="btn btn-primary" value="Add User">
</div>

</form>

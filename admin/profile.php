<?php include "includes/header.php" ?>
<?php

if(isset($_SESSION['username'])){

  $username=$_SESSION['username'];
  $select="SELECT * FROM users WHERE username='$username' ";
  $users_query=mysqli_query($connection,$select);

  while($row=mysqli_fetch_assoc($users_query)){
    $user_id=$row['user_id'];
    $username=$row['username'];
    $user_firstname=$row['user_firstname'];
    $user_password=$row['user_password'];
    $user_lastname=$row['user_lastname'];
    $user_email=$row['user_email'];
    $user_image=$row['user_image'];
    $user_role=$row['user_role'];



}
if(isset($_POST['edit_profile'])){

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

$update="UPDATE users set user_firstname='$user_firstname',user_lastname='$user_lastname',
user_role='$user_role',username='$username',user_email='$user_email',user_password='$user_password' ";

$user_update=mysqli_query($connection,$update);
confirmQuery($user_update);

}
}

 ?>

<div id="wrapper">

  <!-- Navigation -->
  <?php include "includes/navigation.php" ?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">

        <div class="col-lg-12">

          <h1 class="page-header">
            Welcome Admin
          <small><?php echo $_SESSION['username'];?></small>
          </h1>

          <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="title">Firstname</label>
            <input type="text" name="user_firstname" value="<?php echo $user_firstname;?>" class="form-control">
          </div>

          <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" name="user_lastname" value="<?php echo $user_lastname;?>" class="form-control">
          </div>

          <div class="form-group">
              <label for="user_role">User Role</label>
              <select name="user_role" id="">
                <option value=""><?php echo $user_role; ?></option>
              <?php

              if($user_role=='admin'){
              echo '<option value="subscriber">subscriber</option>';
            }
            if($user_role=='subscriber'){
               echo '<option value="admin">admin</option>';
            }

               ?>



              </select>

          </div>


          <!-- <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="image">
          </div>
          -->

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="user_email" value="<?php echo $user_email;?>" class="form-control">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="user_password" value="<?php echo $user_password;?>" class="form-control">
          </div>

          <div class="form-group">
            <input type="submit" name="edit_profile" class="btn btn-primary" value="Edit Profile">
          </div>

          </form>

        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->
  <?php include "includes/footer.php" ?>
</div>

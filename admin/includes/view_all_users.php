
          <table class="table table-bordered table-hover">

             <thead>
               <tr>
                 <th>Id</th>
                 <th>Username</th>
                 <th>Firstname</th>
                 <th>Lastname</th>
                 <th>Email</th>
                 <th>Role</th>


               </tr>
             </thead>

             <tbody>

                 <?php
                 $select="SELECT * FROM users";
                 $users_query=mysqli_query($connection,$select);

                 while($row=mysqli_fetch_assoc($users_query)){
                   $user_id=$row['user_id'];
                   $username=$row['username'];
                   $user_firstname=$row['user_firstname'];
                   $user_lastname=$row['user_lastname'];
                   $user_email=$row['user_email'];
                   $user_image=$row['user_image'];
                   $user_role=$row['user_role'];


                   echo "<tr>";
                   echo "<td>{$user_id}</td>";
                   echo "<td>{$username}</td>";
                   echo "<td>{$user_firstname}</td>";

            /*       $select_cat="SELECT * FROM categories where cat_id='$post_category_id' ";
                   $categories_query=mysqli_query($connection,$select_cat);
                   while($row=mysqli_fetch_assoc($categories_query)){
                     $cat_title=$row['cat_title'];
                   }
                   echo "<td>{$cat_title}</td>";

*/

                   echo "<td>{$user_lastname}</td>";
                   echo "<td>{$user_email}</td>";
                   echo "<td>{$user_role}</td>";

        /*           $query="SELECT * from posts WHERE post_id='$comment_post_id' ";
                   $select_post_id_query=mysqli_query($connection,$query);
                   while($row=mysqli_fetch_assoc($select_post_id_query)){
                     $post_id=$row['post_id'];
                     $post_title=$row['post_title'];
                     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                   }
  */

                   echo "<td><a href='users.php?change_to_admin=$user_id'>admin</a></td>";
                   echo "<td><a href='users.php?change_to_sub=$user_id'>subscriber</a></td>";
                   echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
                   echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                   echo "</tr>";
                 }

                  ?>



             </tbody>
          </table>


<?php

if(isset($_GET['delete'])){
$delete_id=$_GET['delete'];
$query="DELETE from users WHERE user_id='$delete_id' ";
$delete_query=mysqli_query($connection,$query);
if(!$delete_query){
  die("Connection failed ".mysqli_error($connection));
}
header("Location:users.php");
}

if(isset($_GET['change_to_admin'])){
$admin_id=$_GET['change_to_admin'];
$query="UPDATE users set user_role='admin' WHERE user_id='$admin_id' ";
$admin_query=mysqli_query($connection,$query);
if(!$admin_query){
  die("Connection failed ".mysqli_error($connection));
}
header("Location:users.php");
}

if(isset($_GET['change_to_sub'])){
$sub_id=$_GET['change_to_sub'];
$query="UPDATE users set user_role='subscriber' WHERE user_id='$sub_id' ";
$sub_query=mysqli_query($connection,$query);
if(!$sub_query){
  die("Connection failed ".mysqli_error($connection));
}
header("Location:users.php");
}

 ?>


          <table class="table table-bordered table-hover">
               <thead>
               <tr>
                 <th>Id</th>
                 <th>Author</th>
                 <th>Comment</th>
                 <th>Email</th>
                 <th>Status</th>
                 <th>In Response To</th>
                 <th>Date</th>
                 <th>Approve</th>
                 <th>Unapprove</th>
                 <th>Delete</th>
               </tr>
             </thead>

             <tbody>

                 <?php
                 $select="SELECT * FROM comments";
                 $comments_query=mysqli_query($connection,$select);

                 while($row=mysqli_fetch_assoc($comments_query)){
                   $comment_id=$row['comment_id'];
                   $comment_author=$row['comment_author'];
                   $comment_email=$row['comment_email'];
                   $comment_post_id=$row['comment_post_id'];
                   $comment_status=$row['comment_status'];
                   $comment_content=$row['comment_content'];
                   $comment_date=$row['comment_date'];

                   echo "<tr>";
                   echo "<td>{$comment_id}</td>";
                   echo "<td>{$comment_author}</td>";
                   echo "<td>{$comment_content}</td>";

            /*       $select_cat="SELECT * FROM categories where cat_id='$post_category_id' ";
                   $categories_query=mysqli_query($connection,$select_cat);
                   while($row=mysqli_fetch_assoc($categories_query)){
                     $cat_title=$row['cat_title'];
                   }
                   echo "<td>{$cat_title}</td>";

*/

                   echo "<td>{$comment_email}</td>";
                   echo "<td>{$comment_status}</td>";

                   $query="SELECT * from posts WHERE post_id='$comment_post_id' ";
                   $select_post_id_query=mysqli_query($connection,$query);
                   while($row=mysqli_fetch_assoc($select_post_id_query)){
                     $post_id=$row['post_id'];
                     $post_title=$row['post_title'];
                     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                   }

                   echo "<td>{$comment_date}</td>";
                   echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                   echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                   echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                   echo "</tr>";
                 }

                  ?>



             </tbody>
          </table>


<?php

if(isset($_GET['delete'])){
$delete_id=$_GET['delete'];
$query="DELETE from comments WHERE comment_id='$delete_id' ";
$delete_query=mysqli_query($connection,$query);
if(!$delete_query){
  die("Connection failed ".mysqli_error($connection));
}
header("Location:comments.php");
}

if(isset($_GET['approve'])){
$approve_id=$_GET['approve'];
$query="UPDATE comments set comment_status='Approved' WHERE comment_id='$approve_id' ";
$approve_query=mysqli_query($connection,$query);
if(!$approve_query){
  die("Connection failed ".mysqli_error($connection));
}
header("Location:comments.php");
}

if(isset($_GET['unapprove'])){
$approve_id=$_GET['unapprove'];
$query="UPDATE comments set comment_status='Unapproved' WHERE comment_id='$approve_id' ";
$approve_query=mysqli_query($connection,$query);
if(!$approve_query){
  die("Connection failed ".mysqli_error($connection));
}
header("Location:comments.php");
}

 ?>

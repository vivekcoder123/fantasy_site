
          <table class="table table-bordered table-hover">

             <thead>
               <tr>
                 <th>Id</th>
                 <th>Time</th>
                 <th>Title</th>
                 <th>Category</th>
                 <th>Content</th>
                 <th>Status</th>
                 <th>Image1</th>
                 <th>Image2</th>
                 <th>Tags</th>
                 <th>Date</th>
               </tr>
             </thead>

             <tbody>

                 <?php
                 $select="SELECT * FROM posts";
                 $post_query=mysqli_query($connection,$select);

                 while($row=mysqli_fetch_assoc($post_query)){
                   $post_title=$row['post_title'];
                   $post_id=$row['post_id'];
                   $post_author=$row['post_author'];
                   $post_date=$row['post_date'];
                   $post_image1=$row['post_image1'];
                   $post_image2=$row['post_image2'];
                   $post_category_id=$row['post_category_id'];
                   $post_tags=$row['post_tags'];
                   //$post_comment_count=$row['post_comment_count'];
                   $post_status=$row['post_status'];
                   $post_content=$row['post_content'];

                   echo "<tr>";
                   echo "<td>{$post_id}</td>";
                   echo "<td>{$post_author}</td>";
                   echo "<td>{$post_title}</td>";

                   $select_cat="SELECT * FROM categories where cat_id='$post_category_id' ";
                   $categories_query=mysqli_query($connection,$select_cat);
                   while($row=mysqli_fetch_assoc($categories_query)){
                     $cat_title=$row['cat_title'];
                   }
                   echo "<td>{$cat_title}</td>";


                   echo "<td>{$post_content}</td>";
                   echo "<td>{$post_status}</td>";
                   echo "<td><img src='../images/{$post_image1}' style='width:100px'></td>";
                   echo "<td><img src='../images/{$post_image2}' style='width:100px'></td>";
                   echo "<td>{$post_tags}</td>";
                //   echo "<td>{$post_comment_count}</td>";
                   echo "<td>{$post_date}</td>";
                   echo "<td><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
                   echo "<td><a href='posts.php?delete=$post_id'>Delete</a></td>";
                   echo "</tr>";
                 }

                  ?>

             </tbody>
          </table>

<?php

if(isset($_GET['delete'])){

$the_post_id=$_GET['delete'];
$delete="DELETE from posts where post_id='$the_post_id' ";
$delete_query=mysqli_query($connection,$delete);
confirmQuery($delete_query);
header('Location:posts.php');

}

 ?>

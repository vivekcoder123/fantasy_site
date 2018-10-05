<?php

if(isset($_GET['p_id'])){
  $p_id=$_GET['p_id'];
}
  $query="SELECT * from posts WHERE post_id='$p_id' ";
  $post_query=mysqli_query($connection,$query);
  while($row=mysqli_fetch_assoc($post_query)){
    $post_title=$row['post_title'];
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_category_id=$row['post_category_id'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_comment_count'];
    $post_status=$row['post_status'];
    $post_content=$row['post_content'];
}


    if(isset($_POST['update_post'])){
       $post_title=$_POST['post_title'];
       $post_author=$_POST['post_author'];
       $post_image=$_FILES['image']['name'];
       $post_image_tmp=$_FILES['image']['tmp_name'];
       $post_category_id=$_POST['post_category_id'];
       $post_tags=$_POST['post_tags'];
       $post_status=$_POST['post_status'];
       $post_content=$_POST['post_content'];

       move_uploaded_file($post_image_tmp,"../images/$post_image");

       if(empty($post_image)){
         $query="SELECT * from posts WHERE post_id='$p_id' ";
         $select_image=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($select_image)){
           $post_image=$row['post_image'];
         }
       }

      $update_query="UPDATE posts set post_title='$post_title',post_author='$post_author',
      post_status='$post_status',post_image='$post_image',post_tags='$post_tags',post_content='$post_content',
      post_category_id='$post_category_id',post_date=now() WHERE post_id='$p_id' ";

      $update_post=mysqli_query($connection,$update_query);
      confirmQuery($update_post);
    }

 ?>



 <form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="title">Post Title</label>
  <input type="text" value="<?php echo $post_title; ?>" name="post_title" class="form-control">
</div>

<div class="form-group">
  <label for="post_category">Post Category</label>
  <select name="post_category_id" id="">

<?php

$query="SELECT * from categories";
$select_categories=mysqli_query($connection,$query);
confirmQuery($select_categories);
while($row=mysqli_fetch_assoc($select_categories)){
$cat_id=$row['cat_id'];
$select_cat_title=$row['cat_title'];
echo "<option value='$cat_id'>{$select_cat_title}</option>";
}

 ?>

  </select>
</div>

<div class="form-group">
  <label for="author">Post Author</label>
  <input type="text" value="<?php echo $post_author; ?>" name="post_author" class="form-control">
</div>

<div class="form-group">
  <label for="status">Post Status</label>
  <input type="text" value="<?php echo $post_status; ?>" name="post_status" class="form-control">
</div>

<div class="form-group">
  <label for="post_image">Post Image</label>
    <img src="../images/<?php echo $post_image;?>" alt="" width="100px">
  <input type="file" value="../images/<?php echo $post_image; ?>" name="image">
</div>

<div class="form-group">
  <label for="post_tags">Post Tags</label>
  <input type="text" value="<?php echo $post_tags; ?>" name="post_tags" class="form-control">
</div>

<div class="form-group">
  <label for="post_content">Post Content</label>
  <textarea name="post_content" cols="30" rows="10" class="form-control" id="">
    <?php echo $post_content; ?>
  </textarea>
</div>

<div class="form-group">
  <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
</div>

</form>

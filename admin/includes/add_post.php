<?php

if(isset($_POST['create_post'])){

$post_title=$_POST['title'];
$post_author=$_POST['author'];
$post_category_id=$_POST['post_category_id'];
$post_status=$_POST['post_status'];
$post_image1=$_FILES['image1']['name'];
$post_image_temp1=$_FILES['image1']['tmp_name'];
$post_image2=$_FILES['image2']['name'];
$post_image_temp2=$_FILES['image2']['tmp_name'];
$post_tags=$_POST['post_tags'];
$post_content=$_POST['post_content'];
$post_date=date('d-m-y');

move_uploaded_file($post_image_temp1,"../images/$post_image1");
move_uploaded_file($post_image_temp2,"../images/$post_image2");

$insert="INSERT INTO `posts`(`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image1`,`post_image2`, `post_content`, `post_tags`, `post_status`)
VALUES ('','$post_category_id','$post_title','$post_author',now(),'$post_image1','$post_image2','$post_content','$post_tags','$post_status')";

$post_insert=mysqli_query($connection,$insert);
confirmQuery($post_insert);

}

 ?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
  <label for="title">Match Title</label>
  <input type="text" name="title" class="form-control">
</div>

<div class="form-group">
  <label for="post_category">Match Category</label>
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

<div class="form-group">
  <label for="author">Match time</label>
  <input type="text" name="author" class="form-control">
</div>

<div class="form-group">
  <label for="status">Match status</label>
  <input type="text" name="post_status" class="form-control">
</div>

<div class="form-group">
  <label for="post_image">Team 1 Image</label>
  <input type="file" name="image1">
</div>

<div class="form-group">
  <label for="post_image">Team 2 Image</label>
  <input type="file" name="image2">
</div>

<div class="form-group">
  <label for="post_tags">Match Tags</label>
  <input type="text" name="post_tags" class="form-control">
</div>

<div class="form-group">
  <label for="post_content">Match Content</label>
  <textarea name="post_content" cols="30" rows="10" class="form-control" id="">
  </textarea>
</div>

<div class="form-group">
  <input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">
</div>

</form>

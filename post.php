<?php include "includes/header.php" ?>

<?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



                <h1 class="page-header">
                  Fantasy Teams
                  <small>Dream 11,Halaplay,etc</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                  if(isset($_GET['p_id'])){
                    $p_id=$_GET['p_id'];
                  }
                 $select="SELECT * FROM posts WHERE post_id='$p_id' ";
                 $posts_select=mysqli_query($connection,$select);
                 while($row=mysqli_fetch_assoc($posts_select)){
                   $post_title=$row['post_title'];
                   $post_author=$row['post_author'];
                   $post_date=$row['post_date'];
                   $post_content=$row['post_content'];
                   $post_image=$row['post_image'];
                   $post_id=$row['post_id'];


                 ?>
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="This is an image" style="width:500px;height:auto;">
                <hr>
                <p><?php echo $post_content;  ?></p>


                <hr>
      <?php } ?>
            </div>

<?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

<?php

if(isset($_POST['create_comment'])){

$p_id=$_GET['p_id'];
$comment_author=$_POST['comment_author'];
$comment_email=$_POST['comment_email'];
$comment_content=$_POST['comment_content'];

$insert_comment="INSERT INTO `comments`(`comment_id`, `comment_post_id`,
`comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`)
VALUES ('','$p_id','$comment_author','$comment_email','$comment_content','unapproved',now())";

$comment_query=mysqli_query($connection,$insert_comment);

if(!$comment_query){
  die("Connection failed ".mysqli_error($connection));
}

$update_comment="UPDATE posts set post_comment_count=post_comment_count+1
WHERE post_id='$p_id' ";

$update_comment_query=mysqli_query($connection,$update_comment);

if(!$update_comment_query){
  die("Connection failed ".mysqli_error($connection));
}

}

 ?>


                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                      <div class="form-group">
                        <label for="author">Your Name</label>
                        <input type="text" name="comment_author" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" name="comment_email" class="form-control">
                      </div>
                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
<?php

$select="SELECT * FROM comments WHERE comment_post_id='$p_id'
AND comment_status='Approved' ORDER BY comment_id DESC ";
$comments_query=mysqli_query($connection,$select);

while($row=mysqli_fetch_assoc($comments_query)){
  $comment_id=$row['comment_id'];
  $comment_author=$row['comment_author'];
  $comment_email=$row['comment_email'];
  $comment_post_id=$row['comment_post_id'];
  $comment_status=$row['comment_status'];
  $comment_content=$row['comment_content'];
  $comment_date=$row['comment_date'];



 ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                </div>
              </div>


    <?php } ?>
                <!-- Footer -->
        <?php include "includes/footer.php" ?>
</div>

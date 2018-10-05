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
                    <h1 id="err" style="display:block;" class="text-center">NO POST OF THIS CATEGORY PUBLISHED</h1>
                </h1>

                <!-- First Blog Post -->
                <?php
                  if(isset($_GET['c_id'])){
                    $c_id=$_GET['c_id'];
                  }
                 $select="SELECT * FROM posts WHERE post_category_id='$c_id' ";
                 $posts_select=mysqli_query($connection,$select);
                 while($row=mysqli_fetch_assoc($posts_select)){
                   if(mysqli_num_rows($posts_select)==0){

                   }
                   else{
                     echo "<script type='text/javascript'>";
                     echo "document.querySelector('#err').style.display='none' ";
                     echo "</script>";
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
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
      <?php }} ?>
            </div>

<?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php" ?>

<?php include "includes/header.php" ?>

<?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

              <?php

               if(isset($_POST['submit'])){

                  $search=$_POST['search'];
                  $select="SELECT * from posts where post_tags LIKE '%$search%' ";
                  $search_query=mysqli_query($connection,$select);
                  if(!$search_query){
                    die("bad gateway ".mysqli_error($connection));
                  }else{
                    $count=mysqli_num_rows($search_query);
                    if($count==0){
                      echo "<h1 class='text-danger'>NO RESULT</h1>";
                    }else{
                      echo "<p class='text-success' style='font-weight:bold;'>Some Results</p>";
                    }
                  }
               }
               $posts_select=mysqli_query($connection,$select);
               while($row=mysqli_fetch_assoc($posts_select)){
                 $post_title=$row['post_title'];
                 $post_author=$row['post_author'];
                 $post_date=$row['post_date'];
                 $post_content=$row['post_content'];
                 $post_image=$row['post_image'];

               ?>

                <h1 class="page-header">
                  Fantasy Teams
                  <small>Dream 11,Halaplay,etc</small>
                </h1>

                <!-- First Blog Post -->



                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
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
      <?php } ?>
            </div>

<?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php" ?>
</div>

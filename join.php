<?php include "includes/header.php" ?>

<?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container mt-5">

        <div class="row mt-5" >

            <!-- Blog Entries Column -->
            <div class="col-md-8">


              <h1 class="page-header">

                  <h1 id="err" style="display:block;" class="text-center">NO POST PUBLISHED</h1>
              </h1>

                <!-- First Blog Post"post.php?p_id=<?php echo $post_id;?>" -->
                <?php
                session_start();
                $title=$_SESSION['title'];
                 $select="SELECT * FROM `posts` where post_title='$title'";
                 $posts_select=mysqli_query($connection,$select);
                 while($row=mysqli_fetch_assoc($posts_select)){
                   $post_title=$row['post_title'];
                   $post_author=$row['post_author'];
                   $post_date=$row['post_date'];
                   $post_content=substr($row['post_content'],0,100);
                   $post_image1=$row['post_image1'];
                   $post_image2=$row['post_image2'];
                   $post_id=$row['post_id'];
                   $post_status=$row['post_status'];

                      echo "<script type='text/javascript'>";
                      echo "document.querySelector('#err').style.display='none' ";
                      echo "</script>";
                 ?>

                 <div class="card m-5">
                   <div class="card-header text-center">
                     <h2 class="card-title">
                         <h3 class="text-secondary"><?php echo $post_title; ?></h3>
                     </h2>
                   </div>
                   <div class="card-body text-center">

                     <img class="img-responsive float-left" src="images/<?php echo $post_image1;?>" alt="This is an image" style="width:20%;">
                     <img class="img-responsive float-right" src="images/<?php echo $post_image2;?>" alt="This is an image" style="width:20%;">
                     <br>
                     <h4 class="text-secondary"><?php echo $post_content;  ?></h4>
                      <h5 class="text-danger font-weight-bold"><span class="glyphicon glyphicon-time"></span> Starting at <?php echo $post_author;?></h4>
                      <br>
                    
                   </div>


                </div>
                <?php } ?>
            </div>

       </div>
       
                
        <?php
                 $select="SELECT * FROM `contest`";
                 $contest_select=mysqli_query($connection,$select);
                 while($row=mysqli_fetch_assoc($contest_select)){
                     $title=$row['contest_title']; 
                   $winner=$row['contest_winner'];
                   $winnings=$row['contest_winnigs'];
                   $fees=$row['contest_fees'];
                      echo "<script type='text/javascript'>";
                      echo "document.querySelector('#err').style.display='none' ";
                      echo "</script>";
                 ?>
                    
                 <div class="card m-5" style="width:675px">
                   <div class="card-header text-center">
                     <h2 class="card-title">
                         <h3 class="text-secondary"><?php echo $title ?></h3>
                     </h2>
                   </div>
                   <div class="card-body text-center">
                  

                    <table class="table table-dark">
    <thead>
      <tr>
        <th>Winners</th>
        <th>Total Winnings</th>
        <th>Entry Fees</th>
      </tr>
    </thead>
    <tbody>
                        <tr>
                            <td>
                           <?php echo $winner;?>
                            </td>
                            <td>
                             <i class="fa fa-inr"></i>    <?php echo $winnings;?> 
                            </td>
                            <td>
                            <i class="fa fa-inr"></i>      <?php echo $fees;?>
                            </td>
                        </tr>
                         
                        </tbody>
                       </table>
                    
                   </div>


                </div>
                <?php } ?>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php" ?>

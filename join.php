<?php include "includes/header.php" ?>

<?php include "includes/navigation.php" ?>

    <!-- Page Content -->
<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
}
?>
    <div class="container-fluid">

        <div class="row mt-5" >

            <!-- Blog Entries Column -->
            <div class="col-md-8">


              <h1 class="page-header">

                  <h1 id="err" style="display:block;" class="text-center">NO POST PUBLISHED</h1>
              </h1>

                <!-- First Blog Post" -->
                <?php
                 $select="SELECT * FROM `posts` where post_id='$id'";
                 $posts_select=mysqli_query($connection,$select);
                 while($row=mysqli_fetch_assoc($posts_select)){
                   $post_title=$row['post_title'];
                   $post_time=$row['post_author'];
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
                      <h5 class="text-danger font-weight-bold"><span class="glyphicon glyphicon-time"></span> Starting at <?php echo $post_time;?></h5>
                      <br>

                   </div>


                </div>
                <div class="display-4 alert alert-primary">
                  Choose from a variety of contests below
                </div>
                <?php } ?>

                        <?php
                                 $select="SELECT * FROM `contest`";
                                 $contest_select=mysqli_query($connection,$select);
                                 while($row=mysqli_fetch_assoc($contest_select)){
                                     $title=$row['contest_title'];
                                   $winner=$row['contest_winner'];
                                   $winnings=$row['contest_winnigs'];
                                   $fees=$row['contest_fees'];
                                   $total_teams=$row['total_teams'];
                                     $id=$row['contest_id'];
                                      echo "<script type='text/javascript'>";
                                      echo "document.querySelector('#err').style.display='none' ";
                                      echo "</script>";
                                 ?>

                                 <div class="card m-5">

                                   <div class="card-header">
                                     <i class="fa fa-trophy" style="font-size:40px;color:darkOrange;"></i>
                                     <span class="font-weight-bold"><?php echo $title; ?></span>
                                   </div>

                                   <div class="card-body text-center">


                                    <table class="table table-default">
                    <thead>
                      <tr>
                        <th>Winners</th>
                        <th>Total Winnings</th>
                        <th>Entry Fees</th>
                        <th>Total Teams</th>
                      </tr>
                    </thead>
                    <tbody>
                                        <tr>
                                            <td class="text-default">
                                           <?php echo $winner;?>
                                            </td>
                                            <td class="text-primary">
                                             <i class="fa fa-inr"></i>    <?php echo $winnings;?>
                                            </td>
                                            <td class="text-default">
                                            <i class="fa fa-inr"></i>      <?php echo $fees;?>
                                            </td>
                                            <td>
                                            <?php echo $total_teams;?>
                                            </td>
                                        </tr>

                                        </tbody>
                                       </table>

                                   </div>

                                <div class="card-footer text-center">
                                  <a href="team.php?id=<?php echo $post_id; ?>" class="btn btn-success">Join Now</a>
                                </div>

                                </div>
                                <?php } ?>
            </div>
<?php include "includes/sidebar.php"; ?>
       </div>


        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php" ?>
<?php echo $post_id; ?>
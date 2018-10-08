<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<?php include "includes/navigation.php" ?>

    <!-- Page Content -->
<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
}
?>


    <div class="container mt-8">

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
                   <div class="card-header">
                     <h2 class="card-title">
                        <img class="img-responsive float-left" src="images/<?php echo $post_image1;?>" alt="This is an image" style="width:5%;">  <h3 class="text-secondary"><?php echo $post_title; ?></h3>                     <img class="img-responsive float-right" src="images/<?php echo $post_image2;?>" alt="This is an image" style="width:5%;">

                     </h2>
                   </div>
                   <div class="card-body text-center">

                    
                     <br>
                     <h4 class="text-secondary"><?php echo $post_content;  ?></h4>
                      <h5 class="text-danger font-weight-bold"><span class="glyphicon glyphicon-time"></span> Starting at <?php echo $post_time;?></h4>
                      <br>

                   </div>


                </div>
                
                <?php } ?>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4 mt-5 text-center">

            <h4 class="display-4 text-secondary">Create Your Team</h4>

             <p class="text-danger font-weight-bold">Select 5 players,save team and join the contest</p>

             <table class="table table-striped table-bordered">

               <thead>
                 <td>Info</td>
                 <td>Player</td>
                 <td>Team</td>
                 <td>Credits</td>
               </thead>

               <tbody>
                <?php

                  $select_query=mysqli_query($connection,"SELECT * from squad");
                  while($row=mysqli_fetch_array($select_query)){
                    $info=$row['info'];
                    $player=$row['player'];
                    $team=$row['team'];
                    $credits=$row['credits'];


                 ?>
                 <tr>
                   <td><?php echo ucwords($info); ?></td>
                   <td><?php echo ucwords($player); ?></td>
                   <td><?php echo ucwords($team); ?></td>
                   <td><?php echo ucwords($credits); ?></td>
                   <td>
                    <input type="checkbox" name="" value="">
                   </td>
                 </tr>
            <?php } ?>
               </tbody>

             </table>
  <input type="submit" name="save_team" value="Save Team" class="btn btn-primary">
            </div>

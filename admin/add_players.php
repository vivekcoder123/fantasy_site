<?php include "includes/header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
      <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">




            <?php

              if(isset($_POST['submit'])){
                $info=$_POST['info'];
                $player=$_POST['player'];
                $team=$_POST['team'];
                $credits=$_POST['credits'];
                $insert_query=mysqli_query($connection,"INSERT into
                   squad(info,player,team,credits)VALUES('$info','$player','$team','$credits')");
                   header('Location:add_players.php');
              }

             ?>

                    <div class="col-lg-12">
                      <h1 class="page-header">
                        Welcome Admin

                        <small><?php echo $_SESSION['username'];?></small>

                      </h1>

                      <form class="" action="" method="post">
                       <div class="form-group col-md-3">
                         <input type="text" name="info" placeholder="Enter player info" class="form-control">
                       </div>
                       <div class="form-group col-md-3">
                         <input type="text" name="player" placeholder="Enter player name"  class="form-control">
                       </div>
                       <div class="form-group col-md-3">
                         <input type="text" name="team" placeholder="Enter player team" class="form-control">
                       </div>
                       <div class="form-group col-md-3">
                         <input type="text" name="credits" placeholder="Enter player credits" class="form-control">
                       </div>
                       <input type="submit" name="submit" value="submit" class="btn btn-primary">
                      </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/footer.php" ?>

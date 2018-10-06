
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

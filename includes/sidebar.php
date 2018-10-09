            <!-- Blog Sidebar Widgets Column -->
            <?php
            $team_created=0;
             if($team_created==0){

             ?>
            <div class="col-md-4 mt-5 text-center">
                   <form method="post" action="" onsubmit="documen">
             <h4 class="display-4 text-secondary">Create Your Team</h4>

             <p class="text-danger font-weight-bold">Select 5 players,save team and join the contest</p>
             <div class="container-fluid">
             <div class="d-flex flex-row text-white align-items-stretch text-center">
               <div id="click" class="port-item p-4 bg-primary" data-toggle="collapse" data-target="#home" style="cursor:pointer;">
                 <i class="fa fa-blind d-block"></i> Batsman
               </div>
               <div class="port-item p-4 bg-success" data-toggle="collapse" data-target="#resume" style="cursor:pointer;">
                 <i class="fa fa-soccer-ball-o d-block"></i> Bowler
               </div>
               <div class="port-item p-4 bg-warning" data-toggle="collapse" data-target="#work" style="cursor:pointer;">
                 <i class="fa fa-group d-block"></i> All Rounder
               </div>
               <div class="port-item p-4 bg-danger" data-toggle="collapse" data-target="#contact" style="cursor:pointer;">
                 <i class="fa fa-signing d-block"></i> Wicket Keeper
               </div>
             </div>
           </div>

           <br>

            <?php include "includes/select.php"; ?>
  <input type="submit" name="submit" value="Save Team" class="btn btn-primary" onclick="<?php echo $team_created=1;?>">
</form>
            </div>
<?php
}else{
  echo "view your team here";
}

 ?>
<script type="text/javascript">
  function sexy(){
    <?php $team_created=1;?>
  }
</script>

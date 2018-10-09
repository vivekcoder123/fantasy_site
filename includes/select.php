<?php
if(isset($_POST["submit"]))
{
 $for_query = '';
 if(!empty($_POST["player"]))
 {
  foreach($_POST["player"] as $language)
  {
   $for_query= $language;
   $select_query=mysqli_query($connection,"SELECT * from squad WHERE player='$for_query' ");
   if($select_query){
     while($row=mysqli_fetch_array($select_query)){
      $player_id=$row['id'];
      $player_info=$row['info'];
      $player_team=$row['team'];
      $player_credits=$row['credits'];
      $insert_query = "INSERT INTO user_team(id,user_id,player_id,player_name,player_role,player_team,credits) VALUES ('','$user_id','$player_id','$for_query','$player_info','$player_team','$player_credits')";
      mysqli_query($connection,$insert_query);
     }


 }
  }


  if(mysqli_query($connection, $insert_query))
  {
      echo '<label class="text-success">Team successfully created</label>';
      $team_created=1;
  }
 }
}
?>

<div class="collapse" id="resume">


<table class="table table-striped table-bordered">

  <thead>
    <td>Info</td>
    <td>Player</td>
    <td>Team</td>
    <td>Credits</td>
  </thead>

  <tbody>
   <?php

    $info="bowler";

     $select_query=mysqli_query($connection,"SELECT * from squad where info='$info' ");
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
       <input type="checkbox" name="player[]" value="<?php echo $player;?>">
      </td>
    </tr>
<?php } ?>
  </tbody>

</table>

</div>
<div id="home">

<table class="table table-striped table-bordered">

  <thead>
    <td>Info</td>
    <td>Player</td>
    <td>Team</td>
    <td>Credits</td>
  </thead>

  <tbody>
   <?php

    $info="batsman";

     $select_query=mysqli_query($connection,"SELECT * from squad where info='$info' ");
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
       <input type="checkbox" name="player[]" value="<?php echo $player;?>">
      </td>
    </tr>
<?php } ?>
  </tbody>

</table>

</div>

<div class="collapse" id="work">

  <table class="table table-striped table-bordered">

    <thead>
      <td>Info</td>
      <td>Player</td>
      <td>Team</td>
      <td>Credits</td>
    </thead>

    <tbody>
     <?php

      $info="all rounder";

       $select_query=mysqli_query($connection,"SELECT * from squad where info='$info' ");
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
         <input type="checkbox" name="player[]" value="<?php echo $player;?>">
        </td>
      </tr>
  <?php } ?>
    </tbody>

  </table>

</div>

<div class="collapse" id="contact">
  <table class="table table-striped table-bordered">

    <thead>
      <td>Info</td>
      <td>Player</td>
      <td>Team</td>
      <td>Credits</td>
    </thead>

    <tbody>
     <?php

      $info="wicketkeeper";

       $select_query=mysqli_query($connection,"SELECT * from squad where info='$info' ");
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
         <input type="checkbox" name="player[]" value="<?php echo $player;?>">
        </td>
      </tr>
  <?php } ?>
    </tbody>

  </table>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var limit = 2;
    $('input[type=checkbox]').on('change', function (e) {
        if ($('input[type=checkbox]:checked').length > 5) {
            $(this).prop('checked', false);
            alert("You can select maximum of 5 players only");
        }
    });
  });
</script>

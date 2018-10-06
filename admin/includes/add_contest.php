<?php
if(isset($_POST['create_post'])){
$contest_title=$_POST['title'];
$contest_winners=$_POST['winners'];
$contest_winnings=$_POST['winnings'];
$contest_entry_fees=$_POST['fees'];

$insert="INSERT INTO`contest`(`contest_id`, `contest_title`,`contest_winner`,`contest_winnigs`,`contest_fees`) VALUES('','$contest_title','$contest_winners','$contest_winnings','$contest_entry_fees')";

$post_insert=mysqli_query($connection,$insert);
confirmQuery($post_insert);

}

 ?>


<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="title">Contest_title</label>
  <input type="text" name="title" class="form-control">
</div>

<div class="form-group">
  <label for="winners">Contest_Winner</label>
  <input type="text" name="winners" class="form-control">
</div>


<div class="form-group">
  <label for="winnigs">contest_winnigs</label>
  <input type="text" name="winnings" class="form-control">
</div>

<div class="form-group">
  <label for="fees">contest_fees</label>
  <input type="text" name="fees" class="form-control">
</div>

  <input type="submit" name="create_post" class="btn btn-primary" value="Create contest">
</div>

</form>

<!-- Navigation -->
<?php include "includes/db.php" ?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-fixed-top">
  <a class="navbar-brand" href="#">Fantrick</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     <?php

      $select="SELECT * FROM categories";
      $categories_select=mysqli_query($connection,$select);
      while($row=mysqli_fetch_assoc($categories_select)){
        $cat_title=$row['cat_title'];
        echo "<li class='nav-item btn btn-dark'><a href='#' class='nav-link'>{$cat_title}</a></li>";
      }

      ?>
  <li class="nav-item btn btn-dark">
            <a href="admin" class="nav-link">Admin</a>
        </li>

    </ul>
  </div>
</nav>

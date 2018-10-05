<?php

function isLoggedIn(){
  if(isset($_SESSION['user_role'])){
    return true;
  }
  return false;
}


function confirmQuery($result){
  global $connection;
  if(!$result){
    die("Connection failed".mysqli_error($connection));
  }
}

function insert_categories(){

  global $connection;

  if(isset($_POST['submit'])){
    $cat_title=$_POST['cat_title'];
    if($cat_title=="" || empty($cat_title)){
      echo "<p class='text-danger'>Category Title can not be empty</p>";
    }else{
        if(mysqli_num_rows(mysqli_query($connection,"SELECT * from  categories WHERE cat_title='$cat_title' "))!=0){
          echo "<p class='text-danger'>Category Title already exists</p>";
        }
        else{
            $insert="INSERT into categories(cat_title) VALUES('$cat_title')";
            if(mysqli_query($connection,$insert)){

            }else{
              die("Connection failed".mysqli_error($connection));
            }
        }

    }
  }

}

function show_cat_table(){

  global $connection;

  $select="SELECT * FROM categories";
  $category_query=mysqli_query($connection,$select);

  while($row=mysqli_fetch_assoc($category_query)){
    $cat_title=$row['cat_title'];
    $cat_id=$row['cat_id'];
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "</tr>";
  }

}

function delete_category(){
  global $connection;
  if(isset($_GET['delete'])){
    $the_cat_id=$_GET['delete'];
    $delete="DELETE from categories where cat_id=$the_cat_id";
    mysqli_query($connection,$delete);
    header("Location:categories.php");
  }
}

?>

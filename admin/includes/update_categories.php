
                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat-title">Edit Category</label>

                              <?php

                                if(isset($_GET['edit'])){
                                  $edit_cat_id=$_GET['edit'];
                                  $query="SELECT * from categories WHERE cat_id='$edit_cat_id' ";
                                  $select_categories=mysqli_query($connection,$query);
                                  while($row=mysqli_fetch_assoc($select_categories)){
                                    $cat_id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                ?>
                                   <input type="text" value="<?php if(isset($cat_title)) echo $cat_title;?>" name="cat_title" class="form-control">
                               <?php }} ?>

                             <?php

                              if(isset($_POST['update_category'])){
                                $the_cat_title=$_POST['cat_title'];
                                $update="UPDATE categories set cat_title='$the_cat_title' where cat_id=$cat_id";
                                $update_query=mysqli_query($connection,$update);
                                if(!$update_query){
                                  die("Connection failed".mysqli_error($connection));
                                }else{
                                  header('Location:categories.php');
                                }
                              }

                              ?>

                            </div>
                            <div class="form-group">
                             <input type="submit" name="update_category" value="Update Category" class="btn btn-primary">
                            </div>
                          </form>

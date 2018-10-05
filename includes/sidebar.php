
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4 mt-5">

                <!-- Blog Search Well -->



                <div class="well">
                    <h4>Match Search</h4>
                    <form action="search.php" method="post">
                      <div class="input-group">
                          <input type="text" name="search" class="form-control">
                          <span class="input-group-btn">
                              <button class="btn btn-default" name="submit" type="submit">
                                  <span class="glyphicon glyphicon-search"></span>
                          </button>
                          </span>
                      </div>
                    </form>

                    <!-- /.input-group -->
                </div>


                <!--Log In -->

                <div class="well">
                    <h4>Log In</h4>
                    <form action="includes/login.php" method="post">
                      <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="Enter Username">
                      </div>
                      <div class="form-group">
                          <input type="password" name="password" class="form-control" placeholder="Enter Password">
                      </div>
                      <input type="submit" name="login" value="Submit" class="btn btn-primary">
                    </form>

                    <!-- /.input-group -->
                </div>


                <!-- Blog Categories Well -->
                <div class="well">
                  <?php

                    $select="SELECT * FROM categories";
                    $category_query=mysqli_query($connection,$select);

                   ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                              <?php

                                while($row=mysqli_fetch_assoc($category_query)){
                                  $cat_title=$row['cat_title'];
                                  $cat_id=$row['cat_id'];


                              ?>
                                <li><a href="category.php?c_id=<?php echo $cat_id;?>"><?php echo $cat_title; ?></a>
                                <?php } ?>

                            </ul>
                        </div>


                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
              <?php include "includes/widget.php"; ?>

            </div>

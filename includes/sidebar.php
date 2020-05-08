            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <?php
                //isset()函數是用來判斷變數是不是有存在，如果有就回傳 1(true)，如果沒有就回傳空值
                if(isset($_GET['submit'])){
                    $search=$_GET['search'];
                    //echo $search;
                    $query="SELECT *FROM posts WHERE post_tags LIKE '%$search%'";
                    $search_query=mysqli_query($connection,$query);
                    if(!$search_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $count= mysqli_num_rows($search_query);
                    if($count == 0){
                        echo "<h1>NO Result</h1>";
                    }else{
                        //echo "NO Result";
                    }
                }
                
                ?>
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="get">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                            <button  name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">

                  

                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                            <?php 
                    
                            $query="SELECT * FROM `category`";
                            $categories_query=mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($categories_query)){
                            $cat_title=$row['cat_title'];
                                echo "<li><a href='#'>{$cat_title}</a></li>";
                            }
                            ?>
                                
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
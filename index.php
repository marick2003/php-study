<?php 
include "./includes/db.php";
include "./includes/header.php";
//<!-- Navigation -->
include "./includes/navigation.php";
?>
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <?php 
                    $query = "SELECT * FROM posts";
                    $num=0;
                    $select_all_posts_query=mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_title=$row["post_title"];
                        $post_author=$row["post_author"];
                        $post_date=$row["post_date"];
                        $post_image=$row["post_image"];
                        $post_content=$row["post_content"];
                        $post_tags=$row["post_tags"];
                        echo "<h2><a href='#'>{$post_title}</a></h2>";
                        echo "<p class='lead'>by {$post_author}</p>";
                        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>";
                        echo "<hr> <img class='img-responsive' src='http://placehold.it/900x300' alt=''> <hr>";
                        echo "<p>{$post_content}</p> <hr>";
                        $num +=1;
                    }
                    $string = json_encode($row, JSON_UNESCAPED_UNICODE);

                    /*$length = count($string);*/
                    /*$length = strlen($string); */
                    echo ($row);
                    /* 當頁數 */
                    if($num > 0 ){
                        echo "<ul class='pager'>
                                <li class='previous'>
                                    <a href='#'>&larr; Older</a>
                                </li>
                                <li class='next'>
                                    <a href='#'>Newer &rarr;</a>
                                </li>
                            </ul>";
                    }

                ?>

            </div>

        <?php 
            include "./includes/sidebar.php"
        ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php 
            include "./includes/footer.php"
        ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


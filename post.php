<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "admin/function.php" ?>
    <!-- Navigation -->
    <?php include "includes/nav.php" ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        
            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php

                if (isset($_GET['p_id'])) {
                    $post_id = $_GET['p_id'];
                }
                $query = "SELECT * FROM posts WHERE post_id = $post_id";
                $select_all_posts = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content']; 
                    ?>
                <h1 class="page-header">
                    <?php echo $post_title; ?>
                </h1>
                <p class="lead">
                    by <a href="index.php">
                        <?php echo $post_author; ?>
                        </a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
               
                <hr>
    <?php } ?>
                            
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <?php 
                        if (isset($_POST['add_comment'])) {
                            $the_comment_author = $_POST['comment_author'];
                            $the_comment_email = $_POST['comment_email'];
                            $the_comment_post_id = $post_id;
                            $the_comment_status = "unaprroved";
                            $the_comment_content = $_POST['content'];
                            $the_comment_date = date("d-m-y");
                            $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content ,comment_status, comment_date) VALUES($the_comment_post_id, '$the_comment_author','$the_comment_email','$the_comment_content',
                            '$the_comment_status', now())";
                            $adderComment = mysqli_query($connection, $query);
                            confirmQuery($adderComment);
                            header("Location: post.php?p_id=$post_id");
                            $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $post_id";
                            mysqli_query($connection, $query);
                        }

                    
                    ?>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="comment_author">comment_author</label>
                            <input class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="comment_email">comment_email</label>
                            <input class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="content"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" name="add_comment" value="Add Comment">
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php 
                    $query = "SELECT * FROM comments Where comment_post_id = $post_id AND comment_status = 'Approved' ORDER BY comment_id DESC";
                    $select_comments = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_comments)) {
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_status = $row['comment_status'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                    ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>        
                <?php }?>
               
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php' ?>

        </div>
        <!-- /.row -->
        <hr>


                
<?php include 'includes/footer.php' ?>

    </div>
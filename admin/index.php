<?php include "includes/admin_header.php" ?>
    <div id="wrapper">
        
    <!-- Navigation -->    
    <?php include "includes/admin_nav.php" ?>    
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to
                            <small><?php echo $_SESSION['user_firstname']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                   
                <!-- /.row -->
                <?php
                function countsMe($me) {
                    global $connection;
                    $query = "SELECT * FROM $me";
                    $select_me = mysqli_query($connection, $query);
                    return mysqli_num_rows($select_me);
                }
                ?>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $post_count = countsMe("posts") ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $comment_count = countsMe("comments") ?></div>
                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $user_count = countsMe("users") ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $category_count =  countsMe("categories") ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                <?php 
                    $stmt = "SELECT * from posts WHERE post_status = 'draft'";
                    $post_draft = mysqli_num_rows(mysqli_query($connection, $stmt));
                    $stmt = "SELECT * from comments WHERE comment_status = 'Unapproved'";
                    $un_comment = mysqli_num_rows(mysqli_query($connection, $stmt));
                    $stmt = "SELECT * from users WHERE user_role = 'subscriber'";
                    $subscriber_count = mysqli_num_rows(mysqli_query($connection, $stmt));
                ?>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Date', 'Count'],
                        <?php 
                            $element_text = ['Active Posts', "Draft Posts", 'Categories', 'subscriber' , 'Users', "Unapproved Comments" ,'Comments'];
                            $element_count = [$post_count, $post_draft ,$category_count, $subscriber_count ,$user_count, $un_comment,  $comment_count];
                            for($i = 0; $i < 7; $i++) {
                                echo "['$element_text[$i]'" . "," . $element_count[$i] . "],";
                            }
                        ?>
                        ]);

                        var options = {
                        chart: {
                            title: '',
                            subtitle: '',
                        }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>

                </div>
                <!-- row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>
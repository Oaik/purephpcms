<?php 
    include "includes/admin_header.php";
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $select_user = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc( $select_user )) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }
?>
    <div id="wrapper">
        
    <!-- Navigation -->    
    <?php include "includes/admin_nav.php" ?>    

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Comments</small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="title">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
                            </div>

                            <div class="form-group">
                                <select name="user_role" class="form-control" id="user_role">
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="admin" <?php if($user_role == "admin") echo "selected" ?>>Admin</option> 
                                    <option value="subscriber" <?php if($user_role == "subscriber") echo "selected" ?> >Subscriber</option>     
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="author">user_password</label>
                                <input type="password" name="user_password" class="form-control" value="<?php echo $user_password ?>">
                            </div>    

                            <div class="form-group">
                                <label for="post_status">user_firstname</label>
                                <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_tags">user_lastname</label>
                                <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_content">user_email</label>
                                <input type="email" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
                            </div>

                            <div class="form-group"><input type="submit" class="btn btn-primary" value="Update Profile" name="edit_user"></div>

                            </form>
                    
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php";

     if(isset($_POST['edit_user'])) {
        $username = $_POST['username'];
        $user_passsword = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
   
        $query = "UPDATE users SET username = '$username', user_password = '$user_password', user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_email = '$user_email', user_role = '$user_role' WHERE username = '$username'";

        $editer_user = mysqli_query($connection, $query);
        confirmQuery($editer_user);
        header("Location: users.php");
     }
    
    
    ?>
<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="register.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Firstname</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>
<?php
    
   if (isset($_POST['submit'])) {
        $compeleted = false;
        if (!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $username = mysqli_real_escape_string($connection, $_POST['username']);
            $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $user_role = "subscriber";
            $query = "SELECT * FROM users WHERE username='$username'";
            $query = mysqli_query($connection, $query);
            $nums = mysqli_num_rows($query);
            if ($nums == 0) {
                $sql = "INSERT INTO users(username,user_firstname, user_password, user_email, user_role) VALUES ('$username', '$firstname', '$password', '$email', '$user_role')";
                $sql = mysqli_query($connection, $sql);
                if ($sql) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_role'] = $user_role;
                    $_SESSION['user_firstname'] = $firstname;
                    $compeleted = true;
                }
            } else {
                echo "This Username is Already registered Please choose another username";
            }
        } else {
            echo "Please Compelete All fields";
        }
        if ($compeleted) {
        ?>
        <script>
            window.location.href = "admin";
        </script>
        <?php }
        
   }
 

?>


<?php include "includes/footer.php";?>

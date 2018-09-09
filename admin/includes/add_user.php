
<?php 
    if(isset($_POST['create_user'])) {
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $user_email = $_POST['user_email'];

        $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) VALUES('$username', '$user_password', '$user_firstname', '$user_lastname', '$user_email', '$user_role')";

        $adder_user = mysqli_query($connection, $query);
        confirmQuery($adder_user);
    }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
        <select name="user_role" class="form-control" id="user_role">
            <option value="" disabled selected>Select your option</option>
            <option value="admin">Admin</option> 
            <option value="subscriber">Subscriber</option>    
        </select>
    </div>

    <div class="form-group">
        <label for="author">user_password</label>
        <input type="password" name="user_password" class="form-control">
    </div>    

    <div class="form-group">
        <label for="post_status">user_firstname</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_tags">user_lastname</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">user_email</label>
        <input type="email" name="user_email" class="form-control">
    </div>

    <div class="form-group"><input type="submit" class="btn btn-primary" value="publish post" name="create_user"></div>

</form>
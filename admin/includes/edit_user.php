<h3>Edit the post</h3>

<?php 
if(isset($_GET['p_id'])) {
    $user_id = $_GET['p_id'];
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $select_user = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_user)) {
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
    }
}

?>

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

<div class="form-group"><input type="submit" class="btn btn-primary" value="publish post" name="edit_user"></div>

</form>

<?php 
    if(isset($_POST['edit_user'])) {
        $username = $_POST['username'];
        $user_passsword = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
   
        $query = "UPDATE users SET username = '$username', user_password = '$user_password', user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_email = '$user_email', user_role = '$user_role' WHERE user_id = $user_id";

        $editer_user = mysqli_query($connection, $query);
        confirmQuery($editer_user);
        header("Location: users.php?source=edit_users&p_id=".$user_id);
    }
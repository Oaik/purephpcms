<?php
include 'db.php';
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $query = "SELECT * FROM users WHERE username = '$username'";
    $select_user_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_query)) {
        $user_password = $row['user_password'];
        $user_role = $row['user_role'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
    }
    if ($user_password === $password) {
        if ($user_role == 'admin')
            header("Location: ../admin");
        else
            header("Location: ../admin/comments.php");
        $_SESSION['username'] = $username;
        $_SESSION['user_role'] = $user_role;
        $_SESSION['user_firstname'] = $user_firstname;
        $_SESSION['user_lastname'] = $user_lastname;
    } else {
        header("Location: ../index.php");
    }
}

?>
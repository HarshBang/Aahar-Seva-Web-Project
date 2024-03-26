<?php
require_once 'db_config.php';
$username = $_POST['username'];
$password = $_POST['password'];

session_start();
$error_message = "";

if (strlen($username) > 0 && strlen($password) > 0) {
    $query = "SELECT * FROM admins WHERE sevak_name='$username'";
    $getUser = mysqli_query($conn, $query);
    if (mysqli_num_rows($getUser) == 1) {
        $row = mysqli_fetch_array($getUser);
        if ($password == $row['sevak_password'] && $username == $row['sevak_name']) {
            $_SESSION['username'] = $username;
            header("location:admin_index.php");
            exit;
        } else if ($password != $row['sevak_password']) {
            $error_message = "WRONG PASSWORD";
        } else {
            $error_message = "WRONG USERNAME";
        }
    } else {
        $error_message = "WRONG USERNAME";
    }
} else {
    $error_message = "Please fill all the mandatory fields";
}

$_SESSION['error_message'] = $error_message;
header("location:login.php");
exit;
?>
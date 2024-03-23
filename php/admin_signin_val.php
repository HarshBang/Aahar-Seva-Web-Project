<?php
require_once 'db_config.php';
$username = $_POST['username'];
$password = $_POST['password'];

if (strlen($username) > 0 && strlen($password) > 0) {

    $query = "SELECT * FROM admins WHERE sevak_name='$username'";
    $getUser = mysqli_query($conn, $query);
    if (mysqli_num_rows($getUser) == 1) {
        while ($row = mysqli_fetch_array($getUser)) {
            // $getPasswd = $row['sevak_password'];
            if ($password == $row['sevak_password'] && $username == $row['sevak_name']) {
                echo "Logged in successfully!";
                session_start();
                $_SESSION['username'] = $username;
                header("location:admin_index.php");
            } else {
                echo "<script>alert('Wrong email/password');</script>";
            }
        }
    }
} else {
    echo "<script>alert('Please fill all the mandatory fields');</script>";
}
?>

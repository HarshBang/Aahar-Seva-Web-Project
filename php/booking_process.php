<?php
require_once 'db_config.php';
session_start();

$sponsor_name = $_POST['fullname'];
$sponsor_phone = $_POST['phoneNumber'];
$sponsor_email = $_POST['sponsor_email'];

// Check if the sponsor already exists in the database
$query = "SELECT * FROM sponsors WHERE sponsor_phone = '$sponsor_phone'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Sponsor already exists, retrieve the sponsor_id
    $row = mysqli_fetch_assoc($result);
    $sponsor_id = $row['sponsor_id'];
} else {
    // Insert a new sponsor record
    $insert_query = "INSERT INTO sponsors (sponsor_name, sponsor_phone, sponsor_email) VALUES ('$sponsor_name', '$sponsor_phone', '$sponsor_email')";
    if (mysqli_query($conn, $insert_query)) {
        $sponsor_id = mysqli_insert_id($conn);
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        exit;
    }
}

// Store the sponsor_id in the session
$_SESSION['sponsor_id'] = $sponsor_id;

// Redirect to the next page (e.g., booking2.php)
header("Location: booking2.php");
exit;
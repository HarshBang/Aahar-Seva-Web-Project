<?php
require_once 'db_config.php';
session_start();

// Retrieve form data and session data
$sponsor_for = $_POST['sponsorFor'];
$date = $_POST['date'];
$purpose = $_POST['purpose'];
$location = $_POST['location'];
$slot = $_POST['slot'];
$food = $_POST['food'];
$sponsor_id = $_SESSION['sponsor_id'];

// Calculate the total price based on the location
$total_price = 0;
switch ($location) {
    case 'nilouferHospital':
    case 'publicGarden':
    case 'deafAndDumbOrphanage':
        $total_price = 2500;
        break;
    case 'maternityHospital':
        $total_price = 1500;
        break;
    case 'shyamMandir':
    case 'donBoscoOrphanage':
    case 'bassOrphanage':
        $total_price = 1000;
        break;
    case 'devnarBlindSchool':
        $total_price = 4000;
        break;
}

// Insert the booking details into the `bookings` table
$insert_query = "INSERT INTO bookings (sponsor_id, sponsored_for, purpose, booking_date, location, slots, booking_time, total_price, food_item) VALUES ('$sponsor_id', '$sponsor_for', '$purpose', '$date', '$location', '$slot', NOW(), '$total_price', '$food')";
if (mysqli_query($conn, $insert_query)) {
    $booking_id = mysqli_insert_id($conn);

    // Store the booking_id in the session
    $_SESSION['booking_id'] = $booking_id;

    // Redirect to the booking_preview.php page with the booking_id as a query parameter
    header("Location: booking_preview.php?booking_id=" . $booking_id);
    exit;
} else {
    echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
}
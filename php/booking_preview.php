<?php
require_once 'db_config.php';
session_start();

// Check if the booking_id is present in the query parameter
if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Retrieve the booking details from the `bookings` table
    $query = "SELECT b.booking_id, s.sponsor_name, s.sponsor_phone, s.sponsor_email, b.sponsored_for, b.purpose, b.booking_date, b.location, b.slots, b.booking_time, b.total_price
              FROM bookings b
              INNER JOIN sponsors s ON b.sponsor_id = s.sponsor_id
              WHERE b.booking_id = '$booking_id'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display the booking details
        echo "<h2>Booking Preview</h2>";
        echo "<p>Booking ID: " . $row['booking_id'] . "</p>";
        echo "<p>Sponsor Name: " . $row['sponsor_name'] . "</p>";
        echo "<p>Sponsor Phone: " . $row['sponsor_phone'] . "</p>";
        echo "<p>Sponsor Email: " . $row['sponsor_email'] . "</p>";
        echo "<p>Sponsored For: " . $row['sponsored_for'] . "</p>";
        echo "<p>Purpose: " . $row['purpose'] . "</p>";
        echo "<p>Booking Date: " . $row['booking_date'] . "</p>";
        echo "<p>Location: " . $row['location'] . "</p>";
        echo "<p>Slot: " . $row['slots'] . "</p>";
        echo "<p>Booking Time: " . $row['booking_time'] . "</p>";
        echo "<p>Total Price: " . $row['total_price'] . "</p>";
    } else {
        echo "Booking not found.";
    }
} else {
    echo "Invalid booking ID.";
}
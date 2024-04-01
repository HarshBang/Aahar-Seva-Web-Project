<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Seva</title>
    
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/booking.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

    <style>
      body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
      }
      .main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center; 
        height: 78vh;
      }


      .main p {
        font-size: 30px;
        margin: 0; 
      }

      .back-button {
        margin-top: 20px; 
      }
    </style>
</head>
<body>
    <!--
    ===========================================
    NavBar Code Starts 
    ======================================= -->
    <header>
    <div class="navbar-booking ">
        <div class="nav-logo-booking"><a href="#"><img src="../media/navLogo.png" class="logo" alt="nav-logo"></a></div>

        <div class="nav-item-booking">
            <a href="../index.html"><i class="fa-solid fa-house"></i></a>
        </div>
    </div>
    </header>

    <!--
    ===========================================
    preview Code Starts 
    ======================================= -->
    <div class="main">
    <p>Thank you for booking. We will nofity ur conformation on the register mail</p>
    <?php
    // require_once 'db_config.php';
    // session_start();

    // // Check if the booking_id is present in the query parameter
    // if (isset($_GET['booking_id'])) {
    //     $booking_id = $_GET['booking_id'];

    //     // Retrieve the booking details from the `bookings` table
    //     $query = "SELECT b.booking_id, s.sponsor_name, s.sponsor_phone, s.sponsor_email, b.sponsored_for, b.purpose, b.booking_date, b.location, b.slots, b.booking_time, b.total_price
    //             FROM bookings b
    //             INNER JOIN sponsors s ON b.sponsor_id = s.sponsor_id
    //             WHERE b.booking_id = '$booking_id'";

    //     $result = mysqli_query($conn, $query);

    //     if (mysqli_num_rows($result) > 0) {
    //         $row = mysqli_fetch_assoc($result);
    //         // Display the booking details
    //         echo "<h3>Booking Preview</h2>";
    //         echo "<p>Booking ID: " . $row['booking_id'] . "</p>";
    //         echo "<p>Sponsor Name: " . $row['sponsor_name'] . "</p>";
    //         echo "<p>Sponsor Phone: " . $row['sponsor_phone'] . "</p>";
    //         echo "<p>Sponsor Email: " . $row['sponsor_email'] . "</p>";
    //         echo "<p>Sponsored For: " . $row['sponsored_for'] . "</p>";
    //         echo "<p>Purpose: " . $row['purpose'] . "</p>";
    //         echo "<p>Booking Date: " . $row['booking_date'] . "</p>";
    //         echo "<p>Location: " . $row['location'] . "</p>";
    //         echo "<p>Slot: " . $row['slots'] . "</p>";
    //         echo "<p>Booking Time: " . $row['booking_time'] . "</p>";
    //         echo "<p>Total Price: " . $row['total_price'] . "</p>";
    //     } else {
    //         echo "Booking not found.";
    //     }
    // } else {
    //     echo "Invalid booking ID.";
    // }
    // Start the session
    session_start();

    // Check if the sponsor_id is set in the session
    if(isset($_SESSION['booking_id'])) {
        // Retrieve the booking_id from the session
        $booking_id = $_SESSION['booking_id'];

        // Print the booking_id within an h2 tag
        echo "<p  class='p_two' >Remember your Booking ID: $booking_id</p>";
    } else {
        // Handle the case when booking_id is not set in the session
        echo "<p>Booking ID not found!</p>";
    }
    ?>
      <a href="../php/admin_booking.php"><button class="btn back-button">Back</button></a>

    </div>
    <!--
    ===========================================
    footer Code Starts 
    ======================================= -->
    <div class="f-credits"><p>Copyright ©2024 All rights reserved | This website is made with &#x2764 by Harsh Bang</p></div>
    
</body>
</html>
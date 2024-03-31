<?php
// Include the database configuration file
require_once 'db_config.php';

// Query to retrieve booking requests data
$query = "SELECT * FROM bookings";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aahar Sevak</title>
    
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  
    <style>
        .container- {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            background-color: #0c0c33;
            color: #fff;
            width: 200px;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li a {
            display: block;
            color: #fff;
            padding: 16px;
            text-decoration: none;
            gap: 300px;

        }

        .sidebar li a:hover {
            background-color: #555;
        }

        .main-content {
            margin-left: 200px;
            padding: 20px;
            flex: 1;
        }

        /* Table styles */
        .main-content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .main-content th,
        .main-content td {
            padding: 5px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .main-content th {
            background-color: #f2f2f2;
        }

        button{
            margin-right: 4px;
        }

        .main-content-btns{
            margin-bottom: 40px;
            display: flex;
            justify-content: center;
        }
    </style>
</head>
  <body>
    <!--
    ===========================================
    NavBar Code Starts 
    ======================================= -->
    <header>
    <div class="navbar-admin ">
        <div class="nav-logo-admin"><a href="#"><img src="../media/navLogo.png" class="logo" alt="nav-logo"></a></div>

        <div class="nav-item-admin">
            <a href="../index.html"><i class="fa-solid fa-house"></i></a>
        </div>
    </div>
    </header> 
    <div>
        <div class="sidebar">
            <ul>
                <li><a href="../php/admin_index.php">Dashboard</a></li>
                <li><a href="#">Bookings</a></li>
                <li><a href="#">Resources</a></li>
                <li><a href="#">Upload Photos</a></li>
                <li><a href="#">Discussion Forum</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h2 class="common-heading">Welcome Admin</h2>
            <div class="main-content-btns">
            <button class="btn">Confirmed Booking</button>
            <button class="btn">on-hold Booking</button>
            <button class="btn">past Booking</button>
            </div>
            <p>Here are pending booking requests:</p>
            <table>
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Sponsor For</th>
                        <th>Date</th>
                        <th>Purpose</th>
                        <th>Location</th>
                        <th>Slot</th>
                        <th>Total Price</th>
                        <th>Food Item</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Check if there are any booking requests
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row of data
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Start a form for each row
                        echo "<form method='post' action='send_mail.php'>";
                        echo "<tr>";
                        echo "<input type='hidden' name='sponsor_id' value='" . $row['sponsor_id'] . "'>";
                        echo "<td>" . $row['booking_id'] . "</td>";
                        echo "<td>" . $row['sponsored_for'] . "</td>";
                        echo "<td>" . $row['booking_date'] . "</td>";
                        echo "<td>" . $row['purpose'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td>" . $row['slots'] . "</td>";
                        echo "<td>" . $row['total_price'] . "</td>";
                        echo "<td>" . $row['food_item'] . "</td>";
                        // Add hidden fields to hold row values
                        echo "<input type='hidden' name='booking_id' value='" . $row['booking_id'] . "'>";
                        echo "<input type='hidden' name='action' value=''>";
                        // Add buttons for confirmation and holding actions
                        echo "<td>";
                        echo "<button class='btn' type='submit' name='action' value='confirm'>Confirm</button>";
                        echo "<button class='btn' type='submit' name='action' value='hold'>Hold</button>";
                        echo "</td>";
                        echo "</tr>";
                        // Close the form for each row
                        echo "</form>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No booking requests found</td></tr>";
                }
                ?>
                </tbody>
            </table>

    </div>
</body>
</html>
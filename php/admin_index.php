<?php
// Include the database configuration file
require_once 'db_config.php';

// Function to fetch count of booking IDs
function getBookingCount() {
    global $conn;
    $query = "SELECT COUNT(*) AS total_bookings FROM bookings";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_bookings'];
}

// Function to fetch unique counts for booking dates date-wise
function getUniqueBookingDatesCount() {
    global $conn;
    $query = "SELECT COUNT(DISTINCT booking_date) AS unique_dates FROM bookings";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['unique_dates'];
}

// Function to fetch unique dates
function getUniqueDates() {
    global $conn;
    $dates = array();
    $query = "SELECT DISTINCT booking_date FROM bookings ORDER BY booking_date";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $dates[] = $row['booking_date'];
    }
    return $dates;
}

// Function to fetch location-wise counts for each date
function getLocationWiseCounts() {
    global $conn;
    $locationCounts = array();
    $dates = getUniqueDates();
    $locations = array('nilouferHospital', 'publicGarden', 'maternityHospital', 'shyamMandir', 'devnarBlindSchool', 'deafAndDumbOrphanage', 'donBoscoOrphanage', 'bassOrphanage');

    foreach ($dates as $date) {
        $locationCounts[$date] = array();
        foreach ($locations as $location) {
            $query = "SELECT COUNT(*) AS count FROM bookings WHERE booking_date = '$date' AND location = '$location'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $locationCounts[$date][$location] = $row['count'];
        }
    }

    return $locationCounts;
}

// Fetch location-wise counts for each date
$locationWiseCounts = getLocationWiseCounts();

// Fetch counts
$totalBookings = getBookingCount();
$uniqueBookingDates = getUniqueBookingDatesCount();

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

        /* Card-like box style */
        .card {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border: 2px solid #ccc;
        }

        /* Table-like CSS style */
        .location-table {
            width: 100%;
            border-collapse: collapse;
        }

        .location-table th,
        .location-table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            /* font-weight: bold; Increase boldness */
            font-size: 16px; /* Increase font size */
        }

        .location-table th {
            background-color: #f2f2f2;
        }

        /* .full {
            color: green; 
            font-weight: bold;
        }

        .available {
            color: black; 
        }

        .exceed {
            color: red;
            font-weight: bold;
        } */

    </style>
</head>
  <body>
    <!--
    ===========================================
    NavBar Code Starts 
    ======================================= -->
    <header>
    <div class="navbar-admin" >
        <div class="nav-logo-admin"><a href="#"><img src="../media/navLogo.png" class="logo" alt="nav-logo"></a></div>

        <div class="nav-item-admin">
            <a href="../index.html"><i class="fa-solid fa-house"></i></a>
        </div>
    </div>
    </header> 
    <div class="container-">
        <div class="sidebar">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="../php/admin_booking.php">Bookings</a></li>
                <li><a href="#">Resources</a></li>
                <li><a href="#">Upload Photos</a></li>
                <li><a href="#">Discussion Forum</a></li>
            </ul>
        </div>
        <div class="main-content">
        <h2 class="common-heading">Welcome Admin</h2>
            <div class="card">
                <h3 style="color: #f56a00;" >Stats:</h3>
                <ul>
                    <li>Total Bookings Till Date: <?php echo $totalBookings; ?></li>
                    <li>Unique Booking Dates: <?php echo $uniqueBookingDates; ?></li>
                </ul>
            </div>
            <div class="card">
                <h3 style="color: #f56a00;">Date-Location-wise booking request Counts:</h3>
                <table class="location-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <?php
                            // Print the header row with locations
                            $locations = array('Niloufer Hospital', 'Public Garden', 'Maternity Hospital', 'Shyam Mandir', 'Devnar BlindSchool', 'Deaf and Dumb Orphanage', 'Don Bosco Orphanage', 'Bass Orphanage');
                            foreach ($locations as $location) {
                                echo "<th>$location</th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Array to store total slots for each location
                        $totalSlots = array(
                            'nilouferHospital' => 4,
                            'publicGarden' => 2,
                            'maternityHospital' => 1,
                            'shyamMandir' => 1,
                            'devnarBlindSchool' => 1,
                            'deafAndDumbOrphanage' => 1,
                            'donBoscoOrphanage' => 1,
                            'bassOrphanage' => 1
                        );

                        // Loop through each date and print the corresponding location counts
                        // foreach ($locationWiseCounts as $date => $counts) {
                        //     echo "<tr>";
                        //     echo "<td>$date</td>";
                        //     foreach ($totalSlots as $location => $slots) {
                        //         $requestCount = isset($counts[$location]) ? $counts[$location] : 0;
                        //         $statusClass = ($requestCount >= 0 && $requestCount < $slots) ? 'available' : (($requestCount > $slots) ? 'exceed' : 'full');
                        //         echo "<td class='$statusClass'>$requestCount / $slots</td>";
                        //     }
                        //     echo "</tr>";
                        // }

                        foreach ($locationWiseCounts as $date => $counts) {
                            echo "<tr>";
                            echo "<td>$date</td>";
                            foreach ($totalSlots as $location => $slots) {
                                $requestCount = isset($counts[$location]) ? $counts[$location] : 0;
                                $statusClass = ($requestCount >= 0 && $requestCount < $slots) ? 'available' : (($requestCount > $slots) ? 'exceed' : 'full');
                                $backgroundColor = ($statusClass === 'available') ? 'white' : (($statusClass === 'exceed') ? 'red' : 'green');
                                echo "<td style='background-color: $backgroundColor;'>$requestCount / $slots</td>";
                            }
                            echo "</tr>";
                        }
                        
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    
</body>
</html>

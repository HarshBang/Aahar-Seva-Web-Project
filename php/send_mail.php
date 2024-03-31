<?php
require_once 'db_config.php';

// Check if the action is set in the POST request
if(isset($_POST['action']) && isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];
} else {
    exit();
}

// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
    
require '../mail/Exception.php';
require '../mail/PHPMailer.php';
require '../mail/SMTP.php';

// Query to retrieve booking details based on booking_id
$query = "SELECT * FROM bookings WHERE booking_id = '$booking_id'";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Check if a row was returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the booking details from the result
        $row = mysqli_fetch_assoc($result);
        $sponsor_id = $row['sponsor_id'];
        $sponsored_for = $row['sponsored_for'];
        $booking_date = $row['booking_date'];
        $location = $row['location'];
        $slots = $row['slots'];
        $purpose = $row['purpose'];
        $total_price = $row['total_price'];

        // Query to retrieve sponsor details based on sponsor_id
        $sponsorQuery = "SELECT sponsor_name, sponsor_email FROM sponsors WHERE sponsor_id = '$sponsor_id'";
        $sponsorResult = mysqli_query($conn, $sponsorQuery);
        
        // Check if the sponsor details query was successful
        if ($sponsorResult) {
            // Fetch the sponsor details from the result
            $sponsorRow = mysqli_fetch_assoc($sponsorResult);
            $sponsor_name = $sponsorRow['sponsor_name'];
            $sponsor_email = $sponsorRow['sponsor_email'];

            // Instantiate PHPMailer
            $mail = new PHPMailer(true);
            
            try {
                // SMTP configuration
                $mail->isSMTP();                                         
                $mail->Host       = 'smtp.gmail.com';                   
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'harshbang10@gmail.com';                    
                $mail->Password   = 'ippjywajtiyohezd'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
                $mail->Port       = 587;                                
            
                // Email content
                $mail->setFrom('harshbang10@gmail.com', 'Sevak');
                $mail->addAddress($sponsor_email); // Add recipient
                
                // Message content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Booking Confirmation';
                $mail->Body = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Booking Confirmation</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #fff;
                            padding: 20px;
                        }
                        .container {
                            max-width: 600px;
                            margin: auto;
                            background-color: #e7e7eb;
                            border-radius: 10px;
                            padding: 20px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                        }
                        
                        h2{
                            text-align: center;
                            color: #0c0c33;
                        p {
                            color: #666;
                        }
                        ul {
                            list-style: none;
                            padding-left: 0;
                        }
                        ul li {
                            margin-bottom: 10px;
                        }
                    </style>
                </head>
                <body>
                    <p>Dear ' . $sponsor_name . ',</p>
                    <p>Your booking has been confirmed!</p>
                    <div class="container">
                        <h2>Here are the details of your booking:</p>
                        <ul>
                            <li><strong>Booking ID:</strong> ' . $booking_id . '</li>
                            <li><strong>Sponsor For:</strong> ' . $sponsored_for . '</li>
                            <li><strong>Seva Date:</strong> ' . $booking_date . '</li>
                            <li><strong>Location:</strong> ' . $location . '</li>
                            <li><strong>Slots:</strong> ' . $slots . '</li>
                            <li><strong>Purpose:</strong> ' . $purpose . '</li>
                            <li><strong>Total Price:</strong> ' . $total_price . '</li>
                        </ul>
                        
                    </div>
                    <p>Thank you for choosing Seva, serving happiness.</p>
                    <p>Best regards,<br>Aahar Seva</p>
                    <img src="http://localhost/media/navLogo.png" alt="Aahar Seva - Serving Happiness" style="display: block; margin: 20px auto;">
                    </body>
                </html>              
                ';

                // Send email
                $mail->send();

                // Update status to 'confirmed' in the bookings table
                $updateQuery = "UPDATE bookings SET status = 'confirmed' WHERE booking_id = '$booking_id'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if (!$updateResult) {
                    throw new Exception("Error updating status: " . mysqli_error($conn));
                }

                // Redirect to confirmation page
                header("Location: confirmation_mail_sent_success.php");
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            // Error retrieving sponsor details
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // No row found with the provided booking_id
        echo "Booking details not found for the provided booking ID.";
    }
} else {
    // Error executing the query
    echo "Error: " . mysqli_error($conn);
}
?>

<?php
require_once 'db_config.php';

// Check if the action is set in the POST request
if(isset($_POST['action'])) {
    $sponsor_id = $_POST['sponsor_id'];
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

// Query to retrieve sponsor_mail from sponsors table based on sponsor_id
$query = "SELECT sponsor_email FROM sponsors WHERE sponsor_id = '$sponsor_id'";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Check if a row was returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the sponsor_mail from the result
        $row = mysqli_fetch_assoc($result);
        $sponsor_mail = $row['sponsor_email'];
        
        // Now you have the sponsor_mail associated with the provided sponsor_id
        // You can use $sponsor_mail for sending email
    
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
            $mail->setFrom('harshbang10@gmail.com', 'Admin');
            $mail->addAddress($sponsor_mail); // Add recipient
            
            // Message content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Booking Confirmation';
            $mail->Body    = '
                <p>Dear Sponsor,</p>
                <p>Your booking has been confirmed!</p>
                <p>Thank you for choosing our service.</p>
                <p>Best regards,<br>Aahar Seva</p>
                <img src="../media/navLogo.png" alt="Booking Confirmation">
            ';

            // Send email
            $mail->send();
            header("Location: mail_sent_success.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // No row found with the provided sponsor_id
        echo "Sponsor email not found for the provided sponsor ID.";
    }
} else {
    // Error executing the query
    echo "Error: " . mysqli_error($conn);
}
?>

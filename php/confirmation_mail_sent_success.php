<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking Mailing</title>
    
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
        height: 75vh;
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
    <p>Booking Confirmed. <br/>Successfully sent mail to Sponsor.</p>
    <a href="../php/admin_booking.php"><button class="btn back-button">Back</button></a>
    </div>
    <!--
    ===========================================
    footer Code Starts 
    ======================================= -->
    <div class="f-credits"><p class="f-credits">Copyright ©2024 All rights reserved | This website is made with &#x2764 by Harsh Bang</p></div>
    
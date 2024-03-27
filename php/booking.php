<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Seva</title>
    
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/booking.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
      body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
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
    form Code Starts 
    ======================================= -->
    <h2 class="common-heading page-heading">Enter Valid Details for Booking</h2>

    <div class="section section-booking">

      <form id="bookingForm" action="../php/booking_process.php" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required />

        <label for="phoneNumber">Phone Number:</label>
        <input type="phoneNumber" id="phoneNumber" name="phoneNumber" required />

        <label for="sponsor_email">Email ID:</label>
        <input type="mail" id="sponsor_email" name="sponsor_email" required />

        <button type="submit" class="btn next-btn">NEXT</button>
      </form>
    </div>

    <!--
    ===========================================
    footer Code Starts 
    ======================================= -->
    <div class="f-credits"><p>Copyright ©2024 All rights reserved | This website is made with &#x2764 by Harsh Bang</p></div>

</body>
</html>
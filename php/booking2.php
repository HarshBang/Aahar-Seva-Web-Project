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
    <h2 class="common-heading page-heading">Select slots carefully</h2>

      <?php
      // Start the session
      session_start();

      // Check if the sponsor_id is set in the session
      if(isset($_SESSION['sponsor_id'])) {
          // Retrieve the sponsor_id from the session
          $sponsor_id = $_SESSION['sponsor_id'];

          // Print the sponsor_id within an h2 tag
          // echo "<h2>Sponsor ID: $sponsor_id</h2>";
      } else {
          // Handle the case when sponsor_id is not set in the session
          echo "<h2>Sponsor ID not found!</h2>";
      }
      ?>
      
    <div class="section section-booking2">
      <form id="bookingForm" action="../php/booking_process.php" method="post">
        
      <div>
        <label for="sponsorFor">Sponsor For:</label>
        <input type="text" id="sponsorFor" name="sponsorFor" placeholder="Name" required />
        
        <label for="date">Date:</label><span>
        <input type="date" id="date" name="date" required/></span>

        <select name="purpose">
          <option value="q">select</option>
          <option value="birthday">Birthday</option>
          <option value="anniversary">Wedding Anniversary</option>
          <option value="memorial">Memorial</option>
          <option value="general">General</option>
        </select>
      </div>

      <div>
      <select name="location">
          <option value="q">select</option>
          <option value="nilouferHospital">Niloufer Hospital</option>
          <option value="maternityHospital">Maternity Hospital</option>
          <option value="shyamMandir">Near Shyam Mandir</option>
          <option value="publicGarden">Public Garden</option>
          <option value="devnarBlindSchool">Devnar Blind School</option>
          <option value="deafAndDumbOrphanage">Deaf & Dumb Orphanage</option>
          <option value="donBoscoOrphanage">Don Bosco Orphanage</option>
          <option value="bassOrphanage">Bass Orphanage</option>
        </select>

        <label for="slot">Slot</label>
        <input type="text" id="slot" name="slot" required/> 

        <label for="time">Time:</label>
        <input type="text" id="time" name="time" required/> 
      </div>

      <div>
        <label for="food">Item:</label>
        <input type="text" id="food" name="food" required>
      </div>


        <button type="submit" class="btn submit-btn">BOOK SLOT</button>
      </form> 
    </div>

    <!--
    ===========================================
    footer Code Starts 
    ======================================= -->
    <div class="f-credits"><p>Copyright ©2024 All rights reserved | This website is made with &#x2764 by Harsh Bang</p></div>

</body>
</html>
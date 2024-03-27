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
      <div class="section section-booking2">
      <div ng-app="bookingApp" ng-controller="BookingController">

      <h2 class="common-heading">Book Your slot carefully</h2>

      <form id="bookingForm" action="../php/booking_process2.php" method="post" class="form">
        <div class="form-row">
          <div class="form-group">
            <label for="sponsorFor">Sponsor For:</label>
            <input type="text" id="sponsorFor" name="sponsorFor" placeholder="Full Name" required />
          </div>

          <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required/>
          </div>

          <div class="form-group">
            <label for="purpose">Purpose:</label>
            <select name="purpose" id="purpose" required>
              <option value="birthday">Birthday</option>
              <option value="anniversary">Wedding Anniversary</option>
              <option value="memorial">Memorial</option>
              <option value="general">General</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="location">Location:</label>
            <select name="location" id="location" ng-model="location" ng-change="calculateTotalCharges()" ng-init="location='nilouferHospital'" required>
              <option value="nilouferHospital">Niloufer Hospital, Redhills</option>
              <option value="publicGarden">Public Garden, Nampally</option>
              <option value="maternityHospital">Maternity Hospital, Petlaburg</option>
              <option value="shyamMandir">Near Shyam Mandir, Kachiguda</option>
              <option value="devnarBlindSchool">Devnar Blind School</option>
              <option value="deafAndDumbOrphanage">Deaf & Dumb Orphanage</option>
              <option value="donBoscoOrphanage">Don Bosco Orphanage</option>
              <option value="bassOrphanage">Bass Orphanage</option>
            </select>
          </div>

          <div class="form-group">
            <label for="slot">Slot:</label>
            <select name="slot" id="slot" ng-model="slot" ng-change="calculateTotalCharges()" ng-init="slot='7:00 am - 7:15 am'" required>
              <option value="">Select</option>
            </select>
          </div>

          <div class="form-group">
            <label for="food">Item:</label>
            <input type="text" id="food" name="food" required readonly>
          </div>
        </div>
        
        <div>Total Charges: <span ng-bind="totalCharges"></span></div>
        <button type="submit" class="btn submit-btn">BOOK SLOT</button>
      </form>
      </div>
      </div>
    <!--
    ===========================================
    footer Code Starts 
    ======================================= -->
    <div class="f-credits"><p>Copyright ©2024 All rights reserved | This website is made with &#x2764 by Harsh Bang</p></div>
    
    <!--
    ===========================================
    js Code Starts 
    ======================================= -->
    <script>
    // Define available slots for each location
    const slotTimes = {
      nilouferHospital: ['7:00 am - 7:15 am', '7:15 am - 7:30 am', '7:30 am - 7:45 am', '7:45 am - 7:55 am'],
      publicGarden: ['8:00 am - 8:20 am', '8:20 am - 8:40 am'],
      maternityHospital: ['6:50 am - 7:30 am'],
      shyamMandir: ['7:15 am - 7:30 am'],
      devnarBlindSchool: ['7:00 am - 8:00 am'],
      deafAndDumbOrphanage: ['7:00 am - 8:00 am'],
      donBoscoOrphanage: ['6:30 am - 7:00 am'],
      bassOrphanage: ['6:30 am - 7:00 am']
    };

    // Define food items for each location and slot
    const foodItems = {
      nilouferHospital: {
        '7:00 am - 7:15 am': 'Idly (250 Plates)',
        '7:15 am - 7:30 am': 'Uthappa (250 Plates)',
        '7:30 am - 7:45 am': 'Bonda (250 Plates)',
        '7:45 am - 7:55 am': '200 Samosa & 8kg Jalebi '
      },
      maternityHospital: {
        '6:50 am - 7:30 am': 'Upma (200 boxes)'
      },
      shyamMandir: {
        '7:15 am - 7:30 am': 'Upma (100 boxes)'
      },
      publicGarden: {
        '8:00 am - 8:20 am': 'Idly + Uthappa (250 Plates)',
        '8:20 am - 8:40 am': '150 Kachori & 6kg Jalebi '
      },
      devnarBlindSchool: {
        '7:00 am - 8:00 am': 'Idly, Bonda & Uthappa (150 kids & staff)'
      },
      deafAndDumbOrphanage: {
        '7:00 am - 8:00 am': 'breakfast (90 kids & staff)'
      },
      donBoscoOrphanage: {
        '6:30 am - 7:00 am': 'breakfast(2) & Snacks(2) (20 kids & staff)'
      },
      bassOrphanage: {
        '6:30 am - 7:00 am': 'breakfast(2) & Snacks(2) (25 kids & staff)'
      }
    };

    // Function to populate slots based on selected location
    function populateSlots() {
      const locationSelect = document.getElementById('location');
      const slotInput = document.getElementById('slot');
      const selectedLocation = locationSelect.value;
      
      // Clear existing options
      slotInput.innerHTML = '';
      
      // Populate slots based on selected location
      slotTimes[selectedLocation].forEach(slot => {
        const option = document.createElement('option');
        option.textContent = slot;
        slotInput.appendChild(option);
      });
    }

    // Function to populate food items based on selected location and slot
    function populateFoodItems() {
      const locationSelect = document.getElementById('location');
      const slotSelect = document.getElementById('slot');
      const foodInput = document.getElementById('food');
      const selectedLocation = locationSelect.value;
      const selectedSlot = slotSelect.value;
      
      // Get the food item for the selected location and slot
      const foodItem = foodItems[selectedLocation] ? foodItems[selectedLocation][selectedSlot] : '';
      
      // Update the food input value
      foodInput.value = foodItem || '';
    }

    // Event listeners for location and slot select change
    document.getElementById('location').addEventListener('change', function() {
      populateSlots();
      populateFoodItems();
    });
    document.getElementById('slot').addEventListener('change', populateFoodItems);

    // Populate slots and food items initially when the page loads
    populateSlots();
    populateFoodItems();

    // ===========================================
    // angular js Code Starts 
    // ===========================================

      // Define your AngularJS module
      var bookingApp = angular.module('bookingApp', []);

      // Define the controller for the booking form
      bookingApp.controller('BookingController', function($scope) {
          // Initialize totalCharges
          $scope.totalCharges = 0;

          // Define a function to calculate total charges
          $scope.calculateTotalCharges = function() {
              var location = $scope.location;
              var slot = $scope.slot;

              // Define charges based on the location
              var chargesMap = {
                  nilouferHospital: 2500,
                  publicGarden: 2500,
                  deafAndDumbOrphanage: 2500,
                  maternityHospital: 1500,
                  shyamMandir: 1000,
                  donBoscoOrphanage: 1000,
                  bassOrphanage: 1000,
                  devnarBlindSchool: 4000
              };

              // Calculate total charges based on the selected location
              $scope.totalCharges = chargesMap[location] || 0;
          };

          // Call calculateTotalCharges initially and whenever form inputs change
          $scope.$watchGroup(['location', 'slot'], function() {
              $scope.calculateTotalCharges();
          });
      });

    </script>
</body>
</html>
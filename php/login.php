<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login Sevak</title>
    
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/login.css" />
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
    <div class="navbar-admin ">
        <div class="nav-logo-admin"><a href="#"><img src="../media/navLogo.png" class="logo" alt="nav-logo"></a></div>

        <div class="nav-item-admin">
            <a href="../index.html"><i class="fa-solid fa-house"></i></a>
        </div>
    </div>
    </header>

    <!--
    ===========================================
    form Code Starts 
    ======================================= -->
    <div class="section section-login">
      <h2 class="common-heading">Login Sevak</h2>

      <form id="loginForm" action="../php/admin_signin_val.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <div class="rememberMe">
            <input type="checkbox" id="rememberMe" class="rememberMe">
            <label for="rememberMe">Remember Me</label>
        </div>

        <button type="submit" class="btn login-btn">Login</button>
      </form>
      <a href="reset.html"><h3 class="login-reset-h3">Forgot password?</h3></a>
    </div>

    <!--
    ===========================================
    footer Code Starts 
    ======================================= -->
    <div class="f-credits"><p>Copyright ©2024 All rights reserved | This website is made with &#x2764 by Harsh Bang</p></div>

    <!--
    ===========================================
    JS script Code Starts 
    ======================================= -->
    <script>
        // Check if "Remember Me" checkbox is checked
        var rememberMeCheckbox = document.getElementById('rememberMe');

        // Get the username and password input fields
        var usernameInput = document.getElementById('username');
        var passwordInput = document.getElementById('password');

        // Load saved credentials if "Remember Me" was checked previously
        if (localStorage.getItem('rememberMe') === 'true') {
            usernameInput.value = localStorage.getItem('username');
            passwordInput.value = localStorage.getItem('password');
            rememberMeCheckbox.checked = true;
        }

        // Add event listener to the "Remember Me" checkbox
        rememberMeCheckbox.addEventListener('change', function() {
            if (this.checked) {
                // Save username and password to localStorage
                localStorage.setItem('username', usernameInput.value);
                localStorage.setItem('password', passwordInput.value);
                localStorage.setItem('rememberMe', true);
            } else {
                // Clear saved credentials
                localStorage.removeItem('username');
                localStorage.removeItem('password');
                localStorage.setItem('rememberMe', false);
            }
        });
    </script>
  </body>
</html>

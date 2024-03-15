
document.addEventListener('DOMContentLoaded', function() {
    const hamburgerButton = document.getElementById('hamburger-button');
    const dropdownMenu = document.getElementById('dropdown-menu');
  
    hamburgerButton.addEventListener('click', function() {
      dropdownMenu.classList.toggle('show');
    });
  });
  
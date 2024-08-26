<!-- Navigation Bar -->
<?php
session_start();

// Check if a Docror is logged in
if (isset($_SESSION['user_loggedin'])) {
    echo "<script src='../UserNav.js'></script>";
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../User/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../User/AboutUs.php">About us</a>
      </li>
      <li class="nav-item user_visible" style="display: none">
        <a class="nav-link" href="../User/Reservation.php">Reservation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../User/Contact.php">Contact</a>
      </li>

      <!-- Dropdown menu -->
      <li class="nav-item dropdown user_invisible" id="Login">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../User/SignIn.php">sign in</a>
          <a class="dropdown-item" href="../User/UserLogin.php">User Login</a>
          <a class="dropdown-item" href="../Doctor/DoctorLogin.php">Dentist Login</a>
          <a class="dropdown-item" href="../Admin/AdminLogin.php">Admin</a>
        </div>
      </li>
      <li class="nav-item user_visible" style="display: none">
        <a class="nav-link" href="../LogOut.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>
<script>
  // Get current URL path
  var path = window.location.pathname.split("/").pop();

  // Get all nav links
  var navLinks = document.querySelectorAll('.navbar-nav .nav-item .nav-link');

  navLinks.forEach(function(link) {
    var href = link.getAttribute('href');
    if (href === path) {
      link.parentElement.classList.add('active');  // Add 'active' to the parent <li>
    }
  });

  var dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');

  dropdownItems.forEach(function(item) {
    var href = item.getAttribute('href');
    if (href === path) {
      // Add 'active' to the parent <li> of the dropdown
      item.closest('.nav-item.dropdown').classList.add('active');
    }
  });
</script>
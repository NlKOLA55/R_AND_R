<!-- Navigation Bar -->
<?php
session_start();

// Check if a Docror is logged in
if (!isset($_SESSION['doctor_loggedin']) || $_SESSION['doctor_loggedin'] !== true) {
    header("Location: DoctorLogin.php");
    exit;
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
        <a class="nav-link" href="Profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Reservations.php">Reservations</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="WorkHours.php">Work Hours</a>
      </li> -->

      <li class="nav-item">
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
      link.parentElement.classList.add('active');
    }
  });

  var dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');

  dropdownItems.forEach(function(item) {
    var href = item.getAttribute('href');
    if (href === path) {
      item.closest('.nav-item.dropdown').classList.add('active');
    }
  });
</script>
<!-- Navigation Bar -->
<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    header("Location: AdminLogin.php");
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
        <a class="nav-link" href="DatabaseView.php">View Database</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ApointmentsView.php">View Apointments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="LogInView.php">View LogIns</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="CreateDoctor.php">Create Doctor</a>
      </li>

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
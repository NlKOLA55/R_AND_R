<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Calendar</title>
    <link rel="stylesheet" href="../Css/Reservation4.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body{
            text-align: left;
        }
    </style>
</head>
<body>
  <?php
    include '../navbar.php';
  ?>
<div id="filter">
  <div class="" id="filter_doctor">
      <label for="doctor">Dentist:</label>
      <select class="" id="doctor">
      <option value="0" disabled selected>Select Dentist</option>
      </select>
  </div>
  <div class="" id="filter_treatments">
      <label for="treatments">Treatments:</label>
      <select class="" id="treatments">
      <option value="0" disabled selected>Select treatments</option>
        <option value="Dental restoration">Dental restoration</option>
        <option value="Dental braces">Dental braces</option>
        <option value="Dental implant">Dental implant</option>
        <option value="Dental extraction">Dental extraction</option>
      </select>
  </div>
</div>
<div id="calendar-container">
    <div id="calendar">
        <div id="month-year-navigation">
            <button id="prev-month">&#8249;</button>
            <div id="month-year"></div>
            <button id="next-month">&#8250;</button>
        </div>
        <div id="days-of-week">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <div id="days"></div>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="">
                <p id="modal-date">Apoitment at: </p>
                <p id="modal-time">Time of Apoitment: </p>
                <p id="modal-doctor">With doctor: </p>
                <p id="modal-treatmant">for: </p>
            </div>
            <!-- Add your options here -->
            <div class id="selection">
                <select class="" id="time">
                    <option value="" disabled selected>Time</option>
                </select>
                <select class="none" id="dentist">
                    <option value="" disabled selected>Dentist</option>
                </select>
                <select class="none" id="treatmant">
                    <option value="" disabled selected>Treatmant</option>
                </select>
            </div>
            <button id="confirmBtn">Confirm</button>

        </div>
    </div>
</div>

    <script src="../Reservation3.js"></script>
</body>
</html>
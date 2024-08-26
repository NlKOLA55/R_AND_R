<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login View</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php
  include'AdminNav.php'
  ?>
  <div class="row">
    <div class="col" id="Users_table">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody>
          <!-- User data will be added here -->
        </tbody>
      </table>
    </div>

    <div class="col" id="Doctors_table">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody>
          <!-- Doctor data will be added here -->
        </tbody>
      </table>
    </div>

    <div class="col" id="Admin_table">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody>
          <!-- Admin data will be added here -->
        </tbody>
      </table>
    </div>
  </div>
</body>
<script src="../../Backend/JavaScript/Login_data2.js"></script>
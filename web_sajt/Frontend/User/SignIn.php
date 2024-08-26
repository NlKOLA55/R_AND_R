<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Napravi Akaunt</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
include '../navbar.php';
?>
  <div class="container mt-5">
    <h2 class="text-center">Sign In</h2>
    <form id="signIn">
      <div class="form-group col-sm-6 offset-sm-3" >
        <label for="fname">Name:</label><sup>*</sup>
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Name">
      </div>

      <div class="form-group col-sm-6 offset-sm-3">
        <label for="lname">Last Name:</label><sup>*</sup>
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
      </div>

      <div class="form-group col-sm-6 offset-sm-3">
        <label for="email">E-mail:</label><sup>*</sup>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter E-mail">
      </div>

      <div class="form-group col-sm-6 offset-sm-3">
        <label for="password">Password:</label><sup>*</sup>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
      </div>

      <div class="form-group col-sm-6 offset-sm-3">
        <label for="confirmPassword">Confirm Password:</label><sup>*</sup>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
      </div>

      <div class="form-group col-sm-6 offset-sm-3">
      <hr>
      </div>

      <div class="form-group col-sm-6 offset-sm-3">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
      </div>

      <div class="row">
        <div class="form-group col-sm-6 offset-sm-3
        col-md-2 offset-md-3">
            <label for="birthDate">Birth Date:</label><sup>*</sup>
            <input type="date" class="form-control" id="birthDate" name="birthDate">
        </div>

        <div class="form-group col-sm-6 offset-sm-3 col-md-2 offset-md-2">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender"name="gender"  >
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
            <option>Prefer not to say</option>
            </select>
        </div>
      </div>
      <div class="form-group col-sm-6 offset-sm-3" >
        <p>Elements marcke with <b>*</b> must be filled</p>
      </div>
      <button type="submit" class="btn btn-primary col-sm-4 offset-sm-4">Napravi Nalog</button>
    </form>
    <script src="../../Backend/JavaScript/Proces_SignIn2.JS"></script>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
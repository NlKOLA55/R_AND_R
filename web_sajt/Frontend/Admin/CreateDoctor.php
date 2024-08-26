<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Napravi Akaunt</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>  <?php include'AdminNav.php'?>

  <div class="container mt-5">
    <h2 class="text-center">Create Doctor</h2>
    <form id="CreateDoctor">
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
      <button type="submit" class="btn btn-primary col-sm-4 offset-sm-4">Create</button>
    </form>
    <script src="../../Backend/JavaScript/Create_Doctor2.JS"></script>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
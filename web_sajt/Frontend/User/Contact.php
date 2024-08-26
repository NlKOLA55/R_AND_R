<!DOCTYPE html>
<html lang="en">
<head>
    <title>Work 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<?php
include '../navbar.php';
?>

<div class="container mt-5">
    <h2 class="text-center">Kontakt</h2>
    <form>
      <div class="form-group col-sm-6 offset-sm-3" >
        <label for="ime">Ime:</label>
        <input type="text" class="form-control" id="ime" placeholder="Unesite ime">
      </div>

      <div class="form-group col-sm-6 offset-sm-3">
        <label for="prezime">Prezime:</label>
        <input type="text" class="form-control" id="prezime" placeholder="Unesite prezime">
      </div>

      <div class="form-group col-sm-6 offset-sm-3">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" placeholder="Unesite e-mail">
      </div>

      <div class="form-group col-sm-6 offset-sm-3">
        <label for="question">Pitanje</label>
            <textarea class="form-control text-center" id="question" rows="3" name="question"></textarea>
      </div>

      <button type="submit" class="btn btn-primary col-sm-4 offset-sm-4">Pošalji</button>
    </form>
  </div>



  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

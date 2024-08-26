<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Početna stranica</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Customize styles here */
    body {
      background-image: url('../../images/zubari.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      min-height: 100vh;
    }
    .customContainer {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      margin-top: 50px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
<?php 
include '../navbar.php';
?>
<div class="jumbotron text-center" style="background-color: rgba(255, 255, 255, 0.8);">
  <h1 class="text-center">Dobrodošli na našu veb stranicu</h1>
    <p class="lead">Ovde u našoj ordinaciji, posvećeni smo pružanju vrhunske dentalne skrbi za naše pacijente. Naš tim stručnjaka sa dugogodišnjim iskustvom posvećen je vašem oralnom zdravlju i zadovoljstvu.</p>
</div>

<div class="customContainer mx-5 text-center">
<h1 class="text-center">Cemu se Bavimo</h1>
<hr>
  <div class="row">
    <div class="col-md-4">
      <h2>3D snimanje zuba</h2>
      <img src="../../images/xRay.jpg" class="img-fluid" alt="X ray zuba">
      <p>Kod nas možete izvršiti sve vrste 3D snimanja zuba,vilica,viličnih zglobova i sinusa.Najsavremenija i najpreciznija rendgenska dijagnostička metoda u stomatologiji.</p>
      
    </div>
    <div class="col-md-4">
      <h2>Dentalni implantati</h2>
      <img src="../../images/implants.jpg" class="img-fluid" alt="implanti">
      <p>Dentalni implant je specijalno dizajnirana struktura koja po postavljanju u viličnu kost ima za zadatak da u potpunosti simulira funkciju korena zuba.</p>
    </div>
    <div class="col-md-4">
      <h2>Estetska Stomatologija</h2>
      <div class="col-md-8 offset-md-2">
        <img src="../../images/osmeh.jpg" class="img-fluid" alt="Placeholder slika">
      </div>
      <p>Lep izgled postao je imperativ. Cilj savremene estetske stomatologije,pored očuvanja zdravlja usta i zuba,je očuvati estetiku ili je uspostaviti ako je nema.</p>
    </div>
  </div>
</div>

<?php 
include '../footer.html';
?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
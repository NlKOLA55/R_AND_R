<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>O nama</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Customize styles here */
    .jumbotron {
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>
    <?php
    include '../navbar.php';
    ?>

    <!-- Uvod -->
  <div class="jumbotron text-center">
    <h1 class="display-4">O nama</h1>
    <p class="lead">Ovde u našoj ordinaciji, posvećeni smo pružanju vrhunske dentalne skrbi za naše pacijente. Naš tim stručnjaka sa dugogodišnjim iskustvom posvećen je vašem oralnom zdravlju i zadovoljstvu.</p>
  </div>

  <div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <h2>Naša priča</h2>
      <p>Naša priča započinje sa vizijom pružanja najbolje moguće nege za vaše zube. Sa ponosom gradimo odnos poverenja sa našim pacijentima, pružajući personalizirane tretmane i savete koji su prilagođeni vašim individualnim potrebama.</p>
    </div>

    <div class="col-sm-12 col-md-6">
      <!-- Placeholder slika -->
      <img src="../../images/zubarSoba.jpg" class="img-fluid rounded" alt="zubarska soba">
    </div>
  </div>

  <div class="row pt-2">
  <div class="container">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row">
      
          <div class="col-md-3">
            <img src="https://via.placeholder.com/150" class="d-block w-100 profile-img" alt="...">
            IME: 
            PREZIME:
          </div>

          <div class="col-md-3">
            <img src="https://via.placeholder.com/150" class="d-block w-100 profile-img" alt="...">
            IME: 
            PREZIME:
          </div>

          <div class="col-md-3">
            <img src="https://via.placeholder.com/150" class="d-block w-100 profile-img" alt="...">
            IME: 
            PREZIME:
          </div>

          <div class="col-md-3">
            <img src="https://via.placeholder.com/150" class="d-block w-100 profile-img" alt="...">
            IME: 
            PREZIME:
          </div>

        </div>
      </div>
      <!-- Add more carousel items as needed -->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
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
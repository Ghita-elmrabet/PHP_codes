<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Page d'accueil</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->


</head>

<body>
  <header>
  <?php include("menu.php");?>
  </header>
<div class="main">
  <h2 class="w3-center">Debster Clérimax</h2>

<div class="w3-content w3-section" >

  <img class="mySlides" src="logo2.png" width="1000" height="400" >
  <img class="mySlides" src="page_accueil.png" width="1000" height="400" >
  <img class="mySlides" src="gestion.png" width="1000" height="400">

</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>


  <!-- Page Content -->
  <div class="container">

    <h1 class="w3-center">"Les bons comptes font les bons amis."</h1>
    <h2 class="my-4">Gérez vos: </h2>


    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="téléchargement.jpeg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#friendlist.php">Dépenses avec un seul ami</a>
            </h4>
            <p class="card-text">Debster vous permet de créer des transactions simlpes avec vos amis.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="groupe.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="friendlist.php">Dépenses avec un groupe d'amis</a>
            </h4>
            <p class="card-text">Soirée entre amis ou courses communes? vous pouvez créer facilement des transactions de groupe et partager les dépenses de la manière qui vous convient </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="consultation.png" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="DettesCreances.php">Consulter votre compte</a>
            </h4>
            <p class="card-text">Vous pouvez retrouver facilement votre historique, votre solde ,et vos transactions en cours </p>
          </div>
        </div>
      </div>


    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

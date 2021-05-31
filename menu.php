<?php

session_start();


if(time() - $_SESSION['time'] > 3600) {
  echo"<script>alert('Your are logged out');</script>";
  unset($_SESSION['username'], $_SESSION['time']);
  include('accueil.html');
  exit();
  } else {
  $_SESSION['time'] = time();
  }

include('Compte.php');

$userid=$_SESSION['useridentifier'];
$accountinfo=compte($userid);
$pseudo=$accountinfo['Pseudo'];
//Calcul de Solde directement
$transacpour = mysqli_query($GLOBALS['mysqli'], 'SELECT * FROM  Transactions WHERE IDSOURCE=' . $userid . ' ORDER BY Montant DESC');
$i=0;
while ($transacPourtab = mysqli_fetch_assoc($transacpour))
{
    $i++;
    $TransacPour[$i]=$transacPourtab;
}
$transaccontre = mysqli_query($GLOBALS['mysqli'], 'SELECT * FROM  Transactions WHERE IDCIBLE=' . $userid . ' ORDER BY Montant DESC');
$i=0;
while ($transacContretab = mysqli_fetch_assoc($transaccontre))
{
    $i++;
    $TransacContre[$i]=$transacContretab;
}
$solde=0;
foreach($TransacPour as $transac) {
  if($transac['Statut']=='Ouvert'){
    $solde=$solde+$transac['Montant'];
  }
}
foreach($TransacContre as $transac) {
  if($transac['Statut']=='Ouvert'){
    $solde=$solde-$transac['Montant'];
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>

<nav class="navbar navbar-expand-sm bg-bright navbar-bright">
  <!-- Logo -->
  <a class="navbar-brand" href="page_principale.php"><img src="Logo_Desbster.png" width="50" height="30"></a>

  <!-- Liens -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="friendlist.php">Amis</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="DettesCreances.php">Dettes et créances</a>

    </li>


    <li class="nav-item">
      <a class="nav-link" href="addtransact1.php">Transaction simple</a>

    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black" >Transaction de groupe</a>
      <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <p><div class="addtransact-image">
                        <figure><img src="logo1.png" alt="addtransact"></figure>
                        <h5>Transaction de Groupe ?</h5>
                        <h5>Nombre d'utilisateurs :</h5>
                        <form action="addtransacgroupe.php" method='post'>
                        <select name="usernumber" size="1">
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        </select><br>
                        <h5>Méthode de répartition :</h5>
                        <select name="repartition" size="1">
                        <option>Egale</option>
                        <option>Manuelle</option>
                        </select><br>
                        <div class="form-group form-button">
                        <input  class="form-submit" type="submit" value="Valider">
                        </div>
                        </form>
                    </div></p>

      </div>
    </div>
  </div>




    </li>


    <li class="nav-item">
      <a class="nav-link" href="#" id="solde"><?php echo ' Solde : '.$solde. '€'; ?></a>
      <style> #dsolde {
  padding-left: 400px;
}</style>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="modifCompte.php"><?php echo '' . $pseudo . ''; ?></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" id="deconnexion" href="disconnect.php" id="deconnexion">Déconnexion</a>
    <style> #deconnexion {
  padding-left: 500px;
}</style>
  </li>
  </ul>
</nav>
<br>

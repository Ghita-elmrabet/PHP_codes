<?php
include('BDD.php');
session_start();
if(isset($_SESSION['useridentifier'])) {
  
  $userid=$_SESSION['useridentifier'];
  $Tabfriends=friends($userid);
?>
<!doctype html>
<html lang="en">
  <head>
     <link rel="stylesheet" href="friendlist.css" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
  <header>
<?php include("menu.php"); ?>
</header>
    <div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste d'amis</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success">
        <i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
      <thead> <!-- En-tête du tableau -->
       <tr>
           <th>Prénom</th>
           <th>Nom</th>
           <th>Pseudo</th>
           <th>Solde</th>
          
       </tr>
       </thead>
       <tbody> <!-- Corps du tableau -->
<?php

    foreach($Tabfriends as $friend) {

        $idfriend=$friend['ID'];
        $soldefriend=SoldeAmi($userid,$idfriend);
        echo '<tr>
           <td class="pt-3-half" contenteditable="false">'.$friend['Prenom'].'</td>
           <td class="pt-3-half" contenteditable="false">'.$friend['Nom'].'</td>
           <td class="pt-3-half" contenteditable="false">'.$friend['Pseudo'].'</td>
           <td class="pt-3-half" contenteditable="false">'.$soldefriend .'</td>
           <td><a href="'.'delete_friend.php?idfriend='.$idfriend.'">Supprimer</a></td>
           <td><a href="'.'TransacsAmi.php?idfriend='.$idfriend.'">Transactions en cours</a></td>

        </tr>'; }
?>

</table>


  <a class="btn btn-primary" href="add_friendForm.php" role="button">Ajouter un ami</a>

<?php
}
else {
  include('accueil.html');
}?>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>

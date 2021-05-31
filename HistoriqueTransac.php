<?php
include("BDD.php");
session_start();
if(isset($_SESSION['useridentifier'])) {
    include('menu.php');
    $userid=$_SESSION['useridentifier'];
    $idfriend=$_GET['idfriend'];
    $Transacs=TransacFriend($userid,$idfriend);
    $friend=User($idfriend);


?>
  <body>
    <div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">DETTES</h3>
    <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success">
        <i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
      <thead>
      <tr>
           <th>Prénom</th>
           <th>Nom</th>
           <th>Pseudo</th>
           <th>Valeur</th>
           <th>Date d'ouverture</th>
           <th>Description</th>
           <th>Message de Fermeture</th>
       </tr>
       </thead>
       <tbody> <!-- Corps du tableau -->
<?php

    foreach($Transacs[1] as $transac) {
        if ($transac['Statut']=='Remboursé' OR $transac['Statut']=='Annulé'){
        echo '<tr>
           <td BGCOLOR="#909090">'.$friend['Prenom'].'</td>
           <td BGCOLOR="#909090">'.$friend['Nom'].'</td>
           <td BGCOLOR="#909090">'.$friend['Pseudo'].'</td>
           <td BGCOLOR="#909090">'.$transac['Montant'].' </td>
           <td BGCOLOR="#909090">'.$transac['DateOuverture'].' </td>
           <td BGCOLOR="#909090">'.$transac['Description'].' </td>
           <td BGCOLOR="#909090">'.$transac['MessageFermeture'].'</td>
        </tr>';  }
    }
?>

</table>
</div>
</div>
</div>
<br>
<br>



  <div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">CREANCES</h3>
  <div class="card-body">
  <div id="table" class="table-editable">
    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success">
      <i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
    <table class="table table-bordered table-responsive-md table-striped text-center">
    <thead>
      <tr>
           <th>Prénom</th>
           <th>Nom</th>
           <th>Pseudo</th>
           <th>Valeur</th>
           <th>Date d'ouverture</th>
           <th>Description</th>
           <th>Message de Fermeture</th>
       </tr>
       </thead>
       <tbody> <!-- Corps du tableau -->
<?php

    foreach($Transacs[0] as $transac) {
        if ($transac['Statut']=='Remboursé' OR $transac['Statut']=='Annulé'){
        echo '<tr>
           <td BGCOLOR="#909090">'.$friend['Prenom'].'</td>
           <td BGCOLOR="#909090">'.$friend['Nom'].'</td>
           <td BGCOLOR="#909090">'.$friend['Pseudo'].'</td>
           <td BGCOLOR="#909090">'.$transac['Montant'].' </td>
           <td BGCOLOR="#909090">'.$transac['DateOuverture'].' </td>
           <td BGCOLOR="#909090">'.$transac['Description'].' </td>
           <td BGCOLOR="#909090">'.$transac['MessageFermeture'].'</td>
        </tr>';  }
    }
?>
</table>
</div>
</div>
</div>
<br>
<br>

</body>


<?php }
else{
    include("accueil.html");
}
?>

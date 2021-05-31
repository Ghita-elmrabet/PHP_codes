<?php
session_start();
include("BDD.php");

if(isset($_SESSION['useridentifier'])) {

    include('menu.php');
    $userid=$_SESSION['useridentifier'];
    $Transacs=TransacUser($userid);



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
       </tr>
       </thead>
       <tbody> <!-- Corps du tableau -->

<?php

    foreach($Transacs[1] as $transac) {
        $friend=User($transac['IDSOURCE']);
        if ($transac['Statut']=='Ouvert'){

        echo '<tr>
           <td>'.$friend['Prenom'].'</td>
           <td>'.$friend['Nom'].'</td>
           <td>'.$friend['Pseudo'].'</td>
           <td>'.$transac['Montant'].' </td>
           <td>'.$transac['DateOuverture'].' </td>
           <td>'.$transac['Description'].' </td>
           <td><a href="closetransacform.php?ID='.$transac['IDTRANSACTION'].'">Fermer</a></td>
           </tr>';
       }
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
      <thead>
      <tr>
           <th>Prénom</th>
           <th>Nom</th>
           <th>Pseudo</th>
           <th>Valeur</th>
           <th>Date d'ouverture</th>
           <th>Description</th>
       </tr>
       </thead>
       <tbody> <!-- Corps du tableau -->
<?php

    foreach($Transacs[0] as $transac) {
        $friend=User($transac['IDCIBLE']);
        if ($transac['Statut']=='Ouvert'){

        echo '<tr>
           <td>'.$friend['Prenom'].'</td>
           <td>'.$friend['Nom'].'</td>
           <td>'.$friend['Pseudo'].'</td>
           <td>'.$transac['Montant'].' </td>
           <td>'.$transac['DateOuverture'].' </td>
           <td>'.$transac['Description'].' </td>
           <td><a href="closetransacform.php?ID='.$transac['IDTRANSACTION'].'">Fermer</a></td>
  </tr>'; }
    }
?>
</table>
<br>
</div>
</div>
</div>
<br>

</body>


<?php }
else{
   include("accueil.html");
}
?>

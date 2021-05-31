<?php
include("BDD.php");
session_start();
if(isset($_SESSION['useridentifier'])) {
    include('menu.php');
    $userid=$_SESSION['useridentifier'];
    $idfriend=$_GET['idfriend'];
    $Transacs=TransacFriend($userid,$idfriend);
    $solde=SoldeAmi($userid,$idfriend);
    $friend=User($idfriend);


?>
    <body>

      <div class="card">
        <?php echo '<h3><a class="centrer" href="'.'HistoriqueTransac.php?idfriend='.$idfriend.'">Historique Transactions</a></h3>'; ?>
        <?php echo '<h3>Solde Ami: '.$solde.'€</h3>';  ?>
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">DETTES</h3>
    <div class="card-body">
      <div id="table" class="table-editable">
        <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success">
          <i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
        <form method="post" action="closetransacform.php">
        <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
        <tr>
          <?php if(isset($_GET['checked1'])) {
           ?>
          <th></th>
        <?php }else{
        echo  '<th><a href="TransacsAmi.php?idfriend='.$idfriend.'&checked1=1"><img class="fit-picture" width="15" height="15" src="arrowiconn.png"></a></th>';
         } ?>
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
    if ($transac['Statut']=='Ouvert'){
    echo '<tr>';
    if(isset($_GET['checked1'])) {
  echo  '<td><input type="checkbox" name="id_transac[]" value="'.$transac['IDTRANSACTION'].'" /></td>';
} else {
  echo '<td></td>';        }



  echo     '<td>'.$friend['Prenom'].'</td>
       <td>'.$friend['Nom'].'</td>
       <td>'.$friend['Pseudo'].'</td>
       <td>'.$transac['Montant'].' </td>
       <td>'.$transac['DateOuverture'].' </td>
       <td>'.$transac['Description'].' </td>';
       if(!isset($_GET['checked1'])) {
       echo '<td><a href="closetransacform.php?ID='.$transac['IDTRANSACTION'].'">Fermer</a></td>'; }
       else {
         echo '<td><input type="submit" value="Fermer"></td>';
       }

   echo       '<td><a href="ModifTransacform.php?ID='.$transac['IDTRANSACTION'].'&Montant='.$transac['Montant'].'&Description='.$transac['Description'].'">Modifier</a></td>

      </tr>'; }
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
  <form method="post" action="closetransacform.php">
  <table class="table table-bordered table-responsive-md table-striped text-center">
  <thead>
  <tr>
    <?php if(isset($_GET['checked2'])) {
     ?>
    <th></th>
  <?php } else { echo  '<th><a href="TransacsAmi.php?idfriend='.$idfriend.'&checked2=1"><img class="fit-picture" width="15" height="15" src="arrowiconn.png"></a></th>'; } ?>
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
    if ($transac['Statut']=='Ouvert'){
    echo '<tr>';
    if(isset($_GET['checked2'])) {
  echo  '<td><input type="checkbox" name="id_transac[]" value="'.$transac['IDTRANSACTION'].'" /></td>';
} else {
  echo '<td></td>';        }


    echo
       '<td>'.$friend['Prenom'].'</td>
       <td>'.$friend['Nom'].'</td>
       <td>'.$friend['Pseudo'].'</td>
       <td>'.$transac['Montant'].' </td>
       <td>'.$transac['DateOuverture'].' </td>
       <td>'.$transac['Description'].' </td>';
       if(!isset($_GET['checked2'])) {
       echo '<td><a href="closetransacform.php?ID='.$transac['IDTRANSACTION'].'">Fermer</a></td>'; }
       else {
         echo '<td><input type="submit" value="Fermer"></td>';
       }

      echo '<td><a href="ModifTransacform.php?ID='.$transac['IDTRANSACTION'].'&Montant='.$transac['Montant'].'&Description='.$transac['Description'].'">Modifier</a></td>

      </tr>'; }
    }
?>
</table>
<br>
<br>
</div>
</div>
</div>

</body>


<?php }
else{
    include("accueil.html");
}
?>

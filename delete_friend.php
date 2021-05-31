<?php
include('BDD.php');
session_start();
$userid=$_SESSION['useridentifier'];
$idfriend=$_GET['idfriend'];
$soldefriend=SoldeAmi($userid,$idfriend);
if($soldefriend == 0) {
    $req=mysqli_query($mysqli,'DELETE FROM Amis WHERE IDUSER1="'.$userid .'"AND IDUSER2="'.$_GET['idfriend'].'"');
    $req=mysqli_query($mysqli,'DELETE FROM Amis WHERE IDUSER2="'.$userid .'"AND IDUSER1="'.$_GET['idfriend'].'"');
    header("Location: friendlist.php");
    exit(); }
else {
  echo "Le solde avec cet ami n'est pas nul, pensez à le régler";
  header("refresh:1;url=friendlist.php");

}
?>

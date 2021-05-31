<?php
include("BDD.php");
session_start();
if (isset($_SESSION['closemul'])){
$transactions=$_SESSION['closemul'];
foreach ($transactions as $idtransac) {
  $close=mysqli_query($GLOBALS['mysqli'],"UPDATE `Transactions` SET `Statut` = '" . $_POST['Statut'] . "', `MessageFermeture`='" . $_POST['MessageFermeture'] . "' WHERE `IDTRANSACTION` =" . $idtransac);
}
unset($_SESSION['closemul']);
}
elseif (isset($_GET['ID'])){
    $close=mysqli_query($GLOBALS['mysqli'],"UPDATE `Transactions` SET `Statut` = '" . $_POST['Statut'] . "', `MessageFermeture`='" . $_POST['MessageFermeture'] . "' WHERE `IDTRANSACTION` =" . $_GET['ID']);
}
$lasturl=$_SESSION['lasturl'];
header("refresh:0.1;url=$lasturl");
 ?>

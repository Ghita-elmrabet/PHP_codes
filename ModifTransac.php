<?php
include("BDD.php");
session_start();
if (isset($_GET['ID'])){

    $modify=mysqli_query($GLOBALS['mysqli'],"UPDATE `Transactions` SET `Montant` = '" . $_POST['Montant'] . "', `Description`='" . $_POST['Description'] . "' WHERE `IDTRANSACTION` =" . $_GET['ID']);
    $lasturl=$_SESSION['lasturl'];

  header("refresh:0.1;url=$lasturl");
}
 ?>

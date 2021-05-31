<?php session_start();
include("menu.php");
foreach ($_POST as $key => $value){
    modifyCompte($_SESSION['useridentifier'],$key,$value);
}
printf("Modifications enregistrées");
?>
<?php

$mysqli = mysqli_connect("localhost", "root", "", "Clerimax");
if (mysqli_connect_errno($mysqli)) {
 echo "Echec lors de la connexion à MySQL : " .
mysqli_connect_error();
}

function compte($userid){
    $compteinfo = mysqli_query($GLOBALS['mysqli'], 'SELECT * FROM  Utilisateurs WHERE ID=' . $userid);
    return mysqli_fetch_assoc($compteinfo);
}

function modifyCompte($userid,$attribut,$modif){
    $results = mysqli_query($GLOBALS['mysqli'], 'UPDATE Utilisateurs SET ' . $attribut . '="' . $modif . '" WHERE Utilisateurs.ID =' . $userid);
    return $results;
}


?>





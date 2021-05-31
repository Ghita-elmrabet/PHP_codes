<?php

include("BDD.php");
$TabFriendsID=array();
$TabFriends=friends(IDPseudo($_POST['source']));
$i=0;
foreach($TabFriends as $friend){
    $i++;
    $TabFriendsID[$i]=$friend['ID'];
}
if ($_POST['source']==""){
    echo 'Il faut saisir une adresse Email';
    header("refresh:2;url=addtransact1.php");
}

else if ($_POST['source']==""){
    echo 'Il faut saisir une source';
    header("refresh:2;url=addtransact1.php");
}
else if ($_POST['cible']==""){
    echo 'Il faut saisir une cible';
    header("refresh:2;url=addtransact1.php");
}
else if ($_POST['montant']==""){
    echo 'Il faut saisir le montant';
  header("refresh:2;url=addtransact1.php");
}
else if ($_POST['montant']<0){
    echo 'le montant doit être positif';
    header("refresh:2;url=addtransact1.php");
}
else if ($_POST['date_ouverture']==""){
    echo 'Il faut saisir la date';
    header("refresh:2;url=addtransact1.php");
}
else if ($_POST['date_ouverture']!=date("Y-m-d")){
    echo ' la date doit être celle d\'aujourd\'hui';
    header("refresh:2;url=addtransact1.php");
}
else if ($_POST['statut']==""){
    echo 'Il faut saisir un statut ';
  header("refresh:2;url=addtransact1.php");
}
else if (!in_array(IDPseudo($_POST['cible']),$TabFriendsID)){
    echo "L'utilisateur cible n'est pas dans votre liste d'amis";
    header("refresh:2;url=addtransact1.php");
}



else {
    addTransact($_POST['description'],$_POST['source'],$_POST['cible'],$_POST['montant'],'Ouvert',$_POST['date_ouverture']);
  include("menu.php");
    echo 'Transaction réussie';
    header("refresh:1;url=DettesCreances.php");
}


?>

<?php
include("BDD.php");
include("menu.php");
if($_POST['source'])
$TabFriendsID=array();
$TabFriends=friends(IDPseudo($_POST['source']));
$i=0;
foreach($TabFriends as $friend){
    $i++;
    $TabFriendsID[$i]=$friend['ID'];
}

if($_GET["repartition"]=="Egale"){
   if($_POST['montant']!="" and $_POST['montant']>0){
     $part=$_POST['montant']/$_GET['usernumber'];
   }
    else{
      echo 'Il faut saisir un montant valide positif';
      header("refresh:2;url=addtransacgroupe.php");
      exit();
    }
    for($i=1; $i<=$_GET['usernumber']; $i++){

      if ($_POST['source']==""){
          echo 'Il faut saisir une source';
          header("refresh:2;url=addtransacgroupe.php");

      }
      else if ($_POST['cible'.$i]==""){
          echo 'Il faut saisir une cible';
          header("refresh:2;url=addtransacgroupe.php");

      }

      else if ($_POST['date_ouverture']==""){
          echo 'Il faut saisir la date';
          header("refresh:2;url=addtransacgroupe.php");

      }
      else if ($_POST['date_ouverture']!=date("Y-m-d")){
          echo ' la date doit être celle d\'aujourd\'hui';
          header("refresh:2;url=addtransacgroupe.php");

      }
      else if (!in_array(IDPseudo($_POST['cible'.$i]),$TabFriendsID)){
          echo "L'utilisateur cible n'est pas dans votre liste d'amis";
          header("refresh:2;url=addtransacgroupe.php");

      }

      else {
        addTransact($_POST['description'],$_POST['source'],$_POST['cible'.$i],$part,'Ouvert',$_POST['date_ouverture']);

      }
     }
     echo "Transactions ajoutées";
     header("refresh:2;url=DettesCreances.php");

}
else{

   for($i=1; $i<=$_GET['usernumber']; $i++){
     if ($_POST['source']==""){
         echo 'Il faut saisir une adresse Email';
         header("refresh:2;url=addtransacgroupe.php");

     }

     else if ($_POST['source']==""){
         echo 'Il faut saisir une source';
         header("refresh:2;url=addtransacgroupe.php");

     }
     else if ($_POST['cible'.$i]==""){
         echo 'Il faut saisir une cible';
         header("refresh:2;url=addtransacgroupe.php");

     }
     else if ($_POST['montantcible'.$i]==""){
         echo 'il faut saisir un montant';
         header("refresh:2;url=addtransacgroupe.php");

     }
     else if ($_POST['montantcible'.$i]<0){
         echo 'le montant doit être positif';
         header("refresh:2;url=addtransacgroupe.php");

     }
     else if ($_POST['date_ouverture']==""){
         echo 'Il faut saisir la date';
         header("refresh:2;url=addtransacgroupe.php");

     }
     else if ($_POST['date_ouverture']!=date("Y-m-d")){
         echo ' la date doit être celle d\'aujourd\'hui';
         header("refresh:2;url=addtransacgroupe.php");

     }

     else if (!in_array(IDPseudo($_POST['cible'.$i]),$TabFriendsID)){
         echo "L'utilisateur cible n'est pas dans votre liste d'amis";
         header("refresh:2;url=addtransacgroupe.php");

     }

     else {
       addTransact($_POST['description'],$_POST['source'],$_POST['cible'.$i],$_POST['montantcible'.$i],'Ouvert',$_POST['date_ouverture']);

     }
   }
   echo "Transactions ajoutées";
   header("refresh:2;url=DettesCreances.php");
}

?>

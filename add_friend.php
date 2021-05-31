<?php
include('BDD.php');
session_start();
$userid=$_SESSION['useridentifier'];
$pseudomail=$_POST['pseudo/email'];
$TabFriendsID=array();
$TabFriends=friends($userid);
$i=0;
foreach($TabFriends as $friend){
    $i++;
    $TabFriendsID[$i]=$friend['ID'];
}
$requete=mysqli_query($mysqli,'SELECT ID FROM Utilisateurs WHERE Email="'. $pseudomail . '" OR Pseudo = "'. $pseudomail . '"');
$idfriend=mysqli_fetch_assoc($requete)['ID'];
if(isset($idfriend)) {
  if (in_array($idfriend,$TabFriendsID)){
      echo "C'est triste mais vous ne pouvez pas vous rajouter le même ami une deuxième fois";
      header("refresh:1.5;url=add_friendForm.php");
    }
 else if ($idfriend==$userid){
      echo "C'est triste mais vous ne pouvez pas vous ajouter dans votre liste d'amis";
      header("refresh:1.5;url=add_friendForm.php");
  }

  else{
$req=mysqli_query($mysqli,"INSERT INTO Amis (IDUSER1,IDUSER2) VALUES($userid,$idfriend)");
$req=mysqli_query($mysqli,"INSERT INTO Amis (IDUSER2,IDUSER1) VALUES($userid,$idfriend)");
header("Location: friendlist.php");

}
}
else {
  echo 'Erreur : Il n\'existe aucun utilisateur ayant pour Email/Pseudo :'.$pseudomail;
  header("refresh:1;url=add_friendForm.php");
}
exit();
?>

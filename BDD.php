<?php

//Connect to the database

$mysqli = mysqli_connect("localhost", "root", "", "Clerimax");
if (mysqli_connect_errno($mysqli)) {
 echo "Echec lors de la connexion à MySQL : " .
mysqli_connect_error();
}


function friends($userid)
    {
    $friendlist = mysqli_query($GLOBALS['mysqli'], 'SELECT * FROM  Utilisateurs JOIN Amis ON Utilisateurs.ID = Amis.IDUSER2 WHERE IDUSER1=' . $userid);
    $i=0;
    while ($friendlisttab = mysqli_fetch_assoc($friendlist))
    {
        $i++;
        $TabFriends[$i]=$friendlisttab;
    }
    return $TabFriends;
}


function transacFriend($userid,$friendid){
    $transacpour = mysqli_query($GLOBALS['mysqli'], 'SELECT * FROM  Transactions WHERE IDSOURCE=' . $userid . ' and IDCIBLE=' .$friendid.' ORDER BY DateOuverture DESC');
    $i=0;
    while ($transacPourtab = mysqli_fetch_assoc($transacpour))
    {
        $i++;
        $TransacPour[$i]=$transacPourtab;
        printf("%s",$TransacPour[i]['Montant']);
    }
    $transaccontre = mysqli_query($GLOBALS['mysqli'], 'SELECT * FROM  Transactions WHERE IDSOURCE=' . $friendid . ' and IDCIBLE=' .$userid.' ORDER BY DateOuverture DESC');
    $i=0;
    while ($transacContretab = mysqli_fetch_assoc($transaccontre))
    {
        $i++;
        $TransacContre[$i]=$transacContretab;
    }
    return array($TransacPour, $TransacContre);
}

function transacUser($userid){
    $transacpour = mysqli_query($GLOBALS['mysqli'], 'SELECT * FROM  Transactions WHERE IDSOURCE=' . $userid . ' ORDER BY Montant DESC');
    $i=0;
    while ($transacPourtab = mysqli_fetch_assoc($transacpour))
    {
        $i++;
        $TransacPour[$i]=$transacPourtab;
        printf("%s",$TransacPour[i]['Montant']);
    }
    $transaccontre = mysqli_query($GLOBALS['mysqli'], 'SELECT * FROM  Transactions WHERE IDCIBLE=' . $userid . ' ORDER BY Montant DESC');
    $i=0;
    while ($transacContretab = mysqli_fetch_assoc($transaccontre))
    {
        $i++;
        $TransacContre[$i]=$transacContretab;
    }
    return array($TransacPour, $TransacContre);
}

function addUser($email, $MotDePasse, $Prenom, $Nom, $DateDeNaissance, $Pseudo){
    $requete1=mysqli_query($GLOBALS['mysqli'],"SELECT COUNT(*) From Utilisateurs");
    $userid=mysqli_fetch_assoc($requete1)['COUNT(*)'];
    $userid++;
    $requete2=mysqli_query($GLOBALS['mysqli'], 'INSERT INTO `Utilisateurs` (`ID`, `Email`, `MotDePasse`, `Prenom`, `Nom`, `DateDeNaissance`, `Pseudo`) VALUES ("' . $userid . '", "' . $email . '", "' . $MotDePasse . '", "' . $Prenom . '", "' . $Nom . '", "' . $DateDeNaissance . '", "' . $Pseudo . '")');
    return $requete2;
}


function User($userid){
    $requete=mysqli_query($GLOBALS['mysqli'],"SELECT * From Utilisateurs WHERE ID=" . $userid);
    $user=mysqli_fetch_assoc($requete);
    return $user;
}

function IDPseudo($pseudo){
    $requete=mysqli_query($GLOBALS['mysqli'],"SELECT ID From Utilisateurs WHERE Pseudo='" . $pseudo . "' OR Email='". $pseudo ."'");
    $ID=mysqli_fetch_assoc($requete)['ID'];
    return $ID;
}
function addTransact($description, $source, $cible, $montant,$statut, $date_ouverture){
    $requete3=mysqli_query($GLOBALS['mysqli'],"SELECT COUNT(*) From Transactions");
    $transactid=mysqli_fetch_assoc($requete3)['COUNT(*)'];
    $transactid++;
    $requete4=mysqli_query($GLOBALS['mysqli'], 'INSERT INTO `Transactions` (`Description`,`IDSOURCE`,`IDCIBLE`,`Montant`,`DateOuverture`,`Statut`,`IDTRANSACTION`) VALUES ("' . $description . '", "' . IDPseudo($source) . '", "' . IDPseudo($cible) . '", "' . $montant . '", "' . $date_ouverture . '", "' . $statut . '", "' . $transactid . '")');
}
function userInDatabase($pseudo){
    $result=False;
    $Utilisateurs=mysqli_query($GLOBALS['mysqli'],"SELECT * From Utilisateurs");
    for($i=0;$i<=mysqli_fetch_assoc(mysqli_query($GLOBALS['mysqli'],"SELECT COUNT(*) From Utilisateurs"))['COUNT(*)'];$i++){
        $user=mysqli_fetch_assoc($Utilisateurs);
        if($pseudo==$user['Pseudo']){
            $result=True;
        }
    }
    return $result;
}
function SoldeAmi($userid,$idfriend) {
  $soldefriend=0;
  $transacpour=transacFriend($userid,$idfriend)[0];
  foreach($transacpour as $transac) {
    if($transac['Statut']=='Ouvert'){
      $soldefriend=$soldefriend+$transac['Montant'];
    }
  }
  $transaccontre=transacFriend($userid,$idfriend)[1];
  foreach($transaccontre as $transac) {
    if($transac['Statut']=='Ouvert'){
      $soldefriend=$soldefriend-$transac['Montant'];
    }
  }
  return $soldefriend;
}


?>

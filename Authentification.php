<?php
$mysqli = mysqli_connect("localhost", "root", "", "Clerimax");
if (mysqli_connect_errno($mysqli)) {
 echo "Echec lors de la connexion à MySQL : " .
mysqli_connect_error();
}
$requete=mysqli_query($mysqli, 'SELECT ID FROM  Utilisateurs WHERE Email="' . $_POST['Email'] . '" and MotDePasse="' . $_POST['MotDePasse'] . '"');
$test = mysqli_fetch_assoc($requete);
$userid=$test['ID'];
if (isset($userid)){
    session_start();
    $_SESSION['useridentifier']=$userid;
    $_SESSION['time']=time();
    include("page_principale.php");
}
else {
    include("accueil.html");
    printf("Combinaison Email / Mot de Passe erronée\n");
}


?>

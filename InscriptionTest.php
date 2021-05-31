<?php
$_POST['Email'] = htmlspecialchars($_POST['Email']);
include("BDD.php");
if ($_POST['Email']==""){
    echo 'Il faut saisir une adresse Email';
    echo "<a href=inscription.php?mailprob=Manquante>Retourner à l'inscritpion</a>";
}
else if (!preg_match("#^[a-z0-9._-]+@+[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['Email'])){
    echo "Adresse email invalide";
    echo "<a href=inscription.php?mailprob=Invalide>Retourner à l'inscritpion</a>";
}
else if ($_POST['MotDePasse']==""){
    echo 'Il faut saisir un mot de passe';
    echo "<a href=inscription.php?mdpprob=Manquant>Retourner à l'inscritpion</a>";
}
else if ($_POST['Prenom']==""){
    echo 'Il faut saisir un Prénom';
    echo "<a href=inscription.php?prenomprob=Manquant>Retourner à l'inscritpion</a>";
}
else if ($_POST['Nom']==""){
    echo 'Il faut saisir un Nom';
    echo "<a href=inscription.php?nomprob=Manquant>Retourner à l'inscritpion</a>";
}

else if(!addUser($_POST['Email'],$_POST['MotDePasse'], $_POST['Prenom'], $_POST['Nom'], $_POST['DateDeNaissance'], $_POST['Pseudo'])){
    echo "Le Pseudo ou l'Email est déjà utilisé";
    echo "<a href=inscription.php>Retourner à l'inscritpion</a>";
}
else {
    include('accueil.html');
    echo 'Inscription réussie';
}


?>
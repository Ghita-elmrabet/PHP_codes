<?php include("menu.php");
session_start();
$currenturl=$_SERVER['HTTP_REFERER'];
$_SESSION['lasturl']=$currenturl;

if(isset($_POST['id_transac'])){

$_SESSION['closemul']=$_POST['id_transac'];
?>
<html>
    <body>
    <form action="closetransac.php" method="post">
        <h5>Saisir un message de fermeture commun :</h5>
            <input  type="text" name="MessageFermeture" placeholder="Message">
        <h5>Selectionnez le type de fermeture</h5>
            <select name="Statut" size="1">
                <option>Annulé</option>
                <option>Remboursé</option>
            </select><br><br>
            <input type="submit" id="buttonsubmit" value="Valider">
</form>
</body>
</html>
<?php }

elseif(isset($_GET['ID'])){
$idtransac=$_GET['ID'];

?>
<html>
    <body>
    <form action="closetransac.php?ID=<?php echo $idtransac;?>" method="post">
        <h5>Saisir un message de fermeture :</h5>
            <input  type="text" name="MessageFermeture" placeholder="Message">
        <h5>Selectionnez le type de fermeture</h5>
            <select name="Statut" size="1">
                <option>Annulé</option>
                <option>Remboursé</option>
            </select><br><br>
            <input type="submit" id="buttonsubmit" value="Valider">
</form>
</body>
</html>
<?php }
else {echo "Vous n'avez rien selectionné";
  header("refresh:1;url=$currenturl");} ?>

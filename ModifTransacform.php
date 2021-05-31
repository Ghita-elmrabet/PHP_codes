<?php
include('menu.php');
$Montant=$_GET['Montant'];
$Description=$_GET['Description'];
$idtransac=$_GET['ID'];
$currenturl=$_SERVER['HTTP_REFERER'];
$_SESSION['lasturl']=$currenturl;
;?>
<html>
    <body>
        <form action="ModifTransac.php?ID=<?php echo $idtransac;?>" method="POST" >
        <div>Montant</div>
<?php  echo     '<input name="Montant" type="number" placeholder="'.$Montant.'">' ?>
        <div>Message explicatif</div>
<?php  echo    '<input name="Description" type="text" placeholder="'.$Description.'">' ?>
        <input type="submit" value="Modify">
</body>
</html>

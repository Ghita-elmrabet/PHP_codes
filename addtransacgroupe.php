
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <!-- Font Icon -->
    <!--link rel="stylesheet" href=""-->

    <!-- Main css -->
    <link rel="stylesheet" href="addtransact.css">
</head>
<body>
<header>
  <?php include("menu.php");?>
</header>
    <div class="main">

        <!-- Sign up form -->
        <section class="addtransact">
            <div class="container">
                <div class="addtransact-content">
                    <div class="addtransact-form">
                        <h3 class="form-title">Transaction de Groupe</h3>
                        <form action="addtransacgroupeback.php?repartition=<?php echo $_POST['repartition'];?>&usernumber=<?php echo $_POST['usernumber'];?>" method="POST">

                            <div class="form-group">
                                <label for="description"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="description" id="description" placeholder="donnez un titre à votre transaction"/><?php echo  $_GET['descriptionprob'];?><br>
                            </div>
                            <div class="form-group">
                                <label for="source"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="source" id="source" placeholder="Utilisateur source"/><?php echo  $_GET['sourceprob'];?><br>
                            </div>
                            <?php for($i = 1; $i<=$_POST['usernumber']; $i++){

                            echo '<div class="form-group">
                                <label for="cible"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="cible'.$i.'" id="cible" placeholder="Utilisateur cible '.$i.'"/><?php echo  $_GET["cibleprob"];?><br>
                            </div>';
                            if($_POST['repartition']=='Manuelle'){
                                echo '<div class="form-group">
                                <label for="cible"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="montantcible'.$i.'" id="cible" placeholder="Montant cible '.$i.'"/><?php echo  $_GET["cibleprob"];?><br>
                            </div>';
                            }
                            }
                            ?>
                            <div class="form-group">
                                <label for="montant"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="text" name="montant" id="montant" placeholder="Saisissez le montant total"/><?php echo  $_GET['montantprob'];?><br>
                            </div>
                            <div class="form-group">
                                <label for="dateferm"></label>
                                <input type="date" name="date_ouverture" id="dateferm" placeholder="date de fermeture"/><?php echo  $_GET['dateprob'];?><br>
                            </div>
                            <div class="form-group">
                                <label for="statut"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <h4>Statut :</h4>
                                <select name="Statut" size="1" id="statut">
                                    <option>Ouvert</option>
                                    <option>Annulé</option>
                                    <option>Rembourse</option>
                                </select><?php echo  $_GET['statutprob'];?><br>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="addtransact" id="addtransact" class="form-submit" value="AJOUTER"/>
                            </div>
                        </form>
                    </div>
                    <div class="addtransact-image">
                        <figure><img src="logo1.png" alt="addtransact"></figure>
                    </div>
                </div>
            </div>
        </section>



    </div>


</body>
</html>

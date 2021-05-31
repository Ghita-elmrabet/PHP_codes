
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="addtransact.css">
    <title></title>
</head>

<body>
<header>
<?php include("menu.php"); ?>
</header>
   

       
        <section class="addtransact">
            <div class="container">
                <div class="addtransact-content">
                    <div class="addtransact-form">
                        <h2 class="form-title">Transactions simple</h2>
                        <form action="addtransac.php" method="POST">

                            <div class="form-group">
                                <label for="description"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="description" id="description" placeholder="donnez un titre à votre transaction"/><?php echo  $_GET['descriptionprob'];?><br>
                            </div>
                            <div class="form-group">
                                <label for="source"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="source" id="source" placeholder="Utilisateur source"/><?php echo  $_GET['sourceprob'];?><br>
                            </div>
                            <div class="form-group">
                                <label for="cible"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="cible" id="cible" placeholder="Utilisateur cible"/><?php echo  $_GET['cibleprob'];?><br>
                            </div>
                            <div class="form-group">
                                <label for="montant"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="text" name="montant" id="montant" placeholder="Saisissez le montant"/><?php echo  $_GET['montantprob'];?><br>
                            </div>
                            <div class="form-group">
                                <label for="dateferm"></label>
                                <input type="date" name="date_ouverture" id="dateouv" placeholder="date d'ouverture'"/><?php echo  $_GET['dateprob'];?>
                            </div>

                            <div class="form-group">
                                <label for="statut"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <h4>Statut :</h4>
                                <select name="statut" size="1" id="statut">
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



 

</body>
</html>

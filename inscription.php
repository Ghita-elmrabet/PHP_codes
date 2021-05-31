<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" href="styleinscription.css" />
</head>
<body>
<div class="formulaire">
            <div class="form">
                <div class="note">
                    <p>Veuillez remplir ce formulaire</p>

                </div>

                <div class="form-content">
                  <form action="InscriptionTest.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email *" name="Email"><?php echo  $_GET['mailprob'];?><br>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="mot de passe*" value="" name="MotDePasse"/><?php echo $_GET['mdpprob'];?><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nom*" value="" name="Nom"/><?php echo $_GET['nomprob'];?><br>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Prénom*" value="" name="Prenom"/><?php echo $_GET['prenomprob'];?><br>
                            </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="date" class="form-control" placeholder="Date de naissance" name="DateDeNaissance"><br>

                                  </div>
                                    </div>
                                  <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Pseudo" value="" name="Pseudo"/>
                                  </div>
                                    </div>
                              </div>
                      </div>
                      <input type="submit" id="buttonsubmit" value="S'INSCRIRE">
                    </form>
                  </div>

                  </div>

        </body>
        </html>

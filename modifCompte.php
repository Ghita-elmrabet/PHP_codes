<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>


    <link rel="stylesheet" href="modifcompte.css">
</head>
<body>
  <?php session_start();

  include("menu.php");
  $informations=compte($_SESSION['useridentifier']);
  ?>
<form action="Changement.php" method="post" >


        <div class="main">


            <section class="modif">
                <div class="container">
                    <div class="modif-content">
                        <div class="modif-form">
                            <h2 class="form-title">Modifier vos informations</h2>
                            <form action=Changement.php" method="POST">

                                <div class="form-group">
                                    <label for="description"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="email" id="email" value="<?php echo $informations['Email']?>" /><br>
                                </div>
                                <div class="form-group">
                                    <label for="prenom"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="text" name="prenom" id="prenom"  value="<?php echo $informations['Prenom']?>"/><br>
                                </div>
                                <div class="form-group">
                                    <label for="nom"><i class="zmdi zmdi-lock" ></i></label>
                                    <input type="text" name="nom" id="nom" value="<?php echo $informations['Nom']?>"/><br>
                                </div>
                                <div class="form-group">
                                    <label for="pseudo"><i class="zmdi zmdi-lock-outline"></i></label>
                                    <input type="text" name="pseudo" id="pseudo" value="<?php echo $informations['Pseudo']?>" /><br>
                                </div>
                                <div class="form-group">
                                    <label for="date"></label>
                                    <input type="date" name="date" id="date" value="<?php echo $informations['DateDeNaissance']?>" /><br>

                                <input type="submit" ><br>
                                </div>
                            </form>
                        </div>
                        <div class="addtransact-image">
                            <figure><img src="logo1.png" alt="addtransact"></figure>
                        </div>








</body>
</html>

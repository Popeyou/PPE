<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="img/image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>

<?php

try
{
   $bdd = new PDO('mysql:host=localhost;dbname=location;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['forminscription']))
{
        $mail =htmlspecialchars($_POST['mail']);
        $mail2 =htmlspecialchars($_POST['mail2']);

        $mdpc = sha1($_POST['mdpc']);
        $mdp2 = sha1($_POST['mdp2']);

        $nom =htmlspecialchars($_POST['nom']);


    if(!empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdpc']) AND !empty($_POST['mdp2']) AND !empty($_POST['nom']))
    {


            if ($mail == $mail2)
            {
                if (filter_var($mail,FILTER_VALIDATE_EMAIL))
                {
                    $reqmail = $bdd->prepare("SELECT * FROM client where mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0)
                    {

                        if ($mdpc == $mdp2)
                        {
                            $insertmbr = $bdd->prepare("INSERT INTO client(codeC,codeT_C,mdpc,mail,nom,adresse,tel,datenaiss) values (null,null,?,?,?,null,null,null)");
                            $insertmbr->execute(array($mdpc,$mail,$nom));
                            $erreur = "<br><br><strong>Votre compte a bien été créé !</strong>";
                            echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>";

                        }
                        else
                        {
                            $erreur = "<br><br><strong>Vos mots de passe ne correspondent pas</strong>";
                        }
                    }
                    else
                    {
                        $erreur = "<br><br><strong>Adresse mail déja utilisée !</strong>";
                    }
                }
                else
                {
                    $erreur = "<br><br><strong>Votre adresse mail n'est pas valide</strong>";
                }
            }
            else
                {
                    $erreur = "<br><br><strong>Vos adresses mail ne correspondent pas</strong>";
                }

    }
    else
    {
        $erreur = "<br><br><strong>Tous les champs doivent être complétés !</strong>";
    }
}


?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title p-b-26">
						Inscription
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Adresse mail requise">
						<input class="input100" type="text" name="mail" value = "<?php if(isset($mail)) { echo $mail; } ?>">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Confirmation requise">
						<input class="input100" type="text" name="mail2" value = "<?php if(isset($mail2)) { echo $mail2; } ?>">
						<span class="focus-input100" data-placeholder="Confirmation Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Nom requis">
						<input class="input100" type="text" name="nom">
						<span class="focus-input100" data-placeholder="Nom complet"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Mot de passe requis">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="mdpc">
						<span class="focus-input100" data-placeholder="Mot de Passe"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Confirmation requise">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="mdp2">
						<span class="focus-input100" data-placeholder="Confirmation Mot de Passe"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="forminscription">S'inscrire</button>

						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Déjà un compte?
							<br>
						</span>

						<a class="txt2" href="connexion.php">
							Se Connecter
						</a>

					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

						<?php

if(isset($erreur))
{
    echo "<center>$erreur</center>";
}


?>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


</body>
</html>

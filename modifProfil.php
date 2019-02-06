<?php
session_start();
include ('controleur/controleur.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
	   $bdd = new PDO('mysql:host=localhost;dbname=location;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}

	if(isset($_POST['Enregistrer']))
	{
		$mail=htmlspecialchars($_POST['mail']);
		$adresse=htmlspecialchars($_POST['adresse']);
		$tel=htmlspecialchars($_POST['tel']);
		$prenom=htmlspecialchars($_POST['prenom']);
		$nom=htmlspecialchars($_POST['nom']);
		$siret=htmlspecialchars($_POST['numSiret']);
		$siren=htmlspecialchars($_POST['numSiren']);
	

	
		if(filter_var($mail,FILTER_VALIDATE_EMAIL))
		{
		$requete = $bdd->prepare("UPDATE client SET mail='".$mail."',adresse='".$adresse."',tel=".$tel.",prenom='".$prenom."',nom='".$nom."',numSiret='".$siret."',numSiren='".$siren."';");
		$requete->execute();
		$_SESSION['mail']=$_POST['mail'];
		$_SESSION['adresse']=$_POST['adresse'];
		$_SESSION['tel']=$_POST['tel'];
		$_SESSION['prenom']=$_POST['prenom'];
		$_SESSION['nom']=$_POST['nom'];
		$_SESSION['numSiret']=$_POST['numSiret'];
		$_SESSION['numSiren']=$_POST['numSiren'];
		echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";
		}
		else{
			$erreur="<br><br><strong>Votre adresse mail n'est pas valide</strong>";
		}
	}
	?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title p-b-26">
						Profil
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input">
						<h5>E-mail</h5>
						<input type="email" name="mail" value="<?php echo $_SESSION['mail']; ?>">
					</div>

					<div class="wrap-input100 validate-input" >
						<h5>Adresse</h5>
						<input type="text" name="adresse" value="<?php echo $_SESSION['adresse']; ?>">
					</div>

					<div class="wrap-input100 validate-input">
						<h5>Téléphone :</h5>
						<input type="text" name="tel" value="<?php echo $_SESSION['tel']; ?>">
					</div>

					<div class="wrap-input100 validate-input">
						<h5>Prénom :</h5>
						<input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>">
					</div>

					<div class="wrap-input100 validate-input">
						<h5>Nom</h5>
						<input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>">
					</div>
					
					<div class="wrap-input100 validate-input">
						<h5>Numéro Siret</h5>
						<input type="text" name="numSiret" value="<?php echo $_SESSION['numSiret']; ?>">
					</div>

					<div class="wrap-input100 validate-input">
						<h5>Numéro Siren</h5>
						<input type="text" name="numSiren" value="<?php echo $_SESSION['numSiren']; ?>">
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="Enregistrer">
								Enregistrer
						</button>
						
						</div>
					</div>
					<?php
			              if(isset($erreur))
			              {
			                echo "<center>$erreur</center>";
			              }
			            ?>

					<div class="text-center p-t-115">
						<span class="txt1">
							Vous n'avez pas de compte?
							<br>
						</span>

						<a class="txt2" href="inscription.php">
							Inscrivez-vous
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
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
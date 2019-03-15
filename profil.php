<?php
  require 'inc/header.php';
?>
<body>

				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title p-b-26">
						Profil
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input">
						<h5>E-mail :</h5>
						<?php echo $_SESSION['mail']; ?>
					</div>

					<div class="wrap-input100 validate-input" >
						<h5>Adresse :</h5>
						<?php echo $_SESSION['adresse']; ?>
					</div>

					<div class="wrap-input100 validate-input">
						<h5>Téléphone :</h5>
						<?php echo $_SESSION['tel']; ?>
					</div>

					<div class="wrap-input100 validate-input">
						<h5>Prénom :</h5>
						<?php echo $_SESSION['prenom']; ?>
					</div>

					<div class="wrap-input100 validate-input">
						<h5>Nom :</h5>
						<?php echo $_SESSION['nom']; ?>
					</div>

					<div class="wrap-input100 validate-input">
						<h5>Numéro Siret :</h5>
						<?php echo $_SESSION['numSiret']; ?>
					</div>

					<div class="wrap-input100 validate-input">
						<h5>Numéro Siren :</h5>
						<?php echo $_SESSION['numSiren']; ?>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<a href="modifProfil.php">ALLER</a>
						</div>
					</div>

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

  <?php require 'inc/footer.php'; ?>

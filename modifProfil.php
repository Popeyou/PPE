<?php
  require 'inc/header.php';
?>

<head>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
		echo "<script type='text/javascript'>document.location.replace('modifProfil.php');</script>";
		}
		else{
			$erreur="<br><br><strong>Votre adresse mail n'est pas valide</strong>";
		}
	}
	?>


  <div style="padding-left: 30px">
				<form class="form-horizontal" onsubmit="return confirm('Veuillez confirmez vos informations');" method="post" action="">
          <p>
            <h3>
            </br>
						    Profil
					  </h3>
          </p>
					<div>
						<h5></br>E-mail</h5>
						<input class="form-control" type="email" name="mail" placeholder="Votre email" value="<?php echo $_SESSION['mail']; ?>">
					</div>
        <p>
					<div>
						<h5>Adresse</h5>
						<input class="form-control" type="text" name="adresse" placeholder="Votre adresse" value="<?php echo $_SESSION['adresse']; ?>">
					</div>
        </p>
					<div>
						<h5>Téléphone :</h5>
						<input class="form-control" type="text" name="tel" placeholder="Votre téléphone" value="<?php echo $_SESSION['tel']; ?>">
					</div>
        <p>
					<div>
						<h5>Prénom :</h5>
						<input class="form-control" type="text" name="prenom" placeholder="Votre prénom" value="<?php echo $_SESSION['prenom']; ?>">
					</div>
        </p>
    </div>

    <div style="padding-left: 80px; padding-top: 130px">
					<div>
						<h5>Nom</h5>
						<input class="form-control" type="text" name="nom" placeholder="Votre nom" value="<?php echo $_SESSION['nom']; ?>">
					</div>
        <p>
					<div>
						<h5>Numéro Siret</h5>
						<input class="form-control" type="text" name="numSiret" placeholder="Votre numéro Siret" value="<?php echo $_SESSION['numSiret']; ?>">
					</div>
        </p>
					<div>
						<h5>Numéro Siren</h5>
						<input class="form-control" type="text" name="numSiren" placeholder="Votre numéro Siren" value="<?php echo $_SESSION['numSiren']; ?>">
					</div>

        </br>
        </br>
							<button class="btn btn-primary" type="submit" name="Enregistrer">
								Enregistrer
						</button>


					<?php
			              if(isset($erreur))
			              {
			                echo "<center>$erreur</center>";
			              }
			    ?>
        </div>
			</div>
				</form>
			</div>
		</div>
	</div>
</br>

  <?php require 'inc/footer.php'; ?>

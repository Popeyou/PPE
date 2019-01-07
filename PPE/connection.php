<?php require 'inc/header.php'; 

include("controleur/controleur.php");


?>

</br>
</br>
</br>
<h1>Formulaire de connection</h1>

				<form method="post" action="">

					<div class="form-group">

						<label for="">ID</label>

						<input type="text" name="IDC" class="form-control" required></br>
						
						<label for="">Email</label>

						<input type="email" name="MAIL" class="form-control" required></br>

						<label for="">Mot de passe</label>

						<input type="password" name="MDPC" class="form-control" required>

						<input type="hidden" name="IDC" value="<?php if(isset($resultat)) echo $resultat['IDC'] ; ?>">
					</div>
					
					<input type="reset" name="Annuler" value="Annuler">
					<input type="submit" name="Enregistrer" value="Se connecter"> 
				</form>
			</br>
				<a href="index.php?">Retour à l'accueil</a>

				<?php

				if(isset($_POST["Enregistrer"]))
					{
					header("Location: index.php?page=5.php");

					$resultat = selectWhereIdClientC ($IDC);
					
					exit;
					}

				?>

<?php require 'inc/footer.php'; ?>
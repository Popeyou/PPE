<?php require 'inc/header.php'; 

include("controleur/controleur.php");

?>

</br>
</br>
</br>
<h1>Espace techniciens</h1>

				<form method="post" action="">

					<div class="form-group">

						<label for="">ID</label>

						<input type="text" name="IDT" class="form-control" required></br>
						
						<label for="">Email</label>

						<input type="email" name="MAILT" class="form-control" required></br>

						<label for="">Mot de passe</label>

						<input type="password" name="MDPT" class="form-control" required>

						<input type="hidden" name="IDT" value="<?php if(isset($resultat)) echo $resultat['IDC'] ; ?>">
					</div>
					
					<input type="reset" name="Annuler" value="Annuler">
					<input type="submit" name="Enregistrer" value="Se connecter"> 
				</form>
			</br>
				<a href="index.php?">Retour à l'accueil</a>

				<?php

				if(isset($_POST["Enregistrer"]))
					{
					header("Location: index.php?page=6.php");

					$resultat = selectWhereIdTechnicienC ($IDC);
					
					exit;
					}

				?>

<?php require 'inc/footer.php'; ?>
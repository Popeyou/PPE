<?php

require 'inc/header.php'; 

function controle()
{
$con = connexion();

$requete = "

		drop trigger if exists verifage;
		delimiter //
		create trigger verifage
		before insert on client
		for each row
		begin
		if datediff(curdate(),new.DATENAISSC)/365 < 18
			  then
			         signal sqlstate'42000'
			         set message_text = 'Impossible';
			  end if;
		end //
		delimiter ;

		";
		deconnexion($con);
}


include("controleur/controleur.php");

if(isset($_POST["Enregistrer"]))
{
	if(!empty($_POST))
	{
		$erreurs = array();

		controle();

		if(empty($_POST['NOMC']) || !preg_match('/[a-zA-Z]/', $_POST['NOMC']))
		{	
			$erreurs['NOMC'] = "Remplissez le champs du Nom avec des caractères valides !";
		}
		if(empty($_POST['PRENOMC']) || !preg_match('/[a-zA-Z]/', $_POST['PRENOMC']))
		{
			$erreurs['PRENOMC'] = "Remplissez le champs du Prénom avec des caractères valides !";
		}
		if(empty($_POST['MDPC']) || preg_match('/~(?=.*[0-9])(?=.*[a-z])^[a-z0-9]{5,15}$~/', $_POST['MDPC']))
		{
			$erreurs['MDPC'] = "Le mot de passe doit contenir des lettres et des chiffres !";
		}
		if(empty($_POST['CODE_TYPEC']) || !preg_match('/[a-zA-Z]/', $_POST['CODE_TYPEC']))
		{
			$erreurs['CODE_TYPEC'] = "Remplissez le champs de la Catégorie client avec des caractères valides !";
		}
		if(empty($_POST['CPC']) || !preg_match('/\A\d{5}\z/', $_POST['CPC']))
		{
			$erreurs['CPC'] = "Code postal invalide !";
		}
		if(empty($_POST['TELC']) || !preg_match('/\A\d{10}\z/', $_POST['TELC']))
		{
			$erreurs['TELC'] = "Numéro de téléphone invalide !";
		}
		if(empty($_POST['DATENAISSC']))
		{
			$erreurs['DATENAISSC'] = "Impossible";
		}

		debug($erreurs);

		if(!$erreurs)
		{
			insertClientC($_POST);

			popup();
		}
	}
	
}


?>

</br>
</br>
</br>
<h1>Formulaire d'inscription</h1>

				<form method="post" action="">
					<div class="form-group">

						<label for="">Nom</label>

						<input type="text" name="NOMC" class="form-control"></br>

						<label for="">Prénom</label>

						<input type="text" name="PRENOMC" class="form-control" ></br>


						<label for="">Catégorie de client</label>

						<input type="text" name="CODE_TYPEC" class="form-control" ></br>


						<label for="">Mot de passe</label>

						<input type="password" name="MDPC" class="form-control" ></br>


						<label for="">Email</label>

						<input type="email" name="MAIL" class="form-control" ></br>


						<label for="">Adresse</label>

						<input type="text" name="ADRESSEC" class="form-control" ></br>


						<label for="">Code postal</label>

						<input type="int" name="CPC" class="form-control" ></br>


						<label for="">Téléphone</label>

						<input type="int" name="TELC" class="form-control" ></br>


						<label for="">Date de naissance</label>

						<input type="date" name="DATENAISSC" class="form-control" ></br>

						
						<input type="hidden" name="IDC" value="<?php if(isset($resultat)) echo $resultat['IDC'] ; ?>">
						</div>

						<input type="reset" name="Annuler" value="Annuler">
						<input type="submit" name="Enregistrer" value="S'inscrire">

				</form>
			</br>
				<a href="index.php?">Retour à l'accueil</a>
			


<?php require 'inc/footer.php'; ?>

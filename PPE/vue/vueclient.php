<center>
	<h2> Liste des clients enregistrés </h2>
	<br/>
	<table border = 1>
		<tr>
		<th>ID clients</th>
		<th>Code Type clients</th>
		<th>Type clients</th>
		<th>Nom</th>
      	<th>Prenom</th>
     	<th>Mail</th>
      	<th>Adresse</th>
      	<th>Code postal</th>
      	<th>Telephone</th>
     	<th>Date de naissance</th>
     	<th>Actions</th>
     </tr>
		
      	<?php
		foreach ($resultats as $unResultat) {
			echo "
			<tr>
			<td>".$unResultat['codeC']."</td>
			<td>".$unResultat['codeT_C']."</td>
			<td>".$unResultat['libelle']."</td>
			<td>".$unResultat['nom']."</td>
			<td>".$unResultat['prenom']."</td>
			<td>".$unResultat['mail']."</td>
			<td>".$unResultat['adresse']."</td>
			<td>".$unResultat['cp']."</td>
			<td>".$unResultat['tel']."</td>
			<td>".$unResultat['datenaiss']."</td>
			
			<td> 	<a href='index.php?page=5&action=X&codeC=".$unResultat['codeC']."'>
							<img src='image/supprimer.png' width='80' height='80' > </a>
							<a href='index.php?page=5&action=E&codeC=".$unResultat['codeC']."'>
							<img src='image/editer.jpg' width='80' height='80' > </a>
				</tr>";
		}
		?>
		</table>
		<br/>
			<h2>Ajout d'un Client</h2>
				<form method="post" action="">

					<table border= 0 >
						<tr><td>Nom : </td> <td> <input type="text" name="nom" value="<?php if(isset($resultat)) echo $resultat['nom'] ; ?>"></td></tr>
						<tr><td>Prénom : </td> <td> <input type="text" name="prenom" value="<?php if(isset($resultat)) echo $resultat['prenom'] ; ?>"></td></tr>
			
						<tr><td>Catégorie de client : </td> <td> 
								<select name="codeT_C" value="<?php if(isset($resultat)) echo $resultat['codeT_C'] ; ?>">
						<option value="1"> Professionnelle </option>
						<option value="2"> Particulier </option>
						<option value="3"> Entreprise </option>
						</select>

						<tr><td>Mot de passe : </td> <td> <input type="text" name="mdp" value="<?php if(isset($resultat)) echo $resultat['mdpc'] ; ?>"></td></tr>
						<tr><td>Mail : </td> <td> <input type="text" name="mail" value="<?php if(isset($resultat)) echo $resultat['mail'] ; ?>"></td></tr>
						<tr><td>Adresse : </td> <td> <input type="text" name="adresse" value="<?php if(isset($resultat)) echo $resultat['adresse'] ; ?>"></td></tr>
						<tr><td>Code postal : </td> <td> <input type="int" name="cp" value="<?php if(isset($resultat)) echo $resultat['cp'] ; ?>"></td></tr>
						<tr><td>Téléphone : </td> <td> <input type="int" name="tel" value="<?php if(isset($resultat)) echo $resultat['tel'] ; ?>"></td></tr>
						<tr><td>Date de naissance : </td> <td> <input type="date" name="datenaiss" value="<?php if(isset($resultat)) echo $resultat['datenaiss'] ; ?>"></td></tr>
						</br>
						<tr>
							<td> <input type="reset" name="Annuler" value="Annuler"></td>
							<td> <input type="submit" name="Enregistrer" value="Enregistrer"> 
							<input type="submit" name="Modifier" value="Modifier"></td>
						</tr>

					</table>
					<input type="hidden" name="codeC" value="<?php if(isset($resultat)) echo $resultat['codeC'] ; ?>">
				</form>
</center>

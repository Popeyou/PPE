<center>
	<h2> Liste des techniciens </h2>
	<br/>
	<table border = 1>
		<tr><th>ID technicien</th>
			<th>Code du type de technicien</th>
			<th>Type du technicien</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Mail</th>
			<th>Actions</th>
		</tr>
		<?php
		foreach ($resultats as $unResultat) {
			echo "<tr>
			<td>".$unResultat['codeT']."</td>
			<td>".$unResultat['codeT_T']."</td>
			<td>".$unResultat['libelle']."</td>
			<td>".$unResultat['nom']."</td>
			<td>".$unResultat['prenom']."</td>
			<td>".$unResultat['mail']."</td>

			<td> 	<a href='index.php?page=2&action=X&codeT=".$unResultat['codeT']."'>
							<img src='image/supprimer.png' width='80' height='80' > </a>
							<a href='index.php?page=2&action=E&codeT=".$unResultat['codeT']."'>
							<img src='image/editer.jpg' width='80' height='80' > </a>
				</tr>";
		}
		?>
		</table>
		<br/>
			<h2>Ajout d'un technicien</h2>
				<form method="post" action="">

					<table border= 0>
						<tr><td>Type de technicien : </td> <td>
								<select name="codeT_T" value="<?php if(isset($resultat)) echo $resultat['codeT_T'] ; ?>">
						<option value="1"> Maintenance </option>
						<option value="2"> Installation </option>
						<option value="3"> Réparation </option>
						</select>

						<tr><td>Nom : </td> <td> <input type="text" name="nom" value="<?php if(isset($resultat)) echo $resultat['nom'] ; ?>"></td></tr>
						<tr><td>Prénom : </td> <td> <input type="text" name="prenom" value="<?php if(isset($resultat)) echo $resultat['prenom'] ; ?>"></td></tr>
						<tr><td>Mail : </td> <td> <input type="email" name="mail" value="<?php if(isset($resultat)) echo $resultat['mail'] ; ?>"></td></tr>
						<tr><td>Mot de passe : </td> <td> <input type="password" name="mdp" value="<?php if(isset($resultat)) echo $resultat['mdp'] ; ?>"></td></tr>
						</br>
						<tr>

							<td> <input type="reset" name="Annuler" value="Annuler"></td>
							<td> <input type="submit" name="Enregistrer" value="Enregistrer">
							<input type="submit" name="Modifier" value="Modifier"></td>
						</tr>

					</table>
					<input type="hidden" name="codeT" value="<?php if(isset($resultat)) echo $resultat['codeT'] ; ?>">
				</form>
</center>

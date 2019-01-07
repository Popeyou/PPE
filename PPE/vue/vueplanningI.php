<center>
	<h2> Planning des interventions </h2>
	<br/>
	<table border = 1>
		<tr>
			<th>Code de l'intervention</th>
			<th>Libellé</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Durée</th>
			<th>Durée</th>
			<th>Commentaire</th>
			<th>État</th>
			<th>Date de début</th>
			<th>Date de fin</th>
			<th>Actions</th>
		</tr>
		<?php
		foreach ($resultats as $unResultat)
		{
			echo "<tr>
			<td>".$unResultat['codeI']."</td>
			<td>".$unResultat['libelle']."</td>
			<td>".$unResultat['prenom']."</td>
			<td>".$unResultat['nom']."</td>
			<td>".$unResultat['duree']."</td>
			<td>".$unResultat['commentaire']."</td>
			<td>".$unResultat['etat']."</td>
			<td>".$unResultat['dateD']."</td>
			<td>".$unResultat['dateF']."</td>

			<td> 	<a href='index.php?page=6&action=X&codeI=".$unResultat['codeI']."'>
							<img src='image/supprimer.png' width='80' height='80' > </a>
							<a href='index.php?page=6&action=E&codeI=".$unResultat['codeI']."'>
							<img src='image/editer.jpg' width='80' height='80' > </a>
				</tr>";
		}
		?>
		</table>
		<br/>
			<h2>Ajout d'une intervention</h2>
				<form method="post" action="">
					
					<table border= 0 >
						<tr><td>Type d'intervention : </td>
							<td>
								<select name="libelle" value="<?php if(isset($resultat)) echo $resultat['libelle'] ; ?>">
						<option value="Maintenance"> Maintenance </option>
						<option value="Installation"> Installation </option>
						<option value="Réparation"> Réparation </option>
						</select>

					</td></tr>
					<tr><td>Prénom du technicien : </td>
						<td>
							<input type="text" name="prenom" value="<?php if(isset($resultat)) echo $resultat['prenom'] ; ?>"
					</td></tr>
						<tr><td>Nom du technicien : </td> <td> <input type="text" name="nom" value="<?php if(isset($resultat)) echo $resultat['nom'] ; ?>"></td></tr>
						<tr><td>Durée : </td> <td> <input type="text" name="duree" value="<?php if(isset($resultat)) echo $resultat['duree'] ; ?>"></td></tr>
						<tr><td>Commentaire : </td> <td> <input type="text" name="commentaire" value="<?php if(isset($resultat)) echo $resultat['commentaire'] ; ?>"></td></tr>
						<tr><td>État : </td> <td> <input type="text" name="etat" value="<?php if(isset($resultat)) echo $resultat['etat'] ; ?>"></td></tr>

						<tr><td>Date de début : </td> <td> <input type="text" name="dateD" value="<?php if(isset($resultat)) echo $resultat['dateD'] ; ?>"></td></tr>
						<tr><td>Date de fin : </td> <td> <input type="text" name="dateF" value="<?php if(isset($resultat)) echo $resultat['dateF'] ; ?>"></td></tr>
						</br>
						<tr>
							<td> <input type="reset" name="Annuler" value="Annuler"></td>
							<td> <input type="submit" name="Enregistrer" value="Enregistrer">
							<input type="submit" name="Modifier" value="Modifier"></td>
						</tr>

					</table>
					<input type="hidden" name="codeI" value="<?php if(isset($resultat)) echo $resultat['codeI'] ; ?>">
				</form>
</center>

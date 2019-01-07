<center>
	<h2> Liste du matériel enregistré </h2>
	<br/>
	<table border = 1>
		<tr> 	<th>Numero de série</th>
				<th>Type du matériel</th>
				<th>Désignation</th>
				<th>Article</th>
				<th>Notice d'entretien</th>
				<th>Prix par jour</th>
				<th>Poids</th>
				<th>Actions</th>
		</tr>
		<?php
		foreach ($resultats as $unResultat) {
			echo "<tr>

			<td>".$unResultat['codeM']."</td>
			<td>".$unResultat['codeT_M']."</td>
			<td>".$unResultat['designation']."</td>
			<td>".$unResultat['nom']."</td>
			<td>".$unResultat['notice']."</td>
			<td>".$unResultat['prix']."</td>
			<td>".$unResultat['poids']."</td>
			<td>

			<a href='index.php?page=1&action=X&codeM=".$unResultat['codeM']."'>
							<img src='image/supprimer.png' width='80' height='80' > </a>
							<a href='index.php?page=1&action=E&codeM=".$unResultat['codeM']."'>
							<img src='image/editer.jpg' width='80' height='80' > </a>
				</tr>";

		}
		?>
		</table>
		<br/>
			<h2>Ajout de Matériel</h2>
				<form method="post" action="">

					<table border= 0 >

						<tr><td>Article : </td> <td> <input type="text" name="nom" value="<?php if(isset($resultat)) echo $resultat['nom'] ; ?>"></td></tr>
						<tr><td>Numéro de série : </td> <td> <input type="text" name="codeM" value="<?php if(isset($resultat)) echo $resultat['codeM'] ; ?>"></td></tr>

						<tr><td>Type de matériel : </td> <td>
								<select name="codeT_M" value="<?php if(isset($resultat)) echo $resultat['codeT_M'] ; ?>">
						<option value="1"> Bricolage </option>
						<option value="2"> Construction </option>
						<option value="3"> Jardinage </option>
						</select>

						<tr><td>Notice d'entretien : </td> <td> <input type="text" name="notice" value="<?php if(isset($resultat)) echo $resultat['notice'] ; ?>"></td></tr>
						<tr><td>Prix par jour : </td> <td> <input type="text" name="prix" value="<?php if(isset($resultat)) echo $resultat['prix'] ; ?>"></td></tr>
						<tr><td>Poids : </td> <td> <input type="text" name="poids" value="<?php if(isset($resultat)) echo $resultat['poids'] ; ?>"></td></tr>
						</br>
						<tr>
							<td> <input type="reset" name="Annuler" value="Annuler"></td>
							<td> <input type="submit" name="Enregistrer" value="Enregistrer">
							<input type="submit" name="Modifier" value="Modifier"></td>
						</tr>

					</table>
					<input type="hidden" name="codeM" value="<?php if(isset($resultat)) echo $resultat['codeM'] ; ?>">
				</form>
</center>

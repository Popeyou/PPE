<center>
	<h2> Liste des contracts enregistrés </h2>
	<br/>
	<table border = 1>
		<tr><th>Numero contract</th>
			<th>Signature</th>
			<th>Etat</th>
			<th>Actions</th>
		</tr>
		<?php
		foreach ($resultats as $unResultat)
		{
			echo "<tr>
			<td>".$unResultat['code_contrat']."</td>
			<td>".$unResultat['signature']."</td>
			<td>".$unResultat['etat']."</td>

			<td> 	<a href='index.php?page=3&action=X&code_contrat=".$unResultat['code_contrat']."'>
							<img src='image/supprimer.png' width='80' height='80' > </a>
							<a href='index.php?page=3&action=E&code_contrat=".$unResultat['code_contrat']."'>
							<img src='image/editer.jpg' width='80' height='80' > </a>
				</tr>";
		}
		?>
		</table>
		<br/>
			<h2>Ajout d'un Contrat</h2>
			<form method="post" action="">

				<table border= 0 >
					<tr><td>Code du contrat : </td> <td> <input type="text" name="code_contrat" value="<?php if(isset($resultat)) echo $resultat['code_contrat'] ; ?>"></td></tr>
					<tr><td>Code de la réservation : </td> <td> <input type="text" name="codeR" value="<?php if(isset($resultat)) echo $resultat['codeR'] ; ?>"></td></tr>
					<tr><td>Signature : </td> <td> <input type="text" name="signature" value="<?php if(isset($resultat)) echo $resultat['signature'] ; ?>"></td></tr>
					<tr><td>État : </td> <td> <input type="date" name="etat" value="<?php if(isset($resultat)) echo $resultat['etat'] ; ?>"></td></tr>

					</br>
					<tr>
						<td> <input type="reset" name="Annuler" value="Annuler"></td>
						<td> <input type="submit" name="Enregistrer" value="Enregistrer">
						<input type="submit" name="Modifier" value="Modifier"></td>
					</tr>

				</table>
				<input type="hidden" name="code_contrat" value="<?php if(isset($resultat)) echo $resultat['code_contrat'] ; ?>">
			</form>
</center>

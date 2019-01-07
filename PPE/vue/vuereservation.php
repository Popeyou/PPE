<center>
	<h2> Liste des réservations enregistrées </h2>
	<br/>
	<table border = 1>
		<tr><th>N° Réservation</th>
			<th>Etat</th>
			<th>Début de la réservation</th>
			<th>Fin de la réservation</th>
			<th>Date de retrait</th>
			<th>Date de dépôt</th>
			<th>Actions</th>
		</tr>
		<?php
		foreach ($resultats as $unResultat) 
		{
			echo "<tr>
			<td>".$unResultat['codeR']."</td>
			<td>".$unResultat['etat']."</td>
			<td>".$unResultat['dateD']."</td>
			<td>".$unResultat['dateF']."</td>
			<td>".$unResultat['date_retrait']."</td>
			<td>".$unResultat['date_depot']."</td>
			
			<td>
			<a href='index.php?page=4&action=X&codeR=".$unResultat['codeR']."'>
							<img src='image/supprimer.png' width='80' height='80' > </a>
							<a href='index.php?page=4&action=E&codeR=".$unResultat['codeR']."'>
							<img src='image/editer.jpg' width='80' height='80' > </a>
				</tr>";
		}
		?>
		</table>
		<br/>
			<h2>Ajout d'une Réservation</h2>
				<form method="post" action="">

					<table border= 0 >
						<tr><td>État : </td> <td> <input type="text" name="etat" value="<?php if(isset($resultat)) echo $resultat['etat'] ; ?>"></td></tr>
						<tr><td>Début de la réservation : </td> <td> <input type="date" name="dateD" value="<?php if(isset($resultat)) echo $resultat['dateD'] ; ?>"></td></tr>
						<tr><td>Fin de la réservation : </td> <td> <input type="date" name="dateF" value="<?php if(isset($resultat)) echo $resultat['dateF'] ; ?>"></td></tr>
						<tr><td>Date de retrait : </td> <td> <input type="date" name="date_retrait" value="<?php if(isset($resultat)) echo $resultat['date_retrait'] ; ?>"></td></tr>
						<tr><td>Date de dépôt : </td> <td> <input type="date" name="date_depot" value="<?php if(isset($resultat)) echo $resultat['date_depot'] ; ?>"></td></tr>
						
						</td></tr>
					</br>
						<tr>
							<td> <input type="reset" name="Annuler" value="Annuler"></td>
							<td> <input type="submit" name="Enregistrer" value="Enregistrer"> 
							<input type="submit" name="Modifier" value="Modifier"></td>
						</tr>

					</table>
					<input type="hidden" name="codeR" value="<?php if(isset($resultat)) echo $resultat['codeR'] ; ?>">
				</form>
</center>
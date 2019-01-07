<?php

function debug($erreurs)
{
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo '<pre>' . print_r($erreurs, true) . '</pre>';
}

function popup()
{
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo"<h4>INSCRIPTION CONFIRMÉE</h4>";
	echo"<a href ='index.php?page=5'>Voir mon profil</a>";
}
?>
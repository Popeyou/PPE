<?php
session_start();
include ('controleur/controleur.php');
?>

<?php
include ("vue/vueconnexion.php");
$unC = new Controleur('localhost','location','root','');
if (!isset($_POST['Connexion']))
{

}
else 
{

	$champs = array('codeC','mail','adresse','nom');
	$where = array('mail'=>$_POST['mail'],'mdpc'=>sha1($_POST['mdpc']));
	$unC->setTable('client');
	$unResultat = $unC->verif_connexion($champs,$where," and ");
	var_dump($unResultat);
	if ($unResultat['nb'] == 0)
	{
		echo "Veuillez vérifier vos identifiants";
	}
	else
	{
		$_SESSION['mail'] = $unResultat['mail'];	
		echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

	}
}
?>

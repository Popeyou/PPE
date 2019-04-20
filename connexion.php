<?php
session_start();
include ('controleur/controleur.php');
?>

<?php
include ("vue/vueconnexion.php");
$unC = new Controleur('localhost','location','root','root');
if (!isset($_POST['Connexion']))
{
}
else
{
	$champs = array('codeC','mail','adresse','nom', 'grade');
	$where = array('mail'=>$_POST['mail'],'mdpc'=>sha1($_POST['mdpc']));
	$unC->setTable('client');
	$unResultat = $unC->verif_connexion($champs,$where," and ");
	var_dump($unResultat);
	
	if ($unResultat['nb'] == false)
	{
		echo "Veuillez vérifier vos identifiants";
	}
	else if($unResultat['grade']=="admin"){
		$_SESSION['id'] = $unResultat['codeC'];
		$_SESSION['nom'] = $unResultat['nom'];
		$_SESSION['prenom'] = $unResultat['prenom'];
		$_SESSION['adresse'] = $unResultat['adresse'];
		$_SESSION['tel'] = $unResultat['tel'];
		$_SESSION['numSiret'] = $unResultat['numSiret'];
		$_SESSION['numSiren'] = $unResultat['numSiren'];
		$_SESSION['mail'] = $unResultat['mail'];
		$_SESSION['grade'] = $unResultat['grade'];
		echo "<script type='text/javascript'>document.location.replace('admin.php');</script>";
	}
	else if ($unResultat['grade']== "")
	{
		$_SESSION['id'] = $unResultat['codeC'];
		$_SESSION['nom'] = $unResultat['nom'];
		$_SESSION['prenom'] = $unResultat['prenom'];
		$_SESSION['adresse'] = $unResultat['adresse'];
		$_SESSION['tel'] = $unResultat['tel'];
		$_SESSION['numSiret'] = $unResultat['numSiret'];
		$_SESSION['numSiren'] = $unResultat['numSiren'];
		$_SESSION['mail'] = $unResultat['mail'];
		$_SESSION['grade'] = $unResultat['grade'];
		echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
	}
}
?>

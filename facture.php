<?php
session_start();

try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=location;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));

}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
}

$reponse = $bdd->query("SELECT mail,client.nom,prenom,adresse FROM panier, client, materiel where panier.codeC = client.codeC and panier.codeM=materiel.codeM and panier.codeC=
 '".$_SESSION['id']."';");

while ($donnees = $reponse->fetch())
{

	$contenu = "<img style='float:left;' src=img/image/roilles.png>

	<page>
	<nobreak> 
	<br><div style='text-align:center;'><h2>Facture ".$donnees['mail']."</h2>

<br>
<h3>
<br><br>
Capital : ".$donnees['nom']." 
<br><br>
Facture ".$donnees['prenom']."
<br><br>
Facture ".$donnees['adresse']."
</h3>
<h1>STATUTS CONSTIUTIFS</h1>
</div>

<div style='font-size:16px'>Le soussigné :
<br><br><br>
<i><strong>rgrgrgrgrgr</strong></i>
<br><br><br> A établi ainsi qu'il suit les statuts d'une société par actions simplifiée désigné les premiers dirigeants de ladite société .  <br><br><br>
<h2> Article 1 : Forme de la Société</h2>
<br><br>

</div>
</nobreak>
</page> ";
}


require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new HTML2PDF("P","A4","fr");
$html2pdf->writeHTML($contenu);
$html2pdf->output();
?>

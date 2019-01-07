<?php
	include ('controleur/controleur.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestion d'un garage</title>
</head>
<body>
	<center>
		<?php
			include("vue/vue_connexion.php");
			$unC = new controleur('localhost','GarageTP','root','');
			if (!isset($_POST['Connexion'])){
				echo "Bienvenue sur notre site, veuillez vous identifer";
			}else{
				$champs = array("idtechnicien","email","nom","prenom");
				$where = array("email"=>$_POST['email'],
								"mdp"=>$_POST['mdp']);
				$unC->setTable("technicien");
				$unResultat = $unC->verif_connexion($champs, $where, " and ");
				var_dump($unResultat);
				if($unResultat['nb']==0)
				{
					echo"veuillez vérifier vos identifiants";
				}else{
					echo "Bienvenue, " . $unResultat['nom']." ".$unResultat['prenom'] ."<br/>";
						//traitement général avec sessions
					session_start();
					$_SESSION['email'] = $unResultat['email'];
					$_SESSION['idtechnicien'] = $unResultat['idtechnicien'];
					$_SESSION['nom'] = $unResultat['nom'];
						

					?>
		<h1>Site de gestion d'un garage</h1>
		<a href="index.php?page=1"> Liste des clients </a> </br>
		<a href="index.php?page=2"> Liste des techniciens </a> </br>
		<a href="index.php?page=3"> Liste des techniciens soudeurs entré en 2015</a> </br>
		<a href="index.php?page=4"> Ajouter un client</a> </br>
		<?php
		if (isset($_GET['page'])) $page=$_GET['page'];
		else $page=0;


		//instanciation d'un controleur
		$unC = new controleur('localhost','garage','root','');
		switch ($page) {
			case 1:
				$unC->setTable('client');
				$resultats = $unC->selectAll();
				if(isset($_POST['Afficher']))
				{
					$statut = $_POST['statut'];
					if($statut == "")
					{
						$resultats = $unC->selectAll();

					}else{
					$champs = array('idClient','nom','adresse','statut','chiffre_affaires');
					$where = array('statut'=>$statut);
					$operateur = "";
					$resultats = $unC->selectWhere($champs, $where, $operateur);
				}	
				}
				if (isset($_POST['Supprimer']))
                            {
                                $where = array('idClient'=>$_POST['idClient']);

                                $unC->delete($where);

                                header("Refresh:0");
                            }
				$action = (isset($_GET['action']) ? $_GET['action'] : '');
				//if
				if($action=='e')
				{
					$idClient = $_GET['idClient'];
					$unC->setTable('Client');
					$where = array('idClient');
					$tab= array('nom','adresse','statut','chiffre_affaires');
					$lesResultats = $unC->selectWhere($tab, $where, "");
					$unResultat = $lesResultats[0];
					$unResultat['idClient'] = $idClient;
					//var_dump($unResultat);
					include('vue/vue_update.php');
				}
				include('vue/vue_selectall.php');
			break;
			
			case 2:
				$unC->setTable('technicien');
				$resultats = $unC->selectAll();
				include('vue/vue_selectall_technicien.php');
			break;

			case 3:
				$unC->setTable('technicien');
				$champs=array("idtechnicien","nom","prenom");
				$where=array("qualification"=>"soudeur", "date_entree"=>"2015-04-06");
				$operateur=" and";
				$resultats = $unC->selectWhere($champs, $where, $operateur);
				include('vue/vue_selectwhere_technicien.php');
			break;
			case 4:
				include('vue/vue_insert.php');
				if(isset($_POST['Valider']))
				{
					$tabCli['nom']=$_POST['nom'];
					$tabCli['adresse']=$_POST['adresse'];
					$tabCli['statut']=$_POST['statut'];
					$tabCli['chiffre_affaires']=$_POST['ca'];

					$unC->setTable('client');
					$unC->insert($tabCli);
					echo"Le client a été ajouté avec succès !";
				}
			break;

		}
		
	}//accolade du else au début	
	}	
		
		?>
	</center>
</body>
</html>
<?php
    //classe modele qui interagit avec la bdd lecture/ecriture de 
    //donnees avec une connexion PDO.

    class Modele
    {
        private $pdo, $table;

        public function __construct ($serveur,$bdd,$user,$mdp)
        {
            try
            {
                $this->pdo = new PDO("mysql:host=" .$serveur. ";dbname=".$bdd,$user,$mdp);
            }

            catch(Exception $e)
            {
                // En cas d'erreur, on affiche un message et on arrête tout
                die('Erreur : '.$e->getMessage());
            }
        }

        public function setTable ($uneTable)
        {
            $this->table = $uneTable;
        }

        public function selectAll ()
        {
            if ($this->pdo == null) return null;
            else
            {
                $requete = "select * from ".$this->table.";";
                $select = $this->pdo->prepare ($requete);
                $select->execute();
                $resultats = $select->fetchAll();
                return $resultats;
            }
        }

        public function selectWhere ($champs,$where,$operateur)
        {
            if ($this->pdo == null) return null;
            else
            {
                $chaineChamps = implode (",",$champs);
                $tab = array();
                $donnees = array();
                foreach ($where as $cle=>$valeur) 
                {
                    $tab[] = $cle. "= :".$cle;
                    $donnees[":".$cle] = $valeur;
                }

                $chaineWhere = implode (" ".$operateur." ",$tab);
            
                $requete = "select ".$chaineChamps." from ".$this->table." where ".$chaineWhere.";";


                $select = $this->pdo->prepare ($requete);
                $select -> execute($donnees);
                $resultats = $select->fetchAll();
                return $resultats;
            }
        }

        public function insert ($tab)
        {
            if ($this->pdo == null) return null;
            else
            {
                $donnees = array();
                $champs = array();
                foreach ($tab as $cle => $valeur) 
                {
                    $champs [] = ":".$cle;
                    $donnees[":".$cle] = $valeur;
                }

                $chaineChamps = implode(",",$champs);
                $requete = "insert into ".$this->table." values (null,".$chaineChamps.");";
                
                $insert = $this->pdo->prepare($requete);
                $insert->execute($donnees);
            }
        }

        public function delete ($where)
        {
            if ($this->pdo==null) return null;
            else
            {
                $donnees = array();
                $champs = array();
                foreach ($where as $cle => $valeur) 
                {
                    $champs[] = $cle.'= :' .$cle;
                    $donnees[':'.$cle] = $valeur;
                }
                $chaineWhere = implode (" and ",$champs);
                $requete = "delete from ".$this->table. " where ".$chaineWhere.";";
                $delete = $this->pdo->prepare($requete);
                $delete->execute($donnees);
            }

        }

        public function update ($tab,$where)
        {
            if ($this->pdo == null) return null;

            else
            {
                $donnees = array();
                $champs = array();
                //traitement des attributs a updater
                foreach ($tab as $cle => $valeur) 
                {
                    $champs [] = $cle. " = :".$cle;
                    $donnees[":".$cle] = $valeur;
                }

                $chaineChamps = implode(" , ",$champs);

                //traitement des champs du where

                $champsWhere = array();
                foreach ($where as $cle => $valeur) 
                {
                    $champsWhere[] = $cle." = :".$cle;
                    $donnees[":".$cle] = $valeur;
                }
                $chaineWhere = implode(" and ", $champsWhere);
                //construction de la requete
                $requete = "update ".$this->table." set ".$chaineChamps." where ".$chaineWhere. ";";
                echo $requete;
                $update = $this->pdo->prepare($requete);
                $update->execute($donnees);
            }

        }

        public function verif_connexion ($champs,$where,$operateur)
        {
            if ($this->pdo == null) return null;
            else
            {
                $chaineChamps = implode (",",$champs);
                $tab = array();
                $donnees = array();
                foreach ($where as $cle=>$valeur) 
                {
                    $tab[] = $cle. "= :".$cle;
                    $donnees[":".$cle] = $valeur;
                }

                $chaineWhere = implode (" ".$operateur." ",$tab);
            
                $requete = "select count(*) as nb, ".$chaineChamps." from ".$this->table." where ".$chaineWhere.";";
                //echo $requete;
                //var_dump($donnees);

                $select = $this->pdo->prepare ($requete);
                $select -> execute($donnees);
                $resultats = $select->fetch();
                return $resultats;
            }
        }


        
    }


?>
<?php
    include ("modele/modele.php");

    //classe controleur qui permet d'appeler les méthodes du modèle et les vues

    class Controleur
    {
        private $unModele;
        public function __construct ($serveur,$bdd,$user,$mdp)
        {
            $this->unModele = new Modele ($serveur,$bdd,$user,$mdp);
        }

        public function setTable ($uneTable)
        {
            $this->unModele->setTable($uneTable);
        }

        public function selectAll ()
        {
            return $this->unModele->selectAll();
        }

        public function selectWhere ($champs,$where,$operateur)
        {
            return $this->unModele->selectWhere($champs,$where,$operateur);
        }

        public function insert ($tab)
        {
            $this->unModele->insert($tab);
        }

        public function delete ($where)
        {
            $this->unModele->delete($where);
        }

        public function update ($tab,$where)
        {
            $this->unModele->update($tab,$where);
        }

        public function verif_connexion ($champs,$where,$operateur)
        {
            return $this->unModele->verif_connexion($champs,$where,$operateur);
        }
        
    }
?>
<?php



//SERT A CONTROLER / FAIRE DES VERIFICATIONS

    include("modele/modele.php");

    function selectAllC($table)
    {
        //traitement des données
        if($table == "contrat" || $table == "reservation" )
        {
            $resultat = selectAllM($table);
            return $resultat;
        }
        else
        {
            return null;
        }
    }

# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------

    function selectAllClientC ()
    {
        $resultat = selectAllClientM ();
        return $resultat;
    }

    function insertClientC ($tab)
    {
        insertClientM ($tab);
    }

    function deleteClientC ($codeC)
    {

        deleteClientM ($codeC);
    }

    function selectWhereIdClientC ($codeC)
    {

        $resultat = selectWhereIdClientM ($codeC);
        return $resultat;
    }

    function updateClientC ($tab)
    {
        updateClientM ($tab);
    }

# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------
#       TABLE : TECHNICIEN
# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------

    function selectAllTechnicienC ()
    {
        $resultat = selectAllTechnicienM ();
        return $resultat;
    }

    function insertTechnicienC ($tab)
    {
        insertTechnicienM ($tab);
    }

    function deleteTechnicienC ($codeT)
    {
        deleteProduitModel ($codeT);
    }

    function selectWhereIdTechnicienC ($codeT)
    {
        $resultat = selectWhereIdTechnicienM ($codeT);
        return $resultat;
    }

    function updateTechnicienC ($tab)
    {
        updateTechnicienM ($tab);
    }

# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------
#       TABLE : CONTRAT
# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------

    function insertContratC ($tab)
    {
        insertContratM ($tab);
    }

    function deleteContratC ($code_contrat)
    {
        deleteMessageModel ($code_contrat);
    }

    function selectWhereIdContratC ($code_contrat)
    {
        $resultat = selectWhereIdContratM ($code_contrat);
        return $resultat;
    }

    function updateContratC ($tab)
    {
        updateContratM ($tab);
    }

# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------
#       TABLE : MATERIEL
# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------

    function selectAllMaterielC ()
    {
        $resultat = selectAllMaterielM ();
        return $resultat;
    }

    function insertMaterielC ($tab)
    {
        insertMaterielM ($tab);
    }

    function deleteMaterielC ($codeM)
    {
        deleteMaterielM ($codeM);
    }

    function selectWhereIdMaterielC ($codeM)
    {
        $resultat = selectWhereIdMaterielM ($codeM);
        return $resultat;
    }

    function updateMaterielC ($tab)
    {
        updateMaterielM ($tab);
    }

# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------
#       TABLE : RESERVATION
# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------

    function insertReservationC ($tab)
    {
        insertReservationM ($tab);
    }

    function deleteReservationC ($codeR)
    {
        deleteReservationM ($codeR);
    }

    function selectWhereIdReservationC ($codeR)
    {
        $resultat = selectWhereIdReservationM ($codeR);
        return $resultat;
    }

    function updateReservationC ($tab)
    {
        updateReservationM ($tab);
    }

# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------
#       TABLE : INTERVENTION
# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------

    function selectAllInterventionC ()
    {
        $resultat = selectAllInterventionM ();
        return $resultat;
    }

    function insertInterventionC ($tab)
    {
        insertInterventionM ($tab);
    }

    function deleteInterventionC ($codeI)
    {
        deleteInterventionM ($codeI);
    }

    function selectWhereIdInterventionC ($codeI)
    {
        $resultat = selectWhereIdInterventionM ($codeI);
        return $resultat;
    }

    function updateInterventionC ($tab)
    {
        updateInterventionM ($tab);
    }

# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------
#       TABLE : INTERVENTION
# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------

    function planningI_C ()
    {
      $resultat = planningI_M ();
      return $resultat;
    }

# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------
#       TABLE : INTERVENTION
# -----------------------------------------------------------------------------
# -----------------------------------------------------------------------------

    function planningR_C ()
    {
      $resultat = planningR_M ();
      return $resultat;
    }

?>

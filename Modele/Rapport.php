<?php

require_once 'Framework/Modele.php';

// Services métier liés aux compte rendus 
class Rapport extends Modele {

   //requête sql ajoutant un nouveau compte rendu
    private $sqlCompteRendu = "INSERT INTO rapport_visite VALUES('',?,?,?,?,?)";

    // ajoute le compte rendu avec les valeurs données dans le formulaire
    public function addRapport($idPraticien,$idVisiteur,$dateRapport,$bilan,$motif) {
        $sql = $this->sqlCompteRendu;
        try{
        $this->executerRequete($sql,array($idPraticien,$idVisiteur,$dateRapport,$bilan,$motif));}
       catch (Exception $e) {
       throw $e;}
        
    }



}

<?php

require_once 'Framework/Modele.php';

// Services métier liés aux compte rendus 
class Rapport extends Modele {

   //requête sql ajoutant un nouveau compte rendu
    private $sqlCompteRendu = "INSERT INTO rapport_visite VALUES('',?,?,?,?,?)";
    private  $sqlGetRapports = "SELECT * FROM rapport_visite R JOIN praticien P ON R.id_praticien = P.id_praticien WHERE id_visiteur=?";
    private $sqlDelRapport = "DELETE FROM rapport_visite where id_rapport=?";
// ajoute le compte rendu avec les valeurs données dans le formulaire
    public function addRapport($idPraticien,$idVisiteur,$dateRapport,$bilan,$motif) {
        $sql = $this->sqlCompteRendu;
        try{
        $this->executerRequete($sql,array($idPraticien,$idVisiteur,$dateRapport,$bilan,$motif));}
       catch (Exception $e) {
       throw new Exception("L'ajout a echoué");}
        
    }
    public function getRapports($idVisiteur) {
        $sql = $this->sqlGetRapports;
        $rapports = $this->executerRequete($sql, array($idVisiteur));
        
            return $rapports; 
     
        
    }
public function deleteRapport($idRapport) {
        $sql = $this->sqlDelRapport;
         try{
        $this->executerRequete($sql,array($idRapport));}
       catch (Exception $e) {
       throw new Exception("Le rappot n'a pas pu être supprimé");}
        
    }


}

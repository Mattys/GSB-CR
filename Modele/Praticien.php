<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class Praticien extends Modele {

    // Morceau de requête SQL incluant les champs de la table praticien
    private $sqlPraticien = 'select id_praticien as idPraticien, nom_praticien As nom, prenom_praticien as prenom, ville_praticien as ville,adresse_praticien as adresse, cp_praticien as cp, coef_notoriete, lib_type_praticien as type from PRATICIEN P join TYPE_PRATICIEN T on P.id_type_praticien=T.id_type_praticien';
    
    // Renvoie la liste des praticiens
    public function getPraticiens($idType=null,$nom=null,$ville=null) {
        
       // if(isset($idType))
            $sql = $this->sqlPraticien . ' where P.id_type_praticien=?  AND nom_praticien LIKE ? AND ville_praticien LIKE ?';
        
  $sql = $this->sqlPraticien . ' order by nom_praticien';
        $praticiens = $this->executerRequete($sql,array( "%$idType%", "%$nom%", "%$ville%"));
        return $praticiens;
    }

    
    public function getPraticiensByType($typePraticien)
    {$sql = $this->sqlPraticien . ' where P.id_type_praticien=?';
        $praticiens = $this->executerRequete($sql, array($typePraticien));
        return $praticiens;}
            
       // Renvoie un praticien à partir de son identifiant     
    public function getPraticien($idPraticien) {
        $sql = $this->sqlPraticien . ' where id_praticien=?';
        $praticien = $this->executerRequete($sql, array($idPraticien));
        if ($praticien->rowCount() == 1)
            return $praticien->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");
    }

}

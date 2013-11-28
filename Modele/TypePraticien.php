<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class TypePraticien extends Modele {

    // Morceau de requête SQL incluant les champs de la table praticien
    private $sqlTypePraticien = 'select id_type_praticien as id,lib_type_praticien as lib from type_praticien';

    // Renvoie la liste des praticiens
    public function getTypePraticiens() {
        $sql = $this->sqlTypePraticien . ' order by lib';
        $typePraticiens = $this->executerRequete($sql);
        return $typePraticiens;
    }



}

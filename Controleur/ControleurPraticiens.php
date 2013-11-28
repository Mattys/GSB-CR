<?php
require_once 'Controleur/ControleurSecurise.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/TypePraticien.php';


// Contrôleur des actions liées aux praticiens
class ControleurPraticiens extends ControleurSecurise {

    // Objet modèle Médicament
    private $praticien;
    private $typePraticien;

    public function __construct() {
        $this->praticien = new Praticien();
        $this->typePraticien = new TypePraticien();
    }

    // Affiche la liste des praticiens
    public function index() {
        if ($this->requete->existeParametre("idType"))
        $idType=$this->requete->getParametre("idType");
        if ($this->requete->existeParametre("nom"))
        $nom=$this->requete->getParametre("nom");
        if ($this->requete->existeParametre("ville"))
        $ville=$this->requete->getParametre("ville");
        $praticiens = $this->praticien->getPraticiens($idType,$nom,$ville);
        $this->genererVue(array('praticiens' => $praticiens));
    }

    // Affiche les informations détaillées sur un praticien
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }

    // Affiche l'interface de recherche de praticien
    public function recherche() {
        $praticiens = $this->praticien->getPraticiens();
        $typePraticiens = $this->typePraticien->getTypePraticiens();
        $this->genererVue(array('praticiens' => $praticiens,'typePraticiens'=>$typePraticiens));
       
    }

    // Affiche le résultat de la recherche de praticien
    public function resultat() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
       public function resultats() {
           if ($this->requete->existeParametre("id")) {
            $idType = $this->requete->getParametre("id");
           $praticiens = $this->praticien->getPraticiensByType($idType);}
         else
            throw new Exception("Action impossible : aucun type défini");
        $this->genererVue(array('praticiens' => $praticiens));
    }
    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticien->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }

}
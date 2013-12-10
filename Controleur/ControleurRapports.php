<?php
require_once 'Controleur/ControleurSecurise.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/Rapport.php';


// Contrôleur des actions liées aux rapports de visite
class ControleurRapports extends ControleurSecurise {

    
    private $praticien;
    // Objet modèle Rapport
    private $rapport;

    public function __construct() {
        $this->praticien = new Praticien();
        $this->rapport = new Rapport();
    }

    // Affiche la liste des praticiens
    public function index() {
        $idVisiteur = $this->requete->getSession()->getAttribut('idVisiteur');
        $rapports = $this->rapport->getRapports($idVisiteur);
       
        $this->genererVue(array('rapports' => $rapports),"index");
    }
    public function indexajout() {
        $praticiens= $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens'=>$praticiens),"ajout");
    }
public function ajout() {
    $idVisiteur = $this->requete->getSession()->getAttribut('idVisiteur');
        $idPraticien = $this->requete->getParametre("idPraticien");
        $date = $this->requete->getParametre("date");
        $motif = $this->requete->getParametre("motif");
        $bilan = $this->requete->getParametre("bilan");
        
        $this->rapport->addRapport($idPraticien,$idVisiteur, $date,$bilan,$motif);
        $message="L'ajout a bien été effectué";
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->genererVue(array("message"=>$message));
}
  public function modification()
  {
       $idRapport = $this->requete->getParametre('id');
        try{
        $modification=$this->rapport->getRapport($idRapport);
        
        $this->genererVue(array("modification"=>$modification));
        }catch (Exception $e) {
       throw $e;}
  }
  public function modifier(){
      $idRapport = $this->requete->getParametre('id');
       $motif = $this->requete->getParametre('motif');
        $bilan = $this->requete->getParametre('bilan');
        
        try{
        $this->rapport->updateRapport($idRapport,$motif,$bilan);
        }catch (Exception $e) {
       throw $e;}
        $message=$motif.' '.$bilan;
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->genererVue(array("message"=>$message),'modification');

  }
    public function supprimer() {
      $idRapport = $this->requete->getParametre('id');
        try{
        $this->rapport->deleteRapport($idRapport);
        $this->index();
        }
        catch (Exception $e) {
       throw $e;}
    }
}
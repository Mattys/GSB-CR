<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Recherche d'un praticien</h2>
    <div class="well">
        

            <ul class="nav nav-tabs">
                <li class="active"><a href="#simple" data-toggle="tab" >Simple</a></li>
                <li><a href="#avancee" data-toggle="tab">Avancée</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="simple"><form class="form-horizontal" method="post" action="praticiens/resultat" role="form"><div class="form-group"><label class="col-sm-3 col-sm-offset-2 control-label">
                                    Nom/Prénom
                                </label><div class="col-sm-5 col-md-4"> <select class="form-control" name="id">
                            <?php foreach ($praticiens as $praticien) : ?>
                                <option value="<?= $this->nettoyer($praticien['idPraticien']) ?>"><?= $this->nettoyer($praticien['nom']) . " " . $this->nettoyer($praticien['prenom']) ?></option>
                            <?php endforeach; ?>
                        </select></div></div><div class="form-group"><div class="col-sm-3 col-sm-offset-5"><button class="btn btn-default btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span>
                                        Rechercher
                                    </button></div></div></form></div>
               
                        
                    
                <div id="avancee" class="tab-pane"><form class="form-horizontal" method="post" action="praticiens/resultats" role="form"><div class="form-group"><label class="col-sm-3 col-sm-offset-2 control-label">
                                    Nom
                                </label><div class="col-sm-5 col-md-4"><input class="form-control" type="text" autofocus="" name="nom"></input></div></div><div class="form-group"><label class="col-sm-3 col-sm-offset-2 control-label">
                                    Ville
                                </label><div class="col-sm-5 col-md-4"><input class="form-control" type="text" name="ville"></input></div></div><div class="form-group"><label class="col-sm-3 col-sm-offset-2 control-label">
                                    Type
                                </label><div class="col-sm-5 col-md-4"><select class="form-control" name="id">
                            <?php foreach ($typePraticiens as $typePraticien) : ?>
                                <option value="<?= $this->nettoyer($typePraticien['id']) ?>"><?= $this->nettoyer($typePraticien['lib']) ?></option>
                            <?php endforeach; ?>
                        </select></div></div><div class="form-group"><div class="col-sm-3 col-sm-offset-5"><button class="btn btn-default btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span>
                                        Rechercher
                                    </button></div></div></form></div></div></div>



            
        
    </div>



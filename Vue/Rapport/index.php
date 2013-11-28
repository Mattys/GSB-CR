<?php $this->titre = "CompteRendus"; ?>

<?php
$menuRapport = true;
require 'Vue/_Commun/navigation.php';

?>
<div class="container">

    <h2 class="text-center">

        Nouveau compte-rendu de visite

    </h2>
    <div class="well">
        <form class="form-horizontal" method="post" action="rapport/ajout" role="form">
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">

                    Praticien

                </label>
                <div class="col-sm-5 col-md-4">
                    <select class="form-control" name="idPraticien"> <?php foreach ($praticiens as $praticien) : ?>
                                <option value="<?= $this->nettoyer($praticien['idPraticien']) ?>"><?= $this->nettoyer($praticien['nom']) . " " . $this->nettoyer($praticien['prenom']) ?></option>
                            <?php endforeach; ?> </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">
                    Date
                </label>
                <div class="col-sm-5 col-md-4">
                    <input class="form-control" type="date" value='<?php echo date("Y-m-d") ?>' name="date"></input>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">
                    Motif
                </label>
                <div class="col-sm-5 col-md-4">
                    <textarea class="form-control" required="" rows="2" name="motif"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">
                    Bilan
                </label>
                <div class="col-sm-5 col-md-4">
                    <textarea class="form-control" required="" rows="4" name="bilan"></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-5">
                    <button class="btn btn-default btn-primary" type="submit">
                        <span class="glyphicon glyphicon-plus"></span>
                         Ajouter
                    </button>
                </div>
            </div>
            
        </form>
    </div>

</div>
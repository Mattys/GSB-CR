<?php $this->titre = "CompteRendus"; ?>

<?php
$menuRapport = true;
require 'Vue/_Commun/navigation.php';

?>
<?php if (isset($message)) { ?>
<div class="container">

    <div class="alert alert-success">


                Le compte-rendu a été modifié avec succès.

    </div>

</div>
<?php } else { ?>
<div class="container">

    <h2 class="text-center">

        Modification d'un compte-rendu de visite

    </h2>
    <div class="well">
        <form class="form-horizontal" method="post" action="rapports/modifier" role="form">
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">

                    Praticien

                </label>
                <div class="col-sm-5 col-md-4">
                   <label class="col-sm-3 col-sm-offset-2 control-label">
    <?= $this->nettoyer($modification['nom']) . " " . $this->nettoyer($modification['prenom']) ?>
                              </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">
                    Date
                </label>
                <div class="col-sm-5 col-md-4">
                    <label class="col-sm-3 col-sm-offset-2 control-label"><?= $this->nettoyer($modification['date'])?></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">
                    Motif
                </label>
                <div class="col-sm-5 col-md-4">
                    <textarea class="form-control" required="" rows="2" name="motif"><?= $this->nettoyer($modification['motif'])?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">
                    Bilan
                </label>
                <div class="col-sm-5 col-md-4">
                    <textarea class="form-control" required="" rows="4" name="bilan"><?= $this->nettoyer($modification['bilan'])?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-5">
                    <button class="btn btn-default btn-primary" type="submit">
                        <span class="glyphicon glyphicon-plus"></span>
                         Modifier
                    </button>
                </div>
            </div>
            
        </form>
    </div>

</div>
<?php }?>

<?php $this->titre = "CompteRendus"; ?>

<?php
$menuRapport = true;
require 'Vue/_Commun/navigation.php';

?>
<div class="container">
    
    <h2 class="text-center">Liste de vos compte-rendus de visite</h2>
    <?php if ($rapports->rowCount() >= 1) {?>
    <div class="table-responsive">
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Date </th>
                    <th>Praticien</th>
                    <th>Ville</th>
                    <th>Motif</th>
                </tr>
            </thead>
            <?php foreach ($rapports as $rapport): ?>
                <tr>
                    <td><?= $this->nettoyer($rapport['date_rapport']) ?></a></td>
                    <td><?= $this->nettoyer($rapport['nom_praticien']). ' '.$this->nettoyer($rapport['prenom_praticien']) ?></td><td><?= $this->nettoyer($rapport['ville_praticien']) ?></td><td><?= $this->nettoyer($rapport['motif']) ?></td><td>

    <a class="btn btn-info" title="Modifier" href="rapports/modification/<?= $this->nettoyer($rapport['id_rapport']) ?>">
        <span class="glyphicon glyphicon-edit"></span>
    </a>
    <button class="btn btn-danger" data-target="#dlgConfirmation<?= $this->nettoyer($rapport['id_rapport']) ?>" data-toggle="modal" title="Supprimer" type="button">
        <span class="glyphicon glyphicon-remove"></span>
    </button>
    <!--

     Dialogue modal de confirmation de suppression 

    -->
    <!--

     Doit être numéroté pour être associé à chaque CR 

    -->
    <form id="dlgConfirmation<?= $this->nettoyer($rapport['id_rapport']) ?>" method="post" action="rapports/supprimer" class="modal fade" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" aria-hidden="true" data-dismiss="modal" type="button">

                        ×

                    </button>
                    
                    <h4 id="myModalLabel" class="modal-title">

                        Demande de confirmation

                    </h4>
                </div>
                <div class="modal-body">


                                                                Vouez vous vraiment supprimer ce compte-rendu ?

                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">

                        Annuler

                    </button>
                    
                    <a class="btn btn-danger" href="rapports/supprimer/<?= $this->nettoyer($rapport['id_rapport']) ?>">

                        Supprimer

                    </a>
                </div>
            </div>
            <!--

             /.modal-content 

            --> 
        </div>
        <!--

         /.modal-dialog 

        --> 
    </form>
    <!--

     /.modal 

    --> 

</td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div> 
        <?php } else { ?>
    <div class="alert alert-info">


                Vous n'avez saisi aucun compte-rendu de visite.

</div>
        <?php } ?>
</div>
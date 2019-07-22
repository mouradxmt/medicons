<?=flash('EtatPostEditCons')?>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
            <th>Service</th>
            <th>Etat</th>
            <th>Date de consultation</th>
            <th>Médecin</th>
            <th style="width:20%">Journal Clinique</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php 
                
                    foreach($data['consul'] as $id => $Consultation) {
                ?>

        <tr>
            <td class="text-center"><?=$Consultation->numeroConsultation?></td>
            <td><?=$Consultation->nomPatient?></td>
            <td><?=$Consultation->prenomPatient?></td>
            <td><?php sexeIco($Consultation->sexePatient); ?></td>
            <td><?=$Consultation->dateNaissancePatient?></td>
            <td><?=$Consultation->nomService?></td>
            <td><?=$Consultation->etatConsultation?></td>
            <td><?=$Consultation->dateConsultation?></td>
            <td><?=$Consultation->nomMedecin." ".$Consultation->prenomMedecin." <i>( ".$Consultation->nomService." )</i>"?>
            </td>
            <td style="display:block;max-height:200px; overflow:auto;">
                <?=$Consultation->journalCliniqueConsultation?>
            </td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm"
                    onClick="editCons(<?=$Consultation->numeroConsultation?>)">
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm"
                    onClick="deleteCons(<?=$Consultation->numeroConsultation?>)">
                    <i class="fa fa-close"></i>
                </button>
            </td>

        </tr>
        <?php } ?>

    </tbody>
</table>
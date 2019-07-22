<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">Numero de consultation</th>
            <th>Service</th>
            <th>Etat</th>
            <th>Date de consultation</th>
            <th>Médecin</th>
            <th style="width:20%">Journal Clinique</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($data['consul'] as $id => $Consultation) :?>

        <tr>
            <td class="text-center"><?=$Consultation->numeroConsultation?></td>
            <td><?=$Consultation->nomService?></td>
            <td><?=$Consultation->etatConsultation?></td>
            <td><?=$Consultation->dateConsultation?></td>
            <td><?=$Consultation->nomMedecin." ".$Consultation->prenomMedecin." <i>( ".$Consultation->nomService." )</i>"?>
            </td>
            <td style="display:block;max-height:200px; overflow:auto;">
                <?=$Consultation->journalCliniqueConsultation?>
            </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>
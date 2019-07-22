<div class="up-form container-fluid">
    <form method="post" name="askConsult" action="<?=URLROOT?>/panels/askConsultAction/<?=$data['patient']->IP?>">
        <div class="form-group col-md-2">
            <label>Date de consultation</label>
            <input name="dateConsultation" class="form-control form-control-lg" type="date">
        </div>
        <div class="form-group col-md-3">
            <label for="inputMedecin">Medecin</label>
            <select name="codeMedecin" id="inputMedecin" class="form-control selectpicker" data-style="btn btn-link">
                <?php foreach($data['medecins'] as $medecin):?>
                <option value="<?=$medecin->codeMedecin?>">
                    <?=$medecin->nomMedecin." ".$medecin->prenomMedecin." ( ".$medecin->nomService." )"?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-lg btn-round btn-brand" type="submit">Envoyer</button>
        </div>
    </form>
</div>
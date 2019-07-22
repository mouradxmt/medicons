    <div  class="up-form container-fluid">
        <form method="post" name="editConsForm" action="<?=URLROOT?>/panels/editConsAction/<?=$data['consultation']->numeroConsultation?>">

            <div class="row">

                <div class='col-md-6'>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>ID</label>
                            <input name="numeroConsultation" class="form-control form-control-lg" type="text"
                                placeholder="ID" value="<?=$data['consultation']->numeroConsultation?>" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label>IP du Patient </label>
                            <input name="IP" class="form-control form-control-lg disabled" type="text"
                                placeholder="IP du Patient" value="<?=$data['consultation']->IP?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nom </label>
                            <input name="nomPatient" class="form-control form-control-lg" type="text"
                                placeholder="Nom" value="<?=$data['consultation']->nomPatient?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Prenom</label>
                            <input name="prenomPatient" class="form-control form-control-lg" type="text"
                                placeholder="Prenom" value="<?=$data['consultation']->prenomPatient?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Date de naissance </label>
                            <input name="dateNaissancePatient" class="form-control form-control-lg" type="date"
                                placeholder="Date de naissance" value="<?=$data['consultation']->dateNaissancePatient?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Adresse du patient</label>
                            <input name="adressePatient" class="form-control form-control-lg" type="text"
                                placeholder="Adresse du patient" value="<?=$data['consultation']->adressePatient?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Sexe </label>
                            <input name="sexePatient" class="form-control form-control-lg" type="text"
                                placeholder="Sexe" value="<?=$data['consultation']->sexePatient?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Medecin </label>
                            <input name="prenomMedecin" class="form-control form-control-lg" type="text"
                                placeholder="Medecin"
                                value="<?=$data['consultation']->nomMedecin." ".$data['consultation']->prenomMedecin?>" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Service</label>
                            <input name="nomService" class="form-control form-control-lg" type="text"
                                placeholder="Service" value="<?=$data['consultation']->nomService?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Etat de consultation </label>
                            <input name="etatConsultation" class="form-control form-control-lg" type="text"
                                placeholder="Etat" value="<?=$data['consultation']->etatConsultation?>"> <!--Should be a dropdown-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Date de consultation</label>
                            <input name="dateConsultation" class="form-control form-control-lg" type="date"
                                placeholder="Date de consultation" value="<?=$data['consultation']->dateConsultation?>">
                        </div>
                    </div>


                </div>
                <div class="form-group col-md-6">
                    <label>Journal clinique </label>
                    <textarea name="journalClinique" rows="20" class="form-control form-control-lg" type="text"
                        placeholder="Journal clinique"
                        value=""><?=$data['consultation']->journalCliniqueConsultation?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-lg btn-round btn-brand" type="submit">Envoyer</button>
                </div>
        </form>
    </div>
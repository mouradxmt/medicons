<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="module-page-title">
    <div class="container">
        <div class="row-page-title">
            <div class="page-title-captions">

                <h1 class="h5">
                    Informations personnelles
                </h1>
            </div>
            <div class="page-title-secondary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=URLROOT?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=URLROOT?>/panels/<?=$_SESSION['userType']?>">Mon panneau</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="module">
    <div class="container">
        <?=flash('ErrorProfileCreate')?>
        <h3>Bienvenue, veullez renseigner ces informations soigneusement!</h3><br>
        <form action="<?=URLROOT?>/panels/createProfile/" method="POST">

            <div class="form-group">
                <label for="nom"> Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="prenom"> Pr&eacute;nom :</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="prenom">
            </div>
            <div class="form-group">
                <label for="prenom"> Date de naissance :</label>
                <input type="date" name="dateNaissance" class="form-control" id="date">
            </div>
            <div class="form-group">
                <label for="sexe"> Sexe :</label>
                <select name="sexe" class="form-control">
                    <option value="F"> F&eacute;minin</option>
                    <option value="M"> Masculin</option>
                </select>
            </div>
            <div class="form-group-xl">
                <label for="adresse"> Adresse :</label>
                <textarea name="adresse" class="form-control" id="adresse" cols="25" rows="3"></textarea>
            </div>
            <?php if($_SESSION['userType']=='medecin'):?>
            <div class="form-group">
                <label for="codeService"> Service :</label>
                <select name="codeService" class="form-control">
                    <?php foreach($data['services'] as $service):?>
                    <option value="<?=$service->codeService?>"> <?=$service->nomService?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <?php endif;?>
            <button type="submit" class="btn btn-primary" onclick="confirmer()">Envoyer</button>
            <button type="reset" class="btn btn-secondary">Annuler</button>
        </form>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
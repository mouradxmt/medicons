<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="module-page-title">
    <div class="container">
        <div class="row-page-title">
            <div class="page-title-captions">

                <?php if($_SESSION['userType']=='medecin'):?>
                <h1 class="h5">
                    Consultations:
                    <small
                        class="text-muted"><?=$data['medecin']->nomMedecin.' '.$data['medecin']->prenomMedecin?></small>
                </h1>
                <?php 
                endif;
                if($_SESSION['userType']=='patient'):?>
                <h1 class="h5">
                    Ma plateforme:
                    <small
                        class="text-muted"><?=$data['patient']->nomPatient.' '.$data['patient']->prenomPatient?></small>
                </h1>
                <?php endif;?>
            </div>
            <div class="page-title-secondary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=URLROOT?>">Home</a></li>
                    <li class="breadcrumb-item"><a
                            href="<?=URLROOT?>/panels/<?=$_SESSION['userType']?>/<?=$data['params']?>"><?=$data['params']?></a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="module">
    <div class="container-fluid">
        <?php if($_SESSION['userType']=='patient'):?>
        <h3 class='text-center'>Bonjour Mr/Mme <?=$data['patient']->nomPatient.' '.$data['patient']->prenomPatient?>
        </h3>
                    <?php endif; if($_SESSION['userType']=='medecin'):?>
        <h3 class='text-center'>Bonjour Dr. <?=$data['medecin']->nomMedecin.' '.$data['medecin']->prenomMedecin?> </h3>
        <?php endif;?>
        <div class="row">
            <div class="col-md-2">
                <?php require APPROOT . '/views/inc/sidePanel.php'; ?>
            </div>
            <div class="col-md-10 " id="dynamicContent">
                <?=flash('EtatPostEditCons');?>
                <div class="alert alert-info">Bienvenue dans votre espace de gestion.</div>

            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
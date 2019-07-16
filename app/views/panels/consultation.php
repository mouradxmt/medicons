<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="module-page-title">
					<div class="container">
						<div class="row-page-title">
							<div class="page-title-captions">
                        
								<h1 class="h5">S'authentifier</h1>
							</div>
							<div class="page-title-secondary">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=URLROOT?>">Home</a></li>
								</ol>
							</div>
						</div>
					</div>
				</section>
				<section class="module">
					<div class="container-fluid">
          <h3 class='text-center'>Hola<?=$data['params']?></h3>
						<div class="row">
              <div class="col-md-2">
              <aside class="widget widget_categories" id="compte-page">
						<div class="special-heading">
							<h6>E-services</h6>
						</div>
						<ul>
							<li><a id="attScolarite" href="javascript:void(0)">Certificat de scolarité</a></li>
							<li><a id="photo" class="blink" href="javascript:void(0)">Photographie</a></li>
														<li><a id="ddeStage" href="javascript:void(0)">Demande de stage</a></li>
							<li><a id="cnvStage" href="javascript:void(0)">Convention de stage</a></li>
							<!--<li><a href="javascript:void(0)">Certificat de réussite</a></li>
							<li><a href="javascript:void(0)">Relevé de notes</a></li>-->
														<li><a href="docs/fiche_appr.docx">Fiche d'appréciation PFE</a></li>
							<li><a id="telechargement" href="javascript:void(0)">Cours,TD,TP</a></li>
							<li><a id="langueCoor" href="javascript:void(0)">Company program</a></li>
							<!--<li><a id="langueCoor" href="javascript:void(0)">Langue Corèene</a></li>
								<li><a id="orientation" href="javascript:void(0)">Fiche d’orientation</a></li>-->
							<li><a id="notesAVR" href="javascript:void(0)">Résultats</a></li>
						</ul>
					</aside>
              </div>
<div class = "col-md-10">
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
                        <th>Journal Clinique</th>
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
                        <td><?=$Consultation->nomMedecin." ".$Consultation->prenomMedecin." <i>( ".$Consultation->nomService." )</i>"?></td>
                        <td>
                         <?=$Consultation->journalCliniqueConsultation?>
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm">
                            <i class="fa fa-edit"></i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm">
                            <i class="fa fa-close"></i>
                          </button>
                        </td>

                      </tr>
                    <?php } ?>
                      
                    </tbody>
                  </table>
                  </div>
							</div>
					</div>
				</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>

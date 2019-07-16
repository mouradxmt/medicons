<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="module-page-title">
					<div class="container">
						<div class="row-page-title">
							<div class="page-title-captions">
                        
              <h1 class="h5">
            Consultations: 
            <small class="text-muted"><?=$data['medecin']->nomMedecin.' '.$data['medecin']->prenomMedecin?></small>
              </h1>
							</div>
							<div class="page-title-secondary">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=URLROOT?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?=URLROOT?>/panels/medecin/<?=$data['params']?>"><?=$data['params']?></a></li>
                  
								</ol>
							</div>
						</div>
					</div>
				</section>
				<section class="module">
					<div class="container-fluid">
          <h3 class='text-center'>Bonjour Dr. <?=$data['medecin']->nomMedecin.' '.$data['medecin']->prenomMedecin?> </h3>
						<div class="row">
              <div class="col-md-2">
              <?php require APPROOT . '/views/inc/sidePanelMed.php'; ?>
              </div>
<div class = "col-md-10 " id="dynamicContent">
          
                  </div>
							</div>
					</div>
				</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>

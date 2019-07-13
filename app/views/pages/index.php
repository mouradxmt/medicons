<?php require APPROOT . '/views/inc/header.php'; ?>

				<!-- Page Header-->
				<section class="module-slides">
					<ul class="slides-container">
						<li class="bg-dark bg-dark-30"><img src="<?=URLROOT?>/assets/images/consultationMedicalBG.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h1 class="h1 wow fadeInDown">MEDICONS <?=$_SESSION['userType']?> </h1>
										<h1 class="h1 m-b-20 wow fadeInDown" data-wow-delay="0.5s">Gestion de consultaion medicale</h1>
										<p class="m-b-40 wow fadeInDown" data-wow-delay="0.7s">Un systeme de gestion de consultation medicale.</p>
										<p><a class="btn btn-circle btn-lg btn-brand wow fadeInDown" data-wow-delay="0.9s" href="#">Commençons!</a></p>
									</div>
								</div>
							</div>
						</li>
						<li class="bg-light-30"><img src="<?=URLROOT?>/assets/images/consultationMedicalBG2.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
                    <h1 class="h1 wow fadeInDown">MEDICONS</h1>
										<h1 class="h1 m-b-20 wow fadeInDown" data-wow-delay="0.5s">Gestion de consultaion medicale</h1>
										<p class="m-b-40 wow fadeInDown" data-wow-delay="0.7s">Un systeme de gestion de consultation medicale.</p>
										<p><a class="btn btn-circle btn-lg btn-brand wow fadeInDown" data-wow-delay="0.9s" href="#">Commençons!</a></p>
									</div>
								</div>
							</div>
						</li>
						<li class="bg-dark bg-gradient"><img src="<?=URLROOT?>/assets/images/consultationMedicalBG.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
                    <h1 class="h1 wow fadeInDown">MEDICONS</h1>
										<h1 class="h1 m-b-20 wow fadeInDown" data-wow-delay="0.5s">Gestion de consultaion medicale</h1>
										<p class="m-b-40 wow fadeInDown" data-wow-delay="0.7s">Un systeme de gestion de consultation medicale.</p>
										<p><a class="btn btn-circle btn-lg btn-brand wow fadeInDown" data-wow-delay="0.9s" href="#">Commençons!</a></p>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<nav class="slides-navigation"><a class="next" href="#"><span class="arrows arrows-arrows-slim-right"></span></a><a class="prev" href="#"><span class="arrows arrows-arrows-slim-left"></span></a></nav>
				</section>
  <section class="module">
					
					<div class="container">
						<div class="row">
							<div class="col-md-8 m-auto">
								<div class="module-title text-center font-raleway">
									<h2>Compte utilisateur MEDICONS</h2>
									<p class="font-serif">Accéder aux pages internes.</p>
                </div>
                <div class="row">
  <div class="col-md-6">
      <div class="card">
          <div class="card-header row">
              <i class="fa fa-user-injured fa-3x"></i>
              <h4 >Vous êtes patient?</h4>
          </div>
          <div class="card-body">
                  Vous pouvez demander un <i>rendez-vous</i> par remplir le formulaire suivant, et consulter le medecin.
                    <div class="row">
                        <a class="btn btn-circle btn-brand" href="http://localhost/gestionconsultation/index.php?page=RV">
                        <i class="fa fa-list" aria-hidden="true"></i> Rendez-vous
                        </a> 
                        <a class="btn btn-circle btn-brand" href="http://localhost/gestionconsultation/index.php?page=consulter">
                        <i class="fa fa-search" aria-hidden="true"></i> Consulter
                        </a>
                    </div>
          </div>
      </div>
  </div>

  <div class="col-md-6">
      <div class="card">
          <div class="card-header row">
            <i class="fa fa-stethoscope fa-3x"></i>
            <h4>Vous êtes médecin?</h4>
          </div>
          <div class="card-body">
                  Vous pouvez consulter les patients.
                    <div>
                        <a href="http://localhost/gestionconsultation/index.php?page=consultations&amp;filter=Attente" class="btn btn-circle btn-brand">
                        <i class="fa fa-list" aria-hidden="true"></i> liste des rendez-vous en attente
                        </a>
                    </div>
          </div>
      </div>
  </div>
</div>



							</div>
						
</section>


<?php require APPROOT . '/views/inc/footer.php'; ?>

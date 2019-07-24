
			<footer class="footer">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-lg-3">
								<!-- Text widget-->
								<aside class="widget widget_text">
									<div class="textwidget">
										<p><img src="<?=SITELOGOLIGHT?>" width="100" alt=""></p>
										<p>MEDICONS est une plateforme de consultation médicale, realisé en premier lieu dans un stage d'initiation au CHU par des étudiants ingénieurs de ENSA - Fès en génie Informatique.</p>
									</div>
								</aside>
							</div>
							<div class="col-md-6 col-lg-3">
								<!-- Recent entries widget-->
								<aside class="widget widget_recent_entries">
									<div class="widget-title">
										<h5>Contact</h5>
									</div>
									E-mail : <a href="mailto:mtouaa.mourad@gmail.com">mtouaa.mourad@gmail.com</a> <br/>
										Phone : +212 659 01 81 66 <br/>
								</aside>
							</div>
							<div class="col-md-6 col-lg-3">
								<!-- Twitter widget-->
								<aside class="widget">
									<div class="widget-title">
										<h5>Equipe de développement</h5>
									</div>
									MTOUAA Mourad<br/>
									RAMDANI Chaimae<br/>
									ASSAL Siham<br/>
								</aside>
							</div>
							<div class="col-md-6 col-lg-3">
								<!-- Tags widget-->
								<aside class="widget widget_tag_cloud">
									<div class="widget-title">
										<h5>Tags</h5>
									</div>
									<div class="tagcloud"><a href="#">Design</a><a href="#">Travel</a><a href="#">Startup</a><a href="#">Music</a><a href="#">Portfolio</a><a href="#">Responsive</a></div>
								</aside>
							</div>
						</div>
					</div>
					<div class="footer-copyright">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="text-center"><span class="copyright">© 2019 MEDICONS, Under GNU General Public License .</span></div>
								</div>
							</div>
						</div>
					</div>
				</footer>
				<!-- Footer end-->

				<a class="scroll-top" href="#top"><i class="fa fa-angle-up"></i></a>
			</div>
			<!-- Wrapper end-->

		</div>
		<!-- Layout end-->

		<!-- Off canvas-->
		<div class="off-canvas-sidebar">
			<div class="off-canvas-sidebar-wrapper">
				<div class="off-canvas-header"><a class="close-offcanvas" href="#"><span class="arrows arrows-arrows-remove"></span></a></div>
				<div class="off-canvas-content">
					<!-- Text widget-->
					<aside class="widget widget_text">
						<div class="textwidget">
							<p class="text-center"><img src="assets/images/logo-light.png" width="100" alt=""></p>
						</div>
					</aside>
					<!-- Text widget-->
					<aside class="widget widget_text">
						<div class="textwidget">
							<p class="text-center"><img src="assets/images/offcanvas.jpg" alt=""></p>
						</div>
					</aside>
					<!-- Navmenu widget-->
					<aside class="widget widget_nav_menu">
						<ul class="menu">
							<li class="menu-item menu-item-has-children"><a href="#">Home</a></li>
							<li class="menu-item"><a href="#">About Us</a></li>
							<li class="menu-item"><a href="#">Services</a></li>
							<li class="menu-item"><a href="#">Portfolio</a></li>
							<li class="menu-item"><a href="#">Blog</a></li>
							<li class="menu-item"><a href="#">Shortcodes</a></li>
						</ul>
					</aside>
					<ul class="social-icons">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-vk"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Off canvas end-->

    <!-- Scripts-->
    <script src="https://kit.fontawesome.com/b6068d93f2.js"></script>
		<script src="<?=URLROOT?>/assets/js/jquery-2.2.4.min.js"></script>
		<script src="<?=URLROOT?>/assets/js/popper.min.js"></script>
		<script src="<?=URLROOT?>/assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=URLROOT?>/assets/js/Chart.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA0rANX07hh6ASNKdBr4mZH0KZSqbHYc3Q"></script>
		<script src="<?=URLROOT?>/assets/js/plugins.min.js"></script>
		<script src="<?=URLROOT?>/assets/js/charts.js"></script>
		<script src="<?=URLROOT?>/assets/js/custom.min.js"></script>
		<script>
function editCons(id) {
    console.log(id)
    $('#dynamicContent').load('<?=URLROOT?>/panels/editCons/' + id);
}
function deleteCons(id) {
    console.log(id)
    $('#dynamicContent').load('<?=URLROOT?>/panels/deleteCons/' + id);
}
$('#consultationsMe').on('click', function(e) {
    e.preventDefault();
    $('#dynamicContent').load('<?=URLROOT?>/panels/consultations');
});
$('#profile').on('click', function(e) {
    e.preventDefault();
    $('#dynamicContent').load('<?=URLROOT?>/panels/profile');
});
$('#consultationsMeAtt').on('click', function(e) {
    e.preventDefault();
    $('#dynamicContent').load('<?=URLROOT?>/panels/consultations/only/Attente');
});
$('#consultationsAll').on('click', function(e) {
    e.preventDefault();
    $('#dynamicContent').load('<?=URLROOT?>/panels/consultations/all');
});
$('#consultationsAllAtt').on('click', function(e) {
    e.preventDefault();
    $('#dynamicContent').load('<?=URLROOT?>/panels/consultations/all/Attente');
});
$('#askConsult').on('click', function(e) {
    e.preventDefault();
    $('#dynamicContent').load('<?=URLROOT?>/panels/askConsult');
});
$('#mesConsultations').on('click', function(e) {
    e.preventDefault();
    $('#dynamicContent').load('<?=URLROOT?>/panels/mesConsultations');
});
</script>
	</body>

</html>
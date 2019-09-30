<footer class="footer-widget">
	<div class="container">
		<div class="row row-eq-height">
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="footer-title">
					<h2>Tentang Kami</h2>
				</div>
				<div class="footer-info">
					<p>Planet GPS Jogja. Merupakan  Peusahaan GPS Tracker Jogja yang berdiri sejak tahun 2010 hingga saat ini. 
					kami telah eksis memenuhi kubutuhan pemasangan GPS</p>
				
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4" >
				<div class="footer-title">
					<h2>FOLLOW US</h2>
				</div>
				<div class="sosmet">
					<ul>
					  <li><a href="#" data-original-title="Facebook"><i class="fab fa-facebook"></i></a></li>
					  <li><a href="#" data-original-title="Twitter"><i class="fab fa-twitter"></i></a></li>
					  <li><a href="#" data-original-title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
					  <li><a href="#" data-original-title="instagram"><i class="fab fa-instagram"></i></a></li>
					  <li><a href="#" data-original-title="Youtube"><i class="fab fa-youtube"></i></a></li>
					  <li><a href="#" data-original-title="Pinterest"><i class="fab fa-pinterest"></i></a></li>
					  <li><a href="#" data-original-title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
					  <li><a href="#" data-original-title="Google-Plus"><i class="fab fa-google-plus"></i></a></li>
					  <li><a href="#" data-original-title="skype"><i class="fab fa-skype"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="footer-title">
					<h2>CONTACT US</h2>
				</div>
				<div class="contact-footer">
					<ul class="call list-unstyled">
						<li><i class="fas fa-home"></i> Planet GPS Jogja </li>
						<li><i class="fas fa-map-marker"></i> <?= $this->site->company_address() ?> </li>
						<li><i class="fas fa-phone-square"></i></i>  <?= $this->site->company_phone() ?> </li>
					 <!--	<li><i class="far fa-envelope"></i> <?= $this->site->company_email() ?></li> -->
					</ul>
				</div>
			</div>
			
		</div>
		<div class="copyright-section text-center">
			<p style="color:#fff;" >Development by AWP Dev</p>
		</div>
	</div>
</footer>
<!--	<?= htmlspecialchars_decode(html_entity_decode($this->site->footer())) ?>   | <?= $this->copyright()?> -->

<style>
			.tabto-us {
				position: fixed;
				bottom: 0;
				height: 80px;
				/* line-height: 80px; */
				background: #20de24;
				right:0;
				left:0;
				padding-top:5px;
				background-color: #449d44;
				border-color: #398439;
				color:#fff;
				-webkit-box-shadow: 2px -2px 14px -2px rgba(0,0,0,0.75);
				-moz-box-shadow: 2px -2px 14px -2px rgba(0,0,0,0.75);
				box-shadow: 2px -2px 14px -2px rgba(0,0,0,0.75);
			}
			.click-call .fa ,.click-call .fab  , click-call .fas {
				font-size: 50px;
			}
			.click-call {
				display: grid;
			}
			.click-call i, fab.fa-mobile {
					font-size: 54px;
			}
				span.call-type {
				font-size: 18px;
			}
		</style>

		<div class="tabto-us hidden-lg hidden-md">
			<div class="leyer-tab">
			<div class="container">
				<div class="row">
					<div class="col-xs-4 text-center">
						<a href="tel:<?= $this->site->wa(); ?>" class="click-call">
							<i class="fa fa-phone-square" aria-hidden="true"></i>
							<span class="call-type" >Call</span>
						</a>
					</div>
					<div class="col-xs-4 text-center">
						<a href="https://api.whatsapp.com/send?phone=<?= $this->site->wa() ?>&amp;text=Hallo Planet GPS" class="click-call">
							<i class="fab fa-whatsapp"></i>
							<span class="call-type" >WA</span>
						</a>
					</div>
					<div class="col-xs-4 text-center">
						<a href="https://goo.gl/maps/f1MEZFgcftAcgsVS8" class="click-call">
							<i class="fas fa-map-marker-alt "></i>
							<span class="call-type" >Petunjuk Arah</span>
						</a>
					</div>
				</div>
			</div>
			</div>
		</div>
		












<?php
	$js=array(
			"assets/js/jquery-1.10.1.min.js",
			"assets/js/bootstrap.min.js",
			"assets/js/owl.carousel.min.js",
			"assets/js/lightgallery.min.js",
			"assets/js/lg-fullscreen.min.js",
			"assets/js/lg-thumbnail.min.js",
			"assets/js/lg-video.min.js",
			"assets/js/lg-autoplay.min.js",
			"assets/js/lg-hash.min.js",
			"assets/js/lg-pager.min.js",
			"assets/js/jquery.mousewheel.min.js",
			"assets/js/viewportchecker.js",
			/* "assets/js/aos.js", */
			"assets/js/script.js"
		);
		
		$loadJS='';		
		foreach($js as $i=>$v){
			$this->load_js($this->themeURL().$v);
		}

?>		
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131228169-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-131228169-1');
	</script>

	</body>
</html>
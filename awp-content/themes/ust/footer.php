  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><?= strDecode($this->site->company_name()) ?></h2>
                </div>

                <p><?= $this->site->company_deskripsi() ?></p>
                <div class="footer-icons">
                  <ul>
						<?php
							foreach($this->site->social_media() as $socialID => $socialUrl){
									
									if(!empty($socialUrl)){
										$socialIcon	= str_replace('_','-',$socialID);
										$socialTitle = ucwords(str_replace('_',' ',$socialID));
										echo '											
											<li>
												<a href="'.$socialUrl.'" target="_blak" class="'.$socialIcon.'" title="'.$socialTitle.'" rel="tooltip" data-placement="bottom"><i class="fa fa-'.$socialIcon.'"></i></a>
											</li>

											';
											
									}
								}
						?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4>
                <p>
                  please contact us if you find any difficulties
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> <?= $this->site->company_phone() ?></p>
                  <p><span>Email:</span> <?= $this->site->company_email() ?></p>
                  <p><span>Working Hours:</span> 07.30am-16.30pm</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="https://www.instagram.com/humasust/"><img src="img/on/a.jpg" alt=""></a>
                  <a href="https://www.instagram.com/humasust/"><img src="img/on/b.jpg" alt=""></a>
                  <a href="https://www.instagram.com/humasust/"><img src="img/on/c.jpg" alt=""></a>
                  <a href="https://www.instagram.com/humasust/"><img src="img/on/d.jpg" alt=""></a>
                  <a href="https://www.instagram.com/humasust/"><img src="img/on/e.jpg" alt=""></a>
                  <a href="https://www.instagram.com/humasust/"><img src="img/on/f.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>CNX</strong>. AWP develop
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              De
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
	<!--	<?= htmlspecialchars_decode(html_entity_decode($this->site->footer())) ?>   | <?= $this->copyright()?> -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <?php
	$js=array(
			"lib/jquery/jquery.min.js",
			"lib/bootstrap/js/bootstrap.min.js",
			"lib/owlcarousel/owl.carousel.min.js",
			"lib/venobox/venobox.min.js",
			"lib/knob/jquery.knob.js",
			"lib/wow/wow.min.js",
			"lib/parallax/parallax.js",
			"lib/easing/easing.min.js",
			"lib/nivo-slider/js/jquery.nivo.slider.js",
			"lib/appear/jquery.appear.js",
			"lib/isotope/isotope.pkgd.min.js",
			"contactform/contactform.js",
			"js/main.js"
		);
		
		$loadJS='';		
		foreach($js as $i=>$v){
			$this->load_js($this->themeURL().$v);
		}

?>
</body>

</html>
<!doctype html>
<html lang="en">
<head>
	<?=$this->head();?>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">
	<?php 
		$loadCSS=array(
		"lib/bootstrap/css/bootstrap.min.css",
		"lib/nivo-slider/css/nivo-slider.css",
		"lib/owlcarousel/owl.carousel.css",
		"lib/owlcarousel/owl.transitions.css",
		"lib/font-awesome/css/font-awesome.min.css",
		"lib/animate/animate.min.css",
		"lib/venobox/venobox.css",
		"css/nivo-slider-theme.css",
		"css/style.css",
		"css/responsive.css",
		
		);
		
		foreach($loadCSS as $k=>$v){
			$this->load_css($this->themeURL().$v);
		}
	?>
</head>
<body data-spy="scroll" data-target="#navbar-example">
  <div id="preloader"></div>
  
    <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><?= strDecode($this->site->company_name()) ?></h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
				</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
				<?=$this->getMenu('top', 'nav navbar-nav navbar-right')?>
                
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->
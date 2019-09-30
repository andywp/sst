<!DOCTYPE html>
<html lang="en">
	<head>
	<?=$this->head();?>
	<!--------------------------------------->
	<!-- autor :andy.wijang@gmail.com ------->
	
	<!--------------------------------------->
		<link rel="canonical" href="<?= $this->thisURL() ?>">
		<?php 
		$loadCSS=array(
		"assets/css/bootstrap.min.css",
		"assets/css/font-awesome/5/web-fonts-with-css/css/fontawesome-all.min.css",
		"assets/css/animate.css",
		"assets/css/owl.carousel.css",
		"assets/css/lightgallery.min.css",
		"assets/css/style.css"
		);
		
		foreach($loadCSS as $k=>$v){
			$this->load_css($this->themeURL().$v);
		}
		?>
		<meta name="google-site-verification" content="Nqh6QPBlaYI5-ffP1SkkeiQ9niGAIHfUbVr5tivJtSw" />
		<!--<link rel="stylesheet" href="assets/css/skin.red.css">-->
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
		<script type="application/Id+json">
		{
		  "@context": "http://schema.org",
		  "@type": "Organization",
		  "url": "<?= baseURL ?>",
		  "contactPoint": [
			{ "@type": "ContactPoint",
			  "telephone": "+6281804072882",
			  "contactType": "customer service"
			},{
				"@type": "ContactPoint",
				"telephone": "+6281804072882",
				"contactType": "customer service"
			  }
		  ]
		}

		</script>
		<?php
			$logo=uploadURL.'modules/siteconfig/thumbs/small/'.$this->site->logo();
		?>
		<script type="application/Id+json">
		{
		  "@context": "http://schema.org",
		  "@type": "Organization",
		  "url": "<?= baseURL ?>",
		  "logo": "<?= $logo ?>"
		}
	</script>
	</head>
	<body>
	<!-- Header 
	================================================== -->

	<header class="">
	<!-- Navigation
	================================================== -->
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
					<?php
					if($this->site->logo() != ''){
						echo '
							<div class="navbar-brand">
								<a href="'.baseURL.'"   class=""><img class="" alt="'.strDecode($this->site->company_name()).'" src="'.uploadURL.'modules/siteconfig/thumbs/small/'.$this->site->logo().'"></a>
							</div>';
					}else{
						echo'<a class="navbar-brand" href="'. baseURL.'"><strong>'.$this->site->title().'</strong></a>';
					}
					?>
				
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!--	<ul class="navbar-right navbar-nav text-right">
					<li>
						<form class="navbar-form" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="&#xf002" name="q">
							</div>
						</form>
					</li>
				</ul> -->
				<?=$this->getMenu('top', 'nav navbar-nav navbar-center')?>
			</div>
			<!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<!-- /.Navigation -->
		
	</header>
	<!-- /.Header -->	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
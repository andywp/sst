<?php if (!defined('basePath')) exit('No direct script access allowed');
$page=$this->db->getRow("select content_id,content_title,content_text,content_image from awp_pages_content where content_id=1");
$images=uploadURL.'modules/pages/thumbs/medium/'.$page['content_image'];

?>


<section class="about-us" >
	<div class="container">
	<!--	<div class="header-title">
		  <div class="layer-title" > 
			<span class="spacer"></span> -->
				<h1 class="widget-title text-center" >Jual GPS Mobil dan GPS Motor Jogja</h1>
	<!--		<span class="spacer"></span> 
		  </div>
		</div> -->
		<div class="content-gps">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="img-content">
						<div class="images-post">
							<div class="square ratio4_3">
								<div class="square-content">
									<div class="img-wrap default">
										<figure class="effect-bubba">
											<img src="<?= $images  ?>" class="img-responsive '.@$imgSize.'" alt="'.$post->url.'">
											<a href="'.$post->url.'"></a><figcaption><a href="#">
												<span class="icon-view">
													<i aria-hidden="true" class="fa fa-expand"></i>
													<span></span>
												</span>
											</a></figcaption>
										</figure>									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="content">
						<?= strDecode($page['content_text']); ?>
					</div>
				</div>
			</div>
		</div>
	
	</div>
</section>
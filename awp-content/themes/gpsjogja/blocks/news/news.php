<?php if (!defined('basePath')) exit('No direct script access allowed');
$imgSize='';
$categoryID=3;
$query= "SELECT post_id FROM ".$this->table_prefix."posts where post_category='".$categoryID."' and publish='1' order by post_id desc limit 10";
$dataNEws=$this->db->getAll($query);
/* adodb_pr($dataNEws); */
$html='';
foreach($dataNEws as $r){
	$post = $this->post->getRow($r['post_id']);
	list($width, $height) = @getimagesize(uploadPath.'modules/posts/'.$post->image);
	if($width > $height){
		$imgSize = 'landscape';
	}
	elseif($width < $height){
		$imgSize = 'potrait';
	}
	
	
	$html.='<div class="berita">
			<div class="row row-eq-height ">
				<div class="col-md-4 col-sm-4 col-cx-12">
					<div class="images-post">
						<div class="square ratio4_3">
							<div class="square-content">
								<div class="img-wrap default">
									<figure class="effect-bubba">
										<img src="'.$post->imageUrlLarge.'" class="img-responsive '.@$imgSize.'" alt="'.$post->url.'">
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
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="diskripsi-berita">
						<h3><a href="'.$post->url.'">'.$post->title.'</a></h3>
						<div class="text-diskripsi">
							'.$post->smallContent.'
						</div>
						<div class="link-detail">
							<a href="'.$post->url.'" class="btn btn-danger btn-sm" >Selengkapnya</a>
						</div>
					</div>
				</div>
			</div>
		</div>';
	
	
	
	
}







?>
<section class="news" data-aos="fade-up">
	<div class="container">
		<div class="header-title">
		  <div class="layer-title"> 
		<!--	<span class="spacer"></span>  -->
				<h2 class="widget-title  text-center">Artikel</h2>
		<!--	<span class="spacer"></span>  -->
		  </div>
		</div>
		
		<?= $html ?>
		
	</div>
</section>

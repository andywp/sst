<?php
$imgSize='';
/* adodb_pr($posts->data); */

$html_post='';
foreach($posts->data as $r){
	$post = $this->post->getRow($r[0]);
	list($width, $height) = @getimagesize(uploadPath.'modules/posts/'.$post->image);
	if($width > $height){
		$imgSize = 'landscape';
	}
	elseif($width < $height){
		$imgSize = 'potrait';
	}
	
	
	
	
	/* adodb_pr($post); */
	
	
	$html_post.='
		
		
		
		<div class="box-rental">
				<div class="media">
				  <div class="media-left pull-left">
					<div class="square ratio4_3">
					  <div class="square-content">
						<div class="img-wrap default">
						  <figure class="effect-bubba">
							<a href="'.$post->url.'"><img src="'.$post->imageUrlLarge.'" alt="'.$post->title.'" class="img-responsive"></a>
								<figcaption>
								  <span class="icon-view">
									<i aria-hidden="true" class="fa fa-expand"></i>
									<span></span>
								</span>
								</figcaption>
						  </figure>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="media-body">
					<h3 class="media-heading">'.$post->title.'</h3>
					<div class="diskripsi">
						<p>
							'.$post->smallContent.'
						</p>
					</div>
					<div class="to-detail">
						<a class="btn btn-default btn-more" href="'.$post->url.'">Selengkapnya</a>
					</div>
				  </div>
				</div>
			</div>
		
		
		';
}

?>
<div class="header-title">
  <div class="layer-title" >
	<!--  <span class="spacer"></span> -->
		<h1 class="widget-title text-center" ><?= $this->pageTitle() ?></h1>
	<!-- <span class="spacer"></span> -->
  </div>
</div>
<div class="post-thumbnail">
	<?= $html_post ?>
</div>
<div class="page-nav"><?=$this->data->getNav();?></div>
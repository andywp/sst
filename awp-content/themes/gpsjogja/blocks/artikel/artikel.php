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
	
	
	$html.='<div class="box-rental">
				<div class="media">
				  <div class="media-left pull-left">
					<div class="square ratio4_3">
					  <div class="square-content">
						<div class="img-wrap default">
						  <figure class="effect-bubba">
							<a href="'.$post->url.'" title="'.$post->title.'" ><img src="'.$post->imageUrlLarge.'" alt="'.$post->title.'" class="img-responsive"></a>
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
					<h3 class="media-heading"><a href="'.$post->url.'" title="'.$post->title.'" >'.$post->title.'</a></h3>
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
			</div>';
	
	
	
	
}
?>

<section class="artikel">
	<div class="container">
<!--		<div class="header-title">
		  <div class="layer-title" > 
			<span class="spacer"></span> -->
				<h2 class="widget-title text-center" >Tis & Trik Seputar GPS Mobil dan Motor</h2>
<!--			<span class="spacer"></span> 
		  </div>
		</div> -->
		<?= $html ?>
	</div>
</section>
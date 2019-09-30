<?php if (!defined('basePath')) exit('No direct script access allowed');

$shoPerPage = 12;
$query 		= "select link_title,link_image from ".$this->table_prefix."links where link_type='infografis' and publish='1' order by link_order";

$this->data->init($query,$shoPerPage);

$imageUrl	 = uploadURL.'modules/infografis/';
$thumbUrl	 = uploadURL.'modules/infografis/thumbs/medium/';
$galleryList = '';
$info 		 = '';

foreach($this->data->arrData() as $dataGallery){

	$getImg		= isFileExist(uploadPath.'modules/infografis/',$dataGallery['link_image'])?$imageUrl.$dataGallery['link_image']:uploadURL.'modules/infografis/default.jpg';
	$thumbImg	= isFileExist(uploadPath.'modules/infografis/thumbs/medium/',$dataGallery['link_image'])?$thumbUrl.$dataGallery['link_image']:'';
	$thumbImg	= !empty($thumbImg)?$thumbImg:$getImg;

	$info = $dataGallery['link_title'].'<span class=p_desc>'.str_replace('/','&#47;',str_replace('"','&quot;',$dataGallery['link_title'])).'</span>';

	list($width, $height) = @getimagesize(uploadPath.'modules/infografis/'.$dataGallery['link_image']);
	if($width > $height){
		$imgSize = 'landscape';
	}
	elseif($width < $height){
		$imgSize = 'potrait';
	}

	$galleryList .= '

		<div class="col-md-3" data-src="'.$imageUrl.$dataGallery['link_image'].'" data-sub-html="<h4>'.$dataGallery['link_title'].'</h4>">
			<div class="list-item">
				<figure class="effect-zoom">
					<div class="square">
						<div class="square-content">
							<div class="img-wrap default">
								<img src="'.$thumbImg.'" title="'.$dataGallery['link_title'].'" class="'.@$imgSize.'">
							</div>
						</div>
					</div>
				</figure>
				<h4>'.$dataGallery['link_title'].'</h4>
			</div>
		</div>
	';
}

$albumName  = $this->db->getOne("select name, name from ".$this->table_prefix."album where album_id='".intval($this->uri(2))."'");
?>

<div class="widget widget-default">
	<div class="container">
		<div class="widget-body">
			<div class="row row-eq-height light-gallery">
				<?php echo $galleryList?>
			</div>
			<div class="page-nav no-margin"><?=$this->data->getNav();?></div>
		</div>
	</div>
</div>

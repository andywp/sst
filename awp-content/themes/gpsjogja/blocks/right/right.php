<?php if (!defined('basePath')) exit('No direct script access allowed'); ?>
<div class="header-title">
  <div class="layer-title"> 
	<!-- <span class="spacer"></span> -->
		<h4 class="widget-title  text-center">Artikel</h4>
	<!-- <span class="spacer"></span> -->
  </div>
</div>
<?php 

$imgSize='';
$categoryID=3;
$query= "SELECT post_id FROM ".$this->table_prefix."posts where post_category='".$categoryID."' and publish='1' order by post_id desc limit 10";
$dataNEws=$this->db->getAll($query);
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
	
	$html.='<div class="media">
				<div class="media-left">
					<img src="'.$post->imageUrlMini.'" class="media-object '.$imgSize.' media-img" >
				</div>
				<div class="media-body">
					<h4 class="media-heading"><a href="'.$post->url.'">'.$post->title.'</a></h4>
					<p>'.$post->smallContent.'</p>
				</div>
			</div>';
			}

?>
<?= $html ?>
<?php if (!defined('basePath')) exit('No direct script access allowed');

$video	  = $this->db->getRow("select video_title,video_description,youtube_id from ".$this->table_prefix."video where video_id='".intval($this->uri(2))."'");

extract($video);

$shoPerPage = 6;
$query 		= "select video_id,video_title,youtube_id from ".$this->table_prefix."video where video_id<>'".intval($this->uri(2))."' and publish='1' order by video_id";
$videoList	= '';
$videoTitle = '';

$this->data->init($query,$shoPerPage);

foreach($this->data->arrData() as $dataVideo){

	$detailURL  = baseURL.'video/'.$dataVideo['video_id'].'/'.seo_slug($dataVideo['video_title']).$this->permalink();
	$videoTitle = empty($videoTitle)?$dataVideo['video_title']:$videoTitle;
	$videoList .= '

		<div class="col-lg-4 col-md-6 col-xs-12">
			<div class="thumb gallery-item">
				<img class="img-responsive" src="http://img.youtube.com/vi/'.$dataVideo['youtube_id'].'/0.jpg" />
				<div class="portfolio-item-content">
					<span class="header">'.@$dataVideo['video_title'].'</span>
				</div>
				<a href="'.$detailURL.'" title="'.@$dataVideo['video_title'].'"><i class="more">+</i></a>
			</div>
		</div>
	';
}
$videoList = '<div class="row">'.$videoList.'</div>';

if(isFileExist($this->themePath(),'video.detail.php')){
	include $this->themePath().'video.detail.php';
}
else{
	?>
	<iframe width="100%" height="420" src="//www.youtube.com/embed/<?=$youtube_id;?>" frameborder="0" allowfullscreen></iframe>
	<p><?=@$video_description;?></p>

	<div class="widget widget-default">
		<div class="big-title">
			<h1>Other <strong>Videos</strong></h1>
		</div>
		<div class="links gallery-list">
			<div class="row">
				<?php echo $videoList; ?>
			</div>
		</div>
		<div class="page-nav no-margin"><?=$this->data->getNav();?></div>
	</div>
	<?php
}
?>

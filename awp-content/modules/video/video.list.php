<?php if (!defined('basePath')) exit('No direct script access allowed');

$shoPerPage = 15;
$query 		= "select video_id,video_title,youtube_id from ".$this->table_prefix."video where publish='1' order by video_id desc";
$videoList	= '';

$this->data->init($query,$shoPerPage);
if(isFileExist($this->themePath(),'video.php')){
	include $this->themePath().'video.php';
}
else{
	foreach($this->data->arrData() as $dataVideo){

		$detailURL = baseURL.'video/'.$dataVideo['video_id'].'/'.seo_slug($dataVideo['video_title']).$this->permalink();
		$videoList .= '
			<div class="col-lg-6 col-md-6 col-xs-12">
				<div class="image-holder">
					<div class="view">
						<img class="img-responsive" src="http://img.youtube.com/vi/'.$dataVideo['youtube_id'].'/0.jpg" />
						<div class="mask"></div>
						<a href="'.$detailURL.'" title="'.@$dataVideo['video_title'].'" class="link"><i class="fa fa-play-circle-o"></i></a>
					</div>
				</div>
				<div class="video-list-title">
					<a href="'.$detailURL.'">'.@$dataVideo['video_title'].'</a>
				</div>
			</div>
		';
	}
	?>

	<div class="links video-list">
		<div class="row">
			<?php echo $videoList; ?>
		</div>
	</div>
	<div class="page-nav no-margin"><?php echo $this->data->getNav(); ?></div>
	<?php
}
?>	

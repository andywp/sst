<?php if (!defined('basePath')) exit('No direct script access allowed');

$sqlCond = '';
if($this->_GET('cat') && $this->_GET('cat')!='any'){
	$sqlCond .= " and section_id='".$this->_GET('cat')."' ";
}

$tablename = $this->table_prefix.'video';
$query		= "select video_id, section_id, video_title, youtube_id, video_description, created_date, publish from ".$this->table_prefix."video where 1".$sqlCond." order by video_id desc";

$data 		= array(

	'Video'			=> 'video_id.custom.getVideoThumb.align="left".width="120"',
	'Youtube ID'	=> 'youtube_id.text..style="text-align:left"',
	'Title'			=> 'video_title.text..style="text-align:left"',
	'Section' 	=> 'section_id.select.refTable:'.$this->table_prefix.'category where category_type=\'main\',category_name(category_id).width="150".',
	//'Description'	=> 'video_description.text..style="text-align:left"',
	'Publish' 		=> 'publish.switchcheck..width="60".align="center"',
	'Edit'  		=> 'id.edit.edit-video',
	'Delete'  		=> 'id.delete'
);
function getVideoThumb($data,$params){

	$videoId = $data['youtube_id'];
	$xml 	 = @simplexml_load_file('https://gdata.youtube.com/feeds/api/videos/'.$videoId.'?v=2');

	if($xml !== false){$video = getYoutubeVideo($videoId);}

	$watchUrl 	= $params['adminURL'].'watch-video/'.$data['video_id'].'/'.seo_slug(@$video->title).$params['permalink'].'?r='.base64_encode($params['thisURL']);
	$videoThumb = '<img src="http://img.youtube.com/vi/'.$data['youtube_id'].'/1.jpg" />';
	$videoThumb = '<div class="video-holder"><a href="'.$watchUrl.'">'.$videoThumb.'</a></div>';

	return $videoThumb;
}
function getVideoTitle($data,$params){

	$videoId = $data['youtube_id'];
	$video	 = getYoutubeVideo($youtubeID);

	if($video){
		$title = @$video->title;
	}
	else{
		$title = '-';
	}

	return $title;
}

$this->data->addSearch('video_title,youtube_id');
$this->data->init($query);

echo $this->data->getPage($tablename,'video_id',$data);
?>

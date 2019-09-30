<?php if (!defined('basePath')) exit('No direct script access allowed');

$tablename  = $this->table_prefix.'links';
$query		= 'select link_id,link_title,link_url,link_order,link_image,publish from '.$tablename.' where link_type=\'infografis\' order by link_order';

$data 		= array(

	'Image'		=> 'link_image.custom.getImage.align="left".width="80"',
	'Title' 	=> 'link_title.text..align="left"',
	'Order'		=> 'link_order.inputText..width="20".class="input-order"',
	'Active'	=> 'publish.switchcheck..width="60".align="center"',
	'Edit'		=> 'id.edit.'.$editUrl,
);

function getImage($data,$params){

	$image 	  = empty($data['link_image'])?'noimage.jpg':$data['link_image'];
	$imgUrl	  = uploadURL.'modules/infografis/thumbs/mini/'.$image;
	$getImage = '<div class="image-holder-small"><div class="square"><div class="square-content"><div class="img-wrap"><img src="'.$imgUrl.'"/></div></div></div></div>';

	return $getImage;
}

function getUrl($data,$params){

	$linkUrl = $data['link_url'];
	$getUrl  = '<a href="'.$linkUrl.'" target="_blank">'.$linkUrl.'</a>';

	return $getUrl;
}

$this->data->addSearch('link_title');
$this->data->removeImage('link_image','modules/infografis/');
$this->data->init($query,10,5);
$this->data->getPage($tablename,'link_id',$data);
?>

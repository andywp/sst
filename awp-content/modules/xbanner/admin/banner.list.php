<?php if (!defined('basePath')) exit('No direct script access allowed');

$banner_position = @$this->_GET('position');
$getPosition 	 = empty($banner_position)?'left-top':$banner_position;
$addUrl 		 = $this->adminUrl().'add-new-banner'.$this->permalink().'?position='.$getPosition.'&r='.base64_encode($this->thisUrl());
$tablename  = $this->table_prefix.'banner';
$query		= 'select * from '.$tablename.' where banner_position =\''.$getPosition.'\' order by banner_order';
$data 		= array(

	
	'Banner'	=> 'banner_image.custom.getImage.align="left".width="100"',
	'Title' 	=> 'banner_title.text..align="left"',
	'Order'		=> 'banner_order.inputText..width="20".class="input-order"',
	'Position'  => 'banner_position.select.addOption(left-top => Left top,left-middle => Left middle,left-bottom => Left bottom,right-top => Right top,right-middle => Right middle,right-bottom => Right bottom).width="40".width="40"',
	'Active'	=> 'publish.checkbox..width="60".align="center"',
	'Edit'		=> 'id.edit.edit-banner'
);

function getImage($data,$params){	
	
	$image 	  = empty($data['banner_image'])?'noimage.jpg':$data['banner_image'];
	$imgUrl	  = uploadURL.'modules/banner/thumbs/mini/'.$image;	
	$getImage = '<div class="image-holder"><img src="'.$imgUrl.'"/><span></span></div>';
	
	return $getImage;
}

$this->data->addSearch('banner_title');
$this->data->removeImage('banner_image','modules/banner/');
$this->data->init($query,10,5);
?>


<div class="widget-box data-table">
	<div class="widget-header header-color-blue">
		<h4 class="widget-title">Manage <?=$this->pageTitle()?></h4>
		<span class="widget-toolbar">
			<a href="<?=$addUrl?>" class="btn btn-xs btn-info"><i class="ace-icon fa fa-plus"></i> Add New</a>
		</span>
	</div>
	<?$this->data->getPage($tablename,'banner_id',$data);?>
</div>
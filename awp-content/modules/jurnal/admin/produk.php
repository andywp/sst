<?php if (!defined('basePath')) exit('No direct script access allowed'); 

$sqlCond = '';
if(@$this->_GET('k')!=''){
	//$keyword		= urldecode(htmlspecialchars(html_entity_decode(str_replace('+', ' ', @$this->_GET('namesku')))));
	$keyword		= htmlspecialchars(htmlentities(urldecode(str_replace('+', ' ', @$this->_GET('k'))), ENT_QUOTES));
	$array =  explode(' ', $keyword);
	$plodCond = '';
	foreach ($array as $keyplod){
		$plodCond .= "nama like '%".$keyplod."%' or ";
	}
	
	$sqlCond .= " and (".$plodCond."nama like '%".$keyword."%' )";
}


$addUrl = $this->adminUrl().'tambah-produk'.$this->permalink().'?r='.base64_encode($this->thisUrl());
$arrOPtion='';
$intrmenDB=$this->db->getAll("select category_id,category_name from ".$this->table_prefix."category where 1");
/* adodb_pr($intrmenDB); */
foreach($intrmenDB as $u){
	$arrOPtion.=$u[0].' => '.$u[1].' ,';
}
$arrOPtion=substr($arrOPtion,0,-1);


$tablename  = $this->table_prefix.'produk';
$query		= 'select * from '.$tablename.' where 1 order by produk_id DESC';
$data 		= array(
	'Image'		=> 'gambar_1.custom.getImage.align="left".width="100"',
	'nama' 		=> 'produk.text..align="left"',
	/* 'kategori'	=> 'category_id.select.addOption('.$arrOPtion.')', */
	/* 'Sold Out'	=> 'status.checkbox..width="80".align="center"', */
	'Publish'	=> 'active.checkbox..width="30".align="center"',
	'Edit'		=> 'id.edit.edit-produk',
	'Delete'	=> 'id.delete'
);
function getCat($data,$params){
    global $system;
     
    $cat = $system->db->getRow("select * from ".$system->table_prefix."category where category_id='".$data['category_id']."'");
    return $cat['category_name']; 
	return false;
}
function getImage($data,$params){	

	if(!empty($data['gambar_1'])){
		$image=$data['gambar_1'];
	}elseif(!empty($data['gambar_2'])){
		$image=$data['gambar_2'];
	}elseif(!empty($data['gambar_3'])){
		$image=$data['gambar_3'];
	}elseif(!empty($data['gambar_4'])){
		$image=$data['gambar_4'];
	}else{
		$image='noimage.jpg';
	}
	$imgUrl	  = uploadURL.'modules/produk/thumbs/mini/'.$image;	
	$getImage = '<div class="image-holder"><img src="'.$imgUrl.'"/><span></span></div>';
	
	return $getImage;
}


?>
<div class="box">
	<div class="box-header with-border">
		<div class="widget-header">
			<div class="widget-toolbar">
				<a href="<?=$addUrl?>" class="btn btn-sm btn-flat btn-info"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
	</div>
	<div class="box-body">
		<div class="widget-main">
		<?php
		$this->data->addSearch('produk');
		$this->data->init($query,10,5);
		$this->data->getPage($tablename,'produk_id',$data);
	
		?>
	</div>
</div>


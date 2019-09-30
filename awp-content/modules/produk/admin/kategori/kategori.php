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


$addUrl = $this->adminUrl().'tambah-kategori'.$this->permalink().'?r='.base64_encode($this->thisUrl());
$tablename  = $this->table_prefix.'category';
$query		= 'select category_id,category_name  from '.$tablename.' where category_type="produk" order by category_id DESC';
$data 		= array(
	'Type' 		=> 'category_name.text..align="left"',
	'Edit'		=> 'id.edit.edit-kategori',
	'Delete'	=> 'id.delete'
);




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
		$this->data->addSearch('category_name');
		$this->data->init($query,10,5);
		$this->data->getPage($tablename,'category_id',$data);
	
		?>
	</div>
</div>


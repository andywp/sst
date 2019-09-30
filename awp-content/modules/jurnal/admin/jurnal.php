<?php if (!defined('basePath')) exit('No direct script access allowed'); 

$addUrl = $this->adminUrl().'tambah-jurnal'.$this->permalink().'?r='.base64_encode($this->thisUrl());
//adodb_pr($this->admin());
$tablename  = $this->table_prefix.'jurnal';
if($this->admin() ==1 or $this->admin() ==2  ){
	$query		= 'select * from '.$tablename.' where 1 order by jurnal_id DESC';
}else{
	$query		= 'select * from '.$tablename.' where 1 and user_id="'.$this->admin('id').'" order by jurnal_id DESC';
		
}

$data 		= array(
	//'Image'		=> 'gambar_1.custom.getImage.align="left".width="100"',
	'nama' 		=> 'jurnal.text..align="left"',
	/* 'kategori'	=> 'category_id.select.addOption('.$arrOPtion.')', */
	/* 'Sold Out'	=> 'status.checkbox..width="80".align="center"', */
	'Publish'	=> 'publish.checkbox..width="30".align="center"',
	'Edit'		=> 'id.edit.jurnal-edit',
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
		$this->data->addSearch('jurnal');
		$this->data->init($query,10,5);
		$this->data->getPage($tablename,'jurnal_id',$data);
	
		?>
	</div>
</div>


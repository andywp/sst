<?php if (!defined('basePath')) exit('No direct script access allowed'); 
$addUrl = $this->adminUrl().'surat-config-add'.$this->permalink().'?r='.base64_encode($this->thisUrl());
//adodb_pr($this->admin());
$tablename  = $this->table_prefix.'surat';

$query		= 'select * from '.$tablename.' where 1 order by surat_id DESC';
$data 		= array(
	//'Image'		=> 'gambar_1.custom.getImage.align="left".width="100"',
	'Surat' 	=> 'judul.text..align="left"',
	//'Active'	=> 'active.checkbox..width="30".align="center"',
	'Edit'		=> 'id.edit.surat-config-edit',
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
		$this->data->addSearch('surat');
		$this->data->init($query,10,5);
		$this->data->getPage($tablename,'surat_id',$data);
	
		?>
	</div>
</div>


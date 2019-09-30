<?php if (!defined('basePath')) exit('No direct script access allowed'); 

$addUrl = $this->adminUrl().'mahasiswa-add'.$this->permalink().'?r='.base64_encode($this->thisUrl());
//adodb_pr($this->admin());
$tablename  = $this->table_prefix.'mhs';

	$query		= 'select * from '.$tablename.' where 1 order by mhs_id DESC';


$data 		= array(
	//'Image'		=> 'gambar_1.custom.getImage.align="left".width="100"',
	'nim' 		=> 'nim.text..align="left"',
	'nama' 		=> 'nama.text..align="left"',
	'telpon' 	=> 'telpon.text..align="left"',
	/* 'kategori'	=> 'category_id.select.addOption('.$arrOPtion.')', */
	/* 'Sold Out'	=> 'status.checkbox..width="80".align="center"', */
	'Active'	=> 'active.checkbox..width="30".align="center"',
	'Edit'		=> 'id.edit.mahasiswa-edit',
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
		$this->data->addSearch('nim');
		$this->data->init($query,10,5);
		$this->data->getPage($tablename,'mhs_id',$data);
	
		?>
	</div>
</div>


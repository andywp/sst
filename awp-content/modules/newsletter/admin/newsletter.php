<?php if (!defined('basePath')) exit('No direct script access allowed');
$parentID 		= !$this->uri(4)?0:intval($this->uri(4));
$parentID 		= @$this->uri(3)=='parent'?$parentID:0;
$addUrl 		= $this->adminUrl().'add-newsletter'.$this->permalink().'?r='.base64_encode($this->thisUrl());

$tablename  = $this->table_prefix.'newsletter';
$query		= 'select * from '.$tablename.' where 1 order by id';
$data 		= array(

	'Email' 	=> 'email.text..align="left"',
	'Active'	=> 'status.checkbox..width="60".align="center"',
	'Delete'	=> 'id.delete'
);

$this->data->addSearch('email');
$this->data->init($query,10,5);
?>

<div class="box">
	<div class="box-header with-border">
		<div class="widget-header">
			<div class="widget-toolbar">
				<a href="<?=$addUrl?>" class="btn btn-sm btn-flat btn-info"><i class="fa fa-plus"></i> Add Section</a>
			</div>
		</div>
	</div>
	<div class="box-body">
		<div class="widget-main">
			<?php $this->data->getPage($tablename,'id',$data); ?>
		</div>
	</div>
</div>

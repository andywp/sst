<?php if (!defined('basePath')) exit('No direct script access allowed');

/* Add/Edit URL */
$fURL   	= $this->site->isMultiLang()?'page_url_'.$this->active_lang():'page_url';
$addUrl		= $this->db->getOne("select ".$fURL." from ".$this->table_prefix."pages where page_switch='infografis_add' and parent_id='".$this->thisPageID()."'");
$addUrl	 	= $this->adminUrl().$addUrl.$this->permalink().'?r='.base64_encode($this->thisUrl());
$editUrl	= $this->db->getOne("select ".$fURL." from ".$this->table_prefix."pages where page_switch='infografis_edit' and parent_id='".$this->thisPageID()."'");
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
		<?include modulePath.$this->thisModule().'/admin/infografis.list.php';?>
		</div>
	</div>
</div>

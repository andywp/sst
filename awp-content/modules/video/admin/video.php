<?php if (!defined('basePath')) exit('No direct script access allowed');

/* Section */
$cat = $this->db->getAll("select category_id, category_name from ".$this->table_prefix."category where category_type='main' order by category_name");

$xCat = @$this->_GET('cat');
$setActive = empty($xCat)?'any':$xCat;

$filterCat = '<select name="cat" onchange="this.form.submit()" class="select2 form-control">';
$filterCat .= '<option value="any">All Section</option>';

foreach($cat as $vCat){
	
	$activeClass = $vCat['category_id'] == $setActive?' selected="true"':'';
	$filterCat.= '<option value="'.$vCat['category_id'].'"'.$activeClass.'>'.$vCat['category_name'].'</option>';
}
$filterCat .= '</select>';

$addUrl = $this->adminUrl().'add-video'.$this->permalink().'?r='.base64_encode($this->thisUrl());
?>

<div class="box">	
	<div class="box-header with-border">			
		<div class="widget-header">
			<form name="frm-filter" class="form-inline" method="get">
				<div class="form-group">
					<label>Filter</label>
					<?php echo $filterCat ?>
				</div>
			</form>
			<span class="widget-toolbar">
			<a href="<?php echo $addUrl?>" class="btn btn-sm btn-flat btn-info"><i class="ace-icon fa fa-plus"></i> Add New</a>
			</span>
		</div>					
	</div>
	<?include modulePath.$this->thisModule().'/admin/video.list.php';?>
</div>

<?php if (!defined('basePath')) exit('No direct script access allowed');

//Position
$banner_position = @$this->_GET('position');
$setPosition 	 = empty($banner_position)?'top':$banner_position;

$arrTabs  = array(

	'left-top'	 	 => 'Left top',
	'left-middle'	 => 'Left middle',
	'left-bottom'	 => 'Left bottom',
	'right-top'		 => 'Right top',
	'right-middle'	 => 'Right middle',
	'right-bottom'	 => 'Right bottom'
);

$tabNav	  = '<select name="position" onchange="this.form.submit()" class="chosen-select form-control">';

foreach($arrTabs as $tabID=>$tabVal){
	
	$activeClass = $tabID == $setPosition?' selected="true"':'';
	$tabNav .= '<option value="'.$tabID.'"'.$activeClass.'>'.$tabVal.'</option>';
}
$tabNav .= '</select>';
$file = modulePath.$this->thisModule().'/admin/banner.list.php';
?>

<div class="content-container">
	<div class="top-right">
		<form class="hide-chzn-search " method="get"><?=$tabNav?></form>
	</div>
	<div class="space"></div>
	<div class="space"></div>
	<div class="space"></div>
	<?include $file;?>
</div>

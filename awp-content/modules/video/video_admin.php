<?php if (!defined('basePath')) exit('No direct script access allowed');

switch($this->getSwitch()){
	
	case 'video_main':
		include modulePath.$this->thisModule().'/admin/video.php';
		include modulePath.$this->thisModule().'/help/main.php';
		$this->addHelp($help,'',400);
	break;
	
	case 'video_add':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/video.add.php';
		include modulePath.$this->thisModule().'/help/add.php';
		$this->addHelp($help,'',400);
	break;
	
	case 'video_edit':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/video.edit.php';
		include modulePath.$this->thisModule().'/help/edit.php';
		$this->addHelp($help,'',400);
	break;
	
	case 'video_watch':
		include modulePath.$this->thisModule().'/admin/video.watch.php';
	break;
	
	default:
		$this->_404();
		break;
}
?>
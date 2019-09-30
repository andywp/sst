<?php if (!defined('basePath')) exit('No direct script access allowed');
switch($this->getSwitch()){

	case 'main':
		include 'admin/newsletter.php';
	break;
	case 'statistik':
		include 'admin/statistik.php';
	break;
	case 'outbox':
		include 'admin/statistikdet.php';
	break;
	case 'excel':
		include 'admin/send.excel.php';
	break;
	case 'send':
		include 'admin/send.newsletter.php';
	break;
	case 'newsletter_add':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/newsletter.add.php';
	break;
	
	case 'newsletter_edit':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/newsletter.edit.php';
	break;
}

?>
<?if (!defined('basePath')) exit('No direct script access allowed');

switch($this->getSwitch()){
	
	case 'infografis_main':
		include modulePath.$this->thisModule().'/admin/infografis.php';
	break;
	
	case 'infografis_add':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/infografis.add.php';
	break;
	
	case 'infografis_edit':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/infografis.edit.php';
	break;
}
?>
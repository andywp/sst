<?php if (!defined('basePath')) exit('No direct script access allowed');
 //echo $this->getSwitch(); 

switch($this->getSwitch()){
	case 'jurnal_main':
		include modulePath.$this->thisModule().'/admin/jurnal.php';
	break;
	
	case 'jurnal_tambah':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/jurnal.add.php';
	break;
	case 'jurnal_edit':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/jurnal.edit.php';
	break;
	case 'produk_main':
		include modulePath.$this->thisModule().'/admin/produk/produk.php';
	break;
	case 'tanbah_produk':
		include modulePath.$this->thisModule().'/admin/produk/form.init.php';
		include modulePath.$this->thisModule().'/admin/produk/produk.add.php';
	break;
	
	case 'edit_produk':
		include modulePath.$this->thisModule().'/admin/produk/form.init.php';
		include modulePath.$this->thisModule().'/admin/produk/produk.edit.php';
	break;
	
}

?>
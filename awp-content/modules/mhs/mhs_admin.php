<?php if (!defined('basePath')) exit('No direct script access allowed');
// echo $this->getSwitch(); 

switch($this->getSwitch()){
	case 'mahasisa_main':
		include modulePath.$this->thisModule().'/admin/mahasiswa.php';
	break;
	
	case 'mahasisa_add':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/mahasiswa.add.php';
	break;
	case 'mahasisa_edit':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/mahasiswa.edit.php';
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
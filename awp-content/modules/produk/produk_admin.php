<?php if (!defined('basePath')) exit('No direct script access allowed');
/* echo $this->getSwitch(); */

switch($this->getSwitch()){
	case 'kategori_main':
		include modulePath.$this->thisModule().'/admin/kategori/kategori.php';
	break;
	
	case 'tambah_kategori':
		include modulePath.$this->thisModule().'/admin/kategori/form.init.php';
		include modulePath.$this->thisModule().'/admin/kategori/kategori.add.php';
	break;
	case 'edit_kategori':
		include modulePath.$this->thisModule().'/admin/kategori/form.init.php';
		include modulePath.$this->thisModule().'/admin/kategori/kategori.edit.php';
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
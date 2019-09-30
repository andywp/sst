<?php if (!defined('basePath')) exit('No direct script access allowed');
 //echo $this->getSwitch(); 

switch($this->getSwitch()){
	case 'surat_config':
		include modulePath.$this->thisModule().'/admin/surat.php';
	break;
	
	case 'surat_config_add':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/surat.add.php';
	break;
	case 'surat_config_edit':
		include modulePath.$this->thisModule().'/admin/form.init.php';
		include modulePath.$this->thisModule().'/admin/sura.edit.php';
	break;
	case 'cetak_surat':
		if($this->uri(3)=='print'){
			include modulePath.$this->thisModule().'/admin/print.php';
		}else{
			include modulePath.$this->thisModule().'/admin/surat_cetak.php';
		}
	
		
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
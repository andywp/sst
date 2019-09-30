<?php if (!defined('basePath')) exit('No direct script access allowed');
if( preg_match('/page-/',$this->uri(3))){
	
	include modulePath.$this->thisModule().'/katalog.php';
}else{

	if(preg_match('/page-/',$this->uri(2))){
		
	//	include modulePath.$this->thisModule().'/katalog.php';
	}else{

		if($this->getSwitch()=='produc_main'){
			if(!$this->uri(2)){
				include modulePath.$this->thisModule().'/katalog.php';
			}else{
				include modulePath.$this->thisModule().'/detail.php';
			}
			
			
		}
	}
}
?>
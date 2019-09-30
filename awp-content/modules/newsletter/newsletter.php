<?php if (!defined('basePath')) exit('No direct script access allowed');

//echo base64_encode('2').'<br/>'.base64_encode('9b2e86423ed74c58a873cd306b1e6678');

switch($this->getSwitch()){

	case 'unsubscribe':
		include 'unsubscribe.php';
	break;
	
	
}
?>
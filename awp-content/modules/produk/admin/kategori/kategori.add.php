<?php if (!defined('basePath')) exit('No direct script access allowed');
$this->form->beforeInsert('cek()');
function cek(){
	
	global $system;
	$tabel=$system->table_prefix.'category';
	$cek= $system->db->getOne("select category_name from ".$tabel." where category_name='".$_POST['add_category_name']."' and category_id !='".intval($system->uri(3))."'");
	$error = false;
	$alert = '';
	$notif ='';
 		@$sc = 
		 '
				elseif(!empty($_POST)){
					
					if(empty($_POST[\'add_category_name\']))
						{
							
							$notif .= "<li>Type cannot be empty..</li>";	
						}	
					
					if($cek)
						{
							
							$notif .= "<li>Type already exists.</li>";	
						}
					
					
					
			 		if($notif !=\'\')
						{
							$error = true;
							$alert = \'<ul>\'.$notif.\'</ul>\';
						}
					}';
 
	$sc = substr(trim($sc),4);
	
	eval($sc);
	
	$response = array(
		
		'error' => $error,
		'alert' => $alert
	);
	
	return $response;	
}



$this->form->getForm('add',$sqltable,$params,$formName='type',$submitValue='Add new Type',true);



?>
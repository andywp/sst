<?php if (!defined('basePath')) exit('No direct script access allowed');

$error = true;
$alert = '';
$xEmail = "select email from ".$this->table_prefix."newsletter where email='".$_POST['email']."'";

if(empty($_POST['email'])){
	$alert = 'Email required.';
}
elseif($this->db->getOne($xEmail)){
	$alert = 'Email already registered.';		
}
else{

	$query	  = "insert into ".$this->table_prefix."newsletter set email='".$_POST['email']."', status='1'";

	if(!$this->db->execute($query)){
		$alert = 'Oops! Unable to process.';
	}
	else{
		$alert = 'Thank you for subscribing our newsletter.';
		$error = false;
	}
}

$response = array(

	'error' => $error,
	'alert' => $alert
);

echo json_encode($response);
?>

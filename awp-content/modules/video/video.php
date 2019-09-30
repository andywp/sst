<?php if (!defined('basePath')) exit('No direct script access allowed'); 

$vidID = $this->db->getOne("select video_id from sas_video where video_id='".intval($this->uri(2))."'");
	
if($vidID!=0){
	
	
	if(!empty($vidID)){
		include  modulePath.$this->thisModule().'/video.detail.php';
	}
	else{
		echo 'Video not found';
	}
}
else{
	
	include  modulePath.$this->thisModule().'/video.list.php';
}
?>
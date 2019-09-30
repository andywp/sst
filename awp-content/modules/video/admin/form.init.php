<?php if (!defined('basePath')) exit('No direct script access allowed'); 

$video_id = intval($this->uri(3));
$redirect = base64_decode(substr($this->uri(4),3));

// Table Name
$sqltable 	= array(

	'table'	   => $this->table_prefix.'video',
	'video_id' => $video_id
);

// Define form field
$params	= array(

	$this->form->input->text('Youtube ID', 'add_youtube_id'),
	$this->form->input->text('Title', 'add_video_title'),
	$this->form->input->textarea('Description','add_video_description','100%',5)
);
?>
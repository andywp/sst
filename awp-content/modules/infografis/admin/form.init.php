<?php if (!defined('basePath')) exit('No direct script access allowed');

$linkID   = intval($this->uri(3));
$redirect = base64_decode(substr($this->uri(4),3));

// Table Name
$sqltable 	= array(

	'table'	  => $this->table_prefix.'links',
	'link_id' => $linkID
);

// Define form field
$params	= array(
	
	$this->form->input->html('<div class="box">'),
	$this->form->input->html('<div class="box-body">'),
	$this->form->input->image('','add_link_image',uploadPath.'modules/infografis/',uploadPath.'modules/infografis/thumbs/','image'),
	$this->form->input->text('Name', 'add_link_title'),
	$this->form->input->switchcheck('Publish', 'add_publish',$type=2,$checked=true),
	$this->form->input->hidden('add_link_type','infografis'),
	$this->form->input->html('</div>'),
	$this->form->input->html('</div>'),
);
?>

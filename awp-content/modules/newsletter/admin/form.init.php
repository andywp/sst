<?php if (!defined('basePath')) exit('No direct script access allowed');

$linkID   = intval($this->uri(3));
$redirect = base64_decode(substr($this->uri(4),3));

// Table Name
$sqltable 	= array(

	'table'	  => $this->table_prefix.'newsletter',
	'link_id' => $linkID
);

// Define form field
$params	= array(
	$this->form->input->html('<div class="box">'),
	$this->form->input->html('<div class="box-body">'),
	$this->form->input->text('Email address','add_email'),
	$this->form->input->hidden('add_status','1'),
	$this->form->input->html('</div>'),
	$this->form->input->html('</div>'),
);
?>

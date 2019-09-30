<?php if (!defined('basePath')) exit('No direct script access allowed'); 
$category_id   = intval($this->uri(3));
$redirect = base64_decode(substr($this->uri(4),3));



// Table Name
$sqltable 	= array(
	'table'	  => $this->table_prefix.'category',
	'category_id' => $category_id
);

// Define form field
$params	= array(
	$this->form->input->text('Kategori <small class="red"> *)</small>', 'add_category_name'),
	$this->form->input->hidden('add_category_type','produk')
);

$this->form->onInsert('slugURL()');
$this->form->onUpdate('slugURL()');
/* $this->form->beforeInsert('cek()'); */
/* $this->form->beforeUpdate('cek()'); */
function slugURL(){
	global $system;
	/* adodb_pr($_POST); */
	if($system->uri(3)){
		$category_id = intval($system->uri(3));
		
	}else{
		$category_id = $system->db->insert_id();
	}
	
	$tabel=$system->table_prefix.'category';
	$url=seo_slug($_POST['add_category_name']);
	
	
	
	
	$cUrl= $system->db->getOne("select slug_url from ".$tabel." where slug_url='".$url."' and category_id !='".intval($system->uri(3))."'");
	if($cUrl){
		$addURL=$url.'-1';
	}else{
		$addURL=$url;
	}
	$query="update ".$tabel." set slug_url='".$addURL."' where  category_id='".$category_id."' ";
	$system->db->execute($query);
	
	
}


/* function cak(){
	global $system;
	
	$tabel=$system->table_prefix.'category';
	$error = false;
	$alert = '';
		if(empty($_POST['add_category_name'])){
			$error = true;
			$alert = "Type cannot be empty.";
		}else{
			
			if($system->uri(3)){
				$add_query=' and category_id !="'.intval($system->uri(3)).'"'; 
			}else{
				$add_query='';
			}
		echo		"select category_name from ".$tabel." where category_name='".$_POST['add_category_name']."'".$add_query;
			$cek= $system->db->execute("select category_name from ".$tabel." where category_name='".$_POST['add_category_name']."'".$add_query);
			
			if($slugUrl->recordCount()>0)
				$error = true;
				$alert = "Type already exists.";
			}
			
		} */
	
	
	
/* 		$response = array(
			'error' => $error,
			'alert' => $alert
		);
	
	return $response;	
} */


?>
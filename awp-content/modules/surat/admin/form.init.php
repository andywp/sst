<?php if (!defined('basePath')) exit('No direct script access allowed'); 
$surat_id= intval($this->uri(3));
$redirect = base64_decode(substr($this->uri(4),3));

//adodb_pr($this->admin());

// Table Name
$sqltable 	= array(
	'table'	  => $this->table_prefix.'surat',
	'surat_id' => $surat_id
);


// Define form field
$params	= array(

	$this->form->input->text('Surat <small class="red"> *)</small>', 'add_judul'),
	$this->form->input->textarea('Surat','add_surat',30,3,$editor=true, $multilang=false),
);

/* $this->form->onInsert('slugURL()');
$this->form->onUpdate('slugURL()');
$this->form->beforeInsert('cek()'); 
$this->form->beforeUpdate('cek()');  */

function cek(){
	
	$error = false;
	$alert = '';
	$notif ='';				
	if(empty($_POST['add_jurnal'])){	
			$notif .= "<li>Judul Jurnal tidak boleh Kosong</li>";	
	}				
/* 	if(empty($_POST['add_category_id'])){	
			$notif .= "<li>Pilih kategori</li>";	
	} */	
	if(empty($_POST['postImages']['name'][0])){
		$notif .= "<li>Gambar Utama tidak boleh kosong.</li>";
	}
	if(empty($_POST['add_diskripsi'])){	
			$notif .= "<li>Diskripsi tidak boleh kosong</li>";	
	}
	if(empty($_POST['add_content'])){	
			$notif .= "<li>Content tidak boleh kosong</li>";	
	}
	if(empty($_POST['add_harga'])){	
			$notif .= "<li>Harga tidak boleh kosong</li>";	
	}
					
					
	if($notif !='')
		{
			$error = true;
			$alert = '<ul>'.$notif.'</ul>';
		}
	
	
	$response = array(
		
		'error' => $error,
		'alert' => $alert
	);
	
	return $response;	
}


function slugURL(){
	global $system;
	/* adodb_pr($_POST); */
	if($system->uri(3)){
		$produk_id = intval($system->uri(3));
		
	}else{
		$produk_id = $system->db->insert_id();
	}
	
	$tabel=$system->table_prefix.'produk';
	$url=seo_slug(trim($_POST['add_produk']));
	
	
	
	
	$cUrl= $system->db->getOne("select url_slug from ".$tabel." where url_slug='".$url."' and produk_id !='".intval($system->uri(3))."'");
	if($cUrl){
		$addURL=$url.'-1';
	}else{
		$addURL=$url;
	}
	$query="update ".$tabel." set url_slug='".$addURL."' where  produk_id='".$produk_id."' ";
	$system->db->execute($query);
	
	
}




?>
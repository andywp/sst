<?php if (!defined('basePath')) exit('No direct script access allowed'); 
$produk_id= intval($this->uri(3));
$redirect = base64_decode(substr($this->uri(4),3));



// Table Name
$sqltable 	= array(
	'table'	  => $this->table_prefix.'produk',
	'produk_id' => $produk_id
);
$arrOption = array(
	'addoption'	=> array(
		'0' => '--'
	),
	'reftable'	=> array(
		'name' 	=> $this->table_prefix.'category',
		'id' 	=> 'category_id', 
		'field'	=> 'category_name',
		'cond' 	=> 'where category_type=\'produk\''
	)
);
// Define form field
$params	= array(
	$this->form->input->text('Nama <small class="red"> *)</small>', 'add_produk'),
	/* $this->form->input->select('Kategori', 'add_category_id', $arrOption, $multiple=false, $extra='class="select2 form-control"'), */
	$this->form->input->html('<div class="row">'),
		$this->form->input->html('<div class="col-md-3 col-sm-3 col-cs-12">'),
		$this->form->input->image('Gambar 1', 'add_gambar_1', uploadPath.'modules/produk/',uploadPath.'modules/produk/thumbs/', $allowedTypes='image'),
		$this->form->input->html('</div>'),
		$this->form->input->html('<div class="col-md-3 col-sm-3 col-cs-12">'),
		$this->form->input->image('Gambar 2', 'add_gambar_2',  uploadPath.'modules/produk/',uploadPath.'modules/produk/thumbs/', $allowedTypes='image'),
		$this->form->input->html('</div>'),
		$this->form->input->html('<div class="col-md-3 col-sm-3 col-cs-12">'),
		$this->form->input->image('Gambar 3', 'add_gambar_3',  uploadPath.'modules/produk/',uploadPath.'modules/produk/thumbs/', $allowedTypes='image'),
		$this->form->input->html('</div>'),
		$this->form->input->html('<div class="col-md-3 col-sm-3 col-cs-12">'),
		$this->form->input->image('Gambar 4', 'add_gambar_4',  uploadPath.'modules/produk/',uploadPath.'modules/produk/thumbs/', $allowedTypes='image'),
		$this->form->input->html('</div>'),
	$this->form->input->html('</div>'),
	$this->form->input->textarea('Diskripsi','add_diskripsi',30,3,$editor=false, $multilang=false),
	$this->form->input->textarea('Content','add_content',30,3,$editor=true, $multilang=false),
	$this->form->input->text('Harga <small class="red"> *)</small>', 'add_harga'),
	$this->form->input->text('Keyword <small class="text-warning">Antar keyword pisahkan dengan koma (,)</small>', 'add_keyword'),
	$this->form->input->hidden('add_active',1),
);

$this->form->onInsert('slugURL()');
$this->form->onUpdate('slugURL()');
$this->form->beforeInsert('cek()'); 
$this->form->beforeUpdate('cek()'); 

function cek(){
	
	$error = false;
	$alert = '';
	$notif ='';				
	if(empty($_POST['add_produk'])){	
			$notif .= "<li>Nama produk tidak boleh kosong</li>";	
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
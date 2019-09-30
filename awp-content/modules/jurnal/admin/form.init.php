<?php if (!defined('basePath')) exit('No direct script access allowed'); 
$jurnal_id= intval($this->uri(3));
$redirect = base64_decode(substr($this->uri(4),3));

//adodb_pr($this->admin());

// Table Name
$sqltable 	= array(
	'table'	  => $this->table_prefix.'jurnal',
	'jurnal_id' => $jurnal_id
);

// Define form field
$params	= array(
	$this->form->input->html('<div class="row" >'),
	$this->form->input->html('<div class="col-md-8 col-sm-8 col-xs-12" >'),
		$this->form->input->text('Jurnal <small class="red"> *)</small>', 'add_jurnal'),
		/* $this->form->input->select('Kategori', 'add_category_id', $arrOption, $multiple=false, $extra='class="select2 form-control"'), */
		//$this->form->input->html('</div>'),
		$this->form->input->textarea('Diskripsi','add_diskripsi',30,3,$editor=false, $multilang=false),
		$this->form->input->textarea('Abstrak','add_abstrak',30,3,$editor=true, $multilang=false),
		$this->form->input->text('Katakunci <small class="red"> *)</small>', 'add_kata_kunci'),
	
	$this->form->input->html('</div>'),
	$this->form->input->html('<div class="col-md-4 col-sm-4 col-xs-12" >'),
		$this->form->input->text('Author', 'add_user',30,$multilang=false, $this->admin('name'),'id="disabledInput" disabled'),
		$this->form->input->file('File', 'add_file', uploadPath.'modules/jurnal/', $allowedTypes='pdf,rar,zip', $maxsize='', $comment='upload pdf,rar,zip max 3MB'),
	$this->form->input->html('</div>'),
	$this->form->input->html('</div>'),
	
	
	$this->form->input->hidden('add_publish',1),
	$this->form->input->hidden('add_user',$this->admin('name')),
	$this->form->input->hidden('add_user_id',$this->admin('id')),
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
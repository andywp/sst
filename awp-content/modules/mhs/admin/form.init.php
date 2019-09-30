<?php if (!defined('basePath')) exit('No direct script access allowed'); 
$jurnal_id= intval($this->uri(3));
$redirect = base64_decode(substr($this->uri(4),3));

//adodb_pr($this->admin());

// Table Name
$sqltable 	= array(
	'table'	  => $this->table_prefix.'mhs',
	'mhs_id' => $jurnal_id
);
$arrOption = array(
	'addoption'	=> array(
		'0' => '--',
		'Agribisnis' => 'Agribisnis',
		'Agroteknologi' => 'Agroteknologi',
		'Akuntansi' => 'Akuntansi',
		'Manajemen' => 'Manajemen',
		'Ilmu Psikologi' => 'Ilmu Psikologi',
		'Teknik Industri' => 'Teknik Industri',
		'Teknik Sipil' => 'Teknik Sipil',
		'Pendidikan Fisika' => 'Pendidikan Fisika',
		'Pendidikan Guru SD' => 'Pendidikan Guru SD',
		'Pendidikan Teknik Mesin' => 'Pendidikan Teknik Mesin',
		'Pendidikan Bahasa dan Sastra Indonesia' => 'Pendidikan Bahasa dan Sastra Indonesia',
		'Pendidikan Bahasa Inggris' => 'Pendidikan Bahasa Inggris',
		'Pendidikan Ilmu Pengetahuan Alam' => 'Pendidikan Ilmu Pengetahuan Alam',
		'Pendidikan Kesejahteraan Keluarga' => 'Pendidikan Kesejahteraan Keluarga',
		'Pendidikan Matematika' => 'Pendidikan Matematika',
		'Pendidikan Seni Rupa' => 'Pendidikan Seni Rupa',
		
	)
);

// Define form field
$params	= array(

	$this->form->input->text('NIM <small class="red"> *)</small>', 'add_nim'),
	$this->form->input->text('Nama', 'add_nama'),
	$this->form->input->select('Jurusan', 'add_jurusan', $arrOption, $multiple=false, $extra='class="select2 form-control"'),
	$this->form->input->text('Tempat Tanggal Lahir', 'add_tempat_tanggal_lahir'),
	$this->form->input->text('Telepon', 'add_telpon'),
	$this->form->input->text('Nama Orang Tua', 'add_nama_orang_tua'),
	$this->form->input->text('Pekerjaan Orang Tua', 'add_pekerjaan_orang_tua'),
	$this->form->input->textarea('Alamat Asal','add_alamat_asal',30,3,$editor=false, $multilang=false),
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
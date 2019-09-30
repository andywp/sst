<?php if (!defined('basePath')) exit('No direct script access allowed');
$error 	   = true;
$errorMsg  = '';
$errorMsg_in = '';
$errorMsg_en  = '';
$successMsg_in  = '';
$successMsg_en  = '';
if(!empty($_POST['email'])){
 $ismail=anti_injection($_POST['email']);
 $ceksubscribe = $this->db->execute("select email from ".$this->table_prefix."newsletter where email='".$ismail."' and status='1'");
	 if($ceksubscribe->RecordCount()>0){
		$errorMsg_in = 'Email telah terdaftar';
		$errorMsg_en = 'Email already in use';
	}
	else{
	    $auth   =  md5(base64_encode($ismail));
		$insert = "insert into ".$this->table_prefix."newsletter values ('','".$ismail."','".$auth."','1')";
			if($this->db->execute($insert)){
				$error 	  = false;
				$successMsg_in = 'pendaftaran berhasil,untuk unsubscribe newsletter silahkan cek email';
				$successMsg_en = 'subscribe news letter success,for unsubscribe please check your email';
			}
			else{
				$errorMsg_in = 'tidak bisa menambahkan data newsletter,silahkan coba kembali';
				$errorMsg_en = 'unable to add new newsletter,please try again letter';
		}
	}
}


$response = array(
	'error'			=> ucfirst($error),
	'errorMsg_in'	=> ucfirst($errorMsg_in),
	'errorMsg_en'	=> ucfirst($errorMsg_en),
    'successMsg_in'	=> ucfirst($successMsg_in),
	'successMsg_en'	=> ucfirst($successMsg_en)
);

echo json_encode($response);
?>
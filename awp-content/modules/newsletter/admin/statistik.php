<? if (!defined('basePath')) exit('No direct script access allowed');

$tablename  = $this->table_prefix.'statistik';
$query		= 'select * from '.$tablename.' where 1 order by id desc';

$data 		= array(

	'Waktu' 	=> 'tanggal.text..align="left"',
	'Sukses' 	=> 'sukses.text..align="left"',
	'Gagal' 	=> 'gagal.text..align="left"',
	'User' 		=> 'user.custom.usersender.align="left"',
	'Server' 	=> 'server.text..align="left"'
);
function usersender($data,$params){
	global $system;
	$var=$data['user'];
	$usr=$system->db->getOne("select name from ".$system->table_prefix."user where id='".$var."'");
	return $usr;
}
$this->data->init($query,10,5);
?>

<div class="box">
	<div class="box-body">
		<div class="widget-main">
			<?php $this->data->getPage($tablename,'id',$data,false,false); ?>
		</div>
	</div>
</div>

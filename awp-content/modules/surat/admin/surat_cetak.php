<?php if (!defined('basePath')) exit('No direct script access allowed'); 
	$dbSurat=$this->db->getAll('SELECT surat_id,judul FROM awp_surat where 1 order by judul asc ');
	/* adodb_pr($dbSurat); */
	$optSurat='';
	foreach($dbSurat as $r){
		$optSurat.='<option value="'.$r['surat_id'].'">'.$r['judul'].'</option>';
	}
	
	$dbMHS=$this->db->getAll('SELECT mhs_id,nim,nama from awp_mhs  where 1 order by nim ASC');
	/* adodb_pr($dbMHS); */
	$optMhs='';
	foreach($dbMHS as $r){
		$optMhs.='<option value="'.$r['mhs_id'].'">'.$r['nim'].'  '.$r['nama'].'</option>';
	}
?>

<form enctype="multipart/form-data" target="_blak" method="GET" action="<?= $this->adminUrl() ?>cetak-surat/print.html" name="addsurat" id="addsurat">
	<div class="form-group">
		<label class="control-label">Pilih Surat</label>
		<div class="controls">
			<select name="surat" class="select2 form-control" required>
				<option value="">--</option>
				<?= $optSurat ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">Pilih Mahasiwa</label>
		<div class="controls">
			<select name="mhs[]" class="select2  select2-selection--multiple form-control" multiple required>
				<option value="">--</option>
				<?= $optMhs ?>
			</select>
		</div>
	</div>
	<div class="form-input-bottom form-actions">
		<button type="submit"  class="btn btn-sm btn-primary" name="cetak" id="save_surat"><i class="fa fa-print"></i>Cetak Surat</button>
	</div>
</form>
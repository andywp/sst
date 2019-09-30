<style>
.help-container{ height:auto;max-height:100% !important;}
.help-maintitle{ font-size:16px;font-weight:bold;color:#000;}
.help-item{ padding:8px; }
.help-title{ font-size:14px;font-weight:bold;color:#FDA01E;}
.help-content{ margin-left:15px;font-size:12px;color:#707070;}
.help-desc{ font-size:12px;color:#707070;}
</style>
<?if (!defined('basePath')) exit('No direct script access allowed');
$help	= '<div class="help-container">
		<div class="help-maintitle">Bantuan</div>
		<div class="help-item">
			<div class="help-desc">
				Halaman ini untuk menambahkan data '.$this->pageTitle().'
			</div>
		</div>
		<div class="help-item">
			<div class="help-title">Tambah Video</div>
			<div class="help-content">
				<li>Isi kolom <b>Youtube ID / URL</b> yang didapat dari situs youtube.com</li>
				<li>Isi kolom <b>Title Video</b> untuk judul video</li>
				<li>Isi kolom <b>Description</b> untuk penjelasan singkat video</li>
			</div>
		</div>
		<div class="help-item">
			<div class="help-title">Preview Video</div>
			<div class="help-content">
			<li>Tekan tombol <button class="btn btn-primary">Preview</button> untuk memastikan video sebelum disimpan.</li>
			</div>
		</div>
		<div class="help-item">
			<div class="help-title">Menyimpan data</div>
			<div class="help-content">
			<li>Jika sudah terisi semua , tekan tombol <button id="save_post" class="btn btn-sm btn-primary" name="save_post" type="submit">
<i class="fa fa-plus"></i>
Add Video
</button></li>
			</div>
		</div>
		<div class="help-item">
			<div class="help-title">Menambahkan data lain</div>
			<div class="help-content">
			<li>Ulangi langkah diatas</li>
			</div>
		</div>
		<div class="help-item">
			<div class="help-title">Kembali ke Halaman tabel data</div>
			<div class="help-content">
			<li>Tekan tombol <a class="btn btn-sm btn-success" href="#">
<i class="fa fa-check"></i>
Finish
</a></li>
			</div>
		</div>
	</div>';
	?>
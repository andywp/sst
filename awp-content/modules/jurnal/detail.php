<?php if(!defined('basePath')) exit('No direct script access allowed'); 
//echo $this->thisUrl();
if($this->_GET('f')){

	ob_end_clean();
	ob_start("ob_gzhandler");
	$getFile 	= @$this->_GET('f');
	$email 		= urldecode(@$this->_GET('email'));
	$fileID 	= base64_decode(urldecode(@$this->_GET('id')));
	
	$downloadFile = base64_decode($this->_GET('f'));
	$filename 	  = uploadPath.'modules/jurnal/'.$downloadFile;
	$mime_type 	  = mime_content_type(uploadPath.'modules/jurnal/'.$downloadFile);
	
	header('Pragma: public');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Cache-Control: private', false); 
	header('Content-Type: '.$mime_type);

	header('Content-Disposition: attachment; filename='.basename($downloadFile));
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: ' . filesize($filename));
	
	//flush();
	
	readfile($filename);
	/* if (empty($_SESSION['member'])){
		$this->db->execute("INSERT INTO cni_download_tracking (email, file_id) value ('".$email."', '".$fileID."') ");
	} */
	exit();
}
//echo intval($this->uri(2));
$data=$this->db->getRow('select * from awp_jurnal where publish=1 and jurnal_id='.intval($this->uri(2)));
//adodb_pr($data);

?>
<article class="blog-post-wrapper single-blog">
	<div class="post-information">
		<h2><?= $data['jurnal'] ?></h2>
		<div class="entry-meta">
			<span class="author-meta"><i class="fa fa-user"></i> <a href="#"><?= $data['user'] ?></a></span>
		<!--	<span><i class="fa fa-clock-o"></i> march 28, 2016</span>
			<span class="tag-meta">
				<i class="fa fa-folder-o"></i>
				<a href="#">painting</a>,
				<a href="#">work</a>
			</span>
			<span>
				<i class="fa fa-tags"></i>
				<a href="#">tools</a>,
				<a href="#"> Humer</a>,
				<a href="#">House</a>
			</span>
			<span><i class="fa fa-comments-o"></i> <a href="#">6 comments</a></span>
		</div> -->
		<div class="entry-content">
			<?= strDecode($data['diskripsi']) ?>
		</div>
		<div class="katakuci">
			<p><strong>Kata Kunci</strong><?= $data['kata_kunci'] ?></p>
		</div>
		<div class="more">
			<a href="<?=$this->thisUrl() ?>?f=<?= base64_encode($data['file']) ?>" class="btn btn-default btn-primary">Download</a>
		</div>
	</div>
</article>

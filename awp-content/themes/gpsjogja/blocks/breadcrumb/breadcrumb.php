<?php if (!defined('basePath')) exit('No direct script access allowed');
$img=$this->db->getOne("select breadcrumb from ".$this->table_prefix."config where id=1 ");
$imgURL=uploadURL.'modules/siteconfig/'.$img;
$breadcrumb=' <li><a href="'.baseURL.'">BERANDA</a></li>';
if($this->thisModuleID()==2){
	$breadcrumb.='<li class="active" >'.$this->pageTitle().'</li>';
}
if($this->thisModuleID()==30){
	
	if($this->uri(2)){
		$nama=$this->db->getOne("select nama from ".$this->table_prefix."product where product_id='".intval($this->uri(2))."'   ");
		 $promo=$this->db->getOne("select promo from ".$this->table_prefix."product where product_id='".intval($this->uri(2))."'   ");
		($promo==0)?$breadcrumb.='<li>'.$this->pageTitle().'</li>':$breadcrumb.='<li>PROMO</li>';
		/* $breadcrumb.='<li>'.$this->pageTitle().'</li>'; */
		$breadcrumb.='<li class="active" >'.$nama.'</li>';
	}else{
		$breadcrumb.='<li class="active" >'.$this->pageTitle().'</li>';
	}
	
}


?>
<style>
	.breadcrumb-section {
		background-image: url("<?= $imgURL ?>");
	}
</style>
<section class="breadcrumb-section">
	<div class="opacyti">
		<div class="container">	
			<h1 class="section-title text-center" ><?= $this->pageTitle() ?></h1>
			<ul class="breadcrumb">
			  <?= $breadcrumb ?>
			</ul>
		</div>
	</div>
</section>
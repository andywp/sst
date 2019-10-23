<?php
if(intval($this->uri(2))){
	include 'detail.php';
}else{

$shoPerPage = 12;
$query 		= "select * from awp_jurnal where publish=1 order by jurnal_id DESC";
$result		= $this->db->execute($query);
$postList	= '';
$this->data->init($query,$shoPerPage);
$html='';
foreach($this->data->arrData() as $r){
	$diskripsi=(strlen(strDecode($r['diskripsi'])) > 200 )?substr(strDecode($r['diskripsi']),0,200).'...':strDecode($r['diskripsi']);
		
		$html.='
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="single-blog">
							<div class="blog-text">
								<h4>'.strDecode($r['jurnal']).'</h4>
							</div>
							 <p>
								'.$diskripsi.'
							 </p>
							 <a href="'.baseURL.'jurnal/'.$r['jurnal_id'].'/'.seo_slug($r['jurnal']).$this->permalink().'" class="ready-btn">Detail</a>
						</div>
						 
					  </div>
		
			';
}

?>



<div class="content">
	<h1 class="widget-title text-center" ><?=strtoupper($this->pageTitle())?></h1>
	<div class="jurnaldiv">
		<?= $html ?>
	</div>
	<div class="page-nav"><?=$this->data->getNav();?></div>
</div>



<?php } ?>
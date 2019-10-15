<?php if (!defined('basePath')) exit('No direct script access allowed'); 
	$jurnal=$this->db->getAll('select * from awp_jurnal where publish=1 order by jurnal_id DESC limit 8');
	//adodb_pr($jurnal);
	$html='';
	foreach($jurnal as $r){
		$html.='
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="single-blog">
							<div class="blog-text">
								<h4>'.strDecode($r['jurnal']).'</h4>
							</div>
							 <p>
								'.strDecode($r['diskripsi']).'
							 </p>
							 <a href="'.baseURL.'jurnal/'.$r['jurnal_id'].'/'.seo_slug($r['jurnal']).$this->permalink().'" class="ready-btn">Detail</a>
						</div>
						 
					  </div>
		
			';
	}


?>


<section id="news" class="jurnal">
	<div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="section-headline text-center">
		  <h2>Jurnal</h2>
		</div>
	  </div>
	</div>
	<div class="blog-overly"></div>
	<div class="container">
		<div class="row">
			<?= $html ?>
        </div>
	</div>
</section>
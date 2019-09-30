<?php if (!defined('basePath')) exit('No direct script access allowed');  
$imgSize='';
$detailURL=$this->db->getOne("select page_url from ".$this->table_prefix."pages where page_switch='produc_main'  order by page_id DESC limit 1");
$detailURL=baseURL.$detailURL;
$imagesURL=uploadURL.'modules/produk/thumbs/medium/';
$tabelProduk=$this->table_prefix."produk";


$count=$this->db->getOne("select count(produk_id) from awp_produk where active=1 ");
if($count >= 3){
	$col='col-lg-3 col-md-3 col-sm-3 col-xs-12';
}else{
	$col='col-lg-6 col-md-6 col-sm-6 col-xs-12';
}
		
$dataproduk=$this->db->getAll("select * from ".$tabelProduk." WHERE status=0 and active=1 ");
	$produk='';
	foreach($dataproduk as $r){
		list($width, $height) = @getimagesize(uploadPath.'modules/produk/'.$r['gambar_1']);
		if($width > $height){
			$imgSize = 'landscape';
		}
		elseif($width < $height){
			$imgSize = 'potrait';
		}
		$gambar=$imagesURL.$r['gambar_1'];
		$url=$detailURL.'/'.$r['url_slug'].$this->permalink();
		
		$produk.='
				<div class="'.$col.'">
					<div class="blog-item-wrapper relative">
						<div class="blog-item-img">
							<div class="square ratio4_3">
								<div class="square-content">
									<div class="img-wrap default">
										<figure class="effect-bubba">
											<img src="'.$gambar.'" class="img-responsive '.$imgSize.' " alt="'.strDecode($r['produk']).'">
											<figcaption>
											<a href="'.$url.'">
												<span class="icon-view">
													<i aria-hidden="true" class="fa fa-expand"></i>
													<span></span>
												</span>
											</a>
											</figcaption>
										</figure>									
									</div>
								</div>
							</div>
							<div class="paket-harga">
								<p>Rp.'.$r['harga'].'</p>
							</div>
						</div>
						<div class="blog-item-text">
							<h3 class="small-title"><a href="'.$url.'">'.strDecode($r['produk']).'</a></h3>
							<p>
							'.strDecode($r['diskripsi']).'
							</p>
						<div class="blog-one-footer text-center">
							<a href="'.$url.'" class="btn btn-danger btn-lg" >Detail</a>
							<a href="https://api.whatsapp.com/send?phone='.$this->site->wa().'&text=Hallo Planet GPS saya mau menanyakan '.$r['produk'].'" class="btn btn-success btn-lg" > <i class="fab fa-whatsapp"></i> WA Order</a>
						</div>
						</div>
					</div>
				</div>
				
				';
	}		
		

?>
 <!-- 
<div class="header-title">
	<div class="layer-title" > 
	<span class="spacer"></span>  -->
		<h1 class="widget-title text-center" ><?=strtoupper($this->pageTitle())?></h1>
<!--	<span class="spacer"></span> 
  </div>
</div> -->

<div class="gps-list">
	<?= $produk ?>	
</div>

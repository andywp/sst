<?php 
$imagesURL=uploadURL.'modules/produk/thumbs/large/';
$imagesURLmini=uploadURL.'modules/produk/thumbs/mini/';
$pageData=$this->db->getRow("select * from ".$this->table_prefix."produk where url_slug='".$this->uri(2)."' ");
/* adodb_pr($pageData); */
$images='';
$images1=!empty($pageData['gambar_1'])?$pageData['gambar_1']:'';
$images2=!empty($pageData['gambar_2'])?$pageData['gambar_2']:'';
$images3=!empty($pageData['gambar_3'])?$pageData['gambar_3']:'';
$images4=!empty($pageData['gambar_4'])?$pageData['gambar_4']:'';



$images=array(
			$images1,
			$images2,
			$images3,
			$images4,
			
			);
$slider='';
$i=1;
$pegination='';
foreach($images as $k=>$v){
	$active=($i==0)?'active':'';
	if(!empty($v)){
		$slider.='<div class="detail-images"><img class="img-responsive" src="'.$imagesURL.$v.'"></div>';
		
		
		
		$pegination.='<button border:solid 1px #333;" data-slide="'.$i.'" class="nav-slider  '.$active.'">
							<img class="img-responsive" src="'.$imagesURLmini.$v.'">
					</button>';
	}
	
	
	$i++;
}

?>


<div class="header-title">
  <div class="layer-title"> 
	<!-- <span class="spacer"></span> -->
		<h1 class="widget-title  text-center"><?= strDecode($pageData['produk']) ?></h1>
	<!--  <span class="spacer"></span> -->
  </div>
</div>
<div class="box-detail">
	<div id="detailproduk" class="owl-carousel owl-theme" >
		<?= $slider ?>
	</div>
	<div class="custom-control text-center">
		<?= $pegination ?>
	</div>
</div>
<div class="price">
	<ul class="list-inline list-unstyled  menu-order ">
		<li><button class="btn btn-danger btn-price btn-lg">Rp. <?= rupiah($pageData['harga']) ?></button></li>
		<li><a href="https://api.whatsapp.com/send?phone=<?= $this->site->wa()?>&text=Hallo Planet GPS Jogja <?= $pageData['produk'] ?> " class="btn btn-success btn-price btn-lg"><i class="fab fa-whatsapp"></i> Klik Order via Whatsapp</a></li>
	</ul>
</div>
<div class="text">
	<?= strDecode($pageData['content']) ?>
</div>
		
	

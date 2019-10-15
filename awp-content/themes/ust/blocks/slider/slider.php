<?php if (!defined('basePath')) exit('No direct script access allowed'); 
$slider			= new stdClass();
$fTitle   	= $this->site->isMultiLang()?'title_'.$this->active_lang():'title';
$fTagline 	= $this->site->isMultiLang()?'tagline_'.$this->active_lang():'tagline';
$fDescription	= $this->site->isMultiLang()?'description_'.$this->active_lang():'description';
$slider->items  = $this->db->getAll("select  * from ".$this->table_prefix."slider where publish='1' order by slider_order limit 10");

$slider->url 	= uploadURL.'modules/slider/';
$xgetSlider		= '';
$indicators		= '';
$sliderLength	= 0;
$no = 1;
foreach($slider->items as $xslider){
	$btnCaption=$xslider['btn_caption'];
	$classpertama=$xslider['slider_order']==1?'classpertama':'';
	$itemActive  = $sliderLength==0?' active':'';
	$itemTitle 	 = !empty($xslider['title'])?'<h3 class="title">'.$xslider['title'].'</h3>':'';
	$itemTagline = !empty($xslider['tagline'])?'<p class="info">'.$xslider['tagline'].'</p>':'';
	$itemLink 	 = !empty($xslider['url'])?'<a href="'.$xslider['url'].'" target="_blank">.</a>':'';
	$itemDes	 = !empty($xslider['description'])?'<p class="info">'.$xslider['description'].' '.$itemLink.'</p>':'';
	$itemButton	 = !empty($xslider['url'])?'<p class="button"><a class="btn btn-default" href="'.$xslider['url'].'" role="button"> '.$btnCaption.' </a></p>':'';
		if(isFileExist(uploadPath.'modules/slider/',$xslider['image'])){
			$xgetSlider .= '
				<div class="item'.$itemActive.'">
					<img class="img-responsive" src="'.$slider->url.$xslider['image'].'" alt="'.$xslider['title'].'">	
					<div class="carousel-caption '.$classpertama.'">
						<div class="container relative">
							<div class="caption-container hidden-xs">
								'.$itemTitle.$itemDes.$itemButton.'
							</div>
						</div>
					</div>					
				</div>
					
			';
		}
	

	$indicators .= '<li data-target="#slider" data-slide-to="'.$sliderLength.'" class="'.$itemActive.'"></li>';	
	$sliderLength++;
	$no++;
}
$sliderIndicators 	= count($slider->items)>1?'<ol class="carousel-indicators">'.$indicators.'</ol>':'';
$sliderControl 		= count($slider->items)>1?'<a class="left carousel-control" href="#slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
			<a class="right carousel-control" href="#slider" data-slide="next"><i class="fa fa-angle-right"></i></a>':'';
$sliderProgress 	= count($slider->items)>1?'<div class="carousel-progress"><span class="carousel-bar" style="width: 43%;"></span></div>':'';
?>

<!-- Carousel
================================================== -->
<div id="slider" class="relative carousel slide carousel-utama" data-ride="carousel" data-type="multi" data-interval="false"  data-pause="null">	
<!-- Indicators -->
	<div class="carousel-inner">
		<?php echo $xgetSlider; ?>
	</div>
	<?php echo $sliderControl; ?>
</div>


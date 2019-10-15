<?php if (!defined('basePath')) exit('No direct script access allowed');
$imgSize='';
$categoryID=3;
$query= "SELECT post_id FROM ".$this->table_prefix."posts where post_category='".$categoryID."' and publish='1' order by post_id desc limit 6";
$dataNEws=$this->db->getAll($query);
/* adodb_pr($dataNEws); */
$html='';
foreach($dataNEws as $r){
	$post = $this->post->getRow($r['post_id']);
	list($width, $height) = @getimagesize(uploadPath.'modules/posts/'.$post->image);
	if($width > $height){
		$imgSize = 'landscape';
	}
	elseif($width < $height){
		$imgSize = 'potrait';
	}
	
	
	$html.='
		
		<div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="'.$post->url.'">
					<img src="'.$post->imageUrlLarge.'" class="img-responsive '.@$imgSize.'" alt="'.$post->url.'">
				</a>
              </div>
              <div class="blog-meta">
                <span class="date-type"><i class="fa fa-calendar"></i>2019-02-26 / 10:00:00</span>
              </div>
              <div class="blog-text">
                <h4>
					<a href="'.$post->url.'">'.$post->title.'<a>
				</h4>
                <p>
					'.$post->smallContent.' ................................................................................................
				</p>
              </div>
              <span><a href="'.$post->url.'" class="ready-btn">Read more</a></span>
            </div>
          </div>
		
		
		
		
		
		';
	
	
	
	
}







?>
<section id="news" class="news-area">
	<div class="blog-overly"></div>
	<div class="container">
		<div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>INFORMASI</h2>
            </div>
          </div>
        </div>
		<div class="row">
		
		</div>
		
		<?= $html ?>
		
	</div>
</section>

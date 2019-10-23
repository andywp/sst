<?php
$imgSize='';
/* adodb_pr($posts->data); */

$html_post='';
foreach($posts->data as $r){
	$post = $this->post->getRow($r[0]);
	list($width, $height) = @getimagesize(uploadPath.'modules/posts/'.$post->image);
	if($width > $height){
		$imgSize = 'landscape';
	}
	elseif($width < $height){
		$imgSize = 'potrait';
	}
	
	
	
	
	/* adodb_pr($post); */
	
	
	$html_post.='
		
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
					<a href="'.$post->url.'">'.$post->title.'</a>
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
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="section-headline text-center">
	  <h2><?= $this->pageTitle() ?></h2>
	</div>
  </div>
</div>

<div class="post-thumbnail">
	<?= $html_post ?>
</div>
<div class="page-nav"><?=$this->data->getNav();?></div>
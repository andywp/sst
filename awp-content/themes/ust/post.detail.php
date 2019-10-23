<?php

 
?>
<article class="blog-post-wrapper">
	<div class="post-thumbnail">
	  <img src="<?= $post->imageUrlLarge ?>" class="img-responsive landscape" alt="<?= $post->title ?>">
	</div>
	<div class="post-information">
	  <h2><?=strtoupper($post->title)?></h2>
	  <div class="entry-meta">
		<span class="author-meta"><i class="fa fa-user"></i> <a href="#">admin</a></span>
		<span><i class="fa fa-clock-o"></i><?= date_indo($post->published,$setDay=false,$setTime=false) ?>  </span>
		
	  </div>
	  <div class="entry-content">
		<p>Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris eu dui ut lectus fermentum eleifend. Pellentesque faucibus sem ante, non malesuada odio varius nec. Suspendisse
		  potenti. Proin consectetur aliquam odio nec fringilla. Sed interdum at justo in efficitur. Vivamus gravida volutpat sodales. Fusce ornare sit amet ligula condimentum sagittis.</p>
		<blockquote>
		  <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum
			tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.</p>
		</blockquote>
		<p>Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum.
		  Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae
		  lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.</p>
	  </div>
	</div>
</article>

<h2 class="widget-title  text-center"><?=strtoupper($post->title)?></h2>

<?php if(!empty($post->image)){ ?>
	<div class="post-update">
		<div class="post-img">
			
					<img src="<?= $post->imageUrlLarge ?>" class="img-responsive landscape" alt="<?= $post->title ?>">
				
		</div>
	</div>
<?php } ?>
<div class="autor">
	<ul class="un-style list-inline">
		<li> <i class="far fa-calendar-alt"></i> <?= date_indo($post->published,$setDay=false,$setTime=false) ?>   |</li>
		<li> <i class="fas fa-user"></i> <?=$post->author ?>   </li>
		<li> <i class="fas fa-eye"></i> <?=$post->hits ?></li>
	<ul>
</div>

<div class="post-largr">
		<?= $post->content ?>
</div>
<div class="social-share">
	<?= simpleShare() ?>						
</div>


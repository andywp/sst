<?php

 
?>


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


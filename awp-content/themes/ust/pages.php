<?php if (!defined('basePath')) exit('No direct script access allowed');?>

<h2 class="widget-title  text-center"><?=strtoupper($page->title)?></h2>

<?php if(!empty($page->image)){ ?>
	<div class="post-update">
		<div class="post-img">
			<img src="<?= $page->image ?>" class="img-responsive landscape" alt="<?= $page->title ?>">
		</div>
	</div>
<?php } ?>
<div class="post-largr">
	<?= $page->content ?>
</div>





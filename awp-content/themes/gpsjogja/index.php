<?php if (!defined('basePath')) exit('No direct script access allowed');
//modulid 29
?>
<?php $this->getHeader()?>
<?php $this->widget('top')?>
<?php if($this->thisModuleID()!='1'){

		if($this->thisModuleID()!='29'){
	?>

	
		<section class="index <?= $this->thisModule() ?>" >
			<div class="container">
				<?php echo $this->getContent(); ?>
			</div>
		</section>
<?php 
		}else{
			include 'cctv.php';
		}
		
		
		
		
	} 
?>
<?php $this->getFooter()?>
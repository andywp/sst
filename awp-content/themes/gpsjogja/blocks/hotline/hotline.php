<?php
$h=$this->db->getRow("select hotline_text ,hotline_phone from ".$this->table_prefix."config where 1 ");

?>
<!-- info contact  -->
<section class="callnow" >
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="info-contact">
					<?= strDecode($h['hotline_text']) ?>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="info-contact">
					<ul class="list-unstyled lis-info">
						<li><span class="title-info">HOTLINE SERVICE <i class="fas fa-play"></i> </span></li>
						<li><a href="callto:<?= strDecode($h['hotline_phone']) ?>"><span class="title-number"><?= strDecode($h['hotline_phone']) ?></span> </a></li>
					</ul>
				</div>
			</div>
		
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="info-contact text-center">
					<button class="btn btn-default btn-call">CALL US NOW</button>
					
				</div>
			</div>
		</div>
		
	</div>
</section>
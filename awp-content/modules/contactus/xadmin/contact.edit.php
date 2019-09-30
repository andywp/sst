<?if (!defined('basePath')) exit('No direct script access allowed');

require 'form.init.php';
?>
<div class="widget-container">
	<div class="widget-title">
		<i class="icon-th-list"></i>
		<h5>reply contact</h5>
	</div>
	<?$this->form->getForm('edit',$sqltable,$arrInput,$formName='replyContact',$submitValue='Reply');?>
</div>
<?php if (!defined('basePath')) exit('No direct script access allowed');

$memberId = base64_decode($this->uri(2));
$auth  	  = base64_decode($this->uri(3));

$authUser = $this->db->getone("select auth from ".$this->table_prefix."newsletter where id='".$memberId."' and auth='".$auth."'");

$alertError 	= '<div class="alert alert-error"><i class="icon-remove"></i><strong>Unsubscribe Error: </strong>An error may have stopped your email address from being removed from our Newsletter database.</div>';
$alertSuccess	= '<div class="alert alert-success"><i class="icon-ok"></i><strong>Unsubscribe Success: </strong>Your unsubscribe request has been successfully processed.</div>';
$alert			= $alertError;

if($auth == $authUser){
	
	$unsubscribe = $this->db->execute("update ".$this->table_prefix."newsletter set status='0' where id='".$memberId."'");
	
	if($unsubscribe)$alert = $alertSuccess;
}
?>

<div class="widget-box">

	<div class="widget-header">
		<h2>UNSUBSCRIBE</h2>
	</div>
   
	<div class="widget-content">
		<div class="row-fluid">
			<?=$alert?>
		</div>
	</div>
	
</div>

<script>
setTimeout(function() {
      window.location = baseURL;
}, 8000);
</script>
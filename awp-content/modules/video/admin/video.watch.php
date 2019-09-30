<?php if (!defined('basePath')) exit('No direct script access allowed');

$redirect = base64_decode(substr(get_string_after(requestURI,'r='),1));
$video	  = $this->db->getRow("select video_title,video_description,youtube_id from ".$this->table_prefix."video where video_id='".intval($this->uri(3))."'");

extract($video);
?>


<iframe width="640" height="400" src="//www.youtube.com/embed/<?=$youtube_id;?>" frameborder="0" allowfullscreen></iframe>

<h2><?=$video_title;?></h2>
<p><?=$video_description;?></p>
<div class="form-input-bottom">
	<a class="btn btn-sm btn-primary" href="<?=$redirect;?>"><i class="fa fa-arrow-left"></i> Back</a>
</div>
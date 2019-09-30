<?php if (!defined('basePath')) exit('No direct script access allowed');

/* Section */
$cat = $this->db->getAll("select category_id, category_name from ".$this->table_prefix."category where category_type='main' order by category_name");

$xCat = @$this->_GET('cat');
$setActive = empty($xCat)?'any':$xCat;

$filterCat = '<select name="add_section_id" class="select2 form-control">';

foreach($cat as $vCat){

	$activeClass = $vCat['category_id'] == $setActive?' selected="true"':'';
	$filterCat.= '<option value="'.$vCat['category_id'].'"'.$activeClass.'>'.$vCat['category_name'].'</option>';
}
$filterCat .= '</select>';

$data = $this->db->getRow("select youtube_id, video_title, video_description from ".$this->table_prefix."video where video_id='".intval($this->uri(3))."'");
$redirect	= base64_decode($this->_GET('r'));
$msg	  		= '';
$youtubeId 		= isset($_POST['add_youtube_id'])?$_POST['add_youtube_id']:$data['youtube_id'];
$youtubeTitle 	= isset($_POST['add_youtube_title'])?$_POST['add_youtube_title']:$data['video_title'];
$youtubeDes 	= isset($_POST['add_youtube_description'])?$_POST['add_youtube_description']:$data['video_description'];

if(isset($_POST['add_youtube_id'])){

	if(empty($_POST['add_youtube_id'])){
		$msg = $this->form->alert('error','Youtube ID / URL required');
	}
	elseif(empty($_POST['add_youtube_title'])){
		$msg = $this->form->alert('error','Youtube title required');
	}
	else{

		$youtubeID 	= getYouTubeId($_POST['add_youtube_id']);
		//$youtube	= getYoutubeVideo($youtubeID);
		$thumb = 'http://img.youtube.com/vi/'.$youtubeID.'/maxresdefault.jpg';
		$dataThumb = file_get_contents($thumb);
		$newThumb = date("Ymdhis").'.jpg';
		$dest = uploadPath.'modules/videos/'.$newThumb;

		if(file_put_contents($dest, $dataThumb)){
			create_thumb(uploadPath.'modules/videos/'.$newThumb,uploadPath.'modules/videos/thumbnail/'.$newThumb,'600','jpg');
			$cThumb = $this->db->getOne("select thumbnail from ".$this->table_prefix."video where video_id='".intval($this->uri(3))."'");
			$sql = "update ".$this->table_prefix."video set youtube_id='".$youtubeID."',section_id='".$_POST['add_section_id']."',video_title='".$youtubeTitle."',video_description='".$youtubeDes."',thumbnail='".$newThumb."' where video_id='".intval($this->uri(3))."'";
			if($this->db->execute($sql)){
				@unlink(uploadPath.'modules/videos/'.$cThumb);
				@unlink(uploadPath.'modules/videos/thumbnail/'.$cThumb);
				$msg = $this->form->alert('success','Video updated.');
			}
			else{
				$msg = $this->form->alert('error','Oops, unable to add new video.');
			}
		}
		else{
			$msg = $this->form->alert('error','Oops, unable to get thumbnail.');
		}
	}
}

echo $msg;
?>

<style>
.video-frame{
	border:1px solid #ddd;
	width: 100%;
	height: 315px;
	line-height: 330px;
	text-align:center;
	background: #eee;
	margin-right:30px;
}
.video-frame .icon-vid{
	font-size: 62px;
	color: #ddd;
}
</style>

<div class="xmsg"></div>
<form id="addvideo" name="addvideo" action="" method="POST" enctype="multipart/form-data">

	<div class="box">
		<div class="box-body">
			<div class="row">

				<div class="col-md-5">
					<div class="video-frame">
						<iframe width="420" height="315" src="//www.youtube.com/embed/<?php echo getYouTubeId($youtubeId) ?>" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="youtubeId">Section</label>
								<?php echo $filterCat ?>
							</div>
						</div>
						<div class="col-md-9">
							<div class="form-group">
								<label for="youtubeId">Youtube ID / URL</label>
								<div class="input-group">
									<input type="text" class="form-control" value="<?php echo @$youtubeId ?>" name="add_youtube_id">
									<span class="input-group-btn">
										<button class="btn btn-primary prev" type="button">Preview</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="youtubeTitle">Youtube Title</label>
						<div class="input-group">
							<input type="text" class="form-control youtube-title" name="add_youtube_title" value="<?php echo @$youtubeTitle ?>" size="100">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="youtubeDescription">Youtube Description</label>
						<div class="input-group">
							<textarea class="form-control youtube-description" name="add_youtube_description" cols="100"><?php echo @$youtubeDes ?></textarea>
						</div>
					</div>
					<h3 class="media-heading video-title"></h3>
					<!-- Nested media object -->
					<div class="media">
						<p class="video-info"></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="form-input-bottom form-actions">
		<button id="save_video" name="save_video" class="btn btn-small btn-primary" type="submit">
		<i class="icon-plus"></i> Update video
		</button>
		<a class="btn btn-small btn-warning" href="<?php echo $redirect ?>"><i class="fa fa-long-arrow-left"></i>Back</a>
	</div>
</form>


<!-- Script -->
<script>
	$(function(){

		$('.prev').click(function(){

			$('#video-wrapper').slideDown();

			var xajaxFile = ajaxURL+"<?=modulePath?>video/admin/video.get.prev.php";

			$.ajax({

				type: 'POST',
				url: xajaxFile,
				data: $("#addvideo").serialize(),
				dataType: 'json',
				success: function(data){

					if(!data.error){
						$('.video-frame').html('<iframe width="420" height="315" src="//www.youtube.com/embed/'+data.videoID+'" frameborder="0" allowfullscreen></iframe>');
						$('.youtube-title').val(data.videoTitle);
						$('.youtube-description').html(data.videoDescription);
					}
					else{
						$(".xmsg").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="icon-remove-sign"></i> Error!</strong> '+data.reponMsg+'<br></div>');
					}
				}
			});
			return false;
		});
	});
</script>

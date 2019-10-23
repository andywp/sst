<?php if (!defined('basePath')) exit('No direct script access allowed');

require systemPath.'plugins/recaptcha/recaptchakey.php';
require modulePath.$this->thisModule().'/contact.setting.php';

$errorLang = array(
	
	'error' 	 => '<p class="error"><b>GAGAL : </b>Pesan anda gagal terkirim.</p>',
	'error_en' 	 => '<p class="error"><b>ERROR : </b>Failed to sennding your message.</p>',
	'success' 	 => '<p class="success"><b>SUKSES : </b>Pesan anda telah berhasil dikirimkan.</p>',
	'success_en' => '<p class="success"><b>SUCCESS : </b>Your message has been successfully sent.</p>'
);

$msg 	     = '';
$settings    = '';
$setField    = '';
$errorInsert = '';
$cParams     = $this->getParams('contact');

if(isset($_POST['save'])){

	$resp  = null;
	$error = null;

	foreach($arrSetting as $xval=>$label){
	
		if(in_array($xval,$cParams['setting'])){
			
			if(empty($_POST['add_'.$xval])){
				
				$error['add_'.$xval] = 'This field is required.';
				$error['code'][]		 = 1;
			}
			else{
				
				$error['add_'.$xval] = '';
				$error['code'][]	 = 0;			
			}
		}
	}	

	if(empty($_POST["recaptcha_response_field"])){
	
		$error['rechaptha'] = 'Please Enter the Code Shown';
		$error['code'][]	= 1;					
	}
	else{
	
		$resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);

		if(!$resp->is_valid) {

			$error['rechaptha'] = 'Incorrect. Try again..';
			$error['code'][]	= 1;
		} 
		else{
			
			$error['rechaptha'] = '';
			$error['code'][]	= 0;	
		}
	}

	if(!in_array(1,$error['code'])){
		
		foreach($_POST as $fName=>$fVal){

			if(preg_match('/add_/i',$fName)){
				
				$setField .= str_replace('add_','',$fName).'=\''.htmlentities(strip_tags(stripslashes($fVal)), ENT_QUOTES, 'UTF-8').'\',';
			}
		}
		$setField = $setField." contact_date='".date("Y-m-d H:i:s")."'";
		$query	  = 'insert into '.$this->table_prefix.'contact set '.$setField;

		if(!$this->db->execute($query)){
		
			$errorInsert = $errorLang['error_'.$this->active_lang()];
		}
		else{
		
			#send email
			$email = $this->getEmailTemplate('contact');
			extract($email);

			$sendmail['to'] 	 	= @$_POST['add_contact_email'];
			$sendmail['subject'] 	= @$email_subject;
			$sendmail['cc'] 		= @$email_cc;
			$sendmail['bcc'] 		= @$email_bcc;
			$sendmail['from'] 		= @$email_from;
			$sendmail['from_name'] 	= @$email_from_name;
			$sendmail['content'] 	= @$this->replaceEmailContent($email_content,$_POST);
			
			$this->sendMail($sendmail);
			
			$errorInsert = @$errorLang['success_'.$this->active_lang()];
			$_POST 		 = array();
		}		
	}
}

foreach($arrSetting as $val=>$label){
	
	if(in_array($val,$cParams['setting'])){
		
		$errorMsg  = !empty($error['add_'.$val])?'<em>'.$error['add_'.$val].'</em>':'';
		$addClass  = $val=='contact_email'?'required email':'required';
		$type  	   = $val=='contact_email'?'email':'text';
		$settings .= '
		
			<div class="col-sm-6">
				<input type="'.$type.'" name="add_'.$val.'" value="'.@$_POST['add_'.$val].'" class="form-control input-lg '.$addClass.'" placeholder="'.$label.'"/>
				'.$errorMsg.'
			</div>
		';
	}
}

if(isFileExist($this->themePath(),'contactus.php')){
	include $this->themePath().'contactus.php';
}
else{
	
	?>
	<style>
		.contact-us li {
			color: #333;
		}
		.contact-us i {
			color: #9c3;
		}
		#map-canvass{
			height :400px;
		}
	</style>
	
	
	<div class="container">
		<div class="big-title text-center">
			<h1 class="heading text-center">Hubungi Kami Planet GPS Jogja</h1>
			<div class="separator"></div>
		</div>
		<div class="contact-us">
			<ul class="call list-unstyled">
				<li><i class="fas fa-home"></i> Planet GPS Jogja </li>
				<li><i class="fas fa-map-marker"></i> <?= $this->site->company_address() ?> </li>
				<li><i class="fas fa-phone-square"></i></i>  <?= $this->site->company_phone() ?> </li>
				<!-- <li><i class="far fa-envelope"></i> <?= $this->site->company_email() ?></li> -->
			</ul>
		</div>
	</div>
	<div class="section-map">
		<div id="map-canvass"></div>
	</div>
	<?php
}
?>

<?php
$contactSettings = $this->getParams('contact');
$markerInfo		 = base64_decode($contactSettings['content']);
$markerInfo		 = '<h4 class="hedding-title" >'.$this->site->company_name().'</h4>'.$this->site->company_address();
$position=explode(',',$contactSettings['geolocation']);

?>
<script type="text/javascript">
//<![CDATA[
 function initMap() {
		var uluru = {lat: <?= $position[0] ?>, lng: <?= $position[1] ?>};
		var map = new google.maps.Map(document.getElementById('map-canvass'), {
		  zoom: 16,
		  center: uluru,
		  scrollwheel: false,
		});

		var contentString = '<?= $markerInfo	 ?>';

		var infowindow = new google.maps.InfoWindow({
		  content: contentString
		});

		var marker = new google.maps.Marker({
		  position: uluru,
		  map: map,
		  title: '<?= $markerInfo ?>'
		 
		});
		marker.addListener('click', function() {
		  infowindow.open(map, marker);
		});
	  }
		var map;
		function initialize() {
		  var mapOptions = {
			zoom: 16,
			center: new google.maps.LatLng(<?= $position[0] ?>, <?= $position[1] ?>),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
		  };
			  map = new google.maps.Map(document.getElementById('map-canvass'),mapOptions);
			  new google.maps.Marker({map:map,position:map.getCenter()});
			}
			google.maps.event.addDomListener(window, 'load', initialize);
			$(window).scroll(function(){
				//THE HEIGHT, PLUS THE MARGIN OR PADDING IT NEEDS TO BE FULLY COVERED
				if($(window).scrollTop() < $('#map-canvass').height() + 21) 
					$('#map-canvass').css({'transform':'translate(0px,'+$(window).scrollTop()+'px)'});
			});
//]]>

$(document).ready(function() {
	$('.landscape').click(function(){
		  $('.modal-body').empty();
		var title = $(this).parent('a').attr("title");
		$('.modal-title').html(title);
		$($(this).parents('div').html()).appendTo('.modal-body');
		$('#myModal').modal({show:true});
	});

	
	
});
</script>
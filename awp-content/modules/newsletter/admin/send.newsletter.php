<?php if (!defined('basePath')) exit('No direct script access allowed');

$seconds = strtotime('2013-08-05 18:08:08') - strtotime('2013-08-05 18:07:08');
$imageUrl	 = uploadURL.'modules/gallery/';
$pIsi2 ='';

$rsMember	 = $this->db->execute("select id from ".$this->table_prefix."newsletter where status='1'");
$totalMember = $rsMember->recordCount();
$sendTo		 = 99;

$totalOption = ceil($totalMember/$sendTo);
$option		 = '<option value="1">1 - 100</option>';

for($i=1; $i<$totalOption; $i++){

	$key1 = $i.'01';
	$key2 = $key1 + $sendTo;

	$option .= '<option value="'.$key1.'">'.$key1.' - '.$key2.'</option>';
}

/* Send Email */
if(isset($_POST['submit'])){

	$xmember 	 = $_POST['xmember']-1;
	$limit	 	 = $xmember+$sendTo;
	$limitTime	 = 3600;

	$getSendDate = $this->db->getOne("select newsletter  from ".$this->table_prefix."params where 1");

	if(!empty($getSendDate)){

		$newsLetterParams = $this->getParams('newsletter');

		$ftime = strtotime($newsLetterParams['sendDate']);
		$stime = strtotime(date('Y-m-d h:i:s'));

		$interval = $stime-$ftime;
	//	$allowed  = $interval<$limitTime?false:true;
        $allowed = true;
	}
	else{
		$allowed = true;
	}

	if(!$allowed){
		$alert = $this->form->alert('warning','Newsletter can be sent only once in an hour.');
	}
	elseif(empty($_POST['subject'])){
		$alert = $this->form->alert('warning','Subject cannot be empty');
	}
	elseif(empty($_POST['message'])){
		$alert = $this->form->alert('warning','Message cannot be empty');
	}
	else{

		$getMember = $this->db->getAll("select id,email,auth from ".$this->table_prefix."newsletter where status ='1' limit ".$xmember.",".$limit."");
	    $sks=0;
		$ggl=0;
		foreach($getMember as $mail){


			$unsubscribeUrl = baseURL.'unsubscribe/'.base64_encode($mail['id']).'/'.base64_encode($mail['auth']);
			$footerMail 	= '

				<div style="border-top:1px dotted #ddd;font-size:11px;margin-top:20px;padding:10px 0;">
					This is an automated e-mail message, please do not reply directly.
					If you do not wish to receive notifications, click <a href="'.$unsubscribeUrl.'">here</a>.
				</div>
			';
			@$_POST['unsubscribelink'] = '<a href="'.$unsubscribeUrl.'">unsubscribe</a>';
			$sendmail['subject'] 	= $_POST['subject'];
			$sendmail['cc'] 		= '';
			$sendmail['bcc'] 		= '';
			$sendmail['from'] 		= $_POST['from_email'];
			$sendmail['from_name'] 	= $_POST['from_name'];
			$sendmail['content'] 	= perbaharuipath($this->replaceEmailContent(stripslashes($_POST['message']).$footerMail,$_POST));
			$sendmail['server']     = $_POST['emailtype'];
			$sendmail['to'] = $mail['email'];


			$kirim=$this->sendMailNewsletter($sendmail);
			//adodb_pr($sendmail);
			$this->db->execute("insert ".$this->table_prefix."newsletter_detail set tanggal=now(),
			judul='".$_POST['subject']."',
			pengirim='".$_POST['from_name']." <".$_POST['from_email'].">',
			email='".$sendmail['to']."',
			pesan='".htmlentities($sendmail['content'])."',
			status='".$kirim."',
			user='".$_SESSION['admin']['id']."',
			server='".$_POST['emailtype']."'");
			if($kirim=="success"){
				$sks++;
			}
			else{
			   $ggl++;
			}
		}

		// Update Params
		$xdate 		= date('Y-m-d h:i:s');
		$sendDate	= array('sendDate' => $xdate);

		$this->db->execute("update ".$this->table_prefix."params set newsletter ='".serialize($sendDate)."'");
		$this->db->execute("insert ".$this->table_prefix."statistik set tanggal=now(),sukses='".$sks."',gagal='".$ggl."',server='".$_POST['emailtype']."'");
		$alert = $this->form->alert('success','Email has been sent');
	}
}
?>
<?=@$alert;?>
<script type="text/javascript" src="<?=systemURL?>form/ckeditor/ckeditor/ckeditor.js"></script>

<form name="sendNewsletter" action="" method="post" enctype="multipart/form-data">
<div class="box">
	<div class="box-body">
		<input type="hidden" name="emailtype" value="local">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Send to</label>
						<div class="controls">
							<select class="select2 form-control" name="xmember"><?=$option?></select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">From Email</label>
						<div class="controls">
							<input type="text" class="form-control validateText" value="info@domail.com" name="from_email">
						</div>
					</div>
				</div>
				 <div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Subject</label>
						<div class="controls">
							<input type="text" class="form-control validateText" value="" name="subject">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">From Name</label>
						<div class="controls">
							<input type="text" class="form-control validateText" value="Info" name="from_name">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Message</label>
						<div class="controls">
							<textarea class="ckeditor" name="message" id="message"><?=$pIsi2?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button id="save_product" name="submit" class="btn btn-flat btn-primary" type="submit">Send Newsletter</button>
</form>
<script type="text/javascript">
    CKEDITOR.replace("message");
</script>

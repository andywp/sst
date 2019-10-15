<?php if (!defined('basePath')) exit('No direct script access allowed'); 


$mahasisiwa=$this->db->getRow('select * from awp_mhs where mhs_id='.$this->_GET('mhs'));
foreach($mahasisiwa as $k=>$v){
	$_POST[$k]=strtoupper($v);
}

//adodb_pr($_POST);
$surat=$this->db->getOne('select surat from awp_surat where surat_id='.$this->_GET('surat'));
$surat=strDecode($surat);
adodb_pr($_POST);
$_POST['dateNOW']=date_indo(date('Y-m-d'),false);
ob_end_clean();


$data=@$this->replaceEmailContent($surat,$_POST);
?>
<html>
	<head>
		<script>window.print();</script>
		<style>
		
			div#modal-contact-detail {
				DISPLAY: NONE;
			} 
	body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    *{
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 0;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 0;
        height: 257mm;
        outline: 2cm #fff solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
		</style>
	</head>
	<body>
		<div class="book">
			<div class="page">
				<div class="subpage">
					<table width="100%" border="0" >
						<tr>
							<td width="100px" ><img style="width: 100px;" src="<?= uploadURL.'modules/siteconfig/thumbs/small/'.$this->site->logo(); ?>">
							</td>
							<td align="center" >
								<h3 style="margin: 0; padding:0; color:red; ">UNIVERSITAS SARJANAWIYATA TAMANSISWA</h3>
								<h1 style="margin: 0; padding:0;" >FAKULTAS TEKNIK</h1>
								<p style="margin: 0; padding:0;" >Jl. Miliran No. 16, UH. II, Muja Muju Yogyakarta 55165</p>
								<p style="margin: 0; padding:0;" > e-mail:ft@ustjogja.ac.id</p>
							</td>
						</tr>
					</table>
					<hr>
					<?= $data ?>
				</div>
			</div>
		<div>
	</body>
</html>

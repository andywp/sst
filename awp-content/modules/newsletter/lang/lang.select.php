<?php if (!defined('basePath')) exit('No direct script access allowed');

function getURI($segment,$url){
	
	global $system;
	
	$getURI = str_replace($system->thisURI(),'',$url);	
	$requestURI = $system->config['permalink']=='.html'?get_string_before($getURI,'.html'):$getURI;
	$requestURI = $system->config['permalink']=='.html' && !preg_match('/.html/i',$getURI)?$getURI:$requestURI;	
	$uri  = explode('/',str_replace($system->config['baseURL'],'',$requestURI));

	if(array_key_exists($segment, $uri)){
		return $uri[$segment];
	}
	else{
		return null;
	}
}

$selectedLang = $_POST['lang_id'];
$currentUrl = getURI(0,$_SERVER['HTTP_REFERER']);
$columnName	= $this->site->isMultiLang()?'page_url_'.$selectedLang:'page_url';
$columnUrl = $this->isColumnExist($this->table_prefix.'pages',$columnName)?$columnName:'page_url';
$currentColumnName = $this->site->isMultiLang()?'page_url_'.$this->active_lang():'page_url';
$pageID = $this->db->getOne("select page_id from ".$this->table_prefix."pages where ".$currentColumnName."='".$currentUrl."'");
$module = $this->db->getOne("select m.module_name from ".$this->table_prefix."modules m left join ".$this->table_prefix."pages p on(m.module_id=p.module_id) where p.".$currentColumnName."='".$currentUrl."'");
$pageUrl = $this->db->getOne("select ".$columnUrl." from ".$this->table_prefix."pages where ".$currentColumnName."='".$currentUrl."'");
$redirect = baseURL;

if(!empty($module)){
	
	$redirect .= $pageUrl.$this->permalink();
	
	switch($module){
		
		case 'lang':break;
		
		case 'posts':
			if($currentUrl=='read'){
				$postID = intval(getURI(1,$_SERVER['HTTP_REFERER']));
				$postTitle = $this->db->getOne("select post_title_".$selectedLang." from ".$this->table_prefix."posts where post_id='".$postID."'");
				$redirect = baseURL.'read/'.$postID.'/'.seo_slug($postTitle).$this->permalink();
			}
			else{
				
			}
		break;
	}
}

$this->change_lang('public',$selectedLang);
echo $response = json_encode(array('redirect'=>$redirect));
?>
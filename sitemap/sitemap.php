<?php
error_reporting(0);
define("baseURL","https://planetgpsjogja.com/demo/");
include '../awp-system/databases/adodb/adodb.inc.php';
/*----- Koneksi data Base-------*/
	$db['host'] 	= 'localhost';
	$db['user'] 	= 'planetgp_root';
	$db['password'] = 'V#xXI,pJ_P0s';
	$db['db_driver'] = 'mysqli';
	$db['nama_db'] 	= 'planetgp_root';
	  
	  class System{
		  function System(){
			 
			  global $db;
			  $this->db 		= NewADOConnection($db['db_driver']);
			  if (!$this->db->Connect($db['host'] ,$db['user'] ,$db['password'],$db['nama_db'])){	
				die( mysql_error() . ' Error while connecting to Database Server');
			}
			$ADODB_FETCH_MODE 	= ADODB_FETCH_ASSOC;
		  }
		  
	  } 
	  $system= new System;
function seo_slug($str){

	$seo = strtolower(str_replace(' ','-',preg_replace('/[^a-zA-Z0-9_ %\[\]\.%&-]/s', '', $str)));
	$seo=trim($seo);
	return $seo;
}	  

$data='<?xml version="1.0" encoding="UTF-8"?>';
$data.='<urlset
      xmlns="https://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="https://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="https://www.sitemaps.org/schemas/sitemap/0.9
            https://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
$data.='<url>
		  <loc>'.baseURL.'</loc><changefreq>weekly</changefreq>
		</url>';
$data.='<url>
		  <loc>'.baseURL.'gps-motor-mobil.html</loc><changefreq>weekly</changefreq>
		</url>';
$data.='<url>
		  <loc>'.baseURL.'artikel.html</loc><changefreq>weekly</changefreq>
		</url>';
$data.='<url>
		  <loc>'.baseURL.'tentang-kami.html</loc><changefreq>weekly</changefreq>
		</url>';
$data.='<url>
		  <loc>'.baseURL.'hubungi-kami.html</loc><changefreq>weekly</changefreq>
		</url>';

$detailURL=$system->db->getOne("select page_url from awp_pages where page_switch='produc_main'  order by page_id DESC limit 1");
$query="select url_slug from awp_produk where  active=1 order by produk_id DESC";
$produk=$system->db->getAll($query);
foreach($produk as $r){
	
	
	$url=baseURL.$detailURL.$category.'/'.seo_slug($r['url_slug']).'.html';
	$data.='<url>
		  <loc>'.$url.'</loc><changefreq>weekly</changefreq>
		</url>';
}		
		
$qqqwertty='SELECT post_id,post_title FROM awp_posts where publish=1  ';

$post=$system->db->getAll($qqqwertty);

foreach($post as $p){
	$url=baseURL.'read/'.$p['post_id'].'/'.seo_slug($p['post_title']).'.html';
	$data.='<url>
		  <loc>'.$url.'</loc><changefreq>weekly</changefreq>
		</url>';
}
$data .= '</urlset>';

header('Content-Type: application/xml');
echo $data;		 
?>
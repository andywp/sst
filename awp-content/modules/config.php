<?php

/** sas - Configuration File
  *
  *   @version: 1.0
  *    @author: Andi WP <andy.wijang@gmail.com>
  * @copyright: 2018 awp Project
  *   @package: awp_system
  *   @license: http://opensource.org/licenses/GPL-3.0 GPLv3
  *   @license: http://opensource.org/licenses/LGPL-3.0 LGPLv3
  */

/* Base URL */
$base_url 					= 'situsehat/';


/* Database Setting */
$config['db_host']	 	= 'localhost';
$config['db_user'] 		= 'k8977764_usr';
$config['db_password'] 	= 'iV$~i5iMlPUK';
$config['db_name'] 		= 'k8977764_situsehat';


/* prefix */
$config['tablePrefix']	= 'sas_';
$config['adminName']		= 'awp-admin';
$config['permalink']		= '.html';


/* Define Base URL/Path */
$config['baseURL']		= $base_url;
$config['basePath']		= str_replace('//','/',$_SERVER['DOCUMENT_ROOT'].'/'.$base_url);


/* Session */
$config['sessionName']	= 'sassession';


/* email */
$config['useMailer']	 	= false;
$config['emailHost']	 	= '';
$config['emailUser'] 	 	= '';
$config['emailPassword'] 	= '';


/* Copyright */
$config['copyright']		= 'Designed & Developed by <a href="http://kedaikerja.com" target="_blank">Kedaikerja</a>';


/* Demo */
$config['demo']			= false;


/* Database Driver */
$config['db_diver']		= 'mysqli';
$config['drivers']	 	= array('mysql','mysqli');
/* API */
$config['googleKey']		= 'AIzaSyCn8EFLEdv8yxSd7H5TxrbKjcbN50cgqqA';
$config['youtubeKey']		= 'AIzaSyCP4VPZCZv2corqe_qB0I3k3C0za81jzMk';
?>

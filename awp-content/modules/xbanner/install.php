<?php if (!defined('basePath')) exit('No direct script access allowed');

/* Add table to database */
$db = "
	CREATE TABLE IF NOT EXISTS `cni_banner` (
  `banner_id` int(10) unsigned NOT NULL auto_increment,
  `banner_title` varchar(100) collate latin1_general_ci NOT NULL,
  `banner_link` varchar(255) collate latin1_general_ci NOT NULL,
  `banner_image` varchar(100) collate latin1_general_ci NOT NULL,
  `banner_order` tinyint(3) unsigned NOT NULL,
  `banner_position` enum('top','left','bottom','right') collate latin1_general_ci NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=87 ;
";
$system->db->execute($db);

/* Add module to page */
$pageMainName 		= 'Banners';
$pageMainURL		= 'banners';
$pageMainSwitch		= 'banner_main';
$pageMainAdminOnly	= 1;
$pageMainPublish	= 1;

$pageAddName 		= 'Add new banner';
$pageAddURL			= 'add-new-banner';
$pageAddSwitch		= 'banner_add';
$pageAddAdminOnly	= 1;
$pageAddPublish		= 0;

$pageEditName 		= 'Edit banner';
$pageEditURL		= 'edit-banner';
$pageEditSwitch		= 'banner_edit';
$pageEditAdminOnly	= 1;
$pageEditPublish	= 0;

$pageMainField 		= "page_name='".$pageMainName."',page_url='".$pageMainURL."'";
$pageAddField 		= "page_name='".$pageAddName."',page_url='".$pageAddURL."'";
$pageEditField 		= "page_name='".$pageEditName."',page_url='".$pageEditURL."'";

if($system->site->isMultiLang()){
	
	foreach($system->site->lang() as $langID=>$langVal){
		
		$pageMainField 	.= ",page_name_".$langID."='".$pageMainName."',page_url_".$langID."='".$pageMainURL."'";
		$pageAddField 	.= ",page_name_".$langID."='".$pageAddName."',page_url_".$langID."='".$pageAddURL."'";
		$pageEditField 	.= ",page_name_".$langID."='".$pageEditName."',page_url_".$langID."='".$pageEditURL."'";
	}
}

$getPage = $system->db->execute("select page_id from ".$system->table_prefix."pages where page_name='".$pageMainName."'");
$nAccess = array();

if($getPage->recordCount()==0){

	$system->db->execute("insert into ".$system->table_prefix."pages set module_id='".$moduleID."',".$pageMainField.",page_switch='".$pageMainSwitch."',admin_only='".$pageMainAdminOnly."',publish='".$pageMainPublish."'");
	$parentID  = $system->db->insert_ID();
	$nAccess[] = $parentID;
	$addPage   = "insert into ".$system->table_prefix."pages set module_id='".$moduleID."',".$pageAddField.",parent_id='".$parentID."',page_switch='".$pageAddSwitch."',admin_only='".$pageAddAdminOnly."',publish='".$pageAddPublish."'";
	$editPage  = "insert into ".$system->table_prefix."pages set module_id='".$moduleID."',".$pageEditField.",parent_id='".$parentID."',page_switch='".$pageEditSwitch."',admin_only='".$pageEditAdminOnly."',publish='".$pageEditPublish."'";

	$system->db->execute($addPage);
	$nAccess[] = $system->db->insert_ID();
	$system->db->execute($editPage);
	$nAccess[] = $system->db->insert_ID();
}

/* Update Group Access [developer]*/
$newAccess = $nAccess;

foreach($newAccess as $v){
	array_push($_SESSION['admin']['access'],$v);
}

$updateQuery = "update ".$system->table_prefix."user_group set access='".serialize($system->admin('access'))."' where group_id='1'";
$system->db->execute($updateQuery);
?>
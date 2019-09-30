<?php if (!defined('basePath')) exit('No direct script access allowed');

/* Add table to database */
$db = "
	CREATE TABLE IF NOT EXISTS `sas_video` (
  `video_id` int(10) unsigned NOT NULL auto_increment,
  `video_title` varchar(250) default NULL,
  `video_description` text NOT NULL,
  `youtube_id` varchar(50) default NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY  (`video_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;
";
$system->db->execute($db);

/* Add module to page */
$pageMainName 		= 'Video';
$pageMainURL		= 'video';
$pageMainSwitch		= 'video_main';
$pageMainAdminOnly	= 1;
$pageMainPublish	= 1;

$pageAddName 		= 'Add video';
$pageAddURL			= 'add-video';
$pageAddSwitch		= 'video_add';
$pageAddAdminOnly	= 1;
$pageAddPublish		= 0;

$pageEditName 		= 'Edit video';
$pageEditURL		= 'edit-video';
$pageEditSwitch		= 'video_edit';
$pageEditAdminOnly	= 1;
$pageEditPublish	= 0;

$pageWatchName 		= 'Watch video';
$pageWatchURL		= 'watch-video';
$pageWatchSwitch	= 'video_watch';
$pageWatchAdminOnly	= 1;
$pageWatchPublish	= 0;

$pageMainField 		= "page_name='".$pageMainName."',page_url='".$pageMainURL."'";
$pageAddField 		= "page_name='".$pageAddName."',page_url='".$pageAddURL."'";
$pageEditField 		= "page_name='".$pageEditName."',page_url='".$pageEditURL."'";
$pageWatchField 	= "page_name='".$pageWatchName."',page_url='".$pageWatchURL."'";


if($system->site->isMultiLang()){

	foreach($system->site->lang() as $langID=>$langVal){

		$pageMainField 	.= ",page_name_".$langID."='".$pageMainName."',page_url_".$langID."='".$pageMainURL."'";
		$pageAddField 	.= ",page_name_".$langID."='".$pageAddName."',page_url_".$langID."='".$pageAddURL."'";
		$pageEditField 	.= ",page_name_".$langID."='".$pageEditName."',page_url_".$langID."='".$pageEditURL."'";
		$pageWatchField .= ",page_name_".$langID."='".$pageWatchName."',page_url_".$langID."='".$pageWatchURL."'";
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
	$watchPage  = "insert into ".$system->table_prefix."pages set module_id='".$moduleID."',".$pageWatchField.",parent_id='".$parentID."',page_switch='".$pageWatchSwitch."',admin_only='".$pageWatchAdminOnly."',publish='".$pageWatchPublish."'";

	$system->db->execute($addPage);
	$nAccess[] = $system->db->insert_ID();
	$system->db->execute($editPage);
	$nAccess[] = $system->db->insert_ID();
	$system->db->execute($watchPage);
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

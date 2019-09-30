<?php if (!defined('basePath')) exit('No direct script access allowed');

$error 	   		= true;
$reponMsg  		= '';
$videoID		= '';
$videoTitle		= '';
$videoDesc		= '';
$videoAuthor	= '';
$videoDuration	= '';

if(empty($_POST['add_youtube_id'])){
	$reponMsg = 'Enter youtube ID / URL';
}
else{
	
	$youtubeID 	= getYouTubeId($_POST['add_youtube_id']);
	$youtube	= getYoutubeData($youtubeID);
	
	if(isset($youtubeID)){
		
		$videoID		= $youtubeID;
		
		$error 	   		= false;
	}
	else{
		$reponMsg = 'Invalid Youtube URL/ID';
	}
}

$response = array(
	
	'error'				=> @$error,
	'reponMsg'			=> @$reponMsg,
	'videoID'			=> @$videoID,
	'videoTitle'		=> @$youtube['title'],
	'videoDescription'	=> @$youtube['description'],
	'videoAuthor'		=> @$youtube['channelTitle'],
	'videoDuration'		=> @$youtube['duration']
);

echo json_encode($response);
?>
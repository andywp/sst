<?php
/* Time zone */
@date_default_timezone_set('Asia/Jakarta');

/* Basic Needed */
require_once('awp-system/config/config.php');
require_once('awp-system/constants.php');
require_once('awp-system/load.php');

/* Define variables */
$system = new system;

/* Load Theme */
$system->errorReporting(0);
$system->db->debug=0;
?>
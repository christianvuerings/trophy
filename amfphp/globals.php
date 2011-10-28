<?php

//This file is intentionally left blank so that you can add your own global settings
//and includes which you may need inside your services. This is generally considered bad
//practice, but it may be the only reasonable choice if you want to integrate with
//frameworks that expect to be included as globals, for example TextPattern or WordPress

//Set start time before loading framework
list($usec, $sec) = explode(" ", microtime());
$amfphp['startTime'] = ((float)$usec + (float)$sec);

$servicesPath = "services/";
$voPath = "services/vo/";


/**
* Database configuration
*/
// Type of connection
define('DATABASE_TYPE', 'mysql');
// Database name
define('DATABASE_DATABASE', 'trophy');
// Database host
define('DATABASE_HOSTNAME', 'localhost');
// Database port
define('DATABASE_PORT', '3306');
// Database username
define('DATABASE_USERNAME', 'root');
// Datebase password
define('DATABASE_PASSWORD', '');

?>
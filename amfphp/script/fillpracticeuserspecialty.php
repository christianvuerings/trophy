<?php
set_time_limit (5000);
include_once('./../services/Include/configuration.php');

$con = mysql_connect('localhost', 'root', '');

if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($GLOBALS['configuration']['db'], $con);

$query = 'select user_id from user';
$results = mysql_query($query);


$userids = array();

while($row = mysql_fetch_assoc($results)){
	array_push($userids,$row['user_id']);
}

$query = 'select id from city';
$results = mysql_query($query);


$cityids = array();

while($row = mysql_fetch_assoc($results)){
	array_push($cityids,$row['id']);
}

$query = 'select practice_id from practice';
$results = mysql_query($query);


$practiceids = array();

while($row = mysql_fetch_assoc($results)){
	array_push($practiceids,$row['practice_id']);
}

mt_srand(time());

for($i=0;$i<25000;$i++){
	$randomSpecialty = mt_rand(1,9);
	$amountPractice=count($practiceids);
	$randomPractice = mt_rand(1,$amountPractice);
	$amountUsers=count($userids);
	$randomUser = mt_rand(1,$amountUsers);
	mysql_query("INSERT INTO practice_user_specialty (practice_id,user_id,specialty_id) VALUES ('".$practiceids[$randomPractice]."','".$userids[$randomUser]."','$randomSpecialty') ");	
}






mysql_close($con);
?>



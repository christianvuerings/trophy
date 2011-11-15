<?php
set_time_limit (3000);
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

for($i=0;$i<7000;$i++){
	$resource = mysql_query("INSERT INTO address (address_street, address_number, city_id) VALUES ('Streetstraat', '". rand(1,256) ."', '" . array_rand($cityids) . "')");
	$addressId = mysql_insert_id();
	mysql_query("INSERT INTO practice (name, address_id,telephone,fax) VALUES ('Praktijk $i', '$addressId','telephone$i','fax$i') ");
}


mysql_query("INSERT INTO specialty (label) VALUES ('specialty1) ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty2) ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty3) ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty4) ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty5) ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty6) ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty7) ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty8) ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty9) ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty10) ");



mysql_close($con);
?>



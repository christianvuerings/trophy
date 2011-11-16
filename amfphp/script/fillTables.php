<?php
set_time_limit (3000);
include_once('./../services/Include/configuration.php');

$firstnamesBoys = array(
    'Jacob',
    'Ethan',
    'Michael',
    'Jayden',
    'William',
    'Alexander',
    'Noah',
    'Daniel',
    'Aiden',
    'Anthony',
    'Joshua',
    'Mason',
    'Christopher',
    'Andrew',
    'David',
    'Matthew',
    'Logan',
    'Elijah',
    'James',
    'Joseph',
    'Gabriel',
    'Benjamin',
    'Ryan',
    'Samuel',
    'Jackson',
    'John',
    'Nathan',
    'Jonathan',
    'Christian',
    'Liam',
    'Dylan',
    'Landon',
    'Caleb',
    'Tyler',
    'Lucas',
    'Evan',
    'Gavin',
    'Nicholas',
    'Isaac',
    'Brayden',
    'Luke',
    'Angel',
    'Brandon',
    'Jack',
    'Isaiah',
    'Jordan',
    'Owen',
    'Carter',
    'Connor',
    'Justin');

$firstnamesGirls = array(
    'Peyton',
    'Audrey',
    'Claire',
    'Arianna',
    'Julia',
    'Aaliyah',
    'Kylie',
    'Lauren',
    'Sophie',
    'Sydney',
    'Camila',
    'Jasmine',
    'Morgan',
    'Alexandra',
    'Jocelyn',
    'Gianna',
    'Maya',
    'Kimberly',
    'Mackenzie',
    'Katherine',
    'Destiny',
    'Brooke',
    'Trinity',
    'Faith',
    'Lucy',
    'Madelyn',
    'Madeline',
    'Bailey',
    'Payton',
    'Andrea',
    'Autumn',
    'Melanie',
    'Ariana',
    'Serenity',
    'Stella',
    'Maria',
    'Molly',
    'Caroline',
    'Genesis',
    'Kaitlyn',
    'Eva',
    'Jessica',
    'Angelina',
    'Valeria',
    'Gabrielle',
    'Naomi',
    'Mariah',
    'Natalia',
    'Paige',
    'Rachel');

$lastnames = array(
    'Sanchez',
    'Morris',
    'Rogers',
    'Reed',
    'Cook',
    'Morgan',
    'Bell',
    'Murphy',
    'Bailey',
    'Rivera',
    'Cooper',
    'Richardson',
    'Cox',
    'Howard',
    'Ward',
    'Torres',
    'Peterson',
    'Gray',
    'Ramirez',
    'James',
    'Watson',
    'Brooks',
    'Kelly',
    'Sanders',
    'Price',
    'Bennett',
    'Wood',
    'Barnes',
    'Ross',
    'Henderson',
    'Coleman',
    'Jenkins',
    'Perry',
    'Powell',
    'Long',
    'Patterson',
    'Hughes',
    'Flores',
    'Washington',
    'Butler',
    'Simmons',
    'Foster',
    'Gonzales',
    'Bryant',
    'Alexander',
    'Russell',
    'Griffin',
    'Diaz',
    'Hayes');

$streetnames = array(
    'Achtergracht',
    'Antheunisstraat',
    'Apollo',
    'Apollolaan',
    'Baarsjesweg',
    'Baekelandplein',
    'Baekelandstraat',
    'Baljuwslaan',
    'Beethovenstraat',
    'Berekuil',
    'Bilderdijkstraat',
    'Burgemeester Daleslaan',
    'Carnegiedreef',
    'Constance Gerlingsstraat',
    'Cuypers-straten',
    'Dapperstraat',
    'Debussystraat',
    'Den Texstraat',
    'Deutzstraat',
    'Eilbrachtstraat',
    'Fokke Simonszstraat',
    'Geert van Woustraat',
    'Gerard van Swieten',
    'Gerrit van der Veenstraat',
    'H.J.E. Wenckebachweg',
    'Jan Ligthartstraat',
    'Jan van Eyckstraat',
    'Javastraat',
    'Johan Broedeletstraat',
    'Johannes Post',
    'Jonas Daniel Meijerplein',
    'Kalverstraat',
    'Keern',
    'Laan van Meerdervoort',
    'Lauriergracht',
    'Lavoisierstraat',
    'Lawei',
    'Leliestraat',
    'Linnaeusstraat',
    'Looiersgracht',
    'Marianne Philipsstraat',
    'Melksterstraat',
    'Mierlo-straten',
    'Modder',
    'Nesciohof',
    'Nevski Prospekt',
    'Parnassus',
    'Pierre Cuypershof',
    'Potgieterlaan',
    'Praubstraat',
    'Prinsengracht',
    'Pijlsteeg',
    'Reestraat',
    'Roode Steen',
    'Salieristraat',
    'Sarphatistraat',
    'Schakelstraat',
    'Stiena Ruypers Park',
    'Thorbeckeplein',
    'Transformatorweg',
    'van Welderenstraat',
    'Vermaning',
    'Wilhelmina Hofman Pootstraat',
    'Willem de Clercqstraat',
    'Yitzhak Rabinpad',
    'Yitzhak-Rabin-Platz',
    'Zwaardecroonhaven');

$con = mysql_connect('localhost', 'root', '');
//$con = mysql_connect($GLOBALS['configuration']['host'], $GLOBALS['configuration']['user'],$GLOBALS['configuration']['pass'] );
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($GLOBALS['configuration']['db'], $con);

// fill languages
mysql_query("INSERT INTO language (language_id, label) VALUES ('nl', dutch')");
mysql_query("INSERT INTO language (label) VALUES ('en', 'english')");
mysql_query("INSERT INTO language (label) VALUES ('fr', 'french')");
$languageIds = array('nl', 'en', 'fr');

// fill target groups
mysql_query("INSERT INTO target_groups (label) VALUES ('children') ");
mysql_query("INSERT INTO target_groups (label) VALUES ('adults') ");
$targetGroupsIds = array(1,2);


// fill occupations
mysql_query("INSERT INTO occupation (label) VALUES ('psychologist') ");
mysql_query("INSERT INTO occupation (label) VALUES ('therapist') ");
$occupationsIds = array(1,2);

// fill specialties
mysql_query("INSERT INTO specialty (label) VALUES ('specialty1') ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty2') ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty3') ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty4') ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty5') ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty6') ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty7') ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty8') ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty9') ");
mysql_query("INSERT INTO specialty (label) VALUES ('specialty10') ");
$specialtiesIds = array(1,2,3,4,5,6,7,8,9,10);

// get cities
$cityids = array();
$query = 'select id from city';
$results = mysql_query($query);
while($row = mysql_fetch_assoc($results)){
	array_push($cityids,$row['id']);
}


// fill user table
$password = '098f6bcd4621d373cade4e832627b4f6';
foreach ($lastnames as $lastname) {
    foreach ($firstnamesBoys as $firstname) {
        $email = $firstname . "." . $lastname . "@email.com";
        $language_id = rand(0, 2);
	$cityId = array_rand($cityids);
	// invoice address
	mysql_query("INSERT INTO address (address_street, address_number, city_id) VALUES ('" . $streetnames[rand(1,  count($streetnames) - 1)] . "', '". rand(1,256) ."', '" . $cityId . "')");
	$addressId = mysql_insert_id();

	// user
        mysql_query("INSERT INTO user (first_name, last_name, email, password, language_id, address_id) VALUES ('$firstname', '$lastname', '$email','$password','$languageIds[$language_id]', '$addressId') ON DUPLICATE KEY UPDATE email = email");
	$userId = mysql_insert_id();

	// practice
	$resource = mysql_query("INSERT INTO address (address_street, address_number, city_id) VALUES ('" . $streetnames[rand(1,  count($streetnames) - 1)] . "', '". rand(1,256) ."', '" . $cityId . "')");
	$addressId = mysql_insert_id();
	mysql_query("INSERT INTO practice (name, address_id,telephone,fax) VALUES ('$lastname', '$addressId','093451938','093451938') ");
	$practiceId = mysql_insert_id();

	// connect practice to user
	mysql_query("INSERT INTO practice_user (practice_id, user_id) VALUES ('$practiceId', '$userId') ");

	// add occupation
	mysql_query("INSERT INTO user_occupation (occupation_id, user_id) VALUES ('" . rand(1,2) . "', '$userId') ");

	// add targetGroups to user
	$numberOfTargetGroups = rand(1, 4);
	shuffle($targetGroupsIds);
	for ($i = 0; $i < count($numberOfTargetGroups); $i++) {
	    mysql_query("INSERT INTO user_target_group (target_group_id, user_id) VALUES ('" . $targetGroupsIds[$i] . "', '$userId') ");
	}

	// add specialties to user
	$numberOfSpecialties = rand(1, 4);
	shuffle($specialtiesIds);
	for ($i = 0; $i < count($numberOfSpecialties); $i++) {
	    mysql_query("INSERT INTO specialty_user (specialty_id, user_id) VALUES ('" . $specialtiesIds[$i] . "', '$userId') ");
	}
    }

    foreach ($firstnamesGirls as $firstname) {
        $email = $firstname . "." . $lastname . "@email.com";
        $language_id = rand(0, 2);
	$cityId = array_rand($cityids);
	// invoice address
	mysql_query("INSERT INTO address (address_street, address_number, city_id) VALUES ('" . $streetnames[rand(1,  count($streetnames) - 1)] . "', '". rand(1,256) ."', '" . $cityId . "')");
	$addressId = mysql_insert_id();

	// user
        mysql_query("INSERT INTO user (first_name, last_name, email, password, language_id, address_id) VALUES ('$firstname', '$lastname', '$email','$password','$languageIds[$language_id]', '$addressId') ON DUPLICATE KEY UPDATE email = email");
	$userId = mysql_insert_id();

	// practice
	$resource = mysql_query("INSERT INTO address (address_street, address_number, city_id) VALUES ('" . $streetnames[rand(1,  count($streetnames) - 1)] . "', '". rand(1,256) ."', '" . $cityId . "')");
	$addressId = mysql_insert_id();
	mysql_query("INSERT INTO practice (name, address_id,telephone,fax) VALUES ('$lastname', '$addressId','093451938','093451938') ");
	$practiceId = mysql_insert_id();

	// connect practice to user
	mysql_query("INSERT INTO practice_user (practice_id, user_id) VALUES ('$practiceId', '$userId') ");

	// add occupation
	mysql_query("INSERT INTO user_occupation (occupation_id, user_id) VALUES ('" . rand(1,2) . "', '$userId') ");

	// add targetGroups to user
	$numberOfTargetGroups = rand(1, 4);
	shuffle($targetGroupsIds);
	for ($i = 0; $i < count($numberOfTargetGroups); $i++) {
	    mysql_query("INSERT INTO user_target_group (target_group_id, user_id) VALUES ('" . $targetGroupsIds[$i] . "', '$userId') ");
	}

	// add specialties to user
	$numberOfSpecialties = rand(1, 4);
	shuffle($specialtiesIds);
	for ($i = 0; $i < count($numberOfSpecialties); $i++) {
	    mysql_query("INSERT INTO specialty_user (specialty_id, user_id) VALUES ('" . $specialtiesIds[$i] . "', '$userId') ");
	}
    }
}

mysql_close($con);
?>



<?php

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
$con = mysql_connect('localhost', 'root', '');
//$con = mysql_connect($GLOBALS['configuration']['host'], $GLOBALS['configuration']['user'],$GLOBALS['configuration']['pass'] );
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($GLOBALS['configuration']['db'], $con);

mysql_query("INSERT INTO language (label) VALUES ('dutch')");
mysql_query("INSERT INTO language (label) VALUES ('english')");
mysql_query("INSERT INTO language (label) VALUES ('french')");


$password = '098f6bcd4621d373cade4e832627b4f6';
foreach ($lastnames as $lastname) {
    foreach ($firstnamesBoys as $firstname) {
        $email = $firstname . "." . $lastname . "@email.com";
        $language_id = rand(1, 3);
        mysql_query("INSERT INTO user (first_name, last_name, email,password,language_id) VALUES ('$firstname', '$lastname', '$email','$password','$language_id') ON DUPLICATE KEY UPDATE email = email");
        mysql_query("INSERT INTO languages (label) VALUES ('french')");
    }
    foreach ($firstnamesGirls as $firstname) {
        $email = $firstname . "." . $lastname . "@email.com";
        $language_id = rand(1, 3);
        mysql_query("INSERT INTO user (first_name, last_name, email,password,language_id) VALUES ('$firstname', '$lastname', '$email','$password','$language_id')  ON DUPLICATE KEY UPDATE email = email");
    }
}

mysql_query("INSERT INTO languages (label) VALUES ('dutch')");
mysql_query("INSERT INTO languages (label) VALUES ('english')");
mysql_query("INSERT INTO languages (label) VALUES ('french')");



mysql_close($con);
?>



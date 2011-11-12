<?php

require_once('controllers/LoginController.php');
require_once('controllers/RegisterController.php');

$user['_firstName'] ='hey';
$user['_lastName']='thomas';
$user['_email']='testezazea';
$user['_password']='eenwachtwoordofzo';
$user['_lastLogin']='2011-10-10';
$user['_memberSince']='2011-10-10';
$user['_languageId']=1;
$value =  RegisterController::RegisterUser($user);
?>
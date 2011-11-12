<?php

require_once('controllers/LoginController.php');
require_once('controllers/RegisterController.php');

$user['_firstName'] ='hoera';
$user['_lastName']='een draakje';
$user['_email']='email@fiesta.com';
$user['_password']='eenwachtwoordofzo';
$user['_lastLogin']='2011-10-10';
$user['_memberSince']='2011-10-10';
$user['_languageId']=1;
$value =  RegisterController::RegisterUser($user);
var_dump($value);
?>
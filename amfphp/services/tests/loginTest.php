<?php

require_once './../dal/UserDAO.php';
require_once './../model/User.php';

$password = 'test';
$email = 'test';
$user = new User();
$user = UserDAO::getInstance()->login($email, $password);
var_dump($user);

?>
<?php

require_once '../dal/UserDAO.php';

$password = 'test';
$email = 'test';
$user = UserDAO::getInstance()->login($email, $password);
var_dump($user);

?>

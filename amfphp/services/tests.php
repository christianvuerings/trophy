<?php

require_once('controllers/LoginController.php');
require_once('controllers/RegisterController.php');
require_once('controllers/SearchController.php');


$value = 'hass';
$array = SearchController::SearchCityAutoComplete($value);
var_dump($array);

?>
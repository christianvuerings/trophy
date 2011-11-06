<?php

require_once '../model/interfaces/UserInterface.php';
require_once '../dal/UserDAO.php';

/**
 * The controller to login a user
 */
class SearchController {
    

    /**
     * Searches for Users within an occupation and country
     *
     * @param string $searchQuery
     * @param OccupationInterface $occupation
     * @param CountryInterface $country
     * @return array<User> 
     */
    public function LoginUser($email,$password ){
	$hashedPassword = md5($password);
	$user = UserDAO::getInstance()->login($email, $hashedPassword);
	return $user;
    }
    
}

?>

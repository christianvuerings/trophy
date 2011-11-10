<?php

require_once '../model/interfaces/OccupationInterface.php';
require_once '../model/interfaces/CountryInterface.php';
require_once '../dal/UserDAO.php';

/**
 * Description of SearchController
 *
 * @author Thomas Crepain <info@thomascrepain.be>
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
    public function searchUsersInOccupationAndCountry($searchQuery, OccupationInterface $occupation, CountryInterface $country){
	$dao = UserDAO::getInstance();
	$users = array();
	
	$queries = explode(' ', $searchQuery);
	
	foreach ($queries as $query) {
	    $foundUsers = $dao->searchUsersByPostalCodeOrCityname($query, $occupation, $country);
	    $users = array_merge($users, $foundUsers);
	}
	
	return $users;
    }
}

?>

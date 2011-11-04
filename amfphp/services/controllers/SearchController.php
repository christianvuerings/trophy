<?php

require_once '../model/interfaces/OccupationInterface.php';

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
	$users = array();
	
	// TODO: add search functionality
	
	return $users;
    }
}

?>

<?php

require_once './model/interfaces/OccupationInterface.php';
require_once './model/interfaces/CountryInterface.php';
require_once './dal/UserDAO.php';
require_once './dal/CityDAO.php';

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
    
    /**
     * Autocomplete a city name
     * There is called for this function in flex by every change in the search field
     * a dropdown list will appear under the search field, when the search button is pressed
     * there will be searched around that city with an other controller
     * @param string $searchTerm
     * @return array<user>  
     */
    public static function SearchCityAutoComplete($searchTerm){
        $possibleMatches = CityDAO::getInstance()->autocompleteCities($searchTerm);
        return $possibleMatches;
    }
    
     /**
     * After as city is selected, the nearby cities will also be selected 
     * to load all the users from that area until there are enough users to show
     * 
     * @param string $searchTerm
     * @return array<user>  
     */
    public static function SearchUserNearbyCity($city){
        $users = UserDAO::getInstance()->SearchUserNearbyCity($city);
        return $users;
    }
    

    
    
}

?>

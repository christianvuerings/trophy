<?php

require_once '../model/interfaces/OccupationInterface.php';

/**
 * Description of SearchController
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class SearchController {
    /**
     * Searches for Users within an occupation
     *
     * @param string $searchQuery
     * @param OccupationInterface $occupation
     * @return array<User> 
     */
    public function searchUsersInOccupation($searchQuery, OccupationInterface $occupation){
	$users = array();
	
	// TODO: add search functionality
	
	return $users;
    }
}

?>

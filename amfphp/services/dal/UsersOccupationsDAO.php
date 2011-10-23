<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/UsersOccupationsDAOInterface.php';
require_once '../model/interfaces/UsersOccupationsInterface.php';
require_once '../model/UsersOccupations.php';

/**
 * DAO for UsersOccupations
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UsersOccupationsDAO implements UsersOccupationsDAOInterface {
    public const TABLE_NAME = users_occupations;
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this UsersOccupationsDAO
     * Singleton pattern
     * 
     * @return UsersOccupationsDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a UsersOccupations object from the database
     * 
     * @param $int $occupationsId
     * @return UsersOccupations
     */
    public function load($occupationsId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT 'occupations_id' FROM ' . self::TABLE_NAME . 'WHERE occupations_id = ?', array($occupationsId))
	
	// translate record to UsersOccupations object
	$usersoccupations = new UsersOccupations();
	$usersoccupations->setOccupationsId($record['occupations_id']);   

	// return UsersOccupations object
	return $usersoccupations;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param UsersOccupationsInterface $usersoccupations
     * @return int $primaryKey
     */
    public function save(UsersOccupationsInterface $usersoccupations){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $usersoccupations->getOccupationsId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['occupations_id'] = $usersoccupations->getOccupationsId();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'occupations_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
?>

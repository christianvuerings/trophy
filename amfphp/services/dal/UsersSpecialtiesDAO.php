<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/UsersSpecialtiesDAOInterface.php';
require_once '../model/interfaces/UsersSpecialtiesInterface.php';
require_once '../model/UsersSpecialties.php';

/**
 * DAO for UsersSpecialties
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UsersSpecialtiesDAO implements UsersSpecialtiesDAOInterface {
    public const TABLE_NAME = users_specialties;
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this UsersSpecialtiesDAO
     * Singleton pattern
     * 
     * @return UsersSpecialtiesDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a UsersSpecialties object from the database
     * 
     * @param $int $specialtiesId
     * @return UsersSpecialties
     */
    public function load($specialtiesId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT 'specialties_id' FROM ' . self::TABLE_NAME . 'WHERE specialties_id = ?', array($specialtiesId))
	
	// translate record to UsersSpecialties object
	$usersspecialties = new UsersSpecialties();
	$usersspecialties->setSpecialtiesId($record['specialties_id']);   

	// return UsersSpecialties object
	return $usersspecialties;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param UsersSpecialtiesInterface $usersspecialties
     * @return int $primaryKey
     */
    public function save(UsersSpecialtiesInterface $usersspecialties){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $usersspecialties->getSpecialtiesId();
	
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
	    	    $record['specialties_id'] = $usersspecialties->getSpecialtiesId();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'specialties_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
?>

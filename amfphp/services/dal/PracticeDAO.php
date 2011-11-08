<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/PracticeDAOInterface.php';
require_once '../model/interfaces/PracticeInterface.php';
require_once '../model/Practice.php';

/**
 * DAO for Practice
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PracticeDAO implements PracticeDAOInterface {
    const TABLE_NAME = 'practice';
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this PracticeDAO
     * Singleton pattern
     * 
     * @return PracticeDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    /**
     * deletes a Practice object from the database
     * 
     * @param $int $practiceId
     * @return int  number of deleted rows
     */
    public function delete($practiceId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'practice_id = ?', array($primaryKey));
    }
    
    /**
     * loads a Practice object from the database
     * 
     * @param $int $practiceId
     * @return Practice
     */
    public function load($practiceId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT practice_id, user_id, name, address_street, address_number, address_bus, city_id, telephone, fax, gsm FROM ' . self::TABLE_NAME . 'WHERE practice_id = ?', array($practiceId));
	
	// translate record to Practice object
	$practice = new Practice();
	$practice->setPracticeId($record['practice_id']);   
	$practice->setUserId($record['user_id']);   
	$practice->setName($record['name']);   
	$practice->setAddressStreet($record['address_street']);   
	$practice->setAddressNumber($record['address_number']);   
	$practice->setAddressBus($record['address_bus']);   
	$practice->setCityId($record['city_id']);   
	$practice->setTelephone($record['telephone']);   
	$practice->setFax($record['fax']);   
	$practice->setGsm($record['gsm']);   

	// return Practice object
	return $practice;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param PracticeInterface $practice
     * @return int $primaryKey
     */
    public function save(PracticeInterface $practice){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $practice->getPracticeId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['user_id'] = $practice->getUserId();
			    	    $newRecord['name'] = $practice->getName();
			    	    $newRecord['address_street'] = $practice->getAddressStreet();
			    	    $newRecord['address_number'] = $practice->getAddressNumber();
			    	    $newRecord['address_bus'] = $practice->getAddressBus();
			    	    $newRecord['city_id'] = $practice->getCityId();
			    	    $newRecord['telephone'] = $practice->getTelephone();
			    	    $newRecord['fax'] = $practice->getFax();
			    	    $newRecord['gsm'] = $practice->getGsm();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['practice_id'] = $practice->getPracticeId();
		    $record['user_id'] = $practice->getUserId();
		    $record['name'] = $practice->getName();
		    $record['address_street'] = $practice->getAddressStreet();
		    $record['address_number'] = $practice->getAddressNumber();
		    $record['address_bus'] = $practice->getAddressBus();
		    $record['city_id'] = $practice->getCityId();
		    $record['telephone'] = $practice->getTelephone();
		    $record['fax'] = $practice->getFax();
		    $record['gsm'] = $practice->getGsm();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'practice_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

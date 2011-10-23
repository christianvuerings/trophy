<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/CitiesDAOInterface.php';
require_once '../model/interfaces/CitiesInterface.php';
require_once '../model/Cities.php';

/**
 * DAO for Cities
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class CitiesDAO implements CitiesDAOInterface {
    const TABLE_NAME = 'cities';
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this CitiesDAO
     * Singleton pattern
     * 
     * @return CitiesDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a Cities object from the database
     * 
     * @param $int $citiesId
     * @return Cities
     */
    public function load($citiesId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT 'cities_id', 'provinces_id', 'zipcode', 'name' FROM ' . self::TABLE_NAME . 'WHERE cities_id = ?', array($citiesId));
	
	// translate record to Cities object
	$cities = new Cities();
	$cities->setCitiesId($record['cities_id']);   
	$cities->setProvincesId($record['provinces_id']);   
	$cities->setZipcode($record['zipcode']);   
	$cities->setName($record['name']);   

	// return Cities object
	return $cities;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param CitiesInterface $cities
     * @return int $primaryKey
     */
    public function save(CitiesInterface $cities){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $cities->getCitiesId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['provinces_id'] = $cities->getProvincesId();
			    	    $newRecord['zipcode'] = $cities->getZipcode();
			    	    $newRecord['name'] = $cities->getName();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['cities_id'] = $cities->getCitiesId();
		    $record['provinces_id'] = $cities->getProvincesId();
		    $record['zipcode'] = $cities->getZipcode();
		    $record['name'] = $cities->getName();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'cities_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

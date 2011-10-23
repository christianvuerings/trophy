<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/CountriesDAOInterface.php';
require_once '../model/interfaces/CountriesInterface.php';
require_once '../model/Countries.php';

/**
 * DAO for Countries
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class CountriesDAO implements CountriesDAOInterface {
    const TABLE_NAME = 'countries';
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this CountriesDAO
     * Singleton pattern
     * 
     * @return CountriesDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a Countries object from the database
     * 
     * @param $int $countriesId
     * @return Countries
     */
    public function load($countriesId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT countries_id, label FROM ' . self::TABLE_NAME . 'WHERE countries_id = ?', array($countriesId));
	
	// translate record to Countries object
	$countries = new Countries();
	$countries->setCountriesId($record['countries_id']);   
	$countries->setLabel($record['label']);   

	// return Countries object
	return $countries;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param CountriesInterface $countries
     * @return int $primaryKey
     */
    public function save(CountriesInterface $countries){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $countries->getCountriesId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $countries->getLabel();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['countries_id'] = $countries->getCountriesId();
		    $record['label'] = $countries->getLabel();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'countries_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

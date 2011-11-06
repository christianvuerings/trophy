<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/CountryDAOInterface.php';
require_once '../model/interfaces/CountryInterface.php';
require_once '../model/Country.php';

/**
 * DAO for Country
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class CountryDAO implements CountryDAOInterface {
    const TABLE_NAME = 'country';
    
    private static $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this CountryDAO
     * Singleton pattern
     * 
     * @return CountryDAO $instance
     */
    public static function getInstance() {
	if(!isset(self::$instance)) self::$instance = new self();
	
	return self::$instance;
    }

    /**
     * deletes a Country object from the database
     * 
     * @param $int $countryId
     * @return int  number of deleted rows
     */
    public function delete($countryId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'country_id = ?', array($primaryKey));
    }
    
    /**
     * loads a Country object from the database
     * 
     * @param $int $countryId
     * @return Country
     */
    public function load($countryId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT country_id, label FROM ' . self::TABLE_NAME . 'WHERE country_id = ?', array($countryId));
	
	// translate record to Country object
	$country = new Country();
	$country->setCountryId($record['country_id']);   
	$country->setLabel($record['label']);   

	// return Country object
	return $country;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param CountryInterface $country
     * @return int $primaryKey
     */
    public function save(CountryInterface $country){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $country->getCountryId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $country->getLabel();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['country_id'] = $country->getCountryId();
		    $record['label'] = $country->getLabel();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'country_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

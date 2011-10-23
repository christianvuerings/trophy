<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/ProvincesDAOInterface.php';
require_once '../model/interfaces/ProvincesInterface.php';
require_once '../model/Provinces.php';

/**
 * DAO for Provinces
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class ProvincesDAO implements ProvincesDAOInterface {
    const TABLE_NAME = 'provinces';
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this ProvincesDAO
     * Singleton pattern
     * 
     * @return ProvincesDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a Provinces object from the database
     * 
     * @param $int $provincesId
     * @return Provinces
     */
    public function load($provincesId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT provinces_id, label, countries_id FROM ' . self::TABLE_NAME . 'WHERE provinces_id = ?', array($provincesId));
	
	// translate record to Provinces object
	$provinces = new Provinces();
	$provinces->setProvincesId($record['provinces_id']);   
	$provinces->setLabel($record['label']);   
	$provinces->setCountriesId($record['countries_id']);   

	// return Provinces object
	return $provinces;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param ProvincesInterface $provinces
     * @return int $primaryKey
     */
    public function save(ProvincesInterface $provinces){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $provinces->getProvincesId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $provinces->getLabel();
			    	    $newRecord['countries_id'] = $provinces->getCountriesId();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['provinces_id'] = $provinces->getProvincesId();
		    $record['label'] = $provinces->getLabel();
		    $record['countries_id'] = $provinces->getCountriesId();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'provinces_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

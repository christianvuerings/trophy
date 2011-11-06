<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/ProvinceDAOInterface.php';
require_once '../model/interfaces/ProvinceInterface.php';
require_once '../model/Province.php';

/**
 * DAO for Province
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class ProvinceDAO implements ProvinceDAOInterface {
    const TABLE_NAME = 'province';
    
    private static $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this ProvinceDAO
     * Singleton pattern
     * 
     * @return ProvinceDAO $instance
     */
    public static function getInstance() {
	if(!isset(self::$instance)) self::$instance = new self();
	
	return self::$instance;
    }

    /**
     * deletes a Province object from the database
     * 
     * @param $int $provinceId
     * @return int  number of deleted rows
     */
    public function delete($provinceId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'province_id = ?', array($primaryKey));
    }
    
    /**
     * loads a Province object from the database
     * 
     * @param $int $provinceId
     * @return Province
     */
    public function load($provinceId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT province_id, label, country_id FROM ' . self::TABLE_NAME . 'WHERE province_id = ?', array($provinceId));
	
	// translate record to Province object
	$province = new Province();
	$province->setProvinceId($record['province_id']);   
	$province->setLabel($record['label']);   
	$province->setCountryId($record['country_id']);   

	// return Province object
	return $province;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param ProvinceInterface $province
     * @return int $primaryKey
     */
    public function save(ProvinceInterface $province){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $province->getProvinceId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $province->getLabel();
			    	    $newRecord['country_id'] = $province->getCountryId();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['province_id'] = $province->getProvinceId();
		    $record['label'] = $province->getLabel();
		    $record['country_id'] = $province->getCountryId();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'province_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

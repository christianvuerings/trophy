<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/SpecialityDAOInterface.php';
require_once '../model/interfaces/SpecialityInterface.php';
require_once '../model/Speciality.php';

/**
 * DAO for Speciality
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class SpecialityDAO implements SpecialityDAOInterface {
    const TABLE_NAME = 'speciality';
    
    private static $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this SpecialityDAO
     * Singleton pattern
     * 
     * @return SpecialityDAO $instance
     */
    public static function getInstance() {
	if(!isset(self::$instance)) self::$instance = new self();
	
	return self::$instance;
    }

    /**
     * deletes a Speciality object from the database
     * 
     * @param $int $specialityId
     * @return int  number of deleted rows
     */
    public function delete($specialityId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'speciality_id = ?', array($primaryKey));
    }
    
    /**
     * loads a Speciality object from the database
     * 
     * @param $int $specialityId
     * @return Speciality
     */
    public function load($specialityId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT speciality_id, label FROM ' . self::TABLE_NAME . 'WHERE speciality_id = ?', array($specialityId));
	
	// translate record to Speciality object
	$speciality = new Speciality();
	$speciality->setSpecialityId($record['speciality_id']);   
	$speciality->setLabel($record['label']);   

	// return Speciality object
	return $speciality;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param SpecialityInterface $speciality
     * @return int $primaryKey
     */
    public function save(SpecialityInterface $speciality){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $speciality->getSpecialityId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $speciality->getLabel();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['speciality_id'] = $speciality->getSpecialityId();
		    $record['label'] = $speciality->getLabel();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'speciality_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

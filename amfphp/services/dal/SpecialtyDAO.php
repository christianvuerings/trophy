<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/specialtyDAOInterface.php';
require_once 'model/interfaces/specialtyInterface.php';
require_once 'model/specialty.php';

/**
 * DAO for specialty
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class specialtyDAO implements specialtyDAOInterface {
    const TABLE_NAME = 'specialty';
    
    private static $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this specialtyDAO
     * Singleton pattern
     * 
     * @return specialtyDAO $instance
     */
    public static function getInstance() {
	if(!isset(self::$instance)) self::$instance = new self();
	
	return self::$instance;
    }

    /**
     * deletes a specialty object from the database
     * 
     * @param $int $specialtyId
     * @return int  number of deleted rows
     */
    public function delete($specialtyId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'specialty_id = ?', array($primaryKey));
    }
    
    /**
     * loads a specialty object from the database
     * 
     * @param $int $specialtyId
     * @return specialty
     */
    public function load($specialtyId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT specialty_id, label FROM ' . self::TABLE_NAME . 'WHERE specialty_id = ?', array($specialtyId));
	
	// translate record to specialty object
	$specialty = new specialty();
	$specialty->setspecialtyId($record['specialty_id']);   
	$specialty->setLabel($record['label']);   

	// return specialty object
	return $specialty;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param specialtyInterface $specialty
     * @return int $primaryKey
     */
    public function save(specialtyInterface $specialty){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $specialty->getspecialtyId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $specialty->getLabel();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['specialty_id'] = $specialty->getspecialtyId();
		    $record['label'] = $specialty->getLabel();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'specialty_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

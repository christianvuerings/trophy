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
    const SPECIALTY_LINK_TABLE_NAME = 'user_specialty';
    
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
    
    
    public function getSpecialtiesForUserId($userId){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// build query
	$query = "SELECT specialty_id, label 
		    FROM self::TABLE_NAME as o
		    LEFT JOIN self::SPECIALTY_LINK_TABLE_NAME AS uo ON uo.occupation_id = o.occupation_id 
		    WHERE UO.user_id = ?";
	
	// get records
	$records = $db->getRecords($query, array($userId));
	
	// return objects of the array
	return $this->recordsToObjects($records);
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
	// return specialty object
	return $this->recordToObject($record);
    }
    
    /**
     * Translates a records to an object
     *
     * @param array $record
     * @return array<Specialty> 
     */
    private function recordToObject($record){
	$specialty = specialty::createNew($record['id'], $record['label']);
	
	return $specialty;
    }
    
    /**
     * Translates an array of specialty records to objects
     *
     * @param array $records
     * @return array<Specialty> 
     */
    private function recordsToObjects($records){
	$specialties = array();
	
	foreach ($records as $record) {
	    $specialties[] = $this->recordToObject($record);
	}
	
	return $specialties;
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

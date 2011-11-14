<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/OccupationDAOInterface.php';
require_once 'model/interfaces/OccupationInterface.php';
require_once 'model/Occupation.php';

/**
 * DAO for Occupation
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class OccupationDAO implements OccupationDAOInterface {
    const TABLE_NAME = 'occupation';
    const OCCUPATION_LINK_TABLE_NAME = 'user_occupation';
    
    private static $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this OccupationDAO
     * Singleton pattern
     * 
     * @return OccupationDAO $instance
     */
    public static function getInstance() {
	if(!isset(self::$instance)) self::$instance = new self();
	
	return self::$instance;
    }

    /**
     * deletes a Occupation object from the database
     * 
     * @param $int $occupationId
     * @return int  number of deleted rows
     */
    public function delete($occupationId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// delete and return affected rows
        //TODO:delete lines in the link table
	return $db->delete(self::TABLE_NAME, 'occupation_id = ?', array($primaryKey));
    }
    
    public function getOccupationsForUserId($userId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// build query
	$query = "SELECT occupation_id, label 
		    FROM self::TABLE_NAME as o
		    LEFT JOIN self::OCCUPATION_LINK_TABLE_NAME AS uo ON uo.occupation_id = o.occupation_id 
		    WHERE UO.user_id = ?";
	
	// get records
	$records = $db->getRecords($query, array($userId));
	
	// return objects of the array
	return $this->recordsToObjects($records);
    }
    
    /**
     * loads a Occupation object from the database
     * 
     * @param $int $occupationId
     * @return Occupation
     */
    public function load($occupationId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT occupation_id, label FROM ' . self::TABLE_NAME . 'WHERE occupation_id = ?', array($occupationId));   

	// return Occupation object
	return $this->recordToObject($record);
    }
    
    /**
     * Translates a records to an object
     *
     * @param array $record
     * @return array<Occupation> 
     */
    private function recordToObject($record){
	$occupations = array();
	
	$occupations = Occupation::createNew($record['id'], $record['label']);
	
	return $occupations;
    }
    
    /**
     * Translates an array of occupation records to objects
     *
     * @param array $records
     * @return array<Occupation> 
     */
    private function recordsToObjects($records){
	$occupations = array();
	
	foreach ($records as $record) {
	    $occupations[] = recordToObject($record);
	}
	
	return $occupations;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param OccupationInterface $occupation
     * @return int $primaryKey
     */
    public function save(OccupationInterface $occupation){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $occupation->getOccupationId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $occupation->getLabel();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['occupation_id'] = $occupation->getOccupationId();
		    $record['label'] = $occupation->getLabel();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'occupation_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

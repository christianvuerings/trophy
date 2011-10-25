<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/OccupationDAOInterface.php';
require_once '../model/interfaces/OccupationInterface.php';
require_once '../model/Occupation.php';

/**
 * DAO for Occupation
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class OccupationDAO implements OccupationDAOInterface {
    const TABLE_NAME = 'occupation';
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this OccupationDAO
     * Singleton pattern
     * 
     * @return OccupationDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
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
	return $db->delete(TABLE_NAME, 'occupation_id = ?', array($primaryKey));
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
	
	// translate record to Occupation object
	$occupation = new Occupation();
	$occupation->setOccupationId($record['occupation_id']);   
	$occupation->setLabel($record['label']);   

	// return Occupation object
	return $occupation;
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

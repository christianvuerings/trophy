<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/OccupationsDAOInterface.php';
require_once '../model/interfaces/OccupationsInterface.php';
require_once '../model/Occupations.php';

/**
 * DAO for Occupations
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class OccupationsDAO implements OccupationsDAOInterface {
    public const TABLE_NAME = occupations;
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this OccupationsDAO
     * Singleton pattern
     * 
     * @return OccupationsDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a Occupations object from the database
     * 
     * @param $int $occupationsId
     * @return Occupations
     */
    public function load($occupationsId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT 'occupations_id', 'label' FROM ' . self::TABLE_NAME . 'WHERE occupations_id = ?', array($occupationsId))
	
	// translate record to Occupations object
	$occupations = new Occupations();
	$occupations->setOccupationsId($record['occupations_id']);   
	$occupations->setLabel($record['label']);   

	// return Occupations object
	return $occupations;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param OccupationsInterface $occupations
     * @return int $primaryKey
     */
    public function save(OccupationsInterface $occupations){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $occupations->getOccupationsId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $occupations->getLabel();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['occupations_id'] = $occupations->getOccupationsId();
		    $record['label'] = $occupations->getLabel();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'occupations_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
?>

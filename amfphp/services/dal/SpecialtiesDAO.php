<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/SpecialtiesDAOInterface.php';
require_once '../model/interfaces/SpecialtiesInterface.php';
require_once '../model/Specialties.php';

/**
 * DAO for Specialties
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class SpecialtiesDAO implements SpecialtiesDAOInterface {
    public const TABLE_NAME = specialties;
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this SpecialtiesDAO
     * Singleton pattern
     * 
     * @return SpecialtiesDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a Specialties object from the database
     * 
     * @param $int $specialtiesId
     * @return Specialties
     */
    public function load($specialtiesId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT 'specialties_id', 'label' FROM ' . self::TABLE_NAME . 'WHERE specialties_id = ?', array($specialtiesId))
	
	// translate record to Specialties object
	$specialties = new Specialties();
	$specialties->setSpecialtiesId($record['specialties_id']);   
	$specialties->setLabel($record['label']);   

	// return Specialties object
	return $specialties;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param SpecialtiesInterface $specialties
     * @return int $primaryKey
     */
    public function save(SpecialtiesInterface $specialties){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $specialties->getSpecialtiesId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $specialties->getLabel();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['specialties_id'] = $specialties->getSpecialtiesId();
		    $record['label'] = $specialties->getLabel();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'specialties_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
?>

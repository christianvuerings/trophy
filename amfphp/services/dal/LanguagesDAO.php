<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/LanguagesDAOInterface.php';
require_once '../model/interfaces/LanguagesInterface.php';
require_once '../model/Languages.php';

/**
 * DAO for Languages
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class LanguagesDAO implements LanguagesDAOInterface {
    public const TABLE_NAME = languages;
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this LanguagesDAO
     * Singleton pattern
     * 
     * @return LanguagesDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a Languages object from the database
     * 
     * @param $int $languagesId
     * @return Languages
     */
    public function load($languagesId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT 'languages_id', 'label' FROM ' . self::TABLE_NAME . 'WHERE languages_id = ?', array($languagesId))
	
	// translate record to Languages object
	$languages = new Languages();
	$languages->setLanguagesId($record['languages_id']);   
	$languages->setLabel($record['label']);   

	// return Languages object
	return $languages;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param LanguagesInterface $languages
     * @return int $primaryKey
     */
    public function save(LanguagesInterface $languages){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $languages->getLanguagesId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $languages->getLabel();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['languages_id'] = $languages->getLanguagesId();
		    $record['label'] = $languages->getLabel();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'languages_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
?>

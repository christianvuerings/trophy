<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/LanguageDAOInterface.php';
require_once '../model/interfaces/LanguageInterface.php';
require_once '../model/Language.php';

/**
 * DAO for Language
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class LanguageDAO implements LanguageDAOInterface {
    const TABLE_NAME = 'language';
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this LanguageDAO
     * Singleton pattern
     * 
     * @return LanguageDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    /**
     * deletes a Language object from the database
     * 
     * @param $int $languageId
     * @return int  number of deleted rows
     */
    public function delete($languageId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'language_id = ?', array($primaryKey));
    }
    
    /**
     * loads a Language object from the database
     * 
     * @param $int $languageId
     * @return Language
     */
    public function load($languageId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT language_id, label FROM ' . self::TABLE_NAME . 'WHERE language_id = ?', array($languageId));
	
	// translate record to Language object
	$language = new Language();
	$language->setLanguageId($record['language_id']);   
	$language->setLabel($record['label']);   

	// return Language object
	return $language;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param LanguageInterface $language
     * @return int $primaryKey
     */
    public function save(LanguageInterface $language){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $language->getLanguageId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $language->getLabel();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['language_id'] = $language->getLanguageId();
		    $record['label'] = $language->getLabel();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'language_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

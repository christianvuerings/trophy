<?php

require_once 'dal/MySQLDatabase.php';
require_once 'dal/interfaces/PracticeDAOInterface.php';
require_once 'model/interfaces/PracticeInterface.php';
require_once 'model/Practice.php';

/**
 * DAO for Practice
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PracticeDAO implements PracticeDAOInterface {
    const TABLE_NAME = 'practice';

    private static $instance;

    private function __construct(){ }

    /**
     * Returns an instance of this PracticeDAO
     * Singleton pattern
     *
     * @return PracticeDAO $instance
     */
    public function getInstance() {
	if (is_null(self::$instance))
	    self::$instance = new self();

	return self::$instance;
    }

    /**
     * deletes a Practice object from the database
     *
     * @param int $practiceId
     * @return int  number of deleted rows
     */
    public function delete($practiceId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'practice_id = ?', array($primaryKey));
    }

    /**
     * loads a Practice object from the database
     *
     * @param int $practiceId
     * @return Practice
     */
    public function load($practiceId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// get record from database
	$record = $db->getRecord('SELECT practice_id, name, telephone, fax, address_id FROM ' . self::TABLE_NAME . 'WHERE practice_id = ?', array($practiceId));

	// translate record to Practice object
	$practice = new Practice();
	$practice->setPracticeId($record['practice_id']);
	$practice->setName($record['name']);
	$practice->setTelephone($record['telephone']);
	$practice->setFax($record['fax']);
	$practice->setAddressId($record['address_id']);

	// return Practice object
	return $practice;
    }

    /**
     * Saves the given object to the database
     *
     * @param PracticeInterface $practice
     * @return int $primaryKey
     */
    public function save(PracticeInterface $practice){
	// get database
	$db = MySQLDatabase::getInstance();

	// get the key
	$primaryKey = $practice->getPracticeId();

	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert
	    $newRecord = array();
        	    		    	    $newRecord['name'] = $practice->getName();
			    	    $newRecord['telephone'] = $practice->getTelephone();
			    	    $newRecord['fax'] = $practice->getFax();
			    	    $newRecord['address_id'] = $practice->getAddressId();

	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['practice_id'] = $practice->getPracticeId();
		    $record['name'] = $practice->getName();
		    $record['telephone'] = $practice->getTelephone();
		    $record['fax'] = $practice->getFax();
		    $record['address_id'] = $practice->getAddressId();

	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'practice_id = ?', array($primaryKey));
	}

	// return key
	return $primaryKey;
    }
}
?>

<?php

require_once 'dal/MySQLDatabase.php';
require_once 'dal/interfaces/SpecialtyDAOInterface.php';
require_once 'model/interfaces/SpecialtyInterface.php';
require_once 'model/Specialty.php';

/**
 * DAO for Specialty
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class SpecialtyDAO implements SpecialtyDAOInterface {
    const TABLE_NAME = 'specialty';

    private static $instance;

    private function __construct(){ }

    /**
     * Returns an instance of this SpecialtyDAO
     * Singleton pattern
     *
     * @return SpecialtyDAO $instance
     */
    public function getInstance() {
	if (is_null(self::$instance))
	    self::$instance = new self();

	return self::$instance;
    }

    /**
     * deletes a Specialty object from the database
     *
     * @param int $specialtyId
     * @return int  number of deleted rows
     */
    public function delete($specialtyId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'specialty_id = ?', array($primaryKey));
    }

    /**
     * loads a Specialty object from the database
     *
     * @param int $specialtyId
     * @return Specialty
     */
    public function load($specialtyId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// get record from database
	$record = $db->getRecord('SELECT specialty_id, label FROM ' . self::TABLE_NAME . 'WHERE specialty_id = ?', array($specialtyId));

	// translate record to Specialty object
	$specialty = new Specialty();
	$specialty->setSpecialtyId($record['specialty_id']);
	$specialty->setLabel($record['label']);

	// return Specialty object
	return $specialty;
    }

    /**
     * Saves the given object to the database
     *
     * @param SpecialtyInterface $specialty
     * @return int $primaryKey
     */
    public function save(SpecialtyInterface $specialty){
	// get database
	$db = MySQLDatabase::getInstance();

	// get the key
	$primaryKey = $specialty->getSpecialtyId();

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
	    	    $record['specialty_id'] = $specialty->getSpecialtyId();
		    $record['label'] = $specialty->getLabel();

	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'specialty_id = ?', array($primaryKey));
	}

	// return key
	return $primaryKey;
    }
}
?>

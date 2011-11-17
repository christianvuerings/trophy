<?php

require_once 'dal/MySQLDatabase.php';
require_once 'dal/interfaces/TargetGroupDAOInterface.php';
require_once 'model/interfaces/TargetGroupInterface.php';
require_once 'model/TargetGroup.php';

/**
 * DAO for TargetGroup
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class TargetGroupDAO implements TargetGroupDAOInterface {
    const TABLE_NAME = 'target_group';

    private static $instance;

    private function __construct(){ }

    /**
     * Returns an instance of this TargetGroupDAO
     * Singleton pattern
     *
     * @return TargetGroupDAO $instance
     */
    public function getInstance() {
	if (is_null(self::$instance))
	    self::$instance = new self();

	return self::$instance;
    }

    /**
     * deletes a TargetGroup object from the database
     *
     * @param int $targetGroupId
     * @return int  number of deleted rows
     */
    public function delete($targetGroupId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'target_group_id = ?', array($primaryKey));
    }

    /**
     * loads a TargetGroup object from the database
     *
     * @param int $targetGroupId
     * @return TargetGroup
     */
    public function load($targetGroupId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// get record from database
	$record = $db->getRecord('SELECT target_group_id, label FROM ' . self::TABLE_NAME . 'WHERE target_group_id = ?', array($targetGroupId));

	// translate record to TargetGroup object
	$targetgroup = new TargetGroup();
	$targetgroup->setTargetGroupId($record['target_group_id']);
	$targetgroup->setLabel($record['label']);

	// return TargetGroup object
	return $targetgroup;
    }

    /**
     * Saves the given object to the database
     *
     * @param TargetGroupInterface $targetgroup
     * @return int $primaryKey
     */
    public function save(TargetGroupInterface $targetgroup){
	// get database
	$db = MySQLDatabase::getInstance();

	// get the key
	$primaryKey = $targetgroup->getTargetGroupId();

	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $targetgroup->getLabel();

	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['target_group_id'] = $targetgroup->getTargetGroupId();
		    $record['label'] = $targetgroup->getLabel();

	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'target_group_id = ?', array($primaryKey));
	}

	// return key
	return $primaryKey;
    }
}
?>

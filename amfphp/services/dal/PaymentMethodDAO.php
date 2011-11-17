<?php

require_once 'dal/MySQLDatabase.php';
require_once 'dal/interfaces/PaymentMethodDAOInterface.php';
require_once 'model/interfaces/PaymentMethodInterface.php';
require_once 'model/PaymentMethod.php';

/**
 * DAO for PaymentMethod
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PaymentMethodDAO implements PaymentMethodDAOInterface {
    const TABLE_NAME = 'payment_method';

    private static $instance;

    private function __construct(){ }

    /**
     * Returns an instance of this PaymentMethodDAO
     * Singleton pattern
     *
     * @return PaymentMethodDAO $instance
     */
    public function getInstance() {
	if (is_null(self::$instance))
	    self::$instance = new self();

	return self::$instance;
    }

    /**
     * deletes a PaymentMethod object from the database
     *
     * @param int $paymentMethodId
     * @return int  number of deleted rows
     */
    public function delete($paymentMethodId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'payment_method_id = ?', array($primaryKey));
    }

    /**
     * loads a PaymentMethod object from the database
     *
     * @param int $paymentMethodId
     * @return PaymentMethod
     */
    public function load($paymentMethodId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// get record from database
	$record = $db->getRecord('SELECT payment_method_id, label FROM ' . self::TABLE_NAME . 'WHERE payment_method_id = ?', array($paymentMethodId));

	// translate record to PaymentMethod object
	$paymentmethod = new PaymentMethod();
	$paymentmethod->setPaymentMethodId($record['payment_method_id']);
	$paymentmethod->setLabel($record['label']);

	// return PaymentMethod object
	return $paymentmethod;
    }

    /**
     * Saves the given object to the database
     *
     * @param PaymentMethodInterface $paymentmethod
     * @return int $primaryKey
     */
    public function save(PaymentMethodInterface $paymentmethod){
	// get database
	$db = MySQLDatabase::getInstance();

	// get the key
	$primaryKey = $paymentmethod->getPaymentMethodId();

	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $paymentmethod->getLabel();

	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['payment_method_id'] = $paymentmethod->getPaymentMethodId();
		    $record['label'] = $paymentmethod->getLabel();

	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'payment_method_id = ?', array($primaryKey));
	}

	// return key
	return $primaryKey;
    }
}
?>

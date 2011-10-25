<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/PaymentMethodsDAOInterface.php';
require_once '../model/interfaces/PaymentMethodsInterface.php';
require_once '../model/PaymentMethods.php';

/**
 * DAO for PaymentMethods
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PaymentMethodsDAO implements PaymentMethodsDAOInterface {
    const TABLE_NAME = 'payment_methods';
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this PaymentMethodsDAO
     * Singleton pattern
     * 
     * @return PaymentMethodsDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a PaymentMethods object from the database
     * 
     * @param $int $paymentMethodsId
     * @return PaymentMethods
     */
    public function load($paymentMethodsId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT payment_methods_id, label FROM ' . self::TABLE_NAME . 'WHERE payment_methods_id = ?', array($paymentMethodsId));
	
	// translate record to PaymentMethods object
	$paymentmethods = new PaymentMethods();
	$paymentmethods->setPaymentMethodsId($record['payment_methods_id']);   
	$paymentmethods->setLabel($record['label']);   

	// return PaymentMethods object
	return $paymentmethods;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param PaymentMethodsInterface $paymentmethods
     * @return int $primaryKey
     */
    public function save(PaymentMethodsInterface $paymentmethods){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $paymentmethods->getPaymentMethodsId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['label'] = $paymentmethods->getLabel();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['payment_methods_id'] = $paymentmethods->getPaymentMethodsId();
		    $record['label'] = $paymentmethods->getLabel();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'payment_methods_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

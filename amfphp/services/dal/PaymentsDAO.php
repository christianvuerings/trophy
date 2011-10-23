<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/PaymentsDAOInterface.php';
require_once '../model/interfaces/PaymentsInterface.php';
require_once '../model/Payments.php';

/**
 * DAO for Payments
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PaymentsDAO implements PaymentsDAOInterface {
    const TABLE_NAME = 'payments';
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this PaymentsDAO
     * Singleton pattern
     * 
     * @return PaymentsDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a Payments object from the database
     * 
     * @param $int $paymentsId
     * @return Payments
     */
    public function load($paymentsId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT payments_id, date, amount, users_id, payment_methods_id FROM ' . self::TABLE_NAME . 'WHERE payments_id = ?', array($paymentsId));
	
	// translate record to Payments object
	$payments = new Payments();
	$payments->setPaymentsId($record['payments_id']);   
	$payments->setDate($record['date']);   
	$payments->setAmount($record['amount']);   
	$payments->setUsersId($record['users_id']);   
	$payments->setPaymentMethodsId($record['payment_methods_id']);   

	// return Payments object
	return $payments;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param PaymentsInterface $payments
     * @return int $primaryKey
     */
    public function save(PaymentsInterface $payments){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $payments->getPaymentsId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['date'] = $payments->getDate();
			    	    $newRecord['amount'] = $payments->getAmount();
			    	    $newRecord['users_id'] = $payments->getUsersId();
			    	    $newRecord['payment_methods_id'] = $payments->getPaymentMethodsId();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['payments_id'] = $payments->getPaymentsId();
		    $record['date'] = $payments->getDate();
		    $record['amount'] = $payments->getAmount();
		    $record['users_id'] = $payments->getUsersId();
		    $record['payment_methods_id'] = $payments->getPaymentMethodsId();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'payments_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

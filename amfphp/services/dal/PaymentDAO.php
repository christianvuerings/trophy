<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/PaymentDAOInterface.php';
require_once '../model/interfaces/PaymentInterface.php';
require_once '../model/Payment.php';

/**
 * DAO for Payment
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PaymentDAO implements PaymentDAOInterface {
    const TABLE_NAME = 'payment';
    
    private static $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this PaymentDAO
     * Singleton pattern
     * 
     * @return PaymentDAO $instance
     */
    public static function getInstance() {
	if(!isset(self::$instance)) self::$instance = new self();
	
	return self::$instance;
    }

    /**
     * deletes a Payment object from the database
     * 
     * @param $int $paymentId
     * @return int  number of deleted rows
     */
    public function delete($paymentId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'payment_id = ?', array($primaryKey));
    }
    
    /**
     * loads a Payment object from the database
     * 
     * @param $int $paymentId
     * @return Payment
     */
    public function load($paymentId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT payment_id, date, amount, user_id, payment_method_id FROM ' . self::TABLE_NAME . 'WHERE payment_id = ?', array($paymentId));
	
	// translate record to Payment object
	$payment = new Payment();
	$payment->setPaymentId($record['payment_id']);   
	$payment->setDate($record['date']);   
	$payment->setAmount($record['amount']);   
	$payment->setUserId($record['user_id']);   
	$payment->setPaymentMethodId($record['payment_method_id']);   

	// return Payment object
	return $payment;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param PaymentInterface $payment
     * @return int $primaryKey
     */
    public function save(PaymentInterface $payment){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $payment->getPaymentId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        	    		    	    $newRecord['date'] = $payment->getDate();
			    	    $newRecord['amount'] = $payment->getAmount();
			    	    $newRecord['user_id'] = $payment->getUserId();
			    	    $newRecord['payment_method_id'] = $payment->getPaymentMethodId();
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['payment_id'] = $payment->getPaymentId();
		    $record['date'] = $payment->getDate();
		    $record['amount'] = $payment->getAmount();
		    $record['user_id'] = $payment->getUserId();
		    $record['payment_method_id'] = $payment->getPaymentMethodId();
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'payment_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

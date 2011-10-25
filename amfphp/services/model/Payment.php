<?php

require_once '../dal/PaymentDAO.php';
require_once 'interfaces/PaymentInterface.php';

/**
 * Model Payment
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Payment implements PaymentInterface {
    private $paymentId;
    private $date;
    private $amount;
    private $userId;
    private $paymentMethodId;
        
    //mapping with flex
    public $_explicitType = "classestrophy.Payment";
    
    public function __construct() {
    }
    
    /**
     * Creates a new Payment object
     * 
     * @param int   $paymentId
     * @param date   $date
     * @param float   $amount
     * @param int   $userId
     * @param int   $paymentMethodId
     * @return Payment $instance
     */
    public static function createNew($paymentId, $date, $amount, $userId, $paymentMethodId) {
	    $instance = new self();
	
		$instance->paymentId = $paymentId;
		$instance->date = $date;
		$instance->amount = $amount;
		$instance->userId = $userId;
		$instance->paymentMethodId = $paymentMethodId;
		
	    return $instance;
    }
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $paymentId
     * @return void
     */
    public static function delete($paymentId) {
	    // get data access object
	    $dao = PaymentDAO::getInstance();

	    $dao->delete($paymentId);
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = PaymentDAO::getInstance();

	    // saves this object tot storage
	    $paymentId = $dao->save($this);

	    // update paymentId
	    $this->paymentId = $paymentId;
	    
	    // returns id
	    return $paymentId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $paymentId
     * @return Payment
     */
    public static function load($paymentId) {
	    // get data access object
	    $dao = PaymentDAO::getInstance();

	    return $dao->load($paymentId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns paymentId
     * 
     * @return int
     */
    public function getPaymentId() {
	    return $this->paymentId;
    }
    
    /**
     * Returns date
     * 
     * @return date
     */
    public function getDate() {
	    return $this->date;
    }
    
    /**
     * Returns amount
     * 
     * @return float
     */
    public function getAmount() {
	    return $this->amount;
    }
    
    /**
     * Returns userId
     * 
     * @return int
     */
    public function getUserId() {
	    return $this->userId;
    }
    
    /**
     * Returns paymentMethodId
     * 
     * @return int
     */
    public function getPaymentMethodId() {
	    return $this->paymentMethodId;
    }
    
    /**
     * Sets paymentId
     * 
     * @param int
     */
    public function setPaymentId($paymentId) {
	    $this->paymentId = $paymentId;
    }
    
    /**
     * Sets date
     * 
     * @param date
     */
    public function setDate($date) {
	    $this->date = $date;
    }
    
    /**
     * Sets amount
     * 
     * @param float
     */
    public function setAmount($amount) {
	    $this->amount = $amount;
    }
    
    /**
     * Sets userId
     * 
     * @param int
     */
    public function setUserId($userId) {
	    $this->userId = $userId;
    }
    
    /**
     * Sets paymentMethodId
     * 
     * @param int
     */
    public function setPaymentMethodId($paymentMethodId) {
	    $this->paymentMethodId = $paymentMethodId;
    }
    
}
?>

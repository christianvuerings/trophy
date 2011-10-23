<?php

require_once '../dal/PaymentsDAO.php'
require_once 'interfaces/PaymentsInterface.php'

/**
 * Model Payments
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Payments implements PaymentsInterface {
    private $paymentsId;
    private $date;
    private $amount;
    private $usersId;
    private $paymentMethodsId;
        
    //mapping with flex
    public $_explicitType = "classestrophy.Payments";
    
    public function __construct() {
    }
    
    /**
     * Creates a new Payments object
     */
    public static function createNew($paymentsId, $date, $amount, $usersId, $paymentMethodsId) {
	    $instance = new self();
	
		$instance->paymentsId = $paymentsId;
		$instance->date = $date;
		$instance->amount = $amount;
		$instance->usersId = $usersId;
		$instance->paymentMethodsId = $paymentMethodsId;
		
	    return $instance;
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = PaymentsDAO::getInstance();

	    // saves this object tot storage
	    $paymentsId = $dao->save($this);

	    // update paymentsId
	    $this->paymentsId = $paymentsId;
	    
	    // returns id
	    return $paymentsId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $paymentsId
     * @return Payments
     */
    public static function load($paymentsId) {
	    // get data access object
	    $dao = PaymentsDAO::getInstance();

	    return $dao->load($paymentsId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns paymentsId
     * 
     * @return int
     */
    public function getPaymentsId() {
	    return $this->paymentsId;
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
     * Returns usersId
     * 
     * @return int
     */
    public function getUsersId() {
	    return $this->usersId;
    }
    
    /**
     * Returns paymentMethodsId
     * 
     * @return int
     */
    public function getPaymentMethodsId() {
	    return $this->paymentMethodsId;
    }
    
    /**
     * Sets paymentsId
     * 
     * @param int
     */
    public function setPaymentsId($paymentsId) {
	    $this->paymentsId = $paymentsId;
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
     * Sets usersId
     * 
     * @param int
     */
    public function setUsersId($usersId) {
	    $this->usersId = $usersId;
    }
    
    /**
     * Sets paymentMethodsId
     * 
     * @param int
     */
    public function setPaymentMethodsId($paymentMethodsId) {
	    $this->paymentMethodsId = $paymentMethodsId;
    }
    
}
?>

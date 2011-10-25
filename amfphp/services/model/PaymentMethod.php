<?php

require_once '../dal/PaymentMethodDAO.php';
require_once 'interfaces/PaymentMethodInterface.php';

/**
 * Model PaymentMethod
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PaymentMethod implements PaymentMethodInterface {
    private $paymentMethodId;
    private $label;
        
    //mapping with flex
    public $_explicitType = "classestrophy.PaymentMethod";
    
    public function __construct() {
    }
    
    /**
     * Creates a new PaymentMethod object
     * 
     * @param int   $paymentMethodId
     * @param string   $label
     * @return PaymentMethod $instance
     */
    public static function createNew($paymentMethodId, $label) {
	    $instance = new self();
	
		$instance->paymentMethodId = $paymentMethodId;
		$instance->label = $label;
		
	    return $instance;
    }
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $paymentMethodId
     * @return void
     */
    public static function delete($paymentMethodId) {
	    // get data access object
	    $dao = PaymentMethodDAO::getInstance();

	    $dao->delete($paymentMethodId);
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = PaymentMethodDAO::getInstance();

	    // saves this object tot storage
	    $paymentMethodId = $dao->save($this);

	    // update paymentMethodId
	    $this->paymentMethodId = $paymentMethodId;
	    
	    // returns id
	    return $paymentMethodId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $paymentMethodId
     * @return PaymentMethod
     */
    public static function load($paymentMethodId) {
	    // get data access object
	    $dao = PaymentMethodDAO::getInstance();

	    return $dao->load($paymentMethodId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns paymentMethodId
     * 
     * @return int
     */
    public function getPaymentMethodId() {
	    return $this->paymentMethodId;
    }
    
    /**
     * Returns label
     * 
     * @return string
     */
    public function getLabel() {
	    return $this->label;
    }
    
    /**
     * Sets paymentMethodId
     * 
     * @param int
     */
    public function setPaymentMethodId($paymentMethodId) {
	    $this->paymentMethodId = $paymentMethodId;
    }
    
    /**
     * Sets label
     * 
     * @param string
     */
    public function setLabel($label) {
	    $this->label = $label;
    }
    
}
?>

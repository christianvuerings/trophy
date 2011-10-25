<?php

require_once '../dal/PaymentMethodsDAO.php';
require_once 'interfaces/PaymentMethodsInterface.php';

/**
 * Model PaymentMethods
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PaymentMethods implements PaymentMethodsInterface {
    private $paymentMethodsId;
    private $label;
        
    //mapping with flex
    public $_explicitType = "classestrophy.PaymentMethods";
    
    public function __construct() {
    }
    
    /**
     * Creates a new PaymentMethods object
     */
    public static function createNew($paymentMethodsId, $label) {
	    $instance = new self();
	
		$instance->paymentMethodsId = $paymentMethodsId;
		$instance->label = $label;
		
	    return $instance;
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = PaymentMethodsDAO::getInstance();

	    // saves this object tot storage
	    $paymentMethodsId = $dao->save($this);

	    // update paymentMethodsId
	    $this->paymentMethodsId = $paymentMethodsId;
	    
	    // returns id
	    return $paymentMethodsId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $paymentMethodsId
     * @return PaymentMethods
     */
    public static function load($paymentMethodsId) {
	    // get data access object
	    $dao = PaymentMethodsDAO::getInstance();

	    return $dao->load($paymentMethodsId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns paymentMethodsId
     * 
     * @return int
     */
    public function getPaymentMethodsId() {
	    return $this->paymentMethodsId;
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
     * Sets paymentMethodsId
     * 
     * @param int
     */
    public function setPaymentMethodsId($paymentMethodsId) {
	    $this->paymentMethodsId = $paymentMethodsId;
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

<?php

/**
 * Interface for PaymentMethods
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface PaymentMethodsInterface {
     /**
     * Saves this object to permanent storage
     * 
     * @return int $paymentMethodsId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $paymentMethodsId
     * @return PaymentMethods
     */
    public static function load($paymentMethodsId);


    /* Getters and setters */
    public function getPaymentMethodsId();
    
    public function getLabel();
    
    public function setPaymentMethodsId($paymentMethodsId);
    
    public function setLabel($label);
    
}
?>

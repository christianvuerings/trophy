<?php

/**
 * Interface for Payments
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface PaymentsInterface {
     /**
     * Saves this object to permanent storage
     * 
     * @return int $paymentsId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $paymentsId
     * @return Payments
     */
    public static function load($paymentsId);


    /* Getters and setters */
    public function getPaymentsId();
    
    public function getDate();
    
    public function getAmount();
    
    public function getUsersId();
    
    public function getPaymentMethodsId();
    
    public function setPaymentsId($paymentsId);
    
    public function setDate($date);
    
    public function setAmount($amount);
    
    public function setUsersId($usersId);
    
    public function setPaymentMethodsId($paymentMethodsId);
    
}
?>

<?php

/**
 * Interface for Payment
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface PaymentInterface {
    
    /**
     * Creates a new Payment object
     * 
     *      * @param $int   $paymentId
     *      * @param $date   $date
     *      * @param $float   $amount
     *      * @param $int   $userId
     *      * @param $int   $paymentMethodId
     *      * @return Payment $instance
     */
    public static function createNew($paymentId, $date, $amount, $userId, $paymentMethodId);
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $paymentId
     * @return void
     */
    public static function delete($paymentId);
    
     /**
     * Saves this object to permanent storage
     * 
     * @return int $paymentId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $paymentId
     * @return Payment
     */
    public static function load($paymentId);


    /* Getters and setters */
    public function getPaymentId();
    
    public function getDate();
    
    public function getAmount();
    
    public function getUserId();
    
    public function getPaymentMethodId();
    
    public function setPaymentId($paymentId);
    
    public function setDate($date);
    
    public function setAmount($amount);
    
    public function setUserId($userId);
    
    public function setPaymentMethodId($paymentMethodId);
    
}
?>

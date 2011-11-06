<?php

require_once '../model/interfaces/PaymentInterface.php';

/**
 * interface  for PaymentDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PaymentDAOInterface {   
    /**
     * Returns an instance of this PaymentDAO
     * Singleton pattern
     * 
     * @return PaymentDAO $instance
     */
    public static function getInstance();
    
    /**
     * deletes a Payment object from the database
     * 
     * @param $int $paymentId
     * @return int  number of deleted rows
     */
    public function delete($paymentId)
    
    /**
     * loads a Payment object from the database
     * 
     * @param $int $paymentId
     * @return Payment
     */
    public function load($paymentId);
    
    /**
     * Saves the given object to the database
     * 
     * @param PaymentInterface $payment
     * @return int $primaryKey
     */
    public function save(PaymentInterface $payment);
}
?>

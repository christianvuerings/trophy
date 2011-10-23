<?php

require_once '../model/interfaces/PaymentMethodsInterface.php';

/**
 * interface  for PaymentMethodsDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PaymentMethodsDAOInterface {   
    /**
     * Returns an instance of this PaymentMethodsDAO
     * Singleton pattern
     * 
     * @return PaymentMethodsDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a PaymentMethods object from the database
     * 
     * @param $int $paymentMethodsId
     * @return PaymentMethods
     */
    public function load($paymentMethodsId);
    
    /**
     * Saves the given object to the database
     * 
     * @param PaymentMethodsInterface $paymentmethods
     * @return int $primaryKey
     */
    public function save(PaymentMethodsInterface $paymentmethods);
}
?>

<?php

require_once '../model/interfaces/PaymentMethodInterface.php';

/**
 * interface  for PaymentMethodDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface PaymentMethodDAOInterface {   
    /**
     * Returns an instance of this PaymentMethodDAO
     * Singleton pattern
     * 
     * @return PaymentMethodDAO $instance
     */
    public static function getInstance();
    
    /**
     * deletes a PaymentMethod object from the database
     * 
     * @param $int $paymentMethodId
     * @return int  number of deleted rows
     */
    public function delete($paymentMethodId)
    
    /**
     * loads a PaymentMethod object from the database
     * 
     * @param $int $paymentMethodId
     * @return PaymentMethod
     */
    public function load($paymentMethodId);
    
    /**
     * Saves the given object to the database
     * 
     * @param PaymentMethodInterface $paymentmethod
     * @return int $primaryKey
     */
    public function save(PaymentMethodInterface $paymentmethod);
}
?>

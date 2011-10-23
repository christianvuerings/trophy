<?php

require_once '../model/interfaces/PaymentsInterface.php';

/**
 * interface  for PaymentsDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class PaymentsDAOInterface {   
    /**
     * Returns an instance of this PaymentsDAO
     * Singleton pattern
     * 
     * @return PaymentsDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a Payments object from the database
     * 
     * @param $int $paymentsId
     * @return Payments
     */
    public function load($paymentsId);
    
    /**
     * Saves the given object to the database
     * 
     * @param PaymentsInterface $payments
     * @return int $primaryKey
     */
    public function save(PaymentsInterface $payments);
}
?>

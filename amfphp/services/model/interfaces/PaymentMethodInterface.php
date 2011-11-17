<?php

/**
 * Interface for PaymentMethod
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface PaymentMethodInterface {

    /**
     * Creates a new PaymentMethod object
     *
     * @param string   $label
     * @return PaymentMethod $instance
     */
    public static function createNew($label);

    /**
     * deletes an object from permanent storage
     *
     * @param int $paymentMethodId
     * @return void
     */
    public static function delete($paymentMethodId);

     /**
     * Saves this object to permanent storage
     *
     * @return int $paymentMethodId
     */
    public function save();

    /**
     * loads an object from permanent storage
     *
     * @param int $paymentMethodId
     * @return PaymentMethod
     */
    public static function load($paymentMethodId);


    /* Getters and setters */
    public function getPaymentMethodId();

    public function getLabel();

    public function setPaymentMethodId($paymentMethodId);

    public function setLabel($label);

}
?>

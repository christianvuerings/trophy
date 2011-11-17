<?php

/**
 * Interface for Address
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface AddressInterface {

    /**
     * Creates a new Address object
     *
     * @param string   $addressStreet
     * @param int   $addressNumber
     * @param int   $addressBus
     * @param int   $cityId
     * @return Address $instance
     */
    public static function createNew($addressStreet, $addressNumber, $cityId, $addressBus = NULL);

    /**
     * deletes an object from permanent storage
     *
     * @param int $addressId
     * @return void
     */
    public static function delete($addressId);

     /**
     * Saves this object to permanent storage
     *
     * @return int $addressId
     */
    public function save();

    /**
     * loads an object from permanent storage
     *
     * @param int $addressId
     * @return Address
     */
    public static function load($addressId);


    /* Getters and setters */
    public function getAddressId();

    public function getAddressStreet();

    public function getAddressNumber();

    public function getAddressBus();

    public function getCityId();

    public function setAddressId($addressId);

    public function setAddressStreet($addressStreet);

    public function setAddressNumber($addressNumber);

    public function setAddressBus($addressBus);

    public function setCityId($cityId);

}
?>

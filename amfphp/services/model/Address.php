<?php

require_once 'dal/AddressDAO.php';
require_once 'model/interfaces/AddressInterface.php';

/**
 * Model Address
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Address implements AddressInterface {

    public $addressId;
    public $addressStreet;
    public $addressNumber;
    public $addressBus;
    public $cityId;
    //mapping with flex
    public $_explicitType = "classestrophy.Address";

    public function __construct() {

    }

    /**
     * Creates a new Address object
     *
     * @param string   $addressStreet
     * @param int   $addressNumber
     * @param int   $addressBus
     * @param int   $cityId
     * @return Address $instance
     */
    public static function createNew($addressStreet, $addressNumber, $cityId, $addressBus = NULL) {
	$instance = new self();

	$instance->addressStreet = $addressStreet;
	$instance->addressNumber = $addressNumber;
	$instance->addressBus = $addressBus;
	$instance->cityId = $cityId;

	return $instance;
    }

    /**
     * deletes an object from permanent storage
     *
     * @param int $addressId
     * @return void
     */
    public static function delete($addressId) {
	// get data access object
	$dao = AddressDAO::getInstance();

	$dao->delete($addressId);
    }

    /**
     * Saves this object to permanent storage
     *
     * @return int $id
     */
    public function save() {
	// get data access object
	$dao = AddressDAO::getInstance();

	// saves this object tot storage
	$addressId = $dao->save($this);

	// update addressId
	$this->addressId = $addressId;

	// returns id
	return $addressId;
    }

    /**
     * loads an object from permanent storage
     *
     * @param int $addressId
     * @return Address
     */
    public static function load($addressId) {
	// get data access object
	$dao = AddressDAO::getInstance();

	return $dao->load($addressId);
    }

    /* Getters and setters */

    /**
     * Returns addressId
     *
     * @return int
     */
    public function getAddressId() {
	return $this->addressId;
    }

    /**
     * Returns addressStreet
     *
     * @return string
     */
    public function getAddressStreet() {
	return $this->addressStreet;
    }

    /**
     * Returns addressNumber
     *
     * @return int
     */
    public function getAddressNumber() {
	return $this->addressNumber;
    }

    /**
     * Returns addressBus
     *
     * @return int
     */
    public function getAddressBus() {
	return $this->addressBus;
    }

    /**
     * Returns cityId
     *
     * @return int
     */
    public function getCityId() {
	return $this->cityId;
    }

    /**
     * Sets addressId
     *
     * @param int
     */
    public function setAddressId($addressId) {
	$this->addressId = $addressId;
    }

    /**
     * Sets addressStreet
     *
     * @param string
     */
    public function setAddressStreet($addressStreet) {
	$this->addressStreet = $addressStreet;
    }

    /**
     * Sets addressNumber
     *
     * @param int
     */
    public function setAddressNumber($addressNumber) {
	$this->addressNumber = $addressNumber;
    }

    /**
     * Sets addressBus
     *
     * @param int
     */
    public function setAddressBus($addressBus) {
	$this->addressBus = $addressBus;
    }

    /**
     * Sets cityId
     *
     * @param int
     */
    public function setCityId($cityId) {
	$this->cityId = $cityId;
    }

}

?>

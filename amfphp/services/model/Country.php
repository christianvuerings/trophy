<?php

require_once 'dal/CountryDAO.php';
require_once 'model/interfaces/CountryInterface.php';

/**
 * Model Country
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Country implements CountryInterface {

    public $countryId;
    public $label;
    //mapping with flex
    public $_explicitType = "classestrophy.Country";

    public function __construct() {

    }

    /**
     * Creates a new Country object
     *
     * @param string   $countryId
     * @param string   $label
     * @return Country $instance
     */
    public static function createNew($countryId, $label) {
	$instance = new self();

	$instance->countryId = $countryId;
	$instance->label = $label;

	return $instance;
    }

    /**
     * deletes an object from permanent storage
     *
     * @param string $countryId
     * @return void
     */
    public static function delete($countryId) {
	// get data access object
	$dao = CountryDAO::getInstance();

	$dao->delete($countryId);
    }

    /**
     * Saves this object to permanent storage
     *
     * @return string $id
     */
    public function save() {
	// get data access object
	$dao = CountryDAO::getInstance();

	// saves this object tot storage
	$countryId = $dao->save($this);

	// update countryId
	$this->countryId = $countryId;

	// returns id
	return $countryId;
    }

    /**
     * loads an object from permanent storage
     *
     * @param string $countryId
     * @return Country
     */
    public static function load($countryId) {
	// get data access object
	$dao = CountryDAO::getInstance();

	return $dao->load($countryId);
    }

    /* Getters and setters */

    /**
     * Returns countryId
     *
     * @return string
     */
    public function getCountryId() {
	return $this->countryId;
    }

    /**
     * Returns label
     *
     * @return string
     */
    public function getLabel() {
	return $this->label;
    }

    /**
     * Sets countryId
     *
     * @param string
     */
    public function setCountryId($countryId) {
	$this->countryId = $countryId;
    }

    /**
     * Sets label
     *
     * @param string
     */
    public function setLabel($label) {
	$this->label = $label;
    }

}

?>

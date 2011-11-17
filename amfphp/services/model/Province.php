<?php

require_once 'dal/ProvinceDAO.php';
require_once 'model/interfaces/ProvinceInterface.php';

/**
 * Model Province
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Province implements ProvinceInterface {

    public $provinceId;
    public $label;
    public $countryId;
    //mapping with flex
    public $_explicitType = "classestrophy.Province";

    public function __construct() {

    }

    /**
     * Creates a new Province object
     *
     * @param string   $label
     * @param string   $countryId
     * @return Province $instance
     */
    public static function createNew($label, $countryId) {
	$instance = new self();

	$instance->label = $label;
	$instance->countryId = $countryId;

	return $instance;
    }

    /**
     * deletes an object from permanent storage
     *
     * @param int $provinceId
     * @return void
     */
    public static function delete($provinceId) {
	// get data access object
	$dao = ProvinceDAO::getInstance();

	$dao->delete($provinceId);
    }

    /**
     * Saves this object to permanent storage
     *
     * @return int $id
     */
    public function save() {
	// get data access object
	$dao = ProvinceDAO::getInstance();

	// saves this object tot storage
	$provinceId = $dao->save($this);

	// update provinceId
	$this->provinceId = $provinceId;

	// returns id
	return $provinceId;
    }

    /**
     * loads an object from permanent storage
     *
     * @param int $provinceId
     * @return Province
     */
    public static function load($provinceId) {
	// get data access object
	$dao = ProvinceDAO::getInstance();

	return $dao->load($provinceId);
    }

    /* Getters and setters */

    /**
     * Returns provinceId
     *
     * @return int
     */
    public function getProvinceId() {
	return $this->provinceId;
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
     * Returns countryId
     *
     * @return string
     */
    public function getCountryId() {
	return $this->countryId;
    }

    /**
     * Sets provinceId
     *
     * @param int
     */
    public function setProvinceId($provinceId) {
	$this->provinceId = $provinceId;
    }

    /**
     * Sets label
     *
     * @param string
     */
    public function setLabel($label) {
	$this->label = $label;
    }

    /**
     * Sets countryId
     *
     * @param string
     */
    public function setCountryId($countryId) {
	$this->countryId = $countryId;
    }

}

?>

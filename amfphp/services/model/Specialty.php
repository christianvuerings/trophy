<?php

require_once 'dal/SpecialtyDAO.php';
require_once 'model/interfaces/SpecialtyInterface.php';

/**
 * Model Specialty
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Specialty implements SpecialtyInterface {

    public $specialtyId;
    public $label;
    //mapping with flex
    public $_explicitType = "classestrophy.Specialty";

    public function __construct() {

    }

    /**
     * Creates a new Specialty object
     *
     * @param string   $label
     * @return Specialty $instance
     */
    public static function createNew($label) {
	$instance = new self();

	$instance->label = $label;

	return $instance;
    }

    /**
     * deletes an object from permanent storage
     *
     * @param int $specialtyId
     * @return void
     */
    public static function delete($specialtyId) {
	// get data access object
	$dao = SpecialtyDAO::getInstance();

	$dao->delete($specialtyId);
    }

    /**
     * Saves this object to permanent storage
     *
     * @return int $id
     */
    public function save() {
	// get data access object
	$dao = SpecialtyDAO::getInstance();

	// saves this object tot storage
	$specialtyId = $dao->save($this);

	// update specialtyId
	$this->specialtyId = $specialtyId;

	// returns id
	return $specialtyId;
    }

    /**
     * loads an object from permanent storage
     *
     * @param int $specialtyId
     * @return Specialty
     */
    public static function load($specialtyId) {
	// get data access object
	$dao = SpecialtyDAO::getInstance();

	return $dao->load($specialtyId);
    }

    /* Getters and setters */

    /**
     * Returns specialtyId
     *
     * @return int
     */
    public function getSpecialtyId() {
	return $this->specialtyId;
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
     * Sets specialtyId
     *
     * @param int
     */
    public function setSpecialtyId($specialtyId) {
	$this->specialtyId = $specialtyId;
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

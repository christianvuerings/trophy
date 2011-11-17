<?php

require_once 'dal/OccupationDAO.php';
require_once 'model/interfaces/OccupationInterface.php';

/**
 * Model Occupation
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Occupation implements OccupationInterface {

    private $occupationId;
    private $label;
    //mapping with flex
    public $_explicitType = "classestrophy.Occupation";

    public function __construct() {

    }

    /**
     * Creates a new Occupation object
     *
     * @param string   $label
     * @return Occupation $instance
     */
    public static function createNew($label) {
	$instance = new self();

	$instance->label = $label;

	return $instance;
    }

    /**
     * deletes an object from permanent storage
     *
     * @param int $occupationId
     * @return void
     */
    public static function delete($occupationId) {
	// get data access object
	$dao = OccupationDAO::getInstance();

	$dao->delete($occupationId);
    }

    /**
     * Saves this object to permanent storage
     *
     * @return int $id
     */
    public function save() {
	// get data access object
	$dao = OccupationDAO::getInstance();

	// saves this object tot storage
	$occupationId = $dao->save($this);

	// update occupationId
	$this->occupationId = $occupationId;

	// returns id
	return $occupationId;
    }

    /**
     * loads an object from permanent storage
     *
     * @param int $occupationId
     * @return Occupation
     */
    public static function load($occupationId) {
	// get data access object
	$dao = OccupationDAO::getInstance();

	return $dao->load($occupationId);
    }

    /* Getters and setters */

    /**
     * Returns occupationId
     *
     * @return int
     */
    public function getOccupationId() {
	return $this->occupationId;
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
     * Sets occupationId
     *
     * @param int
     */
    public function setOccupationId($occupationId) {
	$this->occupationId = $occupationId;
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

<?php

require_once 'dal/PracticeDAO.php';
require_once 'model/interfaces/PracticeInterface.php';

/**
 * Model Practice
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Practice implements PracticeInterface {

    private $practiceId;
    private $name;
    private $telephone;
    private $fax;
    private $addressId;
    //mapping with flex
    public $_explicitType = "classestrophy.Practice";

    public function __construct() {

    }

    /**
     * Creates a new Practice object
     *
     * @param string   $name
     * @param string   $telephone
     * @param string   $fax
     * @param int   $addressId
     * @return Practice $instance
     */
    public static function createNew($addressId, $name = NULL, $telephone = NULL, $fax = NULL) {
	$instance = new self();

	$instance->name = $name;
	$instance->telephone = $telephone;
	$instance->fax = $fax;
	$instance->addressId = $addressId;

	return $instance;
    }

    /**
     * deletes an object from permanent storage
     *
     * @param int $practiceId
     * @return void
     */
    public static function delete($practiceId) {
	// get data access object
	$dao = PracticeDAO::getInstance();

	$dao->delete($practiceId);
    }

    /**
     * Saves this object to permanent storage
     *
     * @return int $id
     */
    public function save() {
	// get data access object
	$dao = PracticeDAO::getInstance();

	// saves this object tot storage
	$practiceId = $dao->save($this);

	// update practiceId
	$this->practiceId = $practiceId;

	// returns id
	return $practiceId;
    }

    /**
     * loads an object from permanent storage
     *
     * @param int $practiceId
     * @return Practice
     */
    public static function load($practiceId) {
	// get data access object
	$dao = PracticeDAO::getInstance();

	return $dao->load($practiceId);
    }

    /* Getters and setters */

    /**
     * Returns practiceId
     *
     * @return int
     */
    public function getPracticeId() {
	return $this->practiceId;
    }

    /**
     * Returns name
     *
     * @return string
     */
    public function getName() {
	return $this->name;
    }

    /**
     * Returns telephone
     *
     * @return string
     */
    public function getTelephone() {
	return $this->telephone;
    }

    /**
     * Returns fax
     *
     * @return string
     */
    public function getFax() {
	return $this->fax;
    }

    /**
     * Returns addressId
     *
     * @return int
     */
    public function getAddressId() {
	return $this->addressId;
    }

    /**
     * Sets practiceId
     *
     * @param int
     */
    public function setPracticeId($practiceId) {
	$this->practiceId = $practiceId;
    }

    /**
     * Sets name
     *
     * @param string
     */
    public function setName($name) {
	$this->name = $name;
    }

    /**
     * Sets telephone
     *
     * @param string
     */
    public function setTelephone($telephone) {
	$this->telephone = $telephone;
    }

    /**
     * Sets fax
     *
     * @param string
     */
    public function setFax($fax) {
	$this->fax = $fax;
    }

    /**
     * Sets addressId
     *
     * @param int
     */
    public function setAddressId($addressId) {
	$this->addressId = $addressId;
    }

}

?>

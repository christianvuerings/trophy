<?php

require_once '../dal/PracticeDAO.php';
require_once 'interfaces/PracticeInterface.php';

/**
 * Model Practice
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Practice implements PracticeInterface {

    private $practiceId;
    private $userId;
    private $name;
    private $addressStreet;
    private $addressNumber;
    private $addressBus;
    private $cityId;
    private $telephone;
    private $fax;
    private $gsm;
//mapping with flex
    public $_explicitType = "classestrophy.Practice";

    public function __construct() {
        
    }

    /**
     * Creates a new Practice object
     * 
     * @param int   $practiceId
     * @param int   $userId
     * @param string   $name
     * @param string   $addressStreet
     * @param string   $addressNumber
     * @param string   $addressBus
     * @param int   $cityId
     * @param string   $telephone
     * @param string   $fax
     * @param string   $gsm
     * @return Practice $instance
     */
    public static function createNew($practiceId, $userId, $addressStreet, $addressNumber, $addressBus, $cityId, $name = NULL, $telephone = NULL, $fax = NULL, $gsm = NULL) {
        $instance = new self();

        $instance->practiceId = $practiceId;
        $instance->userId = $userId;
        $instance->name = $name;
        $instance->addressStreet = $addressStreet;
        $instance->addressNumber = $addressNumber;
        $instance->addressBus = $addressBus;
        $instance->cityId = $cityId;
        $instance->telephone = $telephone;
        $instance->fax = $fax;
        $instance->gsm = $gsm;

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
     * Returns userId
     * 
     * @return int
     */
    public function getUserId() {
        return $this->userId;
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
     * @return string
     */
    public function getAddressNumber() {
        return $this->addressNumber;
    }

    /**
     * Returns addressBus
     * 
     * @return string
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
     * Returns gsm
     * 
     * @return string
     */
    public function getGsm() {
        return $this->gsm;
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
     * Sets userId
     * 
     * @param int
     */
    public function setUserId($userId) {
        $this->userId = $userId;
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
     * @param string
     */
    public function setAddressNumber($addressNumber) {
        $this->addressNumber = $addressNumber;
    }

    /**
     * Sets addressBus
     * 
     * @param string
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
     * Sets gsm
     * 
     * @param string
     */
    public function setGsm($gsm) {
        $this->gsm = $gsm;
    }

}

?>

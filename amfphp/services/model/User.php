<?php

require_once 'dal/UserDAO.php';
require_once 'interfaces/UserInterface.php';
require_once 'interfaces/OccupationInterface.php';
require_once 'interfaces/SpecialtyInterface.php';

/**
 * Model User
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class User implements UserInterface {

    public $userId;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $lastLogin;
    public $memberSince;
    public $twitterId;
    public $facebookId;
    public $blogRss;
    public $addressStreet;
    public $addressNumber;
    public $addressBus;
    public $cityId;
    public $telephone;
    public $fax;
    public $gsm;
    public $languageId;
    public $_explicitType = "classestrophy.User";
    //private $occupations = array();	
    //private $specialties = array();
    //mapping with flex

    public function __construct() {
        
    }

    /**
     * Creates a new User object
     * 
     * @param int   $userId
     * @param string   $firstName
     * @param string   $lastName
     * @param string   $email
     * @param string   $password
     * @param date   $lastLogin
     * @param date   $memberSince
     * @param string   $twitterId
     * @param string   $facebookId
     * @param string   $blogRss
     * @param string   $addressStreet
     * @param string   $addressNumber
     * @param string   $addressBus
     * @param int   $cityId
     * @param string   $telephone
     * @param string   $fax
     * @param string   $gsm
     * @param array<Occupation>	$occupations
     * @param array<Specialty> $specialties
     * @param int   $languageId
     * @return User $instance
     */
    public static function createNew($userId, $firstName, $lastName, $email, $password, $lastLogin, $memberSince, $addressStreet, $addressNumber, $cityId, $languageId, $twitterId = NULL, $facebookId = NULL, $blogRss = NULL, $addressBus = NULL, $telephone = NULL, $fax = NULL, $gsm = NULL, $occupations = array(), $specialties = array()) {
        $instance = new self();

        $instance->userId = $userId;
        $instance->firstName = $firstName;
        $instance->lastName = $lastName;
        $instance->email = $email;
        $instance->password = $password;
        $instance->lastLogin = $lastLogin;
        $instance->memberSince = $memberSince;
        $instance->twitterId = $twitterId;
        $instance->facebookId = $facebookId;
        $instance->blogRss = $blogRss;
        $instance->addressStreet = $addressStreet;
        $instance->addressNumber = $addressNumber;
        $instance->addressBus = $addressBus;
        $instance->cityId = $cityId;
        $instance->telephone = $telephone;
        $instance->fax = $fax;
        $instance->gsm = $gsm;
        $instance->languageId = $languageId;
        //$instance->occupations = $occupations;
        //$instance->specialties = $specialtis;

        return $instance;
    }

    /**
     * deletes an object from permanent storage
     * 
     * @param int $userId
     * @return void
     */
    public static function delete($userId) {
        // get data access object
        $dao = UserDAO::getInstance();

        $dao->delete($userId);
    }

    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
        // get data access object
        $dao = UserDAO::getInstance();

        // saves this object tot storage
        $userId = $dao->save($this);

        // update userId
        $this->userId = $userId;

        // returns id
        return $userId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $userId
     * @return User
     */
    public static function load($userId) {
        // get data access object
        $dao = UserDAO::getInstance();

        return $dao->load($userId);
    }

    /**
     * Adds an occupation to this user
     *
     * @param OccupationInterface $occupation 
     */
    public function addOccupation(OccupationInterface $occupation) {
        $this->occupations[$occupation->getOccupationId()] = $occupation;
    }

    /**
     * Adds a specialty to this user
     *
     * @param specialtyInterface $specialty 
     */
    public function addspecialty(specialtyInterface $specialty) {
        $this->specialties[$specialty->getspecialtyId()] = $specialty;
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
     * Returns firstName
     * 
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Returns lastName
     * 
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Returns email
     * 
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Returns password
     * 
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Returns lastLogin
     * 
     * @return date
     */
    public function getLastLogin() {
        return $this->lastLogin;
    }

    /**
     * Returns memberSince
     * 
     * @return date
     */
    public function getMemberSince() {
        return $this->memberSince;
    }

    /**
     * Returns twitterId
     * 
     * @return string
     */
    public function getTwitterId() {
        return $this->twitterId;
    }

    /**
     * Returns facebookId
     * 
     * @return string
     */
    public function getFacebookId() {
        return $this->facebookId;
    }

    /**
     * Returns blogRss
     * 
     * @return string
     */
    public function getBlogRss() {
        return $this->blogRss;
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
     * Returns languageId
     * 
     * @return int
     */
    public function getLanguageId() {
        return $this->languageId;
    }

    /**
     * Returns an array of linked occupations to this user
     *
     * @return Array<Occupation>
     */
    public function getOccupations() {
        return $this->occupations;
    }

    /**
     * Return an array of specialties linked to this user
     *
     * @return Array<specialty>
     */
    public function getSpecialties() {
        return $this->specialties;
    }

    /**
     * Removes an occupation to this user
     *
     * @param OccupationInterface $occupation 
     */
    public function removeOccupation(OccupationInterface $occupation) {
        unset($this->occupations[$occupation->getOccupationId()]);
    }

    /**
     * Removes a specialty to this user
     *
     * @param specialtyInterface $specialty 
     */
    public function removespecialty(specialtyInterface $specialty) {
        unset($this->specialties[$specialty->getspecialtyId()]);
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
     * Sets firstName
     * 
     * @param string
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    /**
     * Sets lastName
     * 
     * @param string
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    /**
     * Sets email
     * 
     * @param string
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Sets password
     * 
     * @param string
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * Sets lastLogin
     * 
     * @param date
     */
    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    /**
     * Sets memberSince
     * 
     * @param date
     */
    public function setMemberSince($memberSince) {
        $this->memberSince = $memberSince;
    }

    /**
     * Sets twitterId
     * 
     * @param string
     */
    public function setTwitterId($twitterId) {
        $this->twitterId = $twitterId;
    }

    /**
     * Sets facebookId
     * 
     * @param string
     */
    public function setFacebookId($facebookId) {
        $this->facebookId = $facebookId;
    }

    /**
     * Sets blogRss
     * 
     * @param string
     */
    public function setBlogRss($blogRss) {
        $this->blogRss = $blogRss;
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

    /**
     * Sets languageId
     * 
     * @param int
     */
    public function setLanguageId($languageId) {
        $this->languageId = $languageId;
    }

}

?>

<?php

require_once '../dal/UsersDAO.php';
require_once 'interfaces/UsersInterface.php';

/**
 * Model Users
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Users implements UsersInterface {
    private $usersId;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $lastLogin;
    private $memberSince;
    private $twitterId;
    private $facebookId;
    private $blogRss;
    private $addressStreet;
    private $addressNumber;
    private $addressBus;
    private $citiesId;
    private $telephone;
    private $fax;
    private $gsm;
    private $languageId;
    private $occupations = array();
    private $specialties = array();
    
    //mapping with flex
    public $_explicitType = "classestrophy.Users";
    
    public function __construct() {
    }
    
    /**
     * Creates a new Users object
     */
    public static function createNew($usersId, $firstName, $lastName, $email, $password, $lastLogin, $memberSince, $addressStreet, $addressNumber, $citiesId, $languagesId, $twitterId = NULL, $facebookId = NULL, $blogRss = NULL, $addressBus = NULL, $telephone = NULL, $fax = NULL, $gsm = NULL) {
	    $instance = new self();
	
		$instance->usersId = $usersId;
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
		$instance->citiesId = $citiesId;
		$instance->telephone = $telephone;
		$instance->fax = $fax;
		$instance->gsm = $gsm;
		$instance->languagesId = $languagesId;
		
	    return $instance;
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = UsersDAO::getInstance();

	    // saves this object tot storage
	    $usersId = $dao->save($this);

	    // update usersId
	    $this->usersId = $usersId;
	    
	    // returns id
	    return $usersId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $usersId
     * @return Users
     */
    public static function load($usersId) {
	    // get data access object
	    $dao = UsersDAO::getInstance();

	    return $dao->load($usersId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns usersId
     * 
     * @return int
     */
    public function getUsersId() {
	    return $this->usersId;
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
     * Returns citiesId
     * 
     * @return int
     */
    public function getCitiesId() {
	    return $this->citiesId;
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
     * Returns languagesId
     * 
     * @return int
     */
    public function getLanguagesId() {
	    return $this->languagesId;
    }
    
    public function getOccupations(){
        return $this->occupations;
    }
    
    public function getSpecialties(){
        return $this->specialties;
    }   
    
    /**
     * Sets usersId
     * 
     * @param int
     */
    public function setUsersId($usersId) {
	    $this->usersId = $usersId;
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
     * Sets citiesId
     * 
     * @param int
     */
    public function setCitiesId($citiesId) {
	    $this->citiesId = $citiesId;
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
     * Sets languagesId
     * 
     * @param int
     */
    public function setLanguagesId($languagesId) {
	    $this->languagesId = $languagesId;
    }
    
    public function setOccupations($occupations){
        $this->occupations = $occupations;
    }
    
    public function setSpecialties($specialties){
        $this->specialties = $specialties;
    }
    
}
?>

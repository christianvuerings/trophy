<?php

require_once 'dal/UserDAO.php';
require_once 'model/interfaces/UserInterface.php';

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
    public $languageId;
    public $addressId;
    public $gsm;
    public $avatar;
    public $twitter;
    public $facebook;
    public $rss;
    //mapping with flex
    public $_explicitType = "classestrophy.User";

    public function __construct() {

    }

    /**
     * Creates a new User object
     *
     * @param string   $firstName
     * @param string   $lastName
     * @param string   $email
     * @param string   $password
     * @param int   $lastLogin
     * @param int   $memberSince
     * @param string   $languageId
     * @param int   $addressId
     * @param string   $gsm
     * @param string   $avatar
     * @param string   $twitter
     * @param string   $facebook
     * @param string   $rss
     * @return User $instance
     */
    public static function createNew($firstName, $lastName, $email, $password, $memberSince, $languageId, $addressId, $lastLogin = NULL, $gsm = NULL, $avatar = NULL, $twitter = NULL, $facebook = NULL, $rss = NULL) {
	$instance = new self();

	$instance->firstName = $firstName;
	$instance->lastName = $lastName;
	$instance->email = $email;
	$instance->password = $password;
	$instance->lastLogin = $lastLogin;
	$instance->memberSince = $memberSince;
	$instance->languageId = $languageId;
	$instance->addressId = $addressId;
	$instance->gsm = $gsm;
	$instance->avatar = $avatar;
	$instance->twitter = $twitter;
	$instance->facebook = $facebook;
	$instance->rss = $rss;

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

    /* Getters and setters */

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
     * @return int
     */
    public function getLastLogin() {
	return $this->lastLogin;
    }

    /**
     * Returns memberSince
     *
     * @return int
     */
    public function getMemberSince() {
	return $this->memberSince;
    }

    /**
     * Returns languageId
     *
     * @return string
     */
    public function getLanguageId() {
	return $this->languageId;
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
     * Returns gsm
     *
     * @return string
     */
    public function getGsm() {
	return $this->gsm;
    }

    /**
     * Returns avatar
     *
     * @return string
     */
    public function getAvatar() {
	return $this->avatar;
    }

    /**
     * Returns twitter
     *
     * @return string
     */
    public function getTwitter() {
	return $this->twitter;
    }

    /**
     * Returns facebook
     *
     * @return string
     */
    public function getFacebook() {
	return $this->facebook;
    }

    /**
     * Returns rss
     *
     * @return string
     */
    public function getRss() {
	return $this->rss;
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
     * @param int
     */
    public function setLastLogin($lastLogin) {
	$this->lastLogin = $lastLogin;
    }

    /**
     * Sets memberSince
     *
     * @param int
     */
    public function setMemberSince($memberSince) {
	$this->memberSince = $memberSince;
    }

    /**
     * Sets languageId
     *
     * @param string
     */
    public function setLanguageId($languageId) {
	$this->languageId = $languageId;
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
     * Sets gsm
     *
     * @param string
     */
    public function setGsm($gsm) {
	$this->gsm = $gsm;
    }

    /**
     * Sets avatar
     *
     * @param string
     */
    public function setAvatar($avatar) {
	$this->avatar = $avatar;
    }

    /**
     * Sets twitter
     *
     * @param string
     */
    public function setTwitter($twitter) {
	$this->twitter = $twitter;
    }

    /**
     * Sets facebook
     *
     * @param string
     */
    public function setFacebook($facebook) {
	$this->facebook = $facebook;
    }

    /**
     * Sets rss
     *
     * @param string
     */
    public function setRss($rss) {
	$this->rss = $rss;
    }

}

?>

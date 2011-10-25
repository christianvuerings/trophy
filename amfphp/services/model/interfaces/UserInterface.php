<?php

/**
 * Interface for User
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface UserInterface {
    
    /**
     * Creates a new User object
     * 
     *      * @param $int   $userId
     *      * @param $string   $firstName
     *      * @param $string   $lastName
     *      * @param $string   $email
     *      * @param $string   $password
     *      * @param $date   $lastLogin
     *      * @param $date   $memberSince
     *      * @param $string   $twitterId
     *      * @param $string   $facebookId
     *      * @param $string   $blogRss
     *      * @param $string   $addressStreet
     *      * @param $string   $addressNumber
     *      * @param $string   $addressBus
     *      * @param $int   $cityId
     *      * @param $string   $telephone
     *      * @param $string   $fax
     *      * @param $string   $gsm
     *      * @param $int   $languageId
     *      * @return User $instance
     */
    public static function createNew($userId, $firstName, $lastName, $email, $password, $lastLogin, $memberSince, $addressStreet, $addressNumber, $cityId, $languageId, $twitterId = NULL, $facebookId = NULL, $blogRss = NULL, $addressBus = NULL, $telephone = NULL, $fax = NULL, $gsm = NULL);
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $userId
     * @return void
     */
    public static function delete($userId);
    
     /**
     * Saves this object to permanent storage
     * 
     * @return int $userId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $userId
     * @return User
     */
    public static function load($userId);


    /* Getters and setters */
    public function getUserId();
    
    public function getFirstName();
    
    public function getLastName();
    
    public function getEmail();
    
    public function getPassword();
    
    public function getLastLogin();
    
    public function getMemberSince();
    
    public function getTwitterId();
    
    public function getFacebookId();
    
    public function getBlogRss();
    
    public function getAddressStreet();
    
    public function getAddressNumber();
    
    public function getAddressBus();
    
    public function getCityId();
    
    public function getTelephone();
    
    public function getFax();
    
    public function getGsm();
    
    public function getLanguageId();
    
    public function setUserId($userId);
    
    public function setFirstName($firstName);
    
    public function setLastName($lastName);
    
    public function setEmail($email);
    
    public function setPassword($password);
    
    public function setLastLogin($lastLogin);
    
    public function setMemberSince($memberSince);
    
    public function setTwitterId($twitterId);
    
    public function setFacebookId($facebookId);
    
    public function setBlogRss($blogRss);
    
    public function setAddressStreet($addressStreet);
    
    public function setAddressNumber($addressNumber);
    
    public function setAddressBus($addressBus);
    
    public function setCityId($cityId);
    
    public function setTelephone($telephone);
    
    public function setFax($fax);
    
    public function setGsm($gsm);
    
    public function setLanguageId($languageId);
    
}
?>

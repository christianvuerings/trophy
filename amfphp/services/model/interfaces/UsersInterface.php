<?php

/**
 * Interface for Users
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface UsersInterface {
     /**
     * Saves this object to permanent storage
     * 
     * @return int $usersId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $usersId
     * @return Users
     */
    public static function load($usersId);


    /* Getters and setters */
    public function getUsersId();
    
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
    
    public function getCitiesId();
    
    public function getTelephone();
    
    public function getFax();
    
    public function getGsm();
    
    public function getLanguagesId();
    
    public function setUsersId($usersId);
    
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
    
    public function setCitiesId($citiesId);
    
    public function setTelephone($telephone);
    
    public function setFax($fax);
    
    public function setGsm($gsm);
    
    public function setLanguagesId($languagesId);
    
}
?>

<?php

/**
 * Interface for Practice
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface PracticeInterface {
    
    /**
     * Creates a new Practice object
     * 
     *      * @param $int   $practiceId
     *      * @param $int   $userId
     *      * @param $string   $name
     *      * @param $string   $addressStreet
     *      * @param $string   $addressNumber
     *      * @param $string   $addressBus
     *      * @param $int   $cityId
     *      * @param $string   $telephone
     *      * @param $string   $fax
     *      * @param $string   $gsm
     *      * @return Practice $instance
     */
    public static function createNew($practiceId, $userId, $addressStreet, $addressNumber, $addressBus, $cityId, $name = NULL, $telephone = NULL, $fax = NULL, $gsm = NULL);
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $practiceId
     * @return void
     */
    public static function delete($practiceId);
    
     /**
     * Saves this object to permanent storage
     * 
     * @return int $practiceId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $practiceId
     * @return Practice
     */
    public static function load($practiceId);


    /* Getters and setters */
    public function getPracticeId();
    
    public function getUserId();
    
    public function getName();
    
    public function getAddressStreet();
    
    public function getAddressNumber();
    
    public function getAddressBus();
    
    public function getCityId();
    
    public function getTelephone();
    
    public function getFax();
    
    public function getGsm();
    
    public function setPracticeId($practiceId);
    
    public function setUserId($userId);
    
    public function setName($name);
    
    public function setAddressStreet($addressStreet);
    
    public function setAddressNumber($addressNumber);
    
    public function setAddressBus($addressBus);
    
    public function setCityId($cityId);
    
    public function setTelephone($telephone);
    
    public function setFax($fax);
    
    public function setGsm($gsm);
    
}
?>

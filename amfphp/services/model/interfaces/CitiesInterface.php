<?php

/**
 * Interface for Cities
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface CitiesInterface {
     /**
     * Saves this object to permanent storage
     * 
     * @return int $citiesId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $citiesId
     * @return Cities
     */
    public static function load($citiesId);


    /* Getters and setters */
    public function getCitiesId();
    
    public function getProvincesId();
    
    public function getZipcode();
    
    public function getName();
    
    public function setCitiesId($citiesId);
    
    public function setProvincesId($provincesId);
    
    public function setZipcode($zipcode);
    
    public function setName($name);
    
}
?>

<?php

/**
 * Interface for City
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface CityInterface {
    
    /**
     * Creates a new City object
     * 
     *      * @param $int   $cityId
     *      * @param $int   $provinceId
     *      * @param $string   $zipcode
     *      * @param $string   $name
     *      * @return City $instance
     */
    public static function createNew($cityId, $provinceId, $zipcode, $name);
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $cityId
     * @return void
     */
    public static function delete($cityId);
    
     /**
     * Saves this object to permanent storage
     * 
     * @return int $cityId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $cityId
     * @return City
     */
    public static function load($cityId);


    /* Getters and setters */
    public function getCityId();
    
    public function getProvinceId();
    
    public function getZipcode();
    
    public function getName();
    
    public function setCityId($cityId);
    
    public function setProvinceId($provinceId);
    
    public function setZipcode($zipcode);
    
    public function setName($name);
    
}
?>

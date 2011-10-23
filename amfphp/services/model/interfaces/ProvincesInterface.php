<?php

/**
 * Interface for Provinces
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface ProvincesInterface {
     /**
     * Saves this object to permanent storage
     * 
     * @return int $provincesId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $provincesId
     * @return Provinces
     */
    public static function load($provincesId);


    /* Getters and setters */
    public function getProvincesId();
    
    public function getLabel();
    
    public function getCountriesId();
    
    public function setProvincesId($provincesId);
    
    public function setLabel($label);
    
    public function setCountriesId($countriesId);
    
}
?>

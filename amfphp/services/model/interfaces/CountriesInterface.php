<?php

/**
 * Interface for Countries
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface CountriesInterface {
     /**
     * Saves this object to permanent storage
     * 
     * @return int $countriesId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $countriesId
     * @return Countries
     */
    public static function load($countriesId);


    /* Getters and setters */
    public function getCountriesId();
    
    public function getLabel();
    
    public function setCountriesId($countriesId);
    
    public function setLabel($label);
    
}
?>

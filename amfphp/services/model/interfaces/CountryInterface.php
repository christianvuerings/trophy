<?php

/**
 * Interface for Country
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface CountryInterface {
    
    /**
     * Creates a new Country object
     * 
     *      * @param $int   $countryId
     *      * @param $string   $label
     *      * @return Country $instance
     */
    public static function createNew($countryId, $label);
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $countryId
     * @return void
     */
    public static function delete($countryId);
    
     /**
     * Saves this object to permanent storage
     * 
     * @return int $countryId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $countryId
     * @return Country
     */
    public static function load($countryId);


    /* Getters and setters */
    public function getCountryId();
    
    public function getLabel();
    
    public function setCountryId($countryId);
    
    public function setLabel($label);
    
}
?>

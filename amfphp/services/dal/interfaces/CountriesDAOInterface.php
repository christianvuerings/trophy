<?php

require_once '../model/interfaces/CountriesInterface.php';

/**
 * interface  for CountriesDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class CountriesDAOInterface {   
    /**
     * Returns an instance of this CountriesDAO
     * Singleton pattern
     * 
     * @return CountriesDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a Countries object from the database
     * 
     * @param $int $countriesId
     * @return Countries
     */
    public function load($countriesId);
    
    /**
     * Saves the given object to the database
     * 
     * @param CountriesInterface $countries
     * @return int $primaryKey
     */
    public function save(CountriesInterface $countries);
}
?>

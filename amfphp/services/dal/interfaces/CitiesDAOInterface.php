<?php

require_once '../model/interfaces/CitiesInterface.php';

/**
 * interface  for CitiesDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class CitiesDAOInterface {
    public const TABLE_NAME = cities;
    
    /**
     * Returns an instance of this CitiesDAO
     * Singleton pattern
     * 
     * @return CitiesDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a Cities object from the database
     * 
     * @param $int $citiesId
     * @return Cities
     */
    public function load($citiesId);
    
    /**
     * Saves the given object to the database
     * 
     * @param CitiesInterface $cities
     * @return int $primaryKey
     */
    public function save(CitiesInterface $cities);
?>

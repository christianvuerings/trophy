<?php

require_once '../model/interfaces/OccupationsInterface.php';

/**
 * interface  for OccupationsDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class OccupationsDAOInterface {
    public const TABLE_NAME = occupations;
    
    /**
     * Returns an instance of this OccupationsDAO
     * Singleton pattern
     * 
     * @return OccupationsDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a Occupations object from the database
     * 
     * @param $int $occupationsId
     * @return Occupations
     */
    public function load($occupationsId);
    
    /**
     * Saves the given object to the database
     * 
     * @param OccupationsInterface $occupations
     * @return int $primaryKey
     */
    public function save(OccupationsInterface $occupations);
?>

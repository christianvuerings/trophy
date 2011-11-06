<?php

require_once '../model/interfaces/OccupationInterface.php';

/**
 * interface  for OccupationDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface OccupationDAOInterface {   
    /**
     * Returns an instance of this OccupationDAO
     * Singleton pattern
     * 
     * @return OccupationDAO $instance
     */
    public static function getInstance();
    
    /**
     * deletes a Occupation object from the database
     * 
     * @param $int $occupationId
     * @return int  number of deleted rows
     */
    public function delete($occupationId);
    
    /**
     * loads a Occupation object from the database
     * 
     * @param $int $occupationId
     * @return Occupation
     */
    public function load($occupationId);
    
    /**
     * Saves the given object to the database
     * 
     * @param OccupationInterface $occupation
     * @return int $primaryKey
     */
    public function save(OccupationInterface $occupation);
}
?>

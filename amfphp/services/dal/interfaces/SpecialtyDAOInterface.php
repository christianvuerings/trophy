<?php

require_once '../model/interfaces/specialtyInterface.php';

/**
 * interface  for specialtyDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface specialtyDAOInterface {   
    /**
     * Returns an instance of this specialtyDAO
     * Singleton pattern
     * 
     * @return specialtyDAO $instance
     */
    public static function getInstance();
    
    /**
     * deletes a specialty object from the database
     * 
     * @param $int $specialtyId
     * @return int  number of deleted rows
     */
    public function delete($specialtyId);
    
    /**
     * loads a specialty object from the database
     * 
     * @param $int $specialtyId
     * @return specialty
     */
    public function load($specialtyId);
    
    /**
     * Saves the given object to the database
     * 
     * @param specialtyInterface $specialty
     * @return int $primaryKey
     */
    public function save(specialtyInterface $specialty);
}
?>

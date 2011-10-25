<?php

require_once '../model/interfaces/SpecialityInterface.php';

/**
 * interface  for SpecialityDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class SpecialityDAOInterface {   
    /**
     * Returns an instance of this SpecialityDAO
     * Singleton pattern
     * 
     * @return SpecialityDAO $instance
     */
    public function getInstance();
    
    /**
     * deletes a Speciality object from the database
     * 
     * @param $int $specialityId
     * @return int  number of deleted rows
     */
    public function delete($specialityId)
    
    /**
     * loads a Speciality object from the database
     * 
     * @param $int $specialityId
     * @return Speciality
     */
    public function load($specialityId);
    
    /**
     * Saves the given object to the database
     * 
     * @param SpecialityInterface $speciality
     * @return int $primaryKey
     */
    public function save(SpecialityInterface $speciality);
}
?>

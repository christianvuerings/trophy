<?php

/**
 * Interface for Specialties
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface SpecialtiesInterface {
     /**
     * Saves this object to permanent storage
     * 
     * @return int $specialtiesId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $specialtiesId
     * @return Specialties
     */
    public static function load($specialtiesId);


    /* Getters and setters */
    public function getSpecialtiesId();
    
    public function getLabel();
    
    public function setSpecialtiesId($specialtiesId);
    
    public function setLabel($label);
    
}
?>

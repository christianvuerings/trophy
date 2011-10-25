<?php

/**
 * Interface for Speciality
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface SpecialityInterface {
    
    /**
     * Creates a new Speciality object
     * 
     *      * @param $int   $specialityId
     *      * @param $string   $label
     *      * @return Speciality $instance
     */
    public static function createNew($specialityId, $label);
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $specialityId
     * @return void
     */
    public static function delete($specialityId);
    
     /**
     * Saves this object to permanent storage
     * 
     * @return int $specialityId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $specialityId
     * @return Speciality
     */
    public static function load($specialityId);


    /* Getters and setters */
    public function getSpecialityId();
    
    public function getLabel();
    
    public function setSpecialityId($specialityId);
    
    public function setLabel($label);
    
}
?>

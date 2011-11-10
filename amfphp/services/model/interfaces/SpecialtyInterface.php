<?php

/**
 * Interface for specialty
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface SpecialtyInterface {
    
    /**
     * Creates a new specialty object
     * 
     *      * @param $int   $specialtyId
     *      * @param $string   $label
     *      * @return specialty $instance
     */
    public static function createNew($specialtyId, $label);
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $specialtyId
     * @return void
     */
    public static function delete($specialtyId);
    
     /**
     * Saves this object to permanent storage
     * 
     * @return int $specialtyId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $specialtyId
     * @return specialty
     */
    public static function load($specialtyId);


    /* Getters and setters */
    public function getspecialtyId();
    
    public function getLabel();
    
    public function setspecialtyId($specialtyId);
    
    public function setLabel($label);
    
}
?>

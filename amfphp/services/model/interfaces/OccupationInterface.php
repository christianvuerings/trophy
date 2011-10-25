<?php

/**
 * Interface for Occupation
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface OccupationInterface {
    
    /**
     * Creates a new Occupation object
     * 
     *      * @param $int   $occupationId
     *      * @param $string   $label
     *      * @return Occupation $instance
     */
    public static function createNew($occupationId, $label);
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $occupationId
     * @return void
     */
    public static function delete($occupationId);
    
     /**
     * Saves this object to permanent storage
     * 
     * @return int $occupationId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $occupationId
     * @return Occupation
     */
    public static function load($occupationId);


    /* Getters and setters */
    public function getOccupationId();
    
    public function getLabel();
    
    public function setOccupationId($occupationId);
    
    public function setLabel($label);
    
}
?>

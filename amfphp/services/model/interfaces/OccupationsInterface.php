<?php

/**
 * Interface for Occupations
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface OccupationsInterface {
     /**
     * Saves this object to permanent storage
     * 
     * @return int $occupationsId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $occupationsId
     * @return Occupations
     */
    public static function load($occupationsId);


    /* Getters and setters */
    public function getOccupationsId();
    
    public function getLabel();
    
    public function setOccupationsId($occupationsId);
    
    public function setLabel($label);
    
}
?>

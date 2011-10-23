<?php

/**
 * Interface for UsersOccupations
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface UsersOccupationsInterface {
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
     * @return UsersOccupations
     */
    public static function load($occupationsId);


    /* Getters and setters */
    public function getOccupationsId();
    
    public function setOccupationsId($occupationsId);
    
}
?>

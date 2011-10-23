<?php

/**
 * Interface for UsersSpecialties
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface UsersSpecialtiesInterface {
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
     * @return UsersSpecialties
     */
    public static function load($specialtiesId);


    /* Getters and setters */
    public function getSpecialtiesId();
    
    public function setSpecialtiesId($specialtiesId);
    
}
?>

<?php

/**
 * Interface for Languages
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface LanguagesInterface {
     /**
     * Saves this object to permanent storage
     * 
     * @return int $languagesId
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int $languagesId
     * @return Languages
     */
    public static function load($languagesId);


    /* Getters and setters */
    public function getLanguagesId();
    
    public function getLabel();
    
    public function setLanguagesId($languagesId);
    
    public function setLabel($label);
    
}
?>

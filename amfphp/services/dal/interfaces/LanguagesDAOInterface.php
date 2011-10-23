<?php

require_once '../model/interfaces/LanguagesInterface.php';

/**
 * interface  for LanguagesDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class LanguagesDAOInterface {   
    /**
     * Returns an instance of this LanguagesDAO
     * Singleton pattern
     * 
     * @return LanguagesDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a Languages object from the database
     * 
     * @param $int $languagesId
     * @return Languages
     */
    public function load($languagesId);
    
    /**
     * Saves the given object to the database
     * 
     * @param LanguagesInterface $languages
     * @return int $primaryKey
     */
    public function save(LanguagesInterface $languages);
}
?>

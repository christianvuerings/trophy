<?php

require_once '../model/interfaces/LanguageInterface.php';

/**
 * interface  for LanguageDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface LanguageDAOInterface {   
    /**
     * Returns an instance of this LanguageDAO
     * Singleton pattern
     * 
     * @return LanguageDAO $instance
     */
    public static function getInstance();
    
    /**
     * deletes a Language object from the database
     * 
     * @param $int $languageId
     * @return int  number of deleted rows
     */
    public function delete($languageId);
    
    /**
     * loads a Language object from the database
     * 
     * @param $int $languageId
     * @return Language
     */
    public function load($languageId);
    
    /**
     * Saves the given object to the database
     * 
     * @param LanguageInterface $language
     * @return int $primaryKey
     */
    public function save(LanguageInterface $language);
}
?>

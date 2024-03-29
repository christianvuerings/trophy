<?php

/**
 * Interface for Language
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface LanguageInterface {

    /**
     * Creates a new Language object
     *
     * @param string   $languageId
     * @param string   $label
     * @return Language $instance
     */
    public static function createNew($languageId, $label);

    /**
     * deletes an object from permanent storage
     *
     * @param string $languageId
     * @return void
     */
    public static function delete($languageId);

     /**
     * Saves this object to permanent storage
     *
     * @return string $languageId
     */
    public function save();

    /**
     * loads an object from permanent storage
     *
     * @param string $languageId
     * @return Language
     */
    public static function load($languageId);


    /* Getters and setters */
    public function getLanguageId();

    public function getLabel();

    public function setLanguageId($languageId);

    public function setLabel($label);

}
?>

<?php

/**
 * Interface for Specialty
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface SpecialtyInterface {

    /**
     * Creates a new Specialty object
     *
     * @param string   $label
     * @return Specialty $instance
     */
    public static function createNew($label);

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
     * @return Specialty
     */
    public static function load($specialtyId);


    /* Getters and setters */
    public function getSpecialtyId();

    public function getLabel();

    public function setSpecialtyId($specialtyId);

    public function setLabel($label);

}
?>

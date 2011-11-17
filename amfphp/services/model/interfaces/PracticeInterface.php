<?php

/**
 * Interface for Practice
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface PracticeInterface {

    /**
     * Creates a new Practice object
     *
     * @param string   $name
     * @param string   $telephone
     * @param string   $fax
     * @param int   $addressId
     * @return Practice $instance
     */
    public static function createNew($addressId, $name = NULL, $telephone = NULL, $fax = NULL);

    /**
     * deletes an object from permanent storage
     *
     * @param int $practiceId
     * @return void
     */
    public static function delete($practiceId);

     /**
     * Saves this object to permanent storage
     *
     * @return int $practiceId
     */
    public function save();

    /**
     * loads an object from permanent storage
     *
     * @param int $practiceId
     * @return Practice
     */
    public static function load($practiceId);


    /* Getters and setters */
    public function getPracticeId();

    public function getName();

    public function getTelephone();

    public function getFax();

    public function getAddressId();

    public function setPracticeId($practiceId);

    public function setName($name);

    public function setTelephone($telephone);

    public function setFax($fax);

    public function setAddressId($addressId);

}
?>

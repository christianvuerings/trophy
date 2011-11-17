<?php

/**
 * Interface for Province
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface ProvinceInterface {

    /**
     * Creates a new Province object
     *
     * @param string   $label
     * @param string   $countryId
     * @return Province $instance
     */
    public static function createNew($label, $countryId);

    /**
     * deletes an object from permanent storage
     *
     * @param int $provinceId
     * @return void
     */
    public static function delete($provinceId);

     /**
     * Saves this object to permanent storage
     *
     * @return int $provinceId
     */
    public function save();

    /**
     * loads an object from permanent storage
     *
     * @param int $provinceId
     * @return Province
     */
    public static function load($provinceId);


    /* Getters and setters */
    public function getProvinceId();

    public function getLabel();

    public function getCountryId();

    public function setProvinceId($provinceId);

    public function setLabel($label);

    public function setCountryId($countryId);

}
?>

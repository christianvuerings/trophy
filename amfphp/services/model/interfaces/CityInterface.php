<?php

/**
 * Interface for City
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface CityInterface {

    /**
     * Creates a new City object
     *
     * @param string   $alpha
     * @param float   $longitude
     * @param float   $latitude
     * @param string   $code
     * @param string   $name
     * @param int   $provinceId
     * @return City $instance
     */
    public static function createNew($alpha, $code, $name, $provinceId, $longitude = NULL, $latitude = NULL);

    /**
     * deletes an object from permanent storage
     *
     * @param int $id
     * @return void
     */
    public static function delete($id);

     /**
     * Saves this object to permanent storage
     *
     * @return int $id
     */
    public function save();

    /**
     * loads an object from permanent storage
     *
     * @param int $id
     * @return City
     */
    public static function load($id);


    /* Getters and setters */
    public function getId();

    public function getAlpha();

    public function getLongitude();

    public function getLatitude();

    public function getCode();

    public function getName();

    public function getProvinceId();

    public function setId($id);

    public function setAlpha($alpha);

    public function setLongitude($longitude);

    public function setLatitude($latitude);

    public function setCode($code);

    public function setName($name);

    public function setProvinceId($provinceId);

}
?>

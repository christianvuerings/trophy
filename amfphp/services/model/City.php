<?php

require_once 'dal/CityDAO.php';
require_once 'interfaces/CityInterface.php';

/**
 * Model City
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class City implements CityInterface {

    public $id;
    public $alpha;
    public $longitude;
    public $latitude;
    public $code;
    public $name;
    public $province;

    //mapping with flex
    public $_explicitType = "classestrophy.City";

    public function __construct() {
        
    }

    /**
     * Creates a new City object
     * 
     * @param int   $cityId
     * @param int   $provinceId
     * @param string   $zipcode
     * @param string   $name
     * @return City $instance
     */
    public static function createNew($cityId, $provinceId, $zipcode, $name) {
        $instance = new self();

        $instance->cityId = $cityId;
        $instance->provinceId = $provinceId;
        $instance->zipcode = $zipcode;
        $instance->name = $name;

        return $instance;
    }

    /**
     * deletes an object from permanent storage
     * 
     * @param int $cityId
     * @return void
     */
    public static function delete($cityId) {
        // get data access object
        $dao = CityDAO::getInstance();

        $dao->delete($cityId);
    }

    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
        // get data access object
        $dao = CityDAO::getInstance();

        // saves this object tot storage
        $cityId = $dao->save($this);

        // update cityId
        $this->cityId = $cityId;

        // returns id
        return $cityId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $cityId
     * @return City
     */
    public static function load($cityId) {
        // get data access object
        $dao = CityDAO::getInstance();

        return $dao->load($cityId);
    }



}

?>

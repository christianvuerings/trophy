<?php

require_once '../dal/CityDAO.php';
require_once 'interfaces/CityInterface.php';

/**
 * Model City
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class City implements CityInterface {
    private $cityId;
    private $provinceId;
    private $zipcode;
    private $name;
        
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
    
    
    /* Getters and setters */
    /**
     * Returns cityId
     * 
     * @return int
     */
    public function getCityId() {
	    return $this->cityId;
    }
    
    /**
     * Returns provinceId
     * 
     * @return int
     */
    public function getProvinceId() {
	    return $this->provinceId;
    }
    
    /**
     * Returns zipcode
     * 
     * @return string
     */
    public function getZipcode() {
	    return $this->zipcode;
    }
    
    /**
     * Returns name
     * 
     * @return string
     */
    public function getName() {
	    return $this->name;
    }
    
    /**
     * Sets cityId
     * 
     * @param int
     */
    public function setCityId($cityId) {
	    $this->cityId = $cityId;
    }
    
    /**
     * Sets provinceId
     * 
     * @param int
     */
    public function setProvinceId($provinceId) {
	    $this->provinceId = $provinceId;
    }
    
    /**
     * Sets zipcode
     * 
     * @param string
     */
    public function setZipcode($zipcode) {
	    $this->zipcode = $zipcode;
    }
    
    /**
     * Sets name
     * 
     * @param string
     */
    public function setName($name) {
	    $this->name = $name;
    }
    
}
?>

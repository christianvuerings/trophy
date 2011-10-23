<?php

require_once '../dal/CitiesDAO.php';
require_once 'interfaces/CitiesInterface.php';

/**
 * Model Cities
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Cities implements CitiesInterface {
    private $citiesId;
    private $provincesId;
    private $zipcode;
    private $name;
        
    //mapping with flex
    public $_explicitType = "classestrophy.Cities";
    
    public function __construct() {
    }
    
    /**
     * Creates a new Cities object
     */
    public static function createNew($citiesId, $provincesId, $zipcode, $name) {
	    $instance = new self();
	
		$instance->citiesId = $citiesId;
		$instance->provincesId = $provincesId;
		$instance->zipcode = $zipcode;
		$instance->name = $name;
		
	    return $instance;
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = CitiesDAO::getInstance();

	    // saves this object tot storage
	    $citiesId = $dao->save($this);

	    // update citiesId
	    $this->citiesId = $citiesId;
	    
	    // returns id
	    return $citiesId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $citiesId
     * @return Cities
     */
    public static function load($citiesId) {
	    // get data access object
	    $dao = CitiesDAO::getInstance();

	    return $dao->load($citiesId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns citiesId
     * 
     * @return int
     */
    public function getCitiesId() {
	    return $this->citiesId;
    }
    
    /**
     * Returns provincesId
     * 
     * @return int
     */
    public function getProvincesId() {
	    return $this->provincesId;
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
     * Sets citiesId
     * 
     * @param int
     */
    public function setCitiesId($citiesId) {
	    $this->citiesId = $citiesId;
    }
    
    /**
     * Sets provincesId
     * 
     * @param int
     */
    public function setProvincesId($provincesId) {
	    $this->provincesId = $provincesId;
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

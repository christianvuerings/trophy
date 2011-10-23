<?php

require_once '../dal/ProvincesDAO.php'
require_once 'interfaces/ProvincesInterface.php'

/**
 * Model Provinces
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Provinces implements ProvincesInterface {
    private $provincesId;
    private $label;
    private $countriesId;
        
    //mapping with flex
    public $_explicitType = "classestrophy.Provinces";
    
    public function __construct() {
    }
    
    /**
     * Creates a new Provinces object
     */
    public static function createNew($provincesId, $label, $countriesId) {
	    $instance = new self();
	
		$instance->provincesId = $provincesId;
		$instance->label = $label;
		$instance->countriesId = $countriesId;
		
	    return $instance;
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = ProvincesDAO::getInstance();

	    // saves this object tot storage
	    $provincesId = $dao->save($this);

	    // update provincesId
	    $this->provincesId = $provincesId;
	    
	    // returns id
	    return $provincesId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $provincesId
     * @return Provinces
     */
    public static function load($provincesId) {
	    // get data access object
	    $dao = ProvincesDAO::getInstance();

	    return $dao->load($provincesId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns provincesId
     * 
     * @return int
     */
    public function getProvincesId() {
	    return $this->provincesId;
    }
    
    /**
     * Returns label
     * 
     * @return string
     */
    public function getLabel() {
	    return $this->label;
    }
    
    /**
     * Returns countriesId
     * 
     * @return int
     */
    public function getCountriesId() {
	    return $this->countriesId;
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
     * Sets label
     * 
     * @param string
     */
    public function setLabel($label) {
	    $this->label = $label;
    }
    
    /**
     * Sets countriesId
     * 
     * @param int
     */
    public function setCountriesId($countriesId) {
	    $this->countriesId = $countriesId;
    }
    
}
?>

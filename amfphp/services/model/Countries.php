<?php

require_once '../dal/CountriesDAO.php'
require_once 'interfaces/CountriesInterface.php'

/**
 * Model Countries
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Countries implements CountriesInterface {
    private $countriesId;
    private $label;
        
    //mapping with flex
    public $_explicitType = "classestrophy.Countries";
    
    public function __construct() {
    }
    
    /**
     * Creates a new Countries object
     */
    public static function createNew($countriesId, $label) {
	    $instance = new self();
	
		$instance->countriesId = $countriesId;
		$instance->label = $label;
		
	    return $instance;
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = CountriesDAO::getInstance();

	    // saves this object tot storage
	    $countriesId = $dao->save($this);

	    // update countriesId
	    $this->countriesId = $countriesId;
	    
	    // returns id
	    return $countriesId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $countriesId
     * @return Countries
     */
    public static function load($countriesId) {
	    // get data access object
	    $dao = CountriesDAO::getInstance();

	    return $dao->load($countriesId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns countriesId
     * 
     * @return int
     */
    public function getCountriesId() {
	    return $this->countriesId;
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
     * Sets countriesId
     * 
     * @param int
     */
    public function setCountriesId($countriesId) {
	    $this->countriesId = $countriesId;
    }
    
    /**
     * Sets label
     * 
     * @param string
     */
    public function setLabel($label) {
	    $this->label = $label;
    }
    
}
?>

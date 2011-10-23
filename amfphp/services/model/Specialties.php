<?php

require_once '../dal/SpecialtiesDAO.php'
require_once 'interfaces/SpecialtiesInterface.php'

/**
 * Model Specialties
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Specialties implements SpecialtiesInterface {
    private $specialtiesId;
    private $label;
        
    //mapping with flex
    public $_explicitType = "classestrophy.Specialties";
    
    public function __construct() {
    }
    
    /**
     * Creates a new Specialties object
     */
    public static function createNew($specialtiesId, $label) {
	    $instance = new self();
	
		$instance->specialtiesId = $specialtiesId;
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
	    $dao = SpecialtiesDAO::getInstance();

	    // saves this object tot storage
	    $specialtiesId = $dao->save($this);

	    // update specialtiesId
	    $this->specialtiesId = $specialtiesId;
	    
	    // returns id
	    return $specialtiesId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $specialtiesId
     * @return Specialties
     */
    public static function load($specialtiesId) {
	    // get data access object
	    $dao = SpecialtiesDAO::getInstance();

	    return $dao->load($specialtiesId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns specialtiesId
     * 
     * @return int
     */
    public function getSpecialtiesId() {
	    return $this->specialtiesId;
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
     * Sets specialtiesId
     * 
     * @param int
     */
    public function setSpecialtiesId($specialtiesId) {
	    $this->specialtiesId = $specialtiesId;
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

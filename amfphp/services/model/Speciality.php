<?php

require_once '../dal/SpecialityDAO.php';
require_once 'interfaces/SpecialityInterface.php';

/**
 * Model Speciality
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Speciality implements SpecialityInterface {
    private $specialityId;
    private $label;
        
    //mapping with flex
    public $_explicitType = "classestrophy.Speciality";
    
    public function __construct() {
    }
    
    /**
     * Creates a new Speciality object
     * 
     * @param int   $specialityId
     * @param string   $label
     * @return Speciality $instance
     */
    public static function createNew($specialityId, $label) {
	    $instance = new self();
	
		$instance->specialityId = $specialityId;
		$instance->label = $label;
		
	    return $instance;
    }
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $specialityId
     * @return void
     */
    public static function delete($specialityId) {
	    // get data access object
	    $dao = SpecialityDAO::getInstance();

	    $dao->delete($specialityId);
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = SpecialityDAO::getInstance();

	    // saves this object tot storage
	    $specialityId = $dao->save($this);

	    // update specialityId
	    $this->specialityId = $specialityId;
	    
	    // returns id
	    return $specialityId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $specialityId
     * @return Speciality
     */
    public static function load($specialityId) {
	    // get data access object
	    $dao = SpecialityDAO::getInstance();

	    return $dao->load($specialityId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns specialityId
     * 
     * @return int
     */
    public function getSpecialityId() {
	    return $this->specialityId;
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
     * Sets specialityId
     * 
     * @param int
     */
    public function setSpecialityId($specialityId) {
	    $this->specialityId = $specialityId;
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

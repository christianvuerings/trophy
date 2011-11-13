<?php

require_once 'dal/specialtyDAO.php';
require_once 'interfaces/specialtyInterface.php';

/**
 * Model specialty
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class specialty implements SpecialtyInterface {
    private $specialtyId;
    private $label;
        
    //mapping with flex
    public $_explicitType = "classestrophy.specialty";
    
    public function __construct() {
    }
    
    /**
     * Creates a new specialty object
     * 
     * @param int   $specialtyId
     * @param string   $label
     * @return specialty $instance
     */
    public static function createNew($specialtyId, $label) {
	    $instance = new self();
	
		$instance->specialtyId = $specialtyId;
		$instance->label = $label;
		
	    return $instance;
    }
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int $specialtyId
     * @return void
     */
    public static function delete($specialtyId) {
	    // get data access object
	    $dao = specialtyDAO::getInstance();

	    $dao->delete($specialtyId);
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = specialtyDAO::getInstance();

	    // saves this object tot storage
	    $specialtyId = $dao->save($this);

	    // update specialtyId
	    $this->specialtyId = $specialtyId;
	    
	    // returns id
	    return $specialtyId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $specialtyId
     * @return specialty
     */
    public static function load($specialtyId) {
	    // get data access object
	    $dao = specialtyDAO::getInstance();

	    return $dao->load($specialtyId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns specialtyId
     * 
     * @return int
     */
    public function getspecialtyId() {
	    return $this->specialtyId;
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
     * Sets specialtyId
     * 
     * @param int
     */
    public function setspecialtyId($specialtyId) {
	    $this->specialtyId = $specialtyId;
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

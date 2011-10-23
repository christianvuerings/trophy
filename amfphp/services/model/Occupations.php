<?php

require_once '../dal/OccupationsDAO.php'
require_once 'interfaces/OccupationsInterface.php'

/**
 * Model Occupations
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Occupations implements OccupationsInterface {
    private $occupationsId;
    private $label;
        
    //mapping with flex
    public $_explicitType = "classestrophy.Occupations";
    
    public function __construct() {
    }
    
    /**
     * Creates a new Occupations object
     */
    public static function createNew($occupationsId, $label) {
	    $instance = new self();
	
		$instance->occupationsId = $occupationsId;
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
	    $dao = OccupationsDAO::getInstance();

	    // saves this object tot storage
	    $occupationsId = $dao->save($this);

	    // update occupationsId
	    $this->occupationsId = $occupationsId;
	    
	    // returns id
	    return $occupationsId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $occupationsId
     * @return Occupations
     */
    public static function load($occupationsId) {
	    // get data access object
	    $dao = OccupationsDAO::getInstance();

	    return $dao->load($occupationsId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns occupationsId
     * 
     * @return int
     */
    public function getOccupationsId() {
	    return $this->occupationsId;
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
     * Sets occupationsId
     * 
     * @param int
     */
    public function setOccupationsId($occupationsId) {
	    $this->occupationsId = $occupationsId;
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

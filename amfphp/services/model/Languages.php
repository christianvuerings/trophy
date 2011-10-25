<?php

require_once '../dal/LanguagesDAO.php';
require_once 'interfaces/LanguagesInterface.php';

/**
 * Model Languages
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class Languages implements LanguagesInterface {
    private $languagesId;
    private $label;
        
    //mapping with flex
    public $_explicitType = "classestrophy.Languages";
    
    public function __construct() {
    }
    
    /**
     * Creates a new Languages object
     */
    public static function createNew($languagesId, $label) {
	    $instance = new self();
	
		$instance->languagesId = $languagesId;
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
	    $dao = LanguagesDAO::getInstance();

	    // saves this object tot storage
	    $languagesId = $dao->save($this);

	    // update languagesId
	    $this->languagesId = $languagesId;
	    
	    // returns id
	    return $languagesId;
    }

    /**
     * loads an object from permanent storage
     * 
     * @param int $languagesId
     * @return Languages
     */
    public static function load($languagesId) {
	    // get data access object
	    $dao = LanguagesDAO::getInstance();

	    return $dao->load($languagesId);
    }
    
    
    /* Getters and setters */
    /**
     * Returns languagesId
     * 
     * @return int
     */
    public function getLanguagesId() {
	    return $this->languagesId;
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
     * Sets languagesId
     * 
     * @param int
     */
    public function setLanguagesId($languagesId) {
	    $this->languagesId = $languagesId;
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

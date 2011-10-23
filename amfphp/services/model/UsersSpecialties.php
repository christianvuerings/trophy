<?php

require_once '../dal/UsersSpecialtiesDAO.php'
require_once 'interfaces/UsersSpecialtiesInterface.php'

/**
 * Model UsersSpecialties
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UsersSpecialties implements UsersSpecialtiesInterface {
    private $specialtiesId;
        
    //mapping with flex
    public $_explicitType = "classestrophy.UsersSpecialties";
    
    public function __construct() {
    }
    
    /**
     * Creates a new UsersSpecialties object
     */
    public static function createNew($specialtiesId) {
	    $instance = new self();
	
		$instance->specialtiesId = $specialtiesId;
		
	    return $instance;
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = UsersSpecialtiesDAO::getInstance();

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
     * @return UsersSpecialties
     */
    public static function load($specialtiesId) {
	    // get data access object
	    $dao = UsersSpecialtiesDAO::getInstance();

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
     * Sets specialtiesId
     * 
     * @param int
     */
    public function setSpecialtiesId($specialtiesId) {
	    $this->specialtiesId = $specialtiesId;
    }
    
}
?>

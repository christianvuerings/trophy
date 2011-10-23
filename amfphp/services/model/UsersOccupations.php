<?php

require_once '../dal/UsersOccupationsDAO.php'
require_once 'interfaces/UsersOccupationsInterface.php'

/**
 * Model UsersOccupations
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UsersOccupations implements UsersOccupationsInterface {
    private $occupationsId;
        
    //mapping with flex
    public $_explicitType = "classestrophy.UsersOccupations";
    
    public function __construct() {
    }
    
    /**
     * Creates a new UsersOccupations object
     */
    public static function createNew($occupationsId) {
	    $instance = new self();
	
		$instance->occupationsId = $occupationsId;
		
	    return $instance;
    }
    
    /**
     * Saves this object to permanent storage
     * 
     * @return int $id
     */
    public function save() {
	    // get data access object
	    $dao = UsersOccupationsDAO::getInstance();

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
     * @return UsersOccupations
     */
    public static function load($occupationsId) {
	    // get data access object
	    $dao = UsersOccupationsDAO::getInstance();

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
     * Sets occupationsId
     * 
     * @param int
     */
    public function setOccupationsId($occupationsId) {
	    $this->occupationsId = $occupationsId;
    }
    
}
?>

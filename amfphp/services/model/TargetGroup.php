<?php

require_once 'dal/TargetGroupDAO.php';
require_once 'model/interfaces/TargetGroupInterface.php';

/**
 * Model TargetGroup
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class TargetGroup implements TargetGroupInterface {

    public $targetGroupId;
    public $label;
    //mapping with flex
    public $_explicitType = "classestrophy.TargetGroup";

    public function __construct() {

    }

    /**
     * Creates a new TargetGroup object
     *
     * @param string   $label
     * @return TargetGroup $instance
     */
    public static function createNew($label) {
	$instance = new self();

	$instance->label = $label;

	return $instance;
    }

    /**
     * deletes an object from permanent storage
     *
     * @param int $targetGroupId
     * @return void
     */
    public static function delete($targetGroupId) {
	// get data access object
	$dao = TargetGroupDAO::getInstance();

	$dao->delete($targetGroupId);
    }

    /**
     * Saves this object to permanent storage
     *
     * @return int $id
     */
    public function save() {
	// get data access object
	$dao = TargetGroupDAO::getInstance();

	// saves this object tot storage
	$targetGroupId = $dao->save($this);

	// update targetGroupId
	$this->targetGroupId = $targetGroupId;

	// returns id
	return $targetGroupId;
    }

    /**
     * loads an object from permanent storage
     *
     * @param int $targetGroupId
     * @return TargetGroup
     */
    public static function load($targetGroupId) {
	// get data access object
	$dao = TargetGroupDAO::getInstance();

	return $dao->load($targetGroupId);
    }

    /* Getters and setters */

    /**
     * Returns targetGroupId
     *
     * @return int
     */
    public function getTargetGroupId() {
	return $this->targetGroupId;
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
     * Sets targetGroupId
     *
     * @param int
     */
    public function setTargetGroupId($targetGroupId) {
	$this->targetGroupId = $targetGroupId;
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

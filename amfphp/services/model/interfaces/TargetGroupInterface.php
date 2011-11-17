<?php

/**
 * Interface for TargetGroup
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface TargetGroupInterface {

    /**
     * Creates a new TargetGroup object
     *
     * @param string   $label
     * @return TargetGroup $instance
     */
    public static function createNew($label);

    /**
     * deletes an object from permanent storage
     *
     * @param int $targetGroupId
     * @return void
     */
    public static function delete($targetGroupId);

     /**
     * Saves this object to permanent storage
     *
     * @return int $targetGroupId
     */
    public function save();

    /**
     * loads an object from permanent storage
     *
     * @param int $targetGroupId
     * @return TargetGroup
     */
    public static function load($targetGroupId);


    /* Getters and setters */
    public function getTargetGroupId();

    public function getLabel();

    public function setTargetGroupId($targetGroupId);

    public function setLabel($label);

}
?>

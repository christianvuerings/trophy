<?php

require_once 'model/interfaces/TargetGroupInterface.php';

/**
 * interface  for TargetGroupDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface TargetGroupDAOInterface {
    /**
     * Returns an instance of this TargetGroupDAO
     * Singleton pattern
     *
     * @return TargetGroupDAO $instance
     */
    public function getInstance();

    /**
     * deletes a TargetGroup object from the database
     *
     * @param int $targetGroupId
     * @return int  number of deleted rows
     */
    public function delete($targetGroupId);

    /**
     * loads a TargetGroup object from the database
     *
     * @param int $targetGroupId
     * @return TargetGroup
     */
    public function load($targetGroupId);

    /**
     * Saves the given object to the database
     *
     * @param TargetGroupInterface $targetgroup
     * @return int $primaryKey
     */
    public function save(TargetGroupInterface $targetgroup);
}
?>

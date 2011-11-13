<?php

require_once '../model/interfaces/PracticeInterface.php';

/**
 * interface  for PracticeDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface PracticeDAOInterface {   
    /**
     * Returns an instance of this PracticeDAO
     * Singleton pattern
     * 
     * @return PracticeDAO $instance
     */
    public function getInstance();
    
    /**
     * deletes a Practice object from the database
     * 
     * @param $int $practiceId
     * @return int  number of deleted rows
     */
    public function delete($practiceId)
    
    /**
     * loads a Practice object from the database
     * 
     * @param $int $practiceId
     * @return Practice
     */
    public function load($practiceId);
    
    /**
     * Saves the given object to the database
     * 
     * @param PracticeInterface $practice
     * @return int $primaryKey
     */
    public function save(PracticeInterface $practice);
}
?>

<?php

require_once '../model/interfaces/ProvincesInterface.php';

/**
 * interface  for ProvincesDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class ProvincesDAOInterface {   
    /**
     * Returns an instance of this ProvincesDAO
     * Singleton pattern
     * 
     * @return ProvincesDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a Provinces object from the database
     * 
     * @param $int $provincesId
     * @return Provinces
     */
    public function load($provincesId);
    
    /**
     * Saves the given object to the database
     * 
     * @param ProvincesInterface $provinces
     * @return int $primaryKey
     */
    public function save(ProvincesInterface $provinces);
}
?>

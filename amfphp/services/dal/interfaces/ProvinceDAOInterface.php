<?php

require_once '../model/interfaces/ProvinceInterface.php';

/**
 * interface  for ProvinceDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class ProvinceDAOInterface {   
    /**
     * Returns an instance of this ProvinceDAO
     * Singleton pattern
     * 
     * @return ProvinceDAO $instance
     */
    public function getInstance();
    
    /**
     * deletes a Province object from the database
     * 
     * @param $int $provinceId
     * @return int  number of deleted rows
     */
    public function delete($provinceId)
    
    /**
     * loads a Province object from the database
     * 
     * @param $int $provinceId
     * @return Province
     */
    public function load($provinceId);
    
    /**
     * Saves the given object to the database
     * 
     * @param ProvinceInterface $province
     * @return int $primaryKey
     */
    public function save(ProvinceInterface $province);
}
?>

<?php

require_once '../model/interfaces/SpecialtiesInterface.php';

/**
 * interface  for SpecialtiesDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class SpecialtiesDAOInterface {
    public const TABLE_NAME = specialties;
    
    /**
     * Returns an instance of this SpecialtiesDAO
     * Singleton pattern
     * 
     * @return SpecialtiesDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a Specialties object from the database
     * 
     * @param $int $specialtiesId
     * @return Specialties
     */
    public function load($specialtiesId);
    
    /**
     * Saves the given object to the database
     * 
     * @param SpecialtiesInterface $specialties
     * @return int $primaryKey
     */
    public function save(SpecialtiesInterface $specialties);
?>

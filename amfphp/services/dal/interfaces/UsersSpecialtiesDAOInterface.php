<?php

require_once '../model/interfaces/UsersSpecialtiesInterface.php';

/**
 * interface  for UsersSpecialtiesDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UsersSpecialtiesDAOInterface {
    public const TABLE_NAME = users_specialties;
    
    /**
     * Returns an instance of this UsersSpecialtiesDAO
     * Singleton pattern
     * 
     * @return UsersSpecialtiesDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a UsersSpecialties object from the database
     * 
     * @param $int $specialtiesId
     * @return UsersSpecialties
     */
    public function load($specialtiesId);
    
    /**
     * Saves the given object to the database
     * 
     * @param UsersSpecialtiesInterface $usersspecialties
     * @return int $primaryKey
     */
    public function save(UsersSpecialtiesInterface $usersspecialties);
?>

<?php

require_once '../model/interfaces/UsersOccupationsInterface.php';

/**
 * interface  for UsersOccupationsDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UsersOccupationsDAOInterface {
    public const TABLE_NAME = users_occupations;
    
    /**
     * Returns an instance of this UsersOccupationsDAO
     * Singleton pattern
     * 
     * @return UsersOccupationsDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a UsersOccupations object from the database
     * 
     * @param $int $occupationsId
     * @return UsersOccupations
     */
    public function load($occupationsId);
    
    /**
     * Saves the given object to the database
     * 
     * @param UsersOccupationsInterface $usersoccupations
     * @return int $primaryKey
     */
    public function save(UsersOccupationsInterface $usersoccupations);
?>

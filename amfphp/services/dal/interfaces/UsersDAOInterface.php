<?php

require_once '../model/interfaces/UsersInterface.php';

/**
 * interface  for UsersDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UsersDAOInterface {   
    /**
     * Returns an instance of this UsersDAO
     * Singleton pattern
     * 
     * @return UsersDAO $instance
     */
    public function getInstance();
    
    /**
     * loads a Users object from the database
     * 
     * @param $int $usersId
     * @return Users
     */
    public function load($usersId);
    
    /**
     * Saves the given object to the database
     * 
     * @param UsersInterface $users
     * @return int $primaryKey
     */
    public function save(UsersInterface $users);
}
?>

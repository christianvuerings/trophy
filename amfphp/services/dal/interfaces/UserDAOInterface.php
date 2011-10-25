<?php

require_once '../model/interfaces/UserInterface.php';

/**
 * interface  for UserDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UserDAOInterface {   
    /**
     * Returns an instance of this UserDAO
     * Singleton pattern
     * 
     * @return UserDAO $instance
     */
    public function getInstance();
    
    /**
     * deletes a User object from the database
     * 
     * @param $int $userId
     * @return int  number of deleted rows
     */
    public function delete($userId)
    
    /**
     * loads a User object from the database
     * 
     * @param $int $userId
     * @return User
     */
    public function load($userId);
    
    /**
     * Saves the given object to the database
     * 
     * @param UserInterface $user
     * @return int $primaryKey
     */
    public function save(UserInterface $user);
}
?>

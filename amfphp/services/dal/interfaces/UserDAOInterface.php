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
     * loads User objects from the database
     * 
     * @param array<int> $userIds
     * @return array<User>
     */
    public function loadMultiple($userIds);
    
    /**
     * Saves the given object to the database
     * 
     * @param UserInterface $user
     * @return int $primaryKey
     */
    public function save(UserInterface $user);
    
        /**
     * Saves the link between a User and an occupation
     *
     * @param UserInterface $user
     * @param OccupationInterface $occupation 
     */
    public function saveLinkBetweenUserAndOccupation(UserInterface $user, OccupationInterface $occupation);
    
    /**
     * Saves the link between a user and a speciality
     *
     * @param UserInterface $user
     * @param SpecialityInterface $speciality 
     */
    public function saveLinkBetweenUserAndSpeciality(UserInterface $user, SpecialityInterface $speciality);
    
    /**
     * Removes the link between a User and an occupation
     *
     * @param UserInterface $user
     * @param OccupationInterface $occupation 
     */
    public function removeLinkBetweenUserAndOccupation(UserInterface $user, OccupationInterface $occupation);
    
    /**
     * Saves the link between a user and a speciality
     *
     * @param UserInterface $user
     * @param SpecialityInterface $speciality 
     */
    public function saveLinkBetweenUserAndSpeciality(UserInterface $user, SpecialityInterface $speciality);
}
?>

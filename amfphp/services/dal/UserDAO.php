<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/UserDAOInterface.php';
require_once '../model/interfaces/UserInterface.php';
require_once '../model/User.php';

/**
 * DAO for User
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UserDAO implements UserDAOInterface {
    const TABLE_NAME = 'user';
    const OCCUPATION_LINK_TABLE_NAME = 'user_occupation';
    const SPECIALITY_LINK_TABLE_NAME = 'user_speciality';
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this UserDAO
     * Singleton pattern
     * 
     * @return UserDAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    /**
     * deletes a User object from the database
     * 
     * @param $int $userId
     * @return int  number of deleted rows
     */
    public function delete($userId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'user_id = ?', array($primaryKey));
	
	// TODO: delete the users occupations
	// TODO: delete the users specialities
    }
    
    /**
     * loads a User object from the database
     * 
     * @param $int $userId
     * @return User
     */
    public function load($userId) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT user_id, first_name, last_name, email, password, last_login, member_since, twitter_id, facebook_id, blog_rss, address_street, address_number, address_bus, city_id, telephone, fax, gsm, language_id FROM ' . self::TABLE_NAME . 'WHERE user_id = ?', array($userId));
	
	// translate record to User object
	$user = new User();
	$user->setUserId($record['user_id']);   
	$user->setFirstName($record['first_name']);   
	$user->setLastName($record['last_name']);   
	$user->setEmail($record['email']);   
	$user->setPassword($record['password']);   
	$user->setLastLogin($record['last_login']);   
	$user->setMemberSince($record['member_since']);   
	$user->setTwitterId($record['twitter_id']);   
	$user->setFacebookId($record['facebook_id']);   
	$user->setBlogRss($record['blog_rss']);   
	$user->setAddressStreet($record['address_street']);   
	$user->setAddressNumber($record['address_number']);   
	$user->setAddressBus($record['address_bus']);   
	$user->setCityId($record['city_id']);   
	$user->setTelephone($record['telephone']);   
	$user->setFax($record['fax']);   
	$user->setGsm($record['gsm']);   
	$user->setLanguageId($record['language_id']);   
	
	// TODO: load the users occupations
	// TODO: load the users specialities

	// return User object
	return $user;
    }
    
    /**
     * loads User objects from the database
     * 
     * @param array<int> $userIds
     * @return array<User>
     */
    public function loadMultiple($userIds) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get records from database
	$records = $db->getRecords('SELECT user_id, first_name, last_name, email, password, last_login, member_since, twitter_id, facebook_id, blog_rss, address_street, address_number, address_bus, city_id, telephone, fax, gsm, language_id FROM ' . self::TABLE_NAME . 'WHERE user_id IN (?)', array(implode(', ', $userIds)));
	
	$users = array();
	foreach ($records as $record) {
	    // translate record to User object
	    $user = new User();
	    $user->setUserId($record['user_id']);   
	    $user->setFirstName($record['first_name']);   
	    $user->setLastName($record['last_name']);   
	    $user->setEmail($record['email']);   
	    $user->setPassword($record['password']);   
	    $user->setLastLogin($record['last_login']);   
	    $user->setMemberSince($record['member_since']);   
	    $user->setTwitterId($record['twitter_id']);   
	    $user->setFacebookId($record['facebook_id']);   
	    $user->setBlogRss($record['blog_rss']);   
	    $user->setAddressStreet($record['address_street']);   
	    $user->setAddressNumber($record['address_number']);   
	    $user->setAddressBus($record['address_bus']);   
	    $user->setCityId($record['city_id']);   
	    $user->setTelephone($record['telephone']);   
	    $user->setFax($record['fax']);   
	    $user->setGsm($record['gsm']);   
	    $user->setLanguageId($record['language_id']);   
	    
	    // TODO: load the users occupations
	    // TODO: load the users specialities
	    
	    $users[] = $user;
	}

	// return array of User objects
	return $users;
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param UserInterface $user
     * @return int $primaryKey
     */
    public function save(UserInterface $user){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = $user->getUserId();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
	    $newRecord['first_name'] = $user->getFirstName();
	    $newRecord['last_name'] = $user->getLastName();
	    $newRecord['email'] = $user->getEmail();
	    $newRecord['password'] = $user->getPassword();
	    $newRecord['last_login'] = $user->getLastLogin();
	    $newRecord['member_since'] = $user->getMemberSince();
	    $newRecord['twitter_id'] = $user->getTwitterId();
	    $newRecord['facebook_id'] = $user->getFacebookId();
	    $newRecord['blog_rss'] = $user->getBlogRss();
	    $newRecord['address_street'] = $user->getAddressStreet();
	    $newRecord['address_number'] = $user->getAddressNumber();
	    $newRecord['address_bus'] = $user->getAddressBus();
	    $newRecord['city_id'] = $user->getCityId();
	    $newRecord['telephone'] = $user->getTelephone();
	    $newRecord['fax'] = $user->getFax();
	    $newRecord['gsm'] = $user->getGsm();
	    $newRecord['language_id'] = $user->getLanguageId();
	    
	    // TODO: save the users occupations
	    // TODO: save the users specialities
			    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    $record['user_id'] = $user->getUserId();
	    $record['first_name'] = $user->getFirstName();
	    $record['last_name'] = $user->getLastName();
	    $record['email'] = $user->getEmail();
	    $record['password'] = $user->getPassword();
	    $record['last_login'] = $user->getLastLogin();
	    $record['member_since'] = $user->getMemberSince();
	    $record['twitter_id'] = $user->getTwitterId();
	    $record['facebook_id'] = $user->getFacebookId();
	    $record['blog_rss'] = $user->getBlogRss();
	    $record['address_street'] = $user->getAddressStreet();
	    $record['address_number'] = $user->getAddressNumber();
	    $record['address_bus'] = $user->getAddressBus();
	    $record['city_id'] = $user->getCityId();
	    $record['telephone'] = $user->getTelephone();
	    $record['fax'] = $user->getFax();
	    $record['gsm'] = $user->getGsm();
	    $record['language_id'] = $user->getLanguageId();
	    
	    // TODO: save the users occupations
	    // TODO: save the users specialities
		
	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'user_id = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
    
    /**
     * Saves the link between a User and an occupation
     *
     * @param UserInterface $user
     * @param OccupationInterface $occupation 
     */
    public function saveLinkBetweenUserAndOccupation(UserInterface $user, OccupationInterface $occupation) {
	$db->insert(self::OCCUPATION_LINK_TABLE_NAME, array('user_id' => $user->getUserId(), 'occupation_id' => $occupation->getOccupationId()));
    }
    
    /**
     * Saves the link between a user and a speciality
     *
     * @param UserInterface $user
     * @param SpecialityInterface $speciality 
     */
    public function saveLinkBetweenUserAndSpeciality(UserInterface $user, SpecialityInterface $speciality) {
	$db->insert(self::SPECIALITY_LINK_TABLE_NAME, array('user_id' => $user->getUserId(), 'speciality_id' => $speciality->getSpecialityId()));
    }
    
    /**
     * Removes the link between a User and an occupation
     *
     * @param UserInterface $user
     * @param OccupationInterface $occupation 
     */
    public function removeLinkBetweenUserAndOccupation(UserInterface $user, OccupationInterface $occupation) {
	$db->delete(self::OCCUPATION_LINK_TABLE_NAME, 'user_id = ? AND occupation_id = ?', array($user->getUserId(), $occupation->getOccupationId()));
    }
    
    /**
     * Saves the link between a user and a speciality
     *
     * @param UserInterface $user
     * @param SpecialityInterface $speciality 
     */
    public function saveLinkBetweenUserAndSpeciality(UserInterface $user, SpecialityInterface $speciality) {
	$db->delete(self::SPECIALITY_LINK_TABLE_NAME, 'user_id = ? AND speciality_id = ?', array($user->getUserId(), $speciality->getSpecialityId()));
    }
}

?>

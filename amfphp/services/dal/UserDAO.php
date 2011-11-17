<?php

require_once 'dal/MySQLDatabase.php';
require_once 'dal/interfaces/UserDAOInterface.php';
require_once 'model/interfaces/UserInterface.php';
require_once 'model/User.php';

/**
 * DAO for User
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UserDAO implements UserDAOInterface {
    const TABLE_NAME = 'user';
    const OCCUPATION_LINK_TABLE_NAME = 'user_occupation';
    const PRACTICE_LINK_TABLE_NAME = 'practice_user';
    const SPECIALTY_LINK_TABLE_NAME = 'user_specialty';
    const TARGET_GROUP_LINK_TABLE_NAME = 'user_target_group';


    private static $instance;

    private function __construct() {

    }

    /**
     * Returns an instance of this UserDAO
     * Singleton pattern
     *
     * @return UserDAO $instance
     */
    public function getInstance() {
	if (is_null(self::$instance))
	    self::$instance = new self();

	return self::$instance;
    }

    /**
     * deletes a User object from the database
     *
     * @param int $userId
     * @return int  number of deleted rows
     */
    public function delete($userId) {
	// get database
	$db = MySQLDatabase::getInstance();

	//delete the user out of the occupation, practice, specialty and target group link table
        $db->delete(self::OCCUPATION_LINK_TABLE_NAME, 'user_id = ?', array($primaryKey));
        $db->delete(self::PRACTICE_LINK_TABLE_NAME, 'user_id = ?', array($primaryKey));
	$db->delete(self::SPECIALTY_LINK_TABLE_NAME, 'user_id = ?', array($primaryKey));
	$db->delete(self::TARGET_GROUP_LINK_TABLE_NAME, 'user_id = ?', array($primaryKey));

	// delete and return affected rows
	return $db->delete(self::TABLE_NAME, 'user_id = ?', array($primaryKey));
    }

    /**
     * loads a User object from the database
     *
     * @param int $userId
     * @return User
     */
    public function load($userId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// get record from database
	$record = $db->getRecord('SELECT user_id, first_name, last_name, email, password, last_login, member_since, language_id, address_id, gsm, avatar, twitter, facebook, rss
				    FROM ' . self::TABLE_NAME . ' WHERE user_id = ?', array($userId));

	// return User object
	return $this->recordToObject($record);
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

	// get record from database
	$records = $db->getRecords('SELECT user_id, first_name, last_name, email, password, last_login, member_since, language_id, address_id, gsm, avatar, twitter, facebook, rss FROM ' . self::TABLE_NAME . 'WHERE user_id IN (?)', array(implode(', ', $userIds)));

	// return User object
	return $this->recordsToObjects($records);
    }

    /**
     * Function to login a user by email and password
     *
     * @param string $email
     * @param string $password (hashed)
     * @return User (empty user when login failed)
     */
    public function login($email, $password) {
        // get database
        $db = MySQLDatabase::getInstance();

        $query = "SELECT user_id FROM " . self::TABLE_NAME . " WHERE email= ? AND password= ? ";

        // get user id from database
        $userId = (int) $db->getVar($query, array($email, $password));

	// return User object
        return $userId == 0 ? new User() : User::load($userId);
    }

    /**
     * Translates an array of a user record to an object
     *
     * @param array $record
     * @return User
     */
    private function recordToObject($record){
	// translate record to User object
	$user = new User();
	$user->setUserId($record['user_id']);
	$user->setFirstName($record['first_name']);
	$user->setLastName($record['last_name']);
	$user->setEmail($record['email']);
	$user->setPassword($record['password']);
	$user->setLastLogin($record['last_login']);
	$user->setMemberSince($record['member_since']);
	$user->setLanguageId($record['language_id']);
	$user->setAddressId($record['address_id']);
	$user->setGsm($record['gsm']);
	$user->setAvatar($record['avatar']);
	$user->setTwitter($record['twitter']);
	$user->setFacebook($record['facebook']);
	$user->setRss($record['rss']);

	// return User object
	return $user;
    }

    /**
     * Translates an array of user records to objects
     *
     * @param array $records
     * @return array<User>
     */
    private function recordsToObjects($records){
	$users = array();

	foreach ($records as $record) {
	    $users[] = $this->recordToObject($record);
	}

	return $users;
    }

    /**
     * Saves the given object to the database
     *
     * @param UserInterface $user
     * @return int $primaryKey
     */
    public function save(UserInterface $user) {
	// get database
	$db = MySQLDatabase::getInstance();

	// get the key
	$primaryKey = $user->getUserId();

	if (is_null($primaryKey)) {
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert
	    $newRecord = array();
	    $newRecord['first_name'] = $user->getFirstName();
	    $newRecord['last_name'] = $user->getLastName();
	    $newRecord['email'] = $user->getEmail();
	    $newRecord['password'] = $user->getPassword();
	    $newRecord['last_login'] = $user->getLastLogin();
	    $newRecord['member_since'] = $user->getMemberSince();
	    $newRecord['language_id'] = $user->getLanguageId();
	    $newRecord['address_id'] = $user->getAddressId();
	    $newRecord['gsm'] = $user->getGsm();
	    $newRecord['avatar'] = $user->getAvatar();
	    $newRecord['twitter'] = $user->getTwitter();
	    $newRecord['facebook'] = $user->getFacebook();
	    $newRecord['rss'] = $user->getRss();

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
	    $record['language_id'] = $user->getLanguageId();
	    $record['address_id'] = $user->getAddressId();
	    $record['gsm'] = $user->getGsm();
	    $record['avatar'] = $user->getAvatar();
	    $record['twitter'] = $user->getTwitter();
	    $record['facebook'] = $user->getFacebook();
	    $record['rss'] = $user->getRss();

	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'user_id = ?', array($primaryKey));
	}

	// return key
	return $primaryKey;
    }

    //TODO : Voor verbetering vatbaar -> methode om nabijgelegen dorpen te vinden moet beter. Hoeveel users weergeven? ->instellen
    /**
     * Function to search users nearby a city
     * After a city is selected with the other function all users from that city
     * and the citys nearby will be given until there are enough users to show
     *
     * @param string $city
     * @return array<users>
     */
    public function SearchUserNearbyCity($city) {
        $users = array();
        $db = MySQLDatabase::getInstance();

        $query = "SELECT distinct(u.user_id) AS 'user_id' ";
        $query.="FROM practice_user_specialty pus ";
        $query.="LEFT JOIN  user u ON pus.user_id = u.user_id ";
        $query.="LEFT JOIN practice p ON p.practice_id = pus.practice_id ";
	$query.="LEFT JOIN address a ON p.address_id = a.address_id ";
        $query.="LEFT JOIN city c ON c.id = a.city_id ";
        $query.="WHERE c.alpha = ? ";

        $records = $db->getRecords($query, array($city));
        $userIds = array();

        if ($records != null) {
            foreach ($records as $record) {
                array_push($userIds, $record['user_id']);
            }
        }

        //If we find less then 10 users we will look in the nearby cities
        if (count($userIds) <= 10) {
            $query = "SELECT longitude,latitude FROM city WHERE alpha = ? ";
            $record = $db->getRecord($query, array($city));
            $longitude = $record['longitude'];
            $latitude = $record['latitude'];
            $longitudeLow = $longitude - 0.2;
            $longitudeHigh = $longitude + 0.2;
            $latitudeLow = $latitude - 0.2;
            $latitudeHigh = $latitude + 0.2;

            $extraCities = array();
            $query = "SELECT alpha FROM city WHERE longitude BETWEEN $longitudeLow AND $longitudeHigh AND latitude BETWEEN $latitudeLow AND $latitudeHigh  ";

            $records = $db->getRecords($query);
            if ($records != null) {
                foreach ($records as $record) {
                    array_push($extraCities, $record['alpha']);
                }
            }

            $query = "SELECT distinct(u.user_id) AS 'user_id' ";
            $query.="FROM practice_user_specialty pus ";
            $query.="LEFT JOIN  user u ON pus.user_id = u.user_id ";
            $query.="LEFT JOIN practice p ON p.practice_id = pus.practice_id ";
	    $query.="LEFT JOIN address a ON p.address_id = a.address_id ";
	    $query.="LEFT JOIN city c ON c.id = a.city_id ";
            $query.="WHERE c.alpha IN (?)";

            $records = $db->getRecords($query, array(implode(', ', $extraCities)));

            if ($records != null) {
                foreach ($records as $record) {
                    array_push($userIds, $record['user_id']);
                }
            }
        }

        $userIds = $this->removeDuplicatesFromArray($userIds);

        return $this->loadMultiple($userIds);
    }

    /**
     * removes duplicate values from an array
     *
     * @param array $arr
     * @return array
     */
    private function removeDuplicatesFromArray($arr) {
        if (!is_array($arr)) {
            return false;
            ;
        }

        $arr2 = array();
        foreach ($arr as $key => $value) {
            if (!in_array($value, $arr2)) {
		$arr2[$key] = $value;
            }
        }
        return $arr2;
    }

}

?>

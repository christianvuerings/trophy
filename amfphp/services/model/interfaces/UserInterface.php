<?php

/**
 * Interface for User
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface UserInterface {

    /**
     * Creates a new User object
     *
     * @param string   $firstName
     * @param string   $lastName
     * @param string   $email
     * @param string   $password
     * @param int   $lastLogin
     * @param int   $memberSince
     * @param string   $languageId
     * @param int   $addressId
     * @param string   $gsm
     * @param string   $avatar
     * @param string   $twitter
     * @param string   $facebook
     * @param string   $rss
          * @return User $instance
     */
    public static function createNew($firstName, $lastName, $email, $password, $memberSince, $languageId, $addressId, $lastLogin = NULL, $gsm = NULL, $avatar = NULL, $twitter = NULL, $facebook = NULL, $rss = NULL);

    /**
     * deletes an object from permanent storage
     *
     * @param int $userId
     * @return void
     */
    public static function delete($userId);

     /**
     * Saves this object to permanent storage
     *
     * @return int $userId
     */
    public function save();

    /**
     * loads an object from permanent storage
     *
     * @param int $userId
     * @return User
     */
    public static function load($userId);


    /* Getters and setters */
    public function getUserId();

    public function getFirstName();

    public function getLastName();

    public function getEmail();

    public function getPassword();

    public function getLastLogin();

    public function getMemberSince();

    public function getLanguageId();

    public function getAddressId();

    public function getGsm();

    public function getAvatar();

    public function getTwitter();

    public function getFacebook();

    public function getRss();

    public function setUserId($userId);

    public function setFirstName($firstName);

    public function setLastName($lastName);

    public function setEmail($email);

    public function setPassword($password);

    public function setLastLogin($lastLogin);

    public function setMemberSince($memberSince);

    public function setLanguageId($languageId);

    public function setAddressId($addressId);

    public function setGsm($gsm);

    public function setAvatar($avatar);

    public function setTwitter($twitter);

    public function setFacebook($facebook);

    public function setRss($rss);

}
?>

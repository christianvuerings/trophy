<?php

require_once('dal/UserDAO.php');
require_once('model/User.php');

class RegisterController {

    /**
     * Registering a new user
     *
     * @param array $userRecord
     * @return bool $message
     */
    public static function RegisterUser($userRecord) {
        //todo: add address
	$user = User::createNew($userRecord['firstName'], $userRecord['lastName'], $userRecord['email'], $userRecord['password'], time(), $userRecord['languageId'], 1);

	$registerSucceeded = true;
	try {
	    // save the user to permanent storage
	    $id = $user->save();
	} catch (Exception $ex) {
	    // registration didn't work, email may be already in database
	    $registerSucceeded = false;
	}

        return $registerSucceeded;
    }

}

?>
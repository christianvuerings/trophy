<?php

require_once '../model/interfaces/UserInterface.php';

/**
 * The controller to login a user
 */
class SearchController {
    

    /**
     * Login a user by email and password
     * @param string $email
     * @param string $password
     * @return User $user 
     */
    public function LoginUser($email,$password ){
	$password = md5($password);
	
	// TODO: add user functionality
	return $user;
    }
}

?>

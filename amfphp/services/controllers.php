<?php
require_once('controllers/LoginController.php');
require_once('controllers/RegisterController.php');


class controllers {

    /**
     * Logging in a user by email 
     *
     * @param string $email
     * @param string $password
     * @return User user
     */
    public static function LoginUser($email, $password) {
        return LoginController::LoginUser($email, $password);
    }

     /**
     * Registering a user 
     *
     * @param User $user 
     * @return bool $message
     */
    public static function RegisterUser($user) {
        return RegisterController::RegisterUser($user);
    }
    
}

?>
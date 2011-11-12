<?php

require_once('controllers/LoginController.php');
require_once('controllers/RegisterController.php');
require_once('controllers/SearchController.php');

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

    /**
     * Autocomplete a city name
     * @param string $searchTerm
     * @return array<user>  
     */
    public static function SearchCityAutoComplete($searchTerm) {
        return SearchController::SearchCityAutoComplete($searchTerm);
    }

    //TODO : next i'll add a controller to get all the cities nearby the city entered until there are x users to show
    // i'll return this in an array of user object, i know how i want to do this but i dont have time now to finish it
}

?>
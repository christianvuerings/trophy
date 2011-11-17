<?php

require_once 'model/interfaces/CountryInterface.php';

/**
 * interface  for CountryDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface CountryDAOInterface {
    /**
     * Returns an instance of this CountryDAO
     * Singleton pattern
     *
     * @return CountryDAO $instance
     */
    public function getInstance();

    /**
     * deletes a Country object from the database
     *
     * @param string $countryId
     * @return int  number of deleted rows
     */
    public function delete($countryId);

    /**
     * loads a Country object from the database
     *
     * @param string $countryId
     * @return Country
     */
    public function load($countryId);

    /**
     * Saves the given object to the database
     *
     * @param CountryInterface $country
     * @return string $primaryKey
     */
    public function save(CountryInterface $country);
}
?>

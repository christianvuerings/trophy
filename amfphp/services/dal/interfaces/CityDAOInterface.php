<?php

require_once 'model/interfaces/CityInterface.php';

/**
 * interface  for CityDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface CityDAOInterface {
    /**
     * Returns an instance of this CityDAO
     * Singleton pattern
     *
     * @return CityDAO $instance
     */
    public function getInstance();

    /**
     * deletes a City object from the database
     *
     * @param int $id
     * @return int  number of deleted rows
     */
    public function delete($id);

    /**
     * loads a City object from the database
     *
     * @param int $id
     * @return City
     */
    public function load($id);

    /**
     * Saves the given object to the database
     *
     * @param CityInterface $city
     * @return int $primaryKey
     */
    public function save(CityInterface $city);
}
?>

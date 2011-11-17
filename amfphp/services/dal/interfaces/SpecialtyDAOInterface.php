<?php

require_once 'model/interfaces/SpecialtyInterface.php';

/**
 * interface  for SpecialtyDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface SpecialtyDAOInterface {
    /**
     * Returns an instance of this SpecialtyDAO
     * Singleton pattern
     *
     * @return SpecialtyDAO $instance
     */
    public function getInstance();

    /**
     * deletes a Specialty object from the database
     *
     * @param int $specialtyId
     * @return int  number of deleted rows
     */
    public function delete($specialtyId);

    /**
     * loads a Specialty object from the database
     *
     * @param int $specialtyId
     * @return Specialty
     */
    public function load($specialtyId);

    /**
     * Saves the given object to the database
     *
     * @param SpecialtyInterface $specialty
     * @return int $primaryKey
     */
    public function save(SpecialtyInterface $specialty);
}
?>

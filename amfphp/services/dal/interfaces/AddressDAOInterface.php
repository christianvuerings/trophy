<?php

require_once 'model/interfaces/AddressInterface.php';

/**
 * interface  for AddressDAO
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
interface AddressDAOInterface {
    /**
     * Returns an instance of this AddressDAO
     * Singleton pattern
     *
     * @return AddressDAO $instance
     */
    public function getInstance();

    /**
     * deletes a Address object from the database
     *
     * @param int $addressId
     * @return int  number of deleted rows
     */
    public function delete($addressId);

    /**
     * loads a Address object from the database
     *
     * @param int $addressId
     * @return Address
     */
    public function load($addressId);

    /**
     * Saves the given object to the database
     *
     * @param AddressInterface $address
     * @return int $primaryKey
     */
    public function save(AddressInterface $address);
}
?>

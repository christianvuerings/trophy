<?php

require_once '../model/interfaces/{$className}Interface.php';

/**
 * interface  for {$className}DAO
 *
 * @author {$authorName} <{$authorEmail}>
 */
interface {$className}DAOInterface {   
    /**
     * Returns an instance of this {$className}DAO
     * Singleton pattern
     * 
     * @return {$className}DAO $instance
     */
    public function getInstance();
    
    /**
     * deletes a {$className} object from the database
     * 
     * @param ${$fields.primaryKey.type.php} ${$fields.primaryKey.fieldName}
     * @return int  number of deleted rows
     */
    public function delete(${$fields.primaryKey.fieldName});
    
    /**
     * loads a {$className} object from the database
     * 
     * @param ${$fields.primaryKey.type.php} ${$fields.primaryKey.fieldName}
     * @return {$className}
     */
    public function load(${$fields.primaryKey.fieldName});
    
    /**
     * Saves the given object to the database
     * 
     * @param {$className}Interface ${$className|lower}
     * @return {$fields.primaryKey.type.php} $primaryKey
     */
    public function save({$className}Interface ${$className|lower});
}
?>

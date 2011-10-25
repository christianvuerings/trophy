<?php

/**
 * Interface for {$className}
 *
 * @author {$authorName} <{$authorEmail}>
 */
interface {$className}Interface {
     /**
     * Saves this object to permanent storage
     * 
     * @return int ${$fields.primaryKey.fieldName}
     */
    public function save();
    
    /**
     * loads an object from permanent storage
     * 
     * @param int ${$fields.primaryKey.fieldName}
     * @return {$className}
     */
    public static function load(${$fields.primaryKey.fieldName});


    /* Getters and setters */
{foreach $fields as $field}
    public function get{$field.fieldName|capitalize}();
    
{/foreach}
{foreach $fields as $field}
    public function set{$field.fieldName|capitalize}(${$field.fieldName});
    
{/foreach}
}
?>

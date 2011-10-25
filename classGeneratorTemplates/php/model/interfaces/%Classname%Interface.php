<?php

/**
 * Interface for {$className}
 *
 * @author {$authorName} <{$authorEmail}>
 */
interface {$className}Interface {
    
    /**
     * Creates a new {$className} object
     * 
     * {foreach $fields as $field}
     * @param ${$field.type.php}   ${$field.fieldName}
     * {/foreach}
     * @return {$className} $instance
     */
    {* Place field that can be null at the end of the parameterlist *}
    public static function createNew({foreach $fields as $field}{if !$field.isNull}${$field.fieldName}{if $field@last}{else}, {/if}{/if}{/foreach}{foreach $fields as $field}{if $field.isNull}, ${$field.fieldName} = NULL{/if}{/foreach});
    
    /**
     * deletes an object from permanent storage
     * 
     * @param int ${$fields.primaryKey.fieldName}
     * @return void
     */
    public static function delete(${$fields.primaryKey.fieldName});
    
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

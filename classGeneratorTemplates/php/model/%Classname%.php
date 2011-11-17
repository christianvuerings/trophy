<?php

require_once 'dal/{$className}DAO.php';
require_once 'model/interfaces/{$className}Interface.php';

/**
 * Model {$className}
 *
 * @author {$authorName} <{$authorEmail}>
 */
class {$className} implements {$className}Interface {
    {foreach $fields as $field}
public ${$field.fieldName};
    {/foreach}

    //mapping with flex
    public $_explicitType = "classestrophy.{$className}";

    public function __construct() {
    }

    /**
     * Creates a new {$className} object
     *
{foreach $fields as $field}
     * @param {$field.type.php}   ${$field.fieldName}
{/foreach}
     * @return {$className} $instance
     */
    {* Place field that can be null at the end of the parameterlist *}
    public static function createNew({foreach $fields as $field}{if !$field.isNull}${$field.fieldName}{if $field@last}{else}, {/if}{/if}{/foreach}{foreach $fields as $field}{if $field.isNull}, ${$field.fieldName} = NULL{/if}{/foreach}) {
	    $instance = new self();

	{foreach $fields as $field}
	$instance->{$field.fieldName} = ${$field.fieldName};
	{/foreach}

	    return $instance;
    }

    /**
     * deletes an object from permanent storage
     *
     * @param {$fields.primaryKey.type.php} ${$fields.primaryKey.fieldName}
     * @return void
     */
    public static function delete(${$fields.primaryKey.fieldName}) {
	    // get data access object
	    $dao = {$className}DAO::getInstance();

	    $dao->delete(${$fields.primaryKey.fieldName});
    }

    /**
     * Saves this object to permanent storage
     *
     * @return {$fields.primaryKey.type.php} $id
     */
    public function save() {
	    // get data access object
	    $dao = {$className}DAO::getInstance();

	    // saves this object tot storage
	    ${$fields.primaryKey.fieldName} = $dao->save($this);

	    // update {$fields.primaryKey.fieldName}
	    $this->{$fields.primaryKey.fieldName} = ${$fields.primaryKey.fieldName};

	    // returns id
	    return ${$fields.primaryKey.fieldName};
    }

    /**
     * loads an object from permanent storage
     *
     * @param {$fields.primaryKey.type.php} ${$fields.primaryKey.fieldName}
     * @return {$className}
     */
    public static function load(${$fields.primaryKey.fieldName}) {
	    // get data access object
	    $dao = {$className}DAO::getInstance();

	    return $dao->load(${$fields.primaryKey.fieldName});
    }


    /* Getters and setters */
{foreach $fields as $field}
    /**
     * Returns {$field.fieldName}
     *
     * @return {$field.type.php}
     */
    public function get{$field.fieldName|capitalize}() {
	    return $this->{$field.fieldName};
    }

{/foreach}
{foreach $fields as $field}
    /**
     * Sets {$field.fieldName}
     *
     * @param {$field.type.php}
     */
    public function set{$field.fieldName|capitalize}(${$field.fieldName}) {
	    $this->{$field.fieldName} = ${$field.fieldName};
    }

{/foreach}
}
?>

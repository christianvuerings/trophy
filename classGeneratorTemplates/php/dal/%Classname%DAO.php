<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/{$className}DAOInterface.php';
require_once '../model/interfaces/{$className}Interface.php';
require_once '../model/{$className}.php';

/**
 * DAO for {$className}
 *
 * @author {$authorName} <{$authorEmail}>
 */
class {$className}DAO implements {$className}DAOInterface {
    const TABLE_NAME = '{$tableName}';
    
    private $instance;
    
    private function __construct(){ }
    
    /**
     * Returns an instance of this {$className}DAO
     * Singleton pattern
     * 
     * @return {$className}DAO $instance
     */
    public function getInstance() {
	if(is_null($this->instance)) $this->instance = new self();
	
	return $this->instance;
    }

    
    /**
     * loads a {$className} object from the database
     * 
     * @param ${$fields.primaryKey.type.php} ${$fields.primaryKey.fieldName}
     * @return {$className}
     */
    public function load(${$fields.primaryKey.fieldName}) {
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get record from database
	$record = $db->getRecord('SELECT {foreach $fields as $field}'{$field.originalFieldName}'{if $field@last}{else}, {/if}{/foreach} FROM ' . self::TABLE_NAME . 'WHERE {$fields.primaryKey.originalFieldName} = ?', array(${$fields.primaryKey.fieldName}));
	
	// translate record to {$className} object
	${$className|lower} = new {$className}();
{foreach $fields as $field}
	${$className|lower}->set{$field.fieldName|capitalize}($record['{$field.originalFieldName}']);   
{/foreach}

	// return {$className} object
	return ${$className|lower};
    }
    
    /**
     * Saves the given object to the database
     * 
     * @param {$className}Interface ${$className|lower}
     * @return {$fields.primaryKey.type.php} $primaryKey
     */
    public function save({$className}Interface ${$className|lower}){
	// get database
	$db = MySQLDatabase::getInstance();
	
	// get the key
	$primaryKey = ${$className|lower}->get{$fields.primaryKey.fieldName|capitalize}();
	
	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert    
	    $newRecord = array();
        {foreach $fields as $field}
	    {* Add all fields except for the primary key *}
	    {if $field.fieldName neq $fields.primaryKey.fieldName}
	    $newRecord['{$field.originalFieldName}'] = ${$className|lower}->get{$field.fieldName|capitalize}();
	{/if}
	{/foreach}
	    
	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    {foreach $fields as $field}
	    $record['{$field.originalFieldName}'] = ${$className|lower}->get{$field.fieldName|capitalize}();
	{/foreach}
	
	    // update the record
	    $db->update(self::TABLE_NAME, $record, '{$fields.primaryKey.originalFieldName} = ?', array($primaryKey));
	}
	
	// return key
	return $primaryKey;
    }
}
?>

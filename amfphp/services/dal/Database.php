
<!-- saved from url=(0116)https://raw.github.com/trophiesteam/trophy/874619d2d1ff66069d6be872f92ef4a4bc8dc7cc/amfphp/services/dal/Database.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/document_iterator.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/find_proxy.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/get_html_text.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/global_constants.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/name_injection_builder.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/number_injection_builder.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/string_finder.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/change_sink.js"></script><meta name="document_iterator.js"><meta name="find_proxy.js"><meta name="get_html_text.js"><meta name="global_constants.js"><meta name="name_injection_builder.js"><meta name="number_injection_builder.js"><meta name="string_finder.js"><meta name="change_sink.js"></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">&lt;?php

/**
 * This class provides most of the base methods implemented by almost
 * every database system
 *
 * @author		Tijs Verkoyen &lt;tijs@spoon-library.com&gt;
 * @author		Davy Hellemans &lt;davy@spoon-library.com&gt;
 */
interface Database {

    /**
     * Query to delete records, which returns the number of affected rows.
     *
     * @return	int								The number of affected rows.
     * @param	string $table					The table to perform the delete-statement on.
     * @param	string[optional] $where			The WHERE-clause.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function delete($table, $where = null, $parameters = array());

    /**
     * Drops one or more tables.
     *
     * @param	mixed $tables		The table(s) to drop.
     */
    public function drop($tables) ;

    /**
     * Executes a query.
     *
     * @param	string $query					The query to execute, only use with queries that don't return a result.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function execute($query, $parameters = array());

    /**
     * Retrieve a single column.
     *
     * @return	array							An array with the values from a single column
     * @param	string $query					The query, specify maximum one field in the SELECT-statement.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function getColumn($query, $parameters = array());

    /**
     * Retrieve the debug setting
     *
     * @return	bool	true if debug is enabled, false if not.
     */
    public function getDebug();

    /**
     * Fetch the name of the database driver
     *
     * @return	string	The name of the driver that is used.
     */
    public function getDriver();

    /**
     * Retrieves the possible ENUM values
     *
     * @return	array			An array with all the possible ENUM values.
     * @param	string $table	The table that contains the ENUM field.
     * @param	string $field	The name of the field.
     */
    public function getEnumValues($table, $field);

    /**
     * Retrieve the raw database instance (PDO object)
     *
     * @return	PDO	The PDO-instance.
     */
    public function getHandler();

    /**
     * Retrieve the number of rows in a result set
     *
     * @return	int								The number of rows in the result-set.
     * @param	string $query					Teh query to perform.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function getNumRows($query, $parameters = array());

    /**
     * Retrieve the results of 2 columns as an array key-value pair
     *
     * @return	array							An array with the first column as key, the second column as the values.
     * @param	string $query					The query to perform.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function getPairs($query, $parameters = array());

    /**
     * Fetch the executed queries
     *
     * @return	array	An array with all the executed queries, will only be filled in debug-mode.
     */
    public function getQueries();

    /**
     * Retrieve a single record
     *
     * @return	mixed							An array containing one record. Keys are the column-names.
     * @param	string $query					The query to perform. If multiple rows are selected only the first row will be returned.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function getRecord($query, $parameters = array());

    /**
     * Retrieves an associative array or returns null if there were no results
     *
     * @return	mixed							An array containing arrays which represent a record.
     * @param	string $query					The query to perform.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     * @param	string[optional] $key			The field that should be used as key, make sure this is unique for each row.
     */
    public function getRecords($query, $parameters = array(), $key = null);

    /**
     * Retrieve the tables in the current database
     *
     * @return	array	An array containg a list of all available tables.
     */
    public function getTables();

    /**
     * Fetch a single var
     *
     * @return	string							The value as a string
     * @param	string $query					The query to perform.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function getVar($query, $parameters = array());

    /**
     * Inserts one or more records
     *
     * @return	int				The last inserted ID.
     * @param	string $table	The table wherein the record will be inserted.
     * @param	array $values	The values for the record to insert, keys of this array should match the column names.
     */
    public function insert($table, array $values);

    /**
     * Optimize one or more tables
     *
     * @param	mixed $tables	An array containing the name(s) of the tables to optimize.
     */
    public function optimize($tables);

    /**
     * Retrieves an associative array or returns null if there were no results
     * This is an alias for getRecords
     *
     * @return	mixed							An array containing arrays which represent a record.
     * @param	string $query					The query to perform.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     * @param	string[optional] $key			The field that should be used as key, make sure this is unique for each row.
     */
    public function retrieve($query, $parameters = array(), $key = null);

    /**
     * Set the debug status
     *
     * @param	bool[optional] $on	Should debug-mode be activated. Be carefull, this will use a lot of resources (Memory and CPU).
     */
    public function setDebug($on = true);

    /**
     * Truncate on or more tables
     *
     * @param	mixed $tables	A string or array containing the list of tables to truncate.
     */
    public function truncate($tables);

    /**
     * Builds a query for updating records
     *
     * @return	int								The number of affected rows.
     * @param	string $table					The table to run the UPDATE-statement on.
     * @param	array $values					The values to update, use the key(s) as columnnames.
     * @param	string[optional] $where			The WHERE-clause.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function update($table, array $values, $where = null, $parameters = array());
}

?&gt;</pre><div id="csscan-wrapper" style="display: none; "><h2 id="csscan-header">element</h2><table id="csscan-table"><tbody><tr><th colspan="2" id="csscan-header-font" class="csscan-header">Font</th></tr><tr id="csscan-row-font-family"><td id="csscan-property-font-family" class="csscan-property">font-family</td><td id="csscan-value-font-family" class="csscan-value"></td></tr><tr id="csscan-row-font-size"><td id="csscan-property-font-size" class="csscan-property">font-size</td><td id="csscan-value-font-size" class="csscan-value"></td></tr><tr id="csscan-row-font-style"><td id="csscan-property-font-style" class="csscan-property">font-style</td><td id="csscan-value-font-style" class="csscan-value"></td></tr><tr id="csscan-row-font-variant"><td id="csscan-property-font-variant" class="csscan-property">font-variant</td><td id="csscan-value-font-variant" class="csscan-value"></td></tr><tr id="csscan-row-font-weight"><td id="csscan-property-font-weight" class="csscan-property">font-weight</td><td id="csscan-value-font-weight" class="csscan-value"></td></tr><tr id="csscan-row-letter-spacing"><td id="csscan-property-letter-spacing" class="csscan-property">letter-spacing</td><td id="csscan-value-letter-spacing" class="csscan-value"></td></tr><tr id="csscan-row-line-height"><td id="csscan-property-line-height" class="csscan-property">line-height</td><td id="csscan-value-line-height" class="csscan-value"></td></tr><tr id="csscan-row-text-decoration"><td id="csscan-property-text-decoration" class="csscan-property">text-decoration</td><td id="csscan-value-text-decoration" class="csscan-value"></td></tr><tr id="csscan-row-text-align"><td id="csscan-property-text-align" class="csscan-property">text-align</td><td id="csscan-value-text-align" class="csscan-value"></td></tr><tr id="csscan-row-text-indent"><td id="csscan-property-text-indent" class="csscan-property">text-indent</td><td id="csscan-value-text-indent" class="csscan-value"></td></tr><tr id="csscan-row-text-transform"><td id="csscan-property-text-transform" class="csscan-property">text-transform</td><td id="csscan-value-text-transform" class="csscan-value"></td></tr><tr id="csscan-row-white-space"><td id="csscan-property-white-space" class="csscan-property">white-space</td><td id="csscan-value-white-space" class="csscan-value"></td></tr><tr id="csscan-row-word-spacing"><td id="csscan-property-word-spacing" class="csscan-property">word-spacing</td><td id="csscan-value-word-spacing" class="csscan-value"></td></tr><tr id="csscan-row-color"><td id="csscan-property-color" class="csscan-property">color</td><td id="csscan-value-color" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-background" class="csscan-header">Background</th></tr><tr id="csscan-row-background-attachment"><td id="csscan-property-background-attachment" class="csscan-property">bg-attachment</td><td id="csscan-value-background-attachment" class="csscan-value"></td></tr><tr id="csscan-row-background-color"><td id="csscan-property-background-color" class="csscan-property">bg-color</td><td id="csscan-value-background-color" class="csscan-value"></td></tr><tr id="csscan-row-background-image"><td id="csscan-property-background-image" class="csscan-property">bg-image</td><td id="csscan-value-background-image" class="csscan-value"></td></tr><tr id="csscan-row-background-position"><td id="csscan-property-background-position" class="csscan-property">bg-position</td><td id="csscan-value-background-position" class="csscan-value"></td></tr><tr id="csscan-row-background-repeat"><td id="csscan-property-background-repeat" class="csscan-property">bg-repeat</td><td id="csscan-value-background-repeat" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-size" class="csscan-header">Box</th></tr><tr id="csscan-row-width"><td id="csscan-property-width" class="csscan-property">width</td><td id="csscan-value-width" class="csscan-value"></td></tr><tr id="csscan-row-height"><td id="csscan-property-height" class="csscan-property">height</td><td id="csscan-value-height" class="csscan-value"></td></tr><tr id="csscan-row-border-top"><td id="csscan-property-border-top" class="csscan-property">border-top</td><td id="csscan-value-border-top" class="csscan-value"></td></tr><tr id="csscan-row-border-right"><td id="csscan-property-border-right" class="csscan-property">border-right</td><td id="csscan-value-border-right" class="csscan-value"></td></tr><tr id="csscan-row-border-bottom"><td id="csscan-property-border-bottom" class="csscan-property">border-bottom</td><td id="csscan-value-border-bottom" class="csscan-value"></td></tr><tr id="csscan-row-border-left"><td id="csscan-property-border-left" class="csscan-property">border-left</td><td id="csscan-value-border-left" class="csscan-value"></td></tr><tr id="csscan-row-margin"><td id="csscan-property-margin" class="csscan-property">margin</td><td id="csscan-value-margin" class="csscan-value"></td></tr><tr id="csscan-row-padding"><td id="csscan-property-padding" class="csscan-property">padding</td><td id="csscan-value-padding" class="csscan-value"></td></tr><tr id="csscan-row-max-height"><td id="csscan-property-max-height" class="csscan-property">max-height</td><td id="csscan-value-max-height" class="csscan-value"></td></tr><tr id="csscan-row-min-height"><td id="csscan-property-min-height" class="csscan-property">min-height</td><td id="csscan-value-min-height" class="csscan-value"></td></tr><tr id="csscan-row-max-width"><td id="csscan-property-max-width" class="csscan-property">max-width</td><td id="csscan-value-max-width" class="csscan-value"></td></tr><tr id="csscan-row-min-width"><td id="csscan-property-min-width" class="csscan-property">min-width</td><td id="csscan-value-min-width" class="csscan-value"></td></tr><tr id="csscan-row-outline-color"><td id="csscan-property-outline-color" class="csscan-property">outline-color</td><td id="csscan-value-outline-color" class="csscan-value"></td></tr><tr id="csscan-row-outline-style"><td id="csscan-property-outline-style" class="csscan-property">outline-style</td><td id="csscan-value-outline-style" class="csscan-value"></td></tr><tr id="csscan-row-outline-width"><td id="csscan-property-outline-width" class="csscan-property">outline-width</td><td id="csscan-value-outline-width" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-position" class="csscan-header">Positioning</th></tr><tr id="csscan-row-position"><td id="csscan-property-position" class="csscan-property">position</td><td id="csscan-value-position" class="csscan-value"></td></tr><tr id="csscan-row-top"><td id="csscan-property-top" class="csscan-property">top</td><td id="csscan-value-top" class="csscan-value"></td></tr><tr id="csscan-row-bottom"><td id="csscan-property-bottom" class="csscan-property">bottom</td><td id="csscan-value-bottom" class="csscan-value"></td></tr><tr id="csscan-row-right"><td id="csscan-property-right" class="csscan-property">right</td><td id="csscan-value-right" class="csscan-value"></td></tr><tr id="csscan-row-left"><td id="csscan-property-left" class="csscan-property">left</td><td id="csscan-value-left" class="csscan-value"></td></tr><tr id="csscan-row-float"><td id="csscan-property-float" class="csscan-property">float</td><td id="csscan-value-float" class="csscan-value"></td></tr><tr id="csscan-row-display"><td id="csscan-property-display" class="csscan-property">display</td><td id="csscan-value-display" class="csscan-value"></td></tr><tr id="csscan-row-clear"><td id="csscan-property-clear" class="csscan-property">clear</td><td id="csscan-value-clear" class="csscan-value"></td></tr><tr id="csscan-row-z-index"><td id="csscan-property-z-index" class="csscan-property">z-index</td><td id="csscan-value-z-index" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-list" class="csscan-header">List</th></tr><tr id="csscan-row-list-style-image"><td id="csscan-property-list-style-image" class="csscan-property">list-style-image</td><td id="csscan-value-list-style-image" class="csscan-value"></td></tr><tr id="csscan-row-list-style-type"><td id="csscan-property-list-style-type" class="csscan-property">list-style-type</td><td id="csscan-value-list-style-type" class="csscan-value"></td></tr><tr id="csscan-row-list-style-position"><td id="csscan-property-list-style-position" class="csscan-property">list-style-position</td><td id="csscan-value-list-style-position" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-table" class="csscan-header">Table</th></tr><tr id="csscan-row-vertical-align"><td id="csscan-property-vertical-align" class="csscan-property">vertical-align</td><td id="csscan-value-vertical-align" class="csscan-value"></td></tr><tr id="csscan-row-border-collapse"><td id="csscan-property-border-collapse" class="csscan-property">border-collapse</td><td id="csscan-value-border-collapse" class="csscan-value"></td></tr><tr id="csscan-row-border-spacing"><td id="csscan-property-border-spacing" class="csscan-property">border-spacing</td><td id="csscan-value-border-spacing" class="csscan-value"></td></tr><tr id="csscan-row-caption-side"><td id="csscan-property-caption-side" class="csscan-property">caption-side</td><td id="csscan-value-caption-side" class="csscan-value"></td></tr><tr id="csscan-row-empty-cells"><td id="csscan-property-empty-cells" class="csscan-property">empty-cells</td><td id="csscan-value-empty-cells" class="csscan-value"></td></tr><tr id="csscan-row-table-layout"><td id="csscan-property-table-layout" class="csscan-property">table-layout</td><td id="csscan-value-table-layout" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-effects" class="csscan-header">Effects</th></tr><tr id="csscan-row-text-shadow"><td id="csscan-property-text-shadow" class="csscan-property">text-shadow</td><td id="csscan-value-text-shadow" class="csscan-value"></td></tr><tr id="csscan-row--webkit-box-shadow"><td id="csscan-property--webkit-box-shadow" class="csscan-property">-webkit-box-shadow</td><td id="csscan-value--webkit-box-shadow" class="csscan-value"></td></tr><tr id="csscan-row-border-radius"><td id="csscan-property-border-radius" class="csscan-property">border-radius</td><td id="csscan-value-border-radius" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-other" class="csscan-header">Other</th></tr><tr id="csscan-row-overflow"><td id="csscan-property-overflow" class="csscan-property">overflow</td><td id="csscan-value-overflow" class="csscan-value"></td></tr><tr id="csscan-row-cursor"><td id="csscan-property-cursor" class="csscan-property">cursor</td><td id="csscan-value-cursor" class="csscan-value"></td></tr><tr id="csscan-row-visibility"><td id="csscan-property-visibility" class="csscan-property">visibility</td><td id="csscan-value-visibility" class="csscan-value"></td></tr></tbody></table></div></body><span id="skype_highlighting_settings" display="none" autoextractnumbers="1"></span><object id="skype_plugin_object" location.href="https://raw.github.com/trophiesteam/trophy/874619d2d1ff66069d6be872f92ef4a4bc8dc7cc/amfphp/services/dal/Database.php" location.hostname="raw.github.com" style="position: absolute; visibility: hidden; left: -100px; top: -100px; " width="0" height="0" type="application/x-vnd.skype.click2call.chrome.5.6.0"></object></html>
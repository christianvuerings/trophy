
<!-- saved from url=(0121)https://raw.github.com/trophiesteam/trophy/874619d2d1ff66069d6be872f92ef4a4bc8dc7cc/amfphp/services/dal/MySQLDatabase.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/document_iterator.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/find_proxy.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/get_html_text.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/global_constants.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/name_injection_builder.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/number_injection_builder.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/string_finder.js"></script><script src="chrome-extension://lifbcibllhkdhoafpjfnlhfpfgnpldfl/change_sink.js"></script><meta name="document_iterator.js"><meta name="find_proxy.js"><meta name="get_html_text.js"><meta name="global_constants.js"><meta name="name_injection_builder.js"><meta name="number_injection_builder.js"><meta name="string_finder.js"><meta name="change_sink.js"></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">&lt;?php

require_once 'Database.php';

/**
 * Spoon Library
 *
 * This source file is part of the Spoon Library. More information,
 * documentation and tutorials can be found @ http://www.spoon-library.com
 *
 * @package		spoon
 * @subpackage	database
 *
 *
 * @author		Davy Hellemans &lt;davy@spoon-library.com&gt;
 * @since		1.1.0
 */

/**
 * This class provides most of the base methods implemented by almost
 * every database system
 *
 * @package		spoon
 * @subpackage	database
 *
 *
 * @author		Tijs Verkoyen &lt;tijs@spoon-library.com&gt;
 * @author		Davy Hellemans &lt;davy@spoon-library.com&gt;
 * @since		1.1.0
 */
class MySQLDatabase implements Database {

    /**
     * Database name
     *
     * @var	string
     */
    private $database;

    /**
     * Debug setting. Queries are logged when enabled
     *
     * @var	bool
     */
    private $debug = false;

    /**
     * Database driver
     *
     * @var	string
     */
    private $driver;

    /**
     * Database handler object
     *
     * @var	PDO
     */
    private $handler;

    /**
     * Database hostname
     *
     * @var	string
     */
    private $hostname;

    /**
     * Database password
     *
     * @var	string
     */
    private $password;

    /**
     * Database port
     *
     * @var int
     */
    private $port;

    /**
     * List of all executed queries and their parameters
     *
     * @var	array
     */
    private $queries = array();

    /**
     * Database username
     *
     * @var	string
     */
    private $username;
    
    /**
     * Instance of the class
     * Singleton 
     * 
     * @var MySQLDatabase
     */
    private $instance;
    
    /**
     * Creates a database connection instance.
     */
    public function __construct() {
	$this-&gt;setDriver(DATABASE_TYPE);
	$this-&gt;setHostname(DATABASE_HOSTNAME);
	$this-&gt;setUsername(DATABASE_USERNAME);
	$this-&gt;setPassword(DATABASE_PASSWORD);
	$this-&gt;setDatabase(DATABASE_DATABASE);
	$this-&gt;setPort(DATABASE_PORT);
    }

    /**
     * Returns an instance of this MySQLDatabase
     * Singleton pattern
     * 
     * @return MySQLDatabase $instance
     */
    public function getInstance() {
	if (is_null($this-&gt;instance))
	    $this-&gt;instance = new self();

	return $this-&gt;instance;
    }

    /**
     * Creates a new database connection if it was not yet made.
     */
    private function connect() {
	// not yet connected
	if (!$this-&gt;handler) {
	    try {
		// build dsn
		if ($this-&gt;port !== null)
		    $dsn = $this-&gt;driver . ':host=' . $this-&gt;hostname . ';port=' . $this-&gt;port . ';dbname=' . $this-&gt;database;
		else
		    $dsn = $this-&gt;driver . ':host=' . $this-&gt;hostname . ';dbname=' . $this-&gt;database;

		// create handler
		$this-&gt;handler = new PDO($dsn, $this-&gt;username, $this-&gt;password);
		$this-&gt;handler-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    } catch (PDOException $e) {
		throw new DatabaseException('A database connection could not be established.', 0, $this-&gt;password);
	    }
	}

	// set nasty option
	$this-&gt;handler-&gt;setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    }

    /**
     * Query to delete records, which returns the number of affected rows.
     *
     * @return	int								The number of affected rows.
     * @param	string $table					The table to perform the delete-statement on.
     * @param	string[optional] $where			The WHERE-clause.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function delete($table, $where = null, $parameters = array()) {
	// create connection
	if (!$this-&gt;handler)
	    $this-&gt;connect();

	// build query
	$query = 'DELETE FROM ' . $this-&gt;quoteName((string) $table);

	// add where class
	$query = ($where != '') ? $query . ' WHERE ' . (string) $where : $query;

	// set parameters
	$parameters = (array) $parameters;

	// create statement
	$statement = $this-&gt;handler-&gt;prepare($query);

	// validate statement
	if ($statement === false) {
	    // get error
	    $errorInfo = $this-&gt;handler-&gt;errorInfo();

	    // throw exceptions
	    throw new DatabaseException($errorInfo[2]);
	}

	// has parameters
	foreach ($parameters as $label =&gt; $value) {
	    // bind values
	    $statement-&gt;bindValue((is_int($label) ? $label + 1 : (string) $label), $value, $this-&gt;getType($value));
	}

	// execute statement
	$statement-&gt;execute();

	// has errors
	if ($statement-&gt;errorCode() != 0) {
	    $aError = $statement-&gt;errorInfo();
	    throw new DatabaseException($aError[2]);
	}

	// debug enabled
	if ($this-&gt;debug)
	    $this-&gt;queries[] = array('query' =&gt; $query, 'parameters' =&gt; $parameters);

	// number of affected rows
	return (int) $statement-&gt;rowCount();
    }

    /**
     * Drops one or more tables.
     *
     * @param	mixed $tables		The table(s) to drop.
     */
    public function drop($tables) {
	$this-&gt;execute('DROP TABLE ' . implode(', ', array_map(array($this, 'quoteName'), (array) $tables)));
    }

    /**
     * Executes a query.
     *
     * @param	string $query					The query to execute, only use with queries that don't return a result.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function execute($query, $parameters = array()) {
	// create connection
	if (!$this-&gt;handler)
	    $this-&gt;connect();

	// init vars
	$query = (string) $query;
	$parameters = (array) $parameters;

	// create statement
	$statement = $this-&gt;handler-&gt;prepare($query);

	// validate statement
	if ($statement === false) {
	    // get error
	    $errorInfo = $this-&gt;handler-&gt;errorInfo();

	    // throw exceptions
	    throw new DatabaseException($errorInfo[2]);
	}

	// has parameters
	foreach ($parameters as $label =&gt; $value) {
	    // bind values
	    $statement-&gt;bindValue((is_int($label) ? $label + 1 : (string) $label), $value, $this-&gt;getType($value));
	}

	// execute statement
	$statement-&gt;execute();

	// has errors
	if ($statement-&gt;errorCode() != 0) {
	    $aError = $statement-&gt;errorInfo();
	    throw new DatabaseException($aError[2]);
	}

	// debug enabled
	if ($this-&gt;debug)
	    $this-&gt;queries[] = array('query' =&gt; $query, 'parameters' =&gt; $parameters);
    }

    /**
     * Retrieve a single column.
     *
     * @return	array							An array with the values from a single column
     * @param	string $query					The query, specify maximum one field in the SELECT-statement.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function getColumn($query, $parameters = array()) {
	// create connection
	if (!$this-&gt;handler)
	    $this-&gt;connect();

	// init vars
	$query = (string) $query;
	$parameters = (array) $parameters;

	// create statement
	$statement = $this-&gt;handler-&gt;prepare($query);

	// validate statement
	if ($statement === false) {
	    // get error
	    $errorInfo = $this-&gt;handler-&gt;errorInfo();

	    // throw exceptions
	    throw new DatabaseException($errorInfo[2]);
	}

	// has parameters
	foreach ($parameters as $label =&gt; $value) {
	    // bind values
	    $statement-&gt;bindValue((is_int($label) ? $label + 1 : (string) $label), $value, $this-&gt;getType($value));
	}

	// execute statement
	$statement-&gt;execute();

	// has errors
	if ($statement-&gt;errorCode() != 0) {
	    $aError = $statement-&gt;errorInfo();
	    throw new DatabaseException($aError[2]);
	}

	// debug enabled
	if ($this-&gt;debug)
	    $this-&gt;queries[] = array('query' =&gt; $query, 'parameters' =&gt; $parameters);

	// retrieve column data
	return $statement-&gt;fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Retrieve the debug setting
     *
     * @return	bool	true if debug is enabled, false if not.
     */
    public function getDebug() {
	return $this-&gt;debug;
    }

    /**
     * Fetch the name of the database driver
     *
     * @return	string	The name of the driver that is used.
     */
    public function getDriver() {
	return $this-&gt;driver;
    }

    /**
     * Retrieves the possible ENUM values
     *
     * @return	array			An array with all the possible ENUM values.
     * @param	string $table	The table that contains the ENUM field.
     * @param	string $field	The name of the field.
     */
    public function getEnumValues($table, $field) {
	// redefine vars
	$table = $this-&gt;quoteName((string) $table);
	$field = (string) $field;

	// build query
	$query = 'SHOW COLUMNS FROM ' . $table . ' LIKE "' . $field . '"';

	// get information
	$row = $this-&gt;getRecord($query);

	// has no type, so NOT an enum field
	if (!isset($row['Type']))
	    throw new DatabaseException('There is no type information available about this field', 0, $this-&gt;password);

	// has a type but it's not an enum
	if (strtolower(substr($row['Type'], 0, 4) != 'enum'))
	    throw new DatabaseException('This field "' . $field . '" is not an enum field.', 0, $this-&gt;password);

	// process values
	$aSearch = array('enum', '(', ')', '\'');
	$types = str_replace($aSearch, '', $row['Type']);

	// return
	return (array) explode(',', $types);
    }

    /**
     * Retrieve the raw database instance (PDO object)
     *
     * @return	PDO	The PDO-instance.
     */
    public function getHandler() {
	return $this-&gt;handler;
    }

    /**
     * Retrieve the number of rows in a result set
     *
     * @return	int								The number of rows in the result-set.
     * @param	string $query					Teh query to perform.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function getNumRows($query, $parameters = array()) {
	// create connection
	if (!$this-&gt;handler)
	    $this-&gt;connect();

	// init vars
	$query = (string) $query;
	$parameters = (array) $parameters;

	// create statement
	$statement = $this-&gt;handler-&gt;prepare($query);

	// validate statement
	if ($statement === false) {
	    // get error
	    $errorInfo = $this-&gt;handler-&gt;errorInfo();

	    // throw exceptions
	    throw new DatabaseException($errorInfo[2]);
	}

	// has parameters
	foreach ($parameters as $label =&gt; $value) {
	    // bind values
	    $statement-&gt;bindValue((is_int($label) ? $label + 1 : (string) $label), $value, $this-&gt;getType($value));
	}

	// execute statement
	$statement-&gt;execute();

	// has errors
	if ($statement-&gt;errorCode() != 0) {
	    $aError = $statement-&gt;errorInfo();
	    throw new DatabaseException($aError[2]);
	}

	// debug enabled
	if ($this-&gt;debug)
	    $this-&gt;queries[] = array('query' =&gt; $query, 'parameters' =&gt; $parameters);

	// number of results
	return count($statement-&gt;fetchAll(PDO::FETCH_COLUMN));
    }

    /**
     * Retrieve the results of 2 columns as an array key-value pair
     *
     * @return	array							An array with the first column as key, the second column as the values.
     * @param	string $query					The query to perform.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function getPairs($query, $parameters = array()) {
	// create connection
	if (!$this-&gt;handler)
	    $this-&gt;connect();

	// init vars
	$query = (string) $query;
	$parameters = (array) $parameters;

	// init var
	$results = array();
	$keys = null;

	// fetch results
	$tmpResults = (array) self::getRecords($query, $parameters);

	// loop results
	foreach ($tmpResults as $result) {
	    // fetch keys
	    if (!isset($keys)) {
		// fetch keys
		$keys = array_keys($tmpResults[0]);

		// needs to be 2 elements
		if (count($keys) != 2)
		    throw new DatabaseException('You have to fetch 2 columns when using getPairs.');
	    }

	    // add to list
	    $results[$result[$keys[0]]] = $result[$keys[1]];
	}

	return $results;
    }

    /**
     * Fetch the executed queries
     *
     * @return	array	An array with all the executed queries, will only be filled in debug-mode.
     */
    public function getQueries() {
	return $this-&gt;queries;
    }

    /**
     * Retrieve a single record
     *
     * @return	mixed							An array containing one record. Keys are the column-names.
     * @param	string $query					The query to perform. If multiple rows are selected only the first row will be returned.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function getRecord($query, $parameters = array()) {
	// create connection
	if (!$this-&gt;handler)
	    $this-&gt;connect();

	// init vars
	$query = (string) $query;
	$parameters = (array) $parameters;

	// create statement
	$statement = $this-&gt;handler-&gt;prepare($query);

	// validate statement
	if ($statement === false) {
	    // get error
	    $errorInfo = $this-&gt;handler-&gt;errorInfo();

	    // throw exceptions
	    throw new DatabaseException($errorInfo[2]);
	}

	// has parameters
	foreach ($parameters as $label =&gt; $value) {
	    // bind values
	    $statement-&gt;bindValue((is_int($label) ? $label + 1 : (string) $label), $value, $this-&gt;getType($value));
	}

	// execute statement
	$statement-&gt;execute();

	// has errors
	if ($statement-&gt;errorCode() != 0) {
	    $aError = $statement-&gt;errorInfo();
	    throw new DatabaseException($aError[2]);
	}

	// debug enabled
	if ($this-&gt;debug)
	    $this-&gt;queries[] = array('query' =&gt; $query, 'parameters' =&gt; $parameters);

	// fetch the keys
	$aRecord = $statement-&gt;fetch(PDO::FETCH_ASSOC);

	// null when no data found
	return ($aRecord === false) ? null : $aRecord;
    }

    /**
     * Retrieves an associative array or returns null if there were no results
     *
     * @return	mixed							An array containing arrays which represent a record.
     * @param	string $query					The query to perform.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     * @param	string[optional] $key			The field that should be used as key, make sure this is unique for each row.
     */
    public function getRecords($query, $parameters = array(), $key = null) {
	// create connection
	if (!$this-&gt;handler)
	    $this-&gt;connect();

	// init vars
	$query = (string) $query;
	$parameters = (array) $parameters;

	// create statement
	$statement = $this-&gt;handler-&gt;prepare($query);

	// validate statement
	if ($statement === false) {
	    // get error
	    $errorInfo = $this-&gt;handler-&gt;errorInfo();

	    // throw exceptions
	    throw new DatabaseException($errorInfo[2]);
	}

	// has parameters
	foreach ($parameters as $label =&gt; $value) {
	    // bind values
	    $statement-&gt;bindValue((is_int($label) ? $label + 1 : (string) $label), $value, $this-&gt;getType($value));
	}

	// execute statement
	$statement-&gt;execute();

	// has errors
	if ($statement-&gt;errorCode() != 0) {
	    $aError = $statement-&gt;errorInfo();
	    throw new DatabaseException($aError[2]);
	}

	// debug enabled
	if ($this-&gt;debug)
	    $this-&gt;queries[] = array('query' =&gt; $query, 'parameters' =&gt; $parameters);

	// fetch the keys
	$aRecords = (array) $statement-&gt;fetchAll(PDO::FETCH_ASSOC);

	// specific key
	if ($key !== null) {
	    // loop records
	    foreach ($aRecords as $aRecord) {
		// key exists
		if (isset($aRecord[(string) $key]))
		    $aData[$aRecord[(string) $key]] = $aRecord;
	    }

	    // data or no data
	    return (isset($aData)) ? $aData : null;
	}

	// has results
	return (count($aRecords) != 0) ? $aRecords : null;
    }

    /**
     * Retrieve the tables in the current database
     *
     * @return	array	An array containg a list of all available tables.
     */
    public function getTables() {
	return (array) $this-&gt;getColumn('SHOW TABLES');
    }

    /**
     * Retrieve the type for this value
     *
     * @return	int
     * @param	mixed $value		The value to retrieve the type for.
     */
    private function getType($value) {
	if ($value === null)
	    return PDO::PARAM_NULL;
	elseif (is_int($value) || is_float($value))
	    return PDO::PARAM_INT;
	return PDO::PARAM_STR;
    }

    /**
     * Fetch a single var
     *
     * @return	string							The value as a string
     * @param	string $query					The query to perform.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function getVar($query, $parameters = array()) {
	// create connection
	if (!$this-&gt;handler)
	    $this-&gt;connect();

	// init vars
	$query = (string) $query;
	$parameters = (array) $parameters;

	// create statement
	$statement = $this-&gt;handler-&gt;prepare($query);

	// validate statement
	if ($statement === false) {
	    // get error
	    $errorInfo = $this-&gt;handler-&gt;errorInfo();

	    // throw exceptions
	    throw new DatabaseException($errorInfo[2]);
	}

	// has parameters
	foreach ($parameters as $label =&gt; $value) {
	    // bind values
	    $statement-&gt;bindValue((is_int($label) ? $label + 1 : (string) $label), $value, $this-&gt;getType($value));
	}

	// execute statement
	$statement-&gt;execute();

	// has errors
	if ($statement-&gt;errorCode() != 0) {
	    $aError = $statement-&gt;errorInfo();
	    throw new DatabaseException($aError[2]);
	}

	// debug enabled
	if ($this-&gt;debug)
	    $this-&gt;queries[] = array('query' =&gt; $query, 'parameters' =&gt; $parameters);

	// fetch the var
	return $statement-&gt;fetchColumn();
    }

    /**
     * Inserts one or more records
     *
     * @return	int				The last inserted ID.
     * @param	string $table	The table wherein the record will be inserted.
     * @param	array $values	The values for the record to insert, keys of this array should match the column names.
     */
    public function insert($table, array $values) {
	// create connection
	if (!$this-&gt;handler)
	    $this-&gt;connect();

	// array has values
	if (count($values) == 0)
	    throw new DatabaseException('You need to provide values for an insert query.', 0, $this-&gt;password);

	// init vars
	$query = 'INSERT INTO ' . $this-&gt;quoteName((string) $table) . ' (';
	$keys = array_keys($values);
	$actualValues = array_values($values);
	$parameters = array();

	// multidimensional array
	if (is_array($actualValues[0])) {
	    // num values/keys
	    $numRecords = count($values);
	    $numFields = count($actualValues[0]);

	    // fetch keys
	    $subKeys = array_keys($actualValues[0]);

	    // prefix with table name
	    array_walk($subKeys, create_function('&amp;$key', '$key = "' . $this-&gt;quoteName($table) . '.$key";'));

	    // build query
	    $query .= implode(', ', $subKeys) . ') VALUES ';

	    // init counter
	    $i = 1;

	    // loop rows
	    foreach ($values as $aRow) {
		// number of keys is not consistent
		if (count($aRow) != $numFields)
		    throw new DatabaseException('Each record of this array should contain the same number of keys.', 0, $this-&gt;password);

		// build query
		$query .= '(';

		// loop keys
		for ($t = 0; $t &lt; $numFields; $t++) {
		    // add parameter marker
		    $query .= '?, ';
		}

		// remove trailing comma
		if ($numFields)
		    $query = substr($query, 0, -2);

		// add closing brackets
		if ($i != $numRecords)
		    $query .= '), ';

		// merge parameters
		$parameters = array_merge($parameters, array_values($aRow));

		// update counter
		$i++;
	    }

	    // finish query
	    $query .= ')';
	}

	// single array
	else {
	    // number of fields
	    $numFields = count($actualValues);

	    // prefix with table name
	    array_walk($keys, create_function('&amp;$key', '$key = "' . $this-&gt;quoteName($table) . '.$key";'));

	    // build query
	    $query .= implode(', ', $keys) . ') VALUES (';

	    // add parameters
	    for ($i = 0; $i &lt; count($actualValues); $i++) {
		// add parameter marker
		$query .= '?, ';
	    }

	    // remove trailing comma
	    if ($numFields)
		$query = substr($query, 0, -2);

	    // end query
	    $query .= ')';

	    // set parameters
	    $parameters = $actualValues;
	}

	// create statement
	$statement = $this-&gt;handler-&gt;prepare($query);

	// validate statement
	if ($statement === false) {
	    // get error
	    $errorInfo = $this-&gt;handler-&gt;errorInfo();

	    // throw exceptions
	    throw new DatabaseException($errorInfo[2]);
	}

	// execute statement
	$statement-&gt;execute((array) $parameters);

	// has errors
	if ($statement-&gt;errorCode() != 0) {
	    $aError = $statement-&gt;errorInfo();
	    throw new DatabaseException($aError[2]);
	}

	// debug enabled
	if ($this-&gt;debug)
	    $this-&gt;queries[] = array('query' =&gt; $query, 'parameters' =&gt; $parameters);

	// fetch the keys
	return (int) $this-&gt;handler-&gt;lastInsertId();
    }

    /**
     * Optimize one or more tables
     *
     * @param	mixed $tables	An array containing the name(s) of the tables to optimize.
     */
    public function optimize($tables) {
	// one parameter
	$tables = (func_num_args() == 1) ? (array) $tables : func_get_args();

	// build &amp; execute query
	return $this-&gt;getRecords('OPTIMIZE TABLE ' . implode(', ', array_map(array($this, 'quoteName'), $tables)));
    }

    /**
     * Quote the name of a table or column.
     * Note: for now this will only put backticks around the name (mysql).
     *
     * @return	string			The quoted name.
     * @param	string $name	The name of a column or table to quote.
     */
    protected function quoteName($name) {
	return '`' . $name . '`';
    }

    /**
     * Retrieves an associative array or returns null if there were no results
     * This is an alias for getRecords
     *
     * @return	mixed							An array containing arrays which represent a record.
     * @param	string $query					The query to perform.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     * @param	string[optional] $key			The field that should be used as key, make sure this is unique for each row.
     */
    public function retrieve($query, $parameters = array(), $key = null) {
	return $this-&gt;getRecords($query, $parameters, $key);
    }

    /**
     * Set database name
     *
     * @param	string $database	The name of the database.
     */
    private function setDatabase($database) {
	$this-&gt;database = (string) $database;
    }

    /**
     * Set the debug status
     *
     * @param	bool[optional] $on	Should debug-mode be activated. Be carefull, this will use a lot of resources (Memory and CPU).
     */
    public function setDebug($on = true) {
	$this-&gt;debug = (bool) $on;
    }

    /**
     * Set driver type
     *
     * @param	string $driver	The driver to use. Available drivers depend on your server configuration.
     */
    private function setDriver($driver) {
	// init var
	$driver = (string) $driver;

	// validate backend
	if (!in_array($driver, PDO::getAvailableDrivers()))
	    throw new DatabaseException('The PDO database driver "' . (string) $driver . '" is not found. Only ' . implode(', ', PDO::getAvailableDrivers()) . ' are currently installed.');

	// set property
	$this-&gt;driver = $driver;
    }

    /**
     * Set hostname
     *
     * @param	string $hostname	The host or IP of your database-server.
     */
    private function setHostname($hostname) {
	$this-&gt;hostname = (string) $hostname;
    }

    /**
     * Set password
     *
     * @param	string $password	The password to authenticate on your database-server.
     */
    private function setPassword($password) {
	$this-&gt;password = (string) $password;
    }

    /**
     * Set port
     *
     * @param	int $port	The port to connect on.
     */
    private function setPort($port) {
	$this-&gt;port = (int) $port;
    }

    /**
     * Set username
     *
     * @param	string $username	The username to authenticate on your database-server.
     */
    private function setUsername($username) {
	$this-&gt;username = (string) $username;
    }

    /**
     * Truncate on or more tables
     *
     * @param	mixed $tables	A string or array containing the list of tables to truncate.
     */
    public function truncate($tables) {
	// one parameter
	$tables = (func_num_args() == 1) ? (array) $tables : func_get_args();

	// loop &amp; truncate
	foreach ($tables as $table)
	    $this-&gt;execute('TRUNCATE TABLE ' . $this-&gt;quoteName($table));
    }

    /**
     * Builds a query for updating records
     *
     * @return	int								The number of affected rows.
     * @param	string $table					The table to run the UPDATE-statement on.
     * @param	array $values					The values to update, use the key(s) as columnnames.
     * @param	string[optional] $where			The WHERE-clause.
     * @param	mixed[optional] $parameters		The parameters that will be used in the query.
     */
    public function update($table, array $values, $where = null, $parameters = array()) {
	// create connection
	if (!$this-&gt;handler)
	    $this-&gt;connect();

	// init vars
	$table = $this-&gt;quoteName((string) $table);
	$parameters = (array) $parameters;
	$namedParameters = false;

	// values check
	if (count($values) == 0)
	    throw new DatabaseException('No values provided.', 0, $this-&gt;password);

	// init vars
	$i = 1;
	$iValues = count($values);
	$query = 'UPDATE ' . (string) $table . ' SET ';

	// has parameters
	if (count($parameters)) {
	    // loop parameters
	    foreach ($parameters as $key =&gt; $value) {
		// key such as ':id' starting
		if (substr($key, 0, 1) == ':') {
		    $namedParameters = true;
		    break;
		}
	    }
	}

	// loop values
	foreach ($values as $key =&gt; $value) {
	    // named parameters
	    if (!$namedParameters) {
		$query .= $table . '.' . $key . ' = ?, ';
		$aTmpParameters[] = $value;
	    }

	    // positional parameters
	    else {
		$query .= $table . '.' . $key . ' = :' . $key . ', ';
		$aTmpParameters[':' . $key] = $value;
	    }

	    // counter
	    $i++;
	}

	// remove trailing comma
	if ($iValues)
	    $query = substr($query, 0, -2);

	// add where clause
	if ($where != '')
	    $query .= ' WHERE ' . (string) $where;

	// update parameters
	$parameters = array_merge($aTmpParameters, $parameters);

	// create statement
	$statement = $this-&gt;handler-&gt;prepare($query);

	// validate statement
	if ($statement === false) {
	    // get error
	    $errorInfo = $this-&gt;handler-&gt;errorInfo();

	    // throw exceptions
	    throw new DatabaseException($errorInfo[2]);
	}

	// has parameters
	foreach ($parameters as $label =&gt; $value) {
	    // bind values
	    $statement-&gt;bindValue((is_int($label) ? $label + 1 : (string) $label), $value, $this-&gt;getType($value));
	}

	// execute statement
	$statement-&gt;execute();

	// has errors
	if ($statement-&gt;errorCode() != 0) {
	    $aError = $statement-&gt;errorInfo();
	    throw new DatabaseException($aError[2]);
	}

	// debug enabled
	if ($this-&gt;debug)
	    $this-&gt;queries[] = array('query' =&gt; $query, 'parameters' =&gt; $parameters);

	// number of results
	return (int) $statement-&gt;rowCount();
    }

}

/**
 * This exception is used to handle database related exceptions.
 */
class DatabaseException extends Exception {
    
}
</pre><div id="csscan-wrapper" style="display: none; "><h2 id="csscan-header">element</h2><table id="csscan-table"><tbody><tr><th colspan="2" id="csscan-header-font" class="csscan-header">Font</th></tr><tr id="csscan-row-font-family"><td id="csscan-property-font-family" class="csscan-property">font-family</td><td id="csscan-value-font-family" class="csscan-value"></td></tr><tr id="csscan-row-font-size"><td id="csscan-property-font-size" class="csscan-property">font-size</td><td id="csscan-value-font-size" class="csscan-value"></td></tr><tr id="csscan-row-font-style"><td id="csscan-property-font-style" class="csscan-property">font-style</td><td id="csscan-value-font-style" class="csscan-value"></td></tr><tr id="csscan-row-font-variant"><td id="csscan-property-font-variant" class="csscan-property">font-variant</td><td id="csscan-value-font-variant" class="csscan-value"></td></tr><tr id="csscan-row-font-weight"><td id="csscan-property-font-weight" class="csscan-property">font-weight</td><td id="csscan-value-font-weight" class="csscan-value"></td></tr><tr id="csscan-row-letter-spacing"><td id="csscan-property-letter-spacing" class="csscan-property">letter-spacing</td><td id="csscan-value-letter-spacing" class="csscan-value"></td></tr><tr id="csscan-row-line-height"><td id="csscan-property-line-height" class="csscan-property">line-height</td><td id="csscan-value-line-height" class="csscan-value"></td></tr><tr id="csscan-row-text-decoration"><td id="csscan-property-text-decoration" class="csscan-property">text-decoration</td><td id="csscan-value-text-decoration" class="csscan-value"></td></tr><tr id="csscan-row-text-align"><td id="csscan-property-text-align" class="csscan-property">text-align</td><td id="csscan-value-text-align" class="csscan-value"></td></tr><tr id="csscan-row-text-indent"><td id="csscan-property-text-indent" class="csscan-property">text-indent</td><td id="csscan-value-text-indent" class="csscan-value"></td></tr><tr id="csscan-row-text-transform"><td id="csscan-property-text-transform" class="csscan-property">text-transform</td><td id="csscan-value-text-transform" class="csscan-value"></td></tr><tr id="csscan-row-white-space"><td id="csscan-property-white-space" class="csscan-property">white-space</td><td id="csscan-value-white-space" class="csscan-value"></td></tr><tr id="csscan-row-word-spacing"><td id="csscan-property-word-spacing" class="csscan-property">word-spacing</td><td id="csscan-value-word-spacing" class="csscan-value"></td></tr><tr id="csscan-row-color"><td id="csscan-property-color" class="csscan-property">color</td><td id="csscan-value-color" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-background" class="csscan-header">Background</th></tr><tr id="csscan-row-background-attachment"><td id="csscan-property-background-attachment" class="csscan-property">bg-attachment</td><td id="csscan-value-background-attachment" class="csscan-value"></td></tr><tr id="csscan-row-background-color"><td id="csscan-property-background-color" class="csscan-property">bg-color</td><td id="csscan-value-background-color" class="csscan-value"></td></tr><tr id="csscan-row-background-image"><td id="csscan-property-background-image" class="csscan-property">bg-image</td><td id="csscan-value-background-image" class="csscan-value"></td></tr><tr id="csscan-row-background-position"><td id="csscan-property-background-position" class="csscan-property">bg-position</td><td id="csscan-value-background-position" class="csscan-value"></td></tr><tr id="csscan-row-background-repeat"><td id="csscan-property-background-repeat" class="csscan-property">bg-repeat</td><td id="csscan-value-background-repeat" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-size" class="csscan-header">Box</th></tr><tr id="csscan-row-width"><td id="csscan-property-width" class="csscan-property">width</td><td id="csscan-value-width" class="csscan-value"></td></tr><tr id="csscan-row-height"><td id="csscan-property-height" class="csscan-property">height</td><td id="csscan-value-height" class="csscan-value"></td></tr><tr id="csscan-row-border-top"><td id="csscan-property-border-top" class="csscan-property">border-top</td><td id="csscan-value-border-top" class="csscan-value"></td></tr><tr id="csscan-row-border-right"><td id="csscan-property-border-right" class="csscan-property">border-right</td><td id="csscan-value-border-right" class="csscan-value"></td></tr><tr id="csscan-row-border-bottom"><td id="csscan-property-border-bottom" class="csscan-property">border-bottom</td><td id="csscan-value-border-bottom" class="csscan-value"></td></tr><tr id="csscan-row-border-left"><td id="csscan-property-border-left" class="csscan-property">border-left</td><td id="csscan-value-border-left" class="csscan-value"></td></tr><tr id="csscan-row-margin"><td id="csscan-property-margin" class="csscan-property">margin</td><td id="csscan-value-margin" class="csscan-value"></td></tr><tr id="csscan-row-padding"><td id="csscan-property-padding" class="csscan-property">padding</td><td id="csscan-value-padding" class="csscan-value"></td></tr><tr id="csscan-row-max-height"><td id="csscan-property-max-height" class="csscan-property">max-height</td><td id="csscan-value-max-height" class="csscan-value"></td></tr><tr id="csscan-row-min-height"><td id="csscan-property-min-height" class="csscan-property">min-height</td><td id="csscan-value-min-height" class="csscan-value"></td></tr><tr id="csscan-row-max-width"><td id="csscan-property-max-width" class="csscan-property">max-width</td><td id="csscan-value-max-width" class="csscan-value"></td></tr><tr id="csscan-row-min-width"><td id="csscan-property-min-width" class="csscan-property">min-width</td><td id="csscan-value-min-width" class="csscan-value"></td></tr><tr id="csscan-row-outline-color"><td id="csscan-property-outline-color" class="csscan-property">outline-color</td><td id="csscan-value-outline-color" class="csscan-value"></td></tr><tr id="csscan-row-outline-style"><td id="csscan-property-outline-style" class="csscan-property">outline-style</td><td id="csscan-value-outline-style" class="csscan-value"></td></tr><tr id="csscan-row-outline-width"><td id="csscan-property-outline-width" class="csscan-property">outline-width</td><td id="csscan-value-outline-width" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-position" class="csscan-header">Positioning</th></tr><tr id="csscan-row-position"><td id="csscan-property-position" class="csscan-property">position</td><td id="csscan-value-position" class="csscan-value"></td></tr><tr id="csscan-row-top"><td id="csscan-property-top" class="csscan-property">top</td><td id="csscan-value-top" class="csscan-value"></td></tr><tr id="csscan-row-bottom"><td id="csscan-property-bottom" class="csscan-property">bottom</td><td id="csscan-value-bottom" class="csscan-value"></td></tr><tr id="csscan-row-right"><td id="csscan-property-right" class="csscan-property">right</td><td id="csscan-value-right" class="csscan-value"></td></tr><tr id="csscan-row-left"><td id="csscan-property-left" class="csscan-property">left</td><td id="csscan-value-left" class="csscan-value"></td></tr><tr id="csscan-row-float"><td id="csscan-property-float" class="csscan-property">float</td><td id="csscan-value-float" class="csscan-value"></td></tr><tr id="csscan-row-display"><td id="csscan-property-display" class="csscan-property">display</td><td id="csscan-value-display" class="csscan-value"></td></tr><tr id="csscan-row-clear"><td id="csscan-property-clear" class="csscan-property">clear</td><td id="csscan-value-clear" class="csscan-value"></td></tr><tr id="csscan-row-z-index"><td id="csscan-property-z-index" class="csscan-property">z-index</td><td id="csscan-value-z-index" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-list" class="csscan-header">List</th></tr><tr id="csscan-row-list-style-image"><td id="csscan-property-list-style-image" class="csscan-property">list-style-image</td><td id="csscan-value-list-style-image" class="csscan-value"></td></tr><tr id="csscan-row-list-style-type"><td id="csscan-property-list-style-type" class="csscan-property">list-style-type</td><td id="csscan-value-list-style-type" class="csscan-value"></td></tr><tr id="csscan-row-list-style-position"><td id="csscan-property-list-style-position" class="csscan-property">list-style-position</td><td id="csscan-value-list-style-position" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-table" class="csscan-header">Table</th></tr><tr id="csscan-row-vertical-align"><td id="csscan-property-vertical-align" class="csscan-property">vertical-align</td><td id="csscan-value-vertical-align" class="csscan-value"></td></tr><tr id="csscan-row-border-collapse"><td id="csscan-property-border-collapse" class="csscan-property">border-collapse</td><td id="csscan-value-border-collapse" class="csscan-value"></td></tr><tr id="csscan-row-border-spacing"><td id="csscan-property-border-spacing" class="csscan-property">border-spacing</td><td id="csscan-value-border-spacing" class="csscan-value"></td></tr><tr id="csscan-row-caption-side"><td id="csscan-property-caption-side" class="csscan-property">caption-side</td><td id="csscan-value-caption-side" class="csscan-value"></td></tr><tr id="csscan-row-empty-cells"><td id="csscan-property-empty-cells" class="csscan-property">empty-cells</td><td id="csscan-value-empty-cells" class="csscan-value"></td></tr><tr id="csscan-row-table-layout"><td id="csscan-property-table-layout" class="csscan-property">table-layout</td><td id="csscan-value-table-layout" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-effects" class="csscan-header">Effects</th></tr><tr id="csscan-row-text-shadow"><td id="csscan-property-text-shadow" class="csscan-property">text-shadow</td><td id="csscan-value-text-shadow" class="csscan-value"></td></tr><tr id="csscan-row--webkit-box-shadow"><td id="csscan-property--webkit-box-shadow" class="csscan-property">-webkit-box-shadow</td><td id="csscan-value--webkit-box-shadow" class="csscan-value"></td></tr><tr id="csscan-row-border-radius"><td id="csscan-property-border-radius" class="csscan-property">border-radius</td><td id="csscan-value-border-radius" class="csscan-value"></td></tr><tr><th colspan="2" id="csscan-header-other" class="csscan-header">Other</th></tr><tr id="csscan-row-overflow"><td id="csscan-property-overflow" class="csscan-property">overflow</td><td id="csscan-value-overflow" class="csscan-value"></td></tr><tr id="csscan-row-cursor"><td id="csscan-property-cursor" class="csscan-property">cursor</td><td id="csscan-value-cursor" class="csscan-value"></td></tr><tr id="csscan-row-visibility"><td id="csscan-property-visibility" class="csscan-property">visibility</td><td id="csscan-value-visibility" class="csscan-value"></td></tr></tbody></table></div></body><span id="skype_highlighting_settings" display="none" autoextractnumbers="1"></span><object id="skype_plugin_object" location.href="https://raw.github.com/trophiesteam/trophy/874619d2d1ff66069d6be872f92ef4a4bc8dc7cc/amfphp/services/dal/MySQLDatabase.php" location.hostname="raw.github.com" style="position: absolute; visibility: hidden; left: -100px; top: -100px; " width="0" height="0" type="application/x-vnd.skype.click2call.chrome.5.6.0"></object></html>
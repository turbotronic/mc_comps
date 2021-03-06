<?php
/**
 *  @package    dfm-base
 *  @author     Jonathan Boho
 *  @copyright  (c) 2012
 *  @version    1.0
 *  @license    xxx
 */

require_once('config.php');
require_once('exceptions.php');

class Database
{
	public $last_query;
	protected $dbh; // database handler
	
	// depreciated????
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
	// useful constants
    const MYSQL_DATE_FORMAT = 'Y-m-d';
    const MYSQL_TIME_FORMAT = 'H:i:s';
    const MYSQL_DATETIME_FORMAT = 'Y-m-d H:i:s';
		
	public function __construct() {
		$this->open();
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists("mysql_real_escape_string");
	}
	
	protected function open() {
		$this->dbh = mysql_pconnect(DB_SERVER, DB_USER, DB_PASS); // establishes persistant connx
		if (!is_resource($this->dbh)) {
			throw new MySQLException;
		}
		if (!mysql_select_db(DB_NAME, $this->dbh)) {
			throw new MySQLException('Unable to establish connection: ' . mysql_error());
		}		
	}

	public function close() {	
		if(isset($this->dbh)) {
			mysql_close($this->dbh);
			unset($this->dbh);
		}
	}	
	
	public function execute($query) {
		$this->last_query = $query;
		if(!$this->dbh) {
			$this->open();
		}
		$result = mysql_query($query, $this->dbh);
		if(!$result) {
			throw new MySQLException;
		}
		else if(!is_resource($result)) {
			return true;
		}
		else {
			$stmt = new DB_Statement($this->dbh, $query, $result);
			// $stmt->result = $result;
			return $stmt;
		}
	}

	// cleans input to prevent SQL injection.
	// also checks for PHP version and adopts appropriate technique for escaping values	
 	public function escape_value($value) {
		if( $this->real_escape_string_exists ) {
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		}
		else { 
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
		}
		return $value;
	}
	
	public function result($resource, $row=0, $field='') {
		$result = mysql_result($this->dbh, $row, $field);
		return $result;
	}
	
	public function affected_rows() {
    	return mysql_affected_rows($this->dbh);
	}

	public function insert_id() {
		return mysql_insert_id($this->dbh);
	}
	
}

$database = new Database();
$db =& $database;

?>
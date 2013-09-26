<?php
/**
 *  @package    dfm-base
 *  @author     Jonathan Boho
 *  @copyright  (c) 2012
 *  @version    1.0
 *  @license    xxx
 */

class DB_Statement {
	public $query;
	protected $dbh; // database handler
	public $result;
	public $num_rows;
	public $isEmpty;
	private $index = 0;
	
	public function __construct($dbh, $query, $result)
	{
		$this->query = $query;
		if(!is_resource($dbh)) {
			throw new MySQLException("Invalid database connection:" . mysql_error());
		} else {
			$this->dbh = $dbh;
		}
		if(!is_resource($result) || get_resource_type($result) != 'mysql result') {
			throw new MySQLException("Query does not return an mysql result resource: " . mysql_error());
		} else {
			$this->result = $result;
			$this->num_rows = mysql_num_rows($this->result);
        	$this->isEmpty =  ($this->num_rows === 0) ? true : false;
		}
	}

    /**
     *  Fetch
     *  
     *  Catch all function for fetching the features return mode switching.
     *  Mode will choose whether to return data as object, row, array or array
     *  containing all the fields in the return resource.
     *
     *  @param  string
     */

	public function fetch($mode = 'obj')
	{
		switch($mode)
		{
			case 'row':
			$func = 'mysql_fetch_row';
			break;
			case 'array':
			$func = 'mysql_fetch_assoc';
			break;
			default:
			$func = 'mysql_fetch_object';
			break;
		}
		$this->index++;
		return $func($this->result);
	}
	
	public function fetch_row()
	{
		return mysql_fetch_row($this->result);
	}
	
	public function fetch_array()
	{
		return mysql_fetch_assoc($this->result);
	}
	
	public function fetch_object()
	{
		return mysql_fetch_object($this->result);
	}
	
	public function fetch_all()
	{
		$return_array = array();
		while ($row = $this->fetch_array($this->result)) {
			$return_array[] = $row;
		}
		return $return_array;
	}
	
	// function deprciated but still here to work with old versions
	public function num_rows($return_num = true)
	{
		if ($return_num) {
			return $num_rows;
		}
		else {
			return ($this->num_rows > 0) ? true: false;
		}
	}
	
    public function isEmpty() {
		return $this->isEmpty;
    }

    public function rewind() {
        if ($this->num_rows > 0) {
            mysql_data_seek($this->result, 0);
            $this->index = -1;  // fetch() will increment to 0
            $this->fetch();
        }
    }
}
?>
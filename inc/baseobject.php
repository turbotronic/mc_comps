<?php
/**
 *  @package    dfm-base
 *  @author     Jonathan Boho
 *  @copyright  (c) 2012
 *  @version    1.0
 *  @license    xxx
 */

require_once('db.php');

class BaseObject extends Database {
	protected static $table_name; // table name
	protected static $db_fields; // array containing db fields

	function __construct($id = null)
	{
		// override vars here with parent::$table_name = your table name;
		// if($id !== null) {
		// 	$this->create_by_id($id);
		// }
	}
 	
	/*-- CRUD --*/
	public function create() {
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		if($result = $this->execute($sql)) {
	    	$this->id = $this->insert_id();
	    	return true;
		} else {
			throw new MySQLException;
		}
	}

	public function update() {
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=". $this->escape_value($this->id);
		if ($result = $this->execute($sql)) {
			return ($this->affected_rows() == 1) ? true : false;
		} else {
			throw new MySQLException();
		}
	}

	public function delete() {
		$sql = "DELETE FROM ".self::$table_name;
		$sql .= " WHERE id=". $this->escape_value($this->id);
		$sql .= " LIMIT 1";
		if ($result = $this->execute($sql)) {
			return ($this->affected_rows() == 1) ? true : false;
		} else {
			throw new MySQLException;
		}
	}
		
	/*-- HELPER FUNCTIONS --*/
	
	protected function create_by_id($id) {
		$sql = "SELECT * FROM ".self::$table_name;
		$sql .= " WHERE id=". $this->escape_value($id);
		$sql .= " LIMIT 1";
		if ($result = $this->execute($sql)) {
			if($result->num_rows > 0) {
				$record = $result->fetch_array();
				foreach($record as $attribute=>$value) {
					if($this->has_attribute($attribute)) {
						$this->$attribute = $value;
					}
				}
			} else {
				throw new MySQLException('No record found');
			}
		} else {
			throw new MySQLException('Total SQL Failure');
		}
	}
	
	protected function instantiate($record) {
		foreach($record as $attribute=>$value) {
			if($this->has_attribute($attribute)) {
				$this->$attribute = $value;
			}
		}
	}
		
	protected function has_attribute($attribute) {
		return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		$attributes = array();
		foreach(self::$db_fields as $field) {
			if(property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}
	
	protected function sanitized_attributes() {
		$clean_attributes = array();
		foreach($this->attributes() as $key => $value){
			$clean_attributes[$key] = $this->escape_value($value);
		}
		return $clean_attributes;
	}	
	
}

?>
<?php
/**
 *  @package    dfm-base
 *  @author     Jonathan Boho
 *  @copyright  (c) 2012
 *  @version    1.0
 *  @license    xxx
 */

class MySQLException extends Exception
{
	public $backtrace;
	public function __construct($message=false, $code=false)
	{
		if(!$message) {
			$this->message = mysql_error();
		}
		if(!$code) {
			$this->code = mysql_errno();
		}
		$this->backtrace = debug_backtrace();
	}
}

?>
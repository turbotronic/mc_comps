<?php
/**
 *  @package    dfm-base
 *  @author     Jonathan Boho
 *  @copyright  (c) 2012
 *  @version    1.0
 *  @license    xxx
 */

class Cache
{
	protected $cachetime;
	protected $cachefile;
	protected $cachedir;
	protected $cacheext;
	protected $not_root;
	private $isset = false;
	
	function __construct($args = '')
	{
		if(!empty($args)) {
			if(is_array($args)) {
				foreach($args as $attribute=>$value) {
					if(property_exists($this, $attribute)) {
						$this->$attribute = $value;
					}
				}
				if (!is_null($this->cachetime) && !is_int($this->cachetime)) {
					$this->set_cachetime($this->cachetime);
				}
			} else {
				// just sets string as the cachefile
				$this->cachefile = $args;
			}
		}
		// sets defaults for unset values
		$this->not_root = (is_null($this->not_root)) ? false : $this->not_root;
		$this->cachedir = (is_null($this->cachedir)) ? 'cache' : $this->cachedir;
		$this->cachedir = ($this->not_root) ? "../" . $this->cachedir : $this->cachedir;
		$this->cacheext = (is_null($this->cacheext)) ? '.html' : $this->cacheext;
		$this->cachetime = (is_null($this->cachetime)) ? $this->set_cachetime('30 minutes') : $this->cachetime;
		$this->cachefile = (is_null($this->cachefile)) ? $this->create_cachefile() : $this->cachedir . DIRECTORY_SEPARATOR . $this->cachefile . $this->cacheext;
	}
	
	// CACHE FUNCTIONS
	
	public function set() {
		if(!is_dir($this->cachedir)) {
			return false;
		}
		$this->isset = true;
		if (file_exists($this->cachefile) && (time() - $this->cachetime < filemtime($this->cachefile))) {
			// echo "<pre>this is the cached version</pre>";
			include($this->cachefile);
			exit;
		}
		ob_start();
	}

	public function write() {
		if(!$this->isset) { return false; }
		if(isset($this->cachefile)) {
			$fp = fopen($this->cachefile, 'w');
			fwrite($fp, ob_get_contents());
			fclose($fp);
		}
		ob_end_flush();
	}

	public function clear() {
		if (file_exists($this->cachefile)) {
			if(unlink($this->cachefile)) {
				$this->isset = false;
			}
		}
	}
	
	// GETTERS AND SETTERS FOR INTERNAL VARS
	
	public function get_cachefile() {
		return $this->cachefile;
	}
	
	public function get_cachetime() {
		return $this->cachetime;
	}
	
	protected function create_cachefile() {
		// first I need to make sure the stupid added string is not in the query string
		$qs = $_SERVER['QUERY_STRING'];
		$query_string = '';
		if($qs !== '') {
			$split_pos = strpos($_SERVER['QUERY_STRING'], "&_");
			if(is_int($split_pos)) {
				if($split_pos !== 0) {
					$first_split = str_split($qs, $split_pos);
					$query_string = $first_split[0];
					$second_split = str_split($first_split[1], 16);
					if(isset($second_split[1])) {
						$query_string .= $second_split[1];
					}
				} else {
					if(strlen($qs) > 16) {
						$first_split = str_split($qs, 16);
						$query_string = $first_split[1];
					}
				}
			}
		}
		$this->cachefile = explode('.', basename($_SERVER['PHP_SELF'])); // problem with basename?????
		$this->cachefile = array_shift($this->cachefile);
		$this->cachefile = ($query_string !== '') ? $this->cachefile .= base64_encode($query_string) : $this->cachefile;
		$this->cachefile = $this->cachedir . DIRECTORY_SEPARATOR . $this->cachefile . $this->cacheext;
		return $this->cachefile;
	}
	
	protected function set_cachetime($str) {
		if(is_numeric($str)) {
			$this->cachetime = abs(intval($str));
			return $this->cachetime;
		} else {
			if(strpos($str, ' ')) {
				$vars = explode(' ', $str);
				$time = abs(intval($vars[0]));
				$unit = $vars[1];
				switch($unit)
				{
					case 'seconds':
						$this->cachetime = $time;
						break;
					case 'minutes':
						$this->cachetime = $time * 60;
						break;
					case 'hours':
						$this->cachetime = $time * 60 * 60;
						break;
					case 'days':
						$this->cachetime = $time * 60 * 60 * 24;
						break;
					case 'weeks':
						$this->cachetime = $time * 60 * 60 * 24 * 7;
						break;
					default:
						$this->cachetime = 300;
						break;
				}
				return $this->cachetime;
			}
		}
		// iff all else fails
		$this->cachetime = 300;
		return $this->cachetime;
	}
}
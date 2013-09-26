<?php
/**
 *  @package    dfm-base
 *  @author     Jonathan Boho
 *  @copyright  (c) 2012
 *  @version    1.0
 *  @license    xxx
 */

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
ini_set('session.use_trans_sid', '0'); // stops session ID from appearing in links
//error_reporting(0); // supresses errors

// load core files
require_once 'config.php';
require_once 'functions.php';

// load core objects
//require_once('db.php');
//require_once('db_statement.php');
//require_once('exceptions.php');
//require_once('baseobject.php');

// load extended objects

// helper classes
// require_once('pagination.php');
// require_once('session.php');

<?php
error_reporting( E_ALL );

/**
 * @const FILE_INI configuration file
 */
define("FILE_INI", "/home/carsten/config/OpenHR.conf");

/**
 * global array containing all configuration settings
 *
 * @var array $OHR_CONFIG
 */
$OHR_CONFIG=parse_ini_file(FILE_INI);

define('DS'            ,  DIRECTORY_SEPARATOR);
define('OPENHR_BASE'   ,  $OHR_CONFIG["dir.base_openhr"]);
define('PEAR_BASE'     ,  $OHR_CONFIG["dir.base_pear"]);

/**
 *@const OPENHR_LIB  defines the location of the OpenHR classes
 */
define('OPENHR_LIB'    , OPENHR_BASE.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR);

/**
 *@const OPENHR_LOG  defines the location of Logfiles
 */
define('OPENHR_LOG'    , OPENHR_BASE.DIRECTORY_SEPARATOR.'log'.DIRECTORY_SEPARATOR);

define("OHR_MODULE_NAME",'jobSearch');
define("OHR_MODULE_PATH",'/jobSearch');
define("OHR_MODULE_CSS" ,'/jobAdmin/css/style.css');

require_once(OPENHR_LIB.'base.php');


?>
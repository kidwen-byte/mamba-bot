<?php

define('ROOT', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);
define("VIEWS_DIR", '../views/');
define('CONTROLLER_NAMESPACE', 'app\\controllers\\');

libxml_use_internal_errors(true);

ini_set("xdebug.var_display_max_children", '-1');
ini_set("xdebug.var_display_max_data", '-1');
ini_set("xdebug.var_display_max_depth", '-1');
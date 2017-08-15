<?php

$servername = $_SERVER['SERVER_NAME'];
// load basic functions next so that everything after can use them
//require_once(__DIR__ . '/functions.php');
//require_once(__DIR__ . '/php_functions.php');

// load core objects
//require_once('inc/database.php');
require_once(__DIR__ . '/database_object.php');

// load database-related classes
require_once(__DIR__ . '/Family.php');
require_once(__DIR__ . '/FamilyIncome.php');
require_once(__DIR__ . '/AbuseFamily.php');
require_once(__DIR__ . '/Ncfas.php');
require_once(__DIR__ . '/Category.php');
require_once(__DIR__ . '/SubCategory.php');
require_once(__DIR__ . '/Caregiver.php');
require_once(__DIR__ . '/Children.php');
require_once(__DIR__ . '/Reabuse.php');


// write code class

//require_once('inc/writer.php');
//require_once('inc/codewriter.php');
//require_once('inc/createassessment.php');
?>
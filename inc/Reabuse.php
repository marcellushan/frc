<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');
class Reabuse extends DatabaseObject {
	
	protected static $table_name="re_abuses";
	protected static $unit_id="id";
    protected static $db_fields = array('date','type','outcome','notes','family_id');
    public $date;
    public $type;
    public $outcome;
    public $notes;
    public $family_id;
} // end class
?>
<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');
class Children extends DatabaseObject {
	
	protected static $table_name="children";
	protected static $unit_id="id";
    protected static $db_fields = array('name','birth_date','gender','race','family_id');
    public $name;
    public $birth_date;
    public $gender;
    public $race;
    public $family_id;
} // end class
?>
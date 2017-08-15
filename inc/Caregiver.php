<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');
class Caregiver extends DatabaseObject {
	
	protected static $table_name="caregivers";
	protected static $unit_id="id";
    protected static $db_fields = array('name','birth_date','gender','marital_status','race','education','family_role', 'family_id');
    public $name;
    public $birth_date;
    public $gender;
    public $marital_status;
    public $race;
    public $education;
    public $family_role;
    public $family_id;

} // end class
?>
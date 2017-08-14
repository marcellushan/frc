<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');
class AbuseFamily extends DatabaseObject {
	
	protected static $table_name="abuse_family";
	protected static $unit_id="id";
		protected static $db_fields = array( 'abuse_id','family_id');
		public $abuse_id;
		public $family_id;
//		public $team_mission_statement;
//		public $team_type;
//		public $final;

} // end class
?>
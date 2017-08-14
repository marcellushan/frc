<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');
class FamilyIncome extends DatabaseObject {
	
	protected static $table_name="family_income";
	protected static $unit_id="id";
		protected static $db_fields = array( 'family_id','income_id');
		public $family_id;
		public $income_id;
//		public $case_id;
//		public $team_name;
//		public $team_mission_statement;
//		public $team_type;
//		public $final;

} // end class
?>
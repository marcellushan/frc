<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');
class Ncfas extends DatabaseObject {
	
	protected static $table_name="ncfas";
	protected static $unit_id="id";
		protected static $db_fields = array( 'category','sub_category','step','score','family_id');
		public $type;
		public $category;
		public $step;
		public $score;
		public $family_id;

} // end class
?>
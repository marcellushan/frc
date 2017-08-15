<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');
class Category extends DatabaseObject {
	
	protected static $table_name="categories";
	protected static $unit_id="id";
		protected static $db_fields = array( 'name');
		public $name;

} // end class
?>
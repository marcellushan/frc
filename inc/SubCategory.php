<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');
class SubCategory extends DatabaseObject {
	
	protected static $table_name="sub_categories";
	protected static $unit_id="id";
		protected static $db_fields = array( 'name','category_id');
		public $name;
        public $category_id;

} // end class
?>
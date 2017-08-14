<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');
class Strategic_initiative extends DatabaseObject {
	
	protected static $table_name="strategic_initiative";
	protected static $unit_id="strategic_initiative_id";
		protected static $db_fields = array( 'strategic_initiative_id','strategic_initiative_text','team_id','inactive');
		public $strategic_initiative_id;	
		public $strategic_initiative_text;
		public $team_id;
		public $inactive;
/*	
  public function full_name() {
    if(isset($this->user_fname) && isset($this->user_lname)) {
      return $this->user_fname . " " . $this->user_lname;
    } else {
      return "";
    }
  }

	public static function authenticate($username="", $password="") {
    global $database;
    $username = $database->escape_value($username);
    $password = $database->escape_value($password);

    $sql  = "SELECT * FROM users ";
    $sql .= "WHERE username = '{$username}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}*/
} // end class
?>
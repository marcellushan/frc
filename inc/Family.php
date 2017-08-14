<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');
class Family extends DatabaseObject {
	
	protected static $table_name="families";
	protected static $unit_id="id";
    protected static $db_fields = array( 'case_id','name','street','city','state','zip',
        'income_range','income_source','create_date','referral','ina_date','close_date');
    public $case_id;
    public $name;
    public $street;
    public $city;
    public $state;
    public $zip;
    public $income_range;
    public $create_date;
    public $referral;
    public $ina_date;
    public $close_date;

//		public $team_name;
//		public $team_mission_statement;
//		public $team_type;
//		public $final;

} // end class
?>
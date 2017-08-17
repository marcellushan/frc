<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');

class DatabaseObject {

	// Common Database Methods
	public static function find_all() 
		{
			return static::find_by_sql("SELECT * FROM ".static::$table_name);
	   }
  
  public static function find_by_id($id=0) 
	  {
	    $result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE ".static::$unit_id."={$id} LIMIT 1");
		  return !empty($result_array) ? array_shift($result_array) : false;
	  }
  
  
  public static function find_by_sql($sql="") 
  	{
    	global $database;
    	$result_set = $database->setQuery($sql);
    	$object_array = array();
    	while ($row = $database->fetch_array($result_set)) 
    		{
      			$object_array[] = static::instantiate($row);
    		}
    	return $object_array;
  	}
  	

	private static function instantiate($record) 
		{
			// Could check that $record exists and is an array
			$class_name = get_called_class();
	      $object = new $class_name;
			foreach($record as $attribute=>$value)
				{
				  if($object->has_attribute($attribute)) 
				  	{
				    	$object->$attribute = $value;
				  	}
				}
			return $object;
	}
	
	private function has_attribute($attribute) 
		{
		  // get_object_vars returns an associative array with all attributes 
		  // (incl. private ones!) as the keys and their current values as the value
		  $object_vars = get_object_vars($this);
		  // We don't care about the value, we just want to know if the key exists
		  // Will return true or false
		  return array_key_exists($attribute, $object_vars);
		}
	
	protected function attributes() 
		{ 
			// return an array of attribute names and their values
		  $attributes = array();
		  foreach(static::$db_fields as $field) 
		  	{
			    if(property_exists($this, $field))
			    	 {
				      $attributes[$field] = $this->$field;
			      }
		  }
		  return $attributes;
	  }
	public function save() 
		{
		  // A new record won't have an id yet.
		  return isset($this->user_id) ? $this->update() : $this->create();
		}

	public function create() 
			{
				global $database;
				$attributes = $this->attributes();
			  $sql = "INSERT INTO ".static::$table_name." (";
				$sql .= join(", ", array_keys($attributes));
			  $sql .= ") VALUES ('";
				$sql .= join("', '", array_values($attributes));
				$sql .= "')";
//				echo $sql;
			  if($database->countQuery($sql)) 
			  		{
					    return $database->connection->lastInsertId();
					    
			  		} 
			  else 
			  		{
				    	return false;
			  		}
		 }
	    
	    public function update()
	    {
	    	global $database;
	    	$table_id = static::$table_name . "_id";
	    	$id = $this->$table_id;
	    	$attributes = $this->attributes();
	    	$attribute_pairs = array();
	    	foreach($attributes as $key => $value)
	    	{
	    		$attribute_pairs[] = "{$key}='{$value}'";
	    	}
	    	$sql = "UPDATE ".static::$table_name." SET ";
	    	$sql .= join(", ", $attribute_pairs);
	    	$sql .= " WHERE " .static::$table_name. "_id=". $id;
	    	$affected_rows = $database->connection->exec($sql);
	    	return ($affected_rows==1) ? true : false;
	    }

        public function rawQuery($sql)
        {
				global $database;           
            $holder=$database->rawQuery($sql);
        }
				  		
	public function delete() 
		{
			global $database;
			$table_id = static::$table_name . "_id";
			$id = $this->$table_id;
		  	$sql = "DELETE FROM ".static::$table_name;
		   $sql .= " WHERE " .static::$table_name. "_id=". $id;
			  $sql .= " LIMIT 1";
			  $count=$database->countQuery($sql);
			  return ($count== 1) ? true : false;
	 }

  }//end of class
  
  ?>
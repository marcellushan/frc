<?php
require_once "inc/initialize.php";
//$family = new Family();
//$family->case_id = 34;
//$family->name = "Marc Hannah";
//$family->city = "Rome";
//$family->save();
$teams =$database->setQuery('select id from families');
foreach ($teams as $team) {
    echo $team['id'];

}
//$teams = Family::find_all();
//print_r($teams);
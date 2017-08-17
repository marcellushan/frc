<?php
require_once __DIR__ ."/../inc/initialize.php";

$fields = $_POST;
$family_id = $_GET['id'];
$caregiver = new Caregiver();
foreach ($fields as $key => $value){
    if(! is_array($value))
        $caregiver->$key = $value;
}
$caregiver->family_id = $family_id;
//print_r($caregiver);
$caregiver_id =  $caregiver->save();
?>
<!DOCTYPE html>
<html>
<head>
    <!-- HTML meta refresh URL redirection -->
    <meta http-equiv="refresh"
          content="0; url=../family/index.php?id=<?=$family_id ?>">
</head>

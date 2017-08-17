<?php
require_once __DIR__ ."/../inc/initialize.php";

//print_r($_POST);
$fields = $_POST;


$family = new Family();
foreach ($fields as $key => $value){
    if(! is_array($value))
    $family->$key = $value;
}
//print_r($family);
$family_id =  $family->save();
$incomes = $_POST['income_source'];
$abuses = $_POST['abuse'];
foreach ($incomes as $income)
{
    $family_income = new FamilyIncome();
    $family_income->family_id = $family_id;
    $family_income->income_id = $income;
    $family_income->save();
}

foreach ($abuses as $abuse)
{
    $abuse_family = new AbuseFamily();
    $abuse_family->family_id = $family_id;
    $abuse_family->abuse_id = $abuse;
    $abuse_family->save();
}
?>
<!DOCTYPE html>
<html>
<head>
<!--    HTML meta refresh URL redirection-->
    <meta http-equiv="refresh"
          content="0; url=index.php?id=<?=$family_id ?>">
</head>

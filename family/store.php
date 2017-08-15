<?php
require_once __DIR__ ."/../inc/initialize.php";

//print_r($_POST);

$family = new Family();
$family->case_id = $_POST['case_id'];
$family->name = $_POST['name'];
$family->street = $_POST['street'];
$family->city = $_POST['city'];
$family->state = $_POST['state'];
$family->zip = $_POST['zip'];
$family->income_range = $_POST['income_range'];
$family->referral = $_POST['referral'];
$family->ina_date = $_POST['ina_date'];
$family_id =  $family->save();
$incomes = $_POST['income_source'];
$abuses = $_POST['abuse'];
//print_r($incomes);
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
    <!-- HTML meta refresh URL redirection -->
    <meta http-equiv="refresh"
          content="0; url=../ncfas/create.php?id=<?=$family_id ?>&category_id=1">
</head>

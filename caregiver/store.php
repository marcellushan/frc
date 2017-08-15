<?php
require_once __DIR__ ."/../inc/initialize.php";

print_r($_POST);

$caregiver = new Caregiver();

$caregiver->name = $_POST['name'];
$caregiver->birth_date = $_POST['birth_date'];
$caregiver->gender = $_POST['gender'];
$caregiver->marital_status = $_POST['marital_status'];
$caregiver->race = $_POST['race'];
$caregiver->education = $_POST['education'];
$caregiver->family_role = $_POST['family_role'];
//$family->referral = $_POST['referral'];
//$family->ina_date = $_POST['ina_date'];
$caregiver_id =  $caregiver->save();
//$incomes = $_POST['income_source'];
//$abuses = $_POST['abuse'];
////print_r($incomes);
//foreach ($incomes as $income)
//{
//    $family_income = new FamilyIncome();
//    $family_income->family_id = $family_id;
//    $family_income->income_id = $income;
//    $family_income->save();
//
//}
//
//foreach ($abuses as $abuse)
//{
//    $abuse_family = new AbuseFamily();
//    $abuse_family->family_id = $family_id;
//    $abuse_family->abuse_id = $abuse;
//    $abuse_family->save();
//}
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <!-- HTML meta refresh URL redirection -->-->
<!--    <meta http-equiv="refresh"-->
<!--          content="0; url=../ncfas/create.php?id=--><?//=$family_id ?><!--&category_id=1">-->
<!--</head>-->

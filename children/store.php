<?php
require_once __DIR__ ."/../inc/initialize.php";

print_r($_POST);

$children = new Children();
$children->name = $_POST['name'];
$children->birth_date = $_POST['birth_date'];
$children->gender = $_POST['gender'];
$children->race = $_POST['race'];
$children_id =  $children->save();
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <!-- HTML meta refresh URL redirection -->-->
<!--    <meta http-equiv="refresh"-->
<!--          content="0; url=../ncfas/create.php?id=--><?//=$family_id ?><!--&category_id=1">-->
<!--</head>-->

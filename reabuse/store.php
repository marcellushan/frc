<?php
require_once __DIR__ ."/../inc/initialize.php";

print_r($_POST);

$reabuse = new Reabuse();
$reabuse->date = $_POST['date'];
$reabuse->type = $_POST['type'];
$reabuse->outcome = $_POST['outcome'];
$reabuse->notes = $_POST['notes'];
$reabuse_id =  $reabuse->save();
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <!-- HTML meta refresh URL redirection -->-->
<!--    <meta http-equiv="refresh"-->
<!--          content="0; url=../ncfas/create.php?id=--><?//=$family_id ?><!--&category_id=1">-->
<!--</head>-->

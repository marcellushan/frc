<?php
require_once __DIR__ ."/../inc/initialize.php";
$family_id = $_GET['id'];

$children = new Children();
$children->name = $_POST['name'];
$children->birth_date = $_POST['birth_date'];
$children->family_id = $family_id;
$children->gender = $_POST['gender'];
$children->race = $_POST['race'];
print_r($children);
echo $children_id = $children->save();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- HTML meta refresh URL redirection -->
    <meta http-equiv="refresh"
          content="0; url=../family/index.php?id=<?=$family_id ?>">
</head>

<?php
require_once __DIR__ ."/../inc/initialize.php";

$posts = $_POST;
//print_r($posts);
$family_id = $_GET['id'];
$category = $_GET['category'];
$phase = $_GET['phase'];
foreach ($posts as $key => $value)
{
    if($value){
        $ncfas = new Ncfas();
        $ncfas->family_id = $family_id;
        $ncfas->category = $category;
        $ncfas->phase =$phase;
        $ncfas->sub_category = $key;
        $ncfas->score = $value;
        $ncfas->family_id = $_GET['id'];
//        print_r($key);
        $ncfas->save();
    }
}

$category_id = $category + 1;
?>

<!DOCTYPE html>
<html>
<head>
    <!-- HTML meta refresh URL redirection -->
    <meta http-equiv="refresh"
          content="0; url=../ncfas/create.php?id=<?=$family_id ?>&category_id=<?=$category_id ?>">
</head>
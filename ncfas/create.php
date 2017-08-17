<?php
require_once __DIR__ ."/../inc/initialize.php";
require_once __DIR__ ."/../inc/header.php";

$category = Category::find_by_id($_GET['category_id']);
$family = Family::find_by_id( $_GET['id']);
$phase = 1;

//$sub_categories =SubCategory::find_by_sql("select * from sub_categories where category_id ='" . $_GET['category_id'] . "'");
//$sub_categories =SubCategory::find_by_id(1);
//print_r($sub_categories);
?>
<div class="well">
    <h1><?=$family->name ?></h1>

    <h2 align="center">Phase: Intake</h2>
<form action="store.php?id=<?=$_GET['id'] ?>&category=<?=$_GET['category_id'] ?>&phase=<?=$phase ?>" method="post">
    <h3 align="center">Category: <?=$category->name ?> </h3>
    <?php
//    $phase = "intake";
    $sub_category_id = 1;
    ?>
    <div class="row">
    <?php
    $category_id = $_GET['category_id'];;
    $sub_categories =SubCategory::find_by_sql("select * from sub_categories where category_id ='" . $category_id . "'");
    foreach($sub_categories as $sub_category) {
        $name = $sub_category->name;
        include "../inc/ncfas_select.php";
        $sub_category_id++;
    }
    ?>

<button type="submit">submit</button>

</form>

</div>
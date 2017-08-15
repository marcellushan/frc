<?php
require_once __DIR__ ."/../inc/initialize.php";

$posts = $_POST;
$category = $_GET['category'];
foreach ($posts as $key => $value)
{
    if($value['intake']){
        $ncfas = new Ncfas();
        $ncfas->family_id = $_GET['id'];
        $ncfas->category = $category;
        $ncfas->step = 1;
        $ncfas->sub_category = $key;
        $ncfas->score = $value['intake'];
        $ncfas->family_id = $_GET['id'];
        $ncfas->save();
    }

    if($value['interim']){
        $ncfas = new Ncfas();
        $ncfas->family_id = $_GET['id'];
        $ncfas->category = $category;
        $ncfas->step = 2;
        $ncfas->sub_category = $key;
        $ncfas->score = $value['interim'];
        $ncfas->family_id = $_GET['id'];
        $ncfas->save();
    }

    if($value['closure']){
        $ncfas = new Ncfas();
        $ncfas->family_id = $_GET['id'];
        $ncfas->category = $category;
        $ncfas->step = 3;
        $ncfas->sub_category = $key;
        $ncfas->score = $value['closure'];
        $ncfas->family_id = $_GET['id'];
        $ncfas->save();
    }

}


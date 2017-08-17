<?php
require_once __DIR__ ."/../inc/initialize.php";
require_once __DIR__ ."/../inc/header.php";
$family_id = $_GET['id'];
$family = Family::find_by_id($family_id);
$children = Family::find_by_sql('select * from children where family_id =' . $family_id);
$caregivers = Family::find_by_sql('select * from caregivers where family_id =' . $family_id);
//print_r($family);
?>
<div class="well">

    <h2>Family Name: <?=$family->name ?></h2>

<div class="row">
    <div class="col-md-4">
        <? if($caregivers){
            foreach ($caregivers as $caregiver){
                echo $caregiver->name;
            }
        }
        ?>
        <h3><a href="../caregiver/create.php?id=<?=$family_id ?>">Add Caregiver</a></h3>
    </div>
    <div class="col-md-4">
        <? if($children){
            foreach ($children as $child){
                echo $child->name;
            }
        }
        ?>
        <h3><a href="../children/create.php?id=<?=$family_id ?>">Add Child</a></h3>
    </div>
    <div class="col-md-4">
        <h3>Add NCFAS Information</h3>
        <h4><a href="../ncfas/create.php?id=<?=$family_id ?>&category_id=1">Environment</a> </h4>
        <h4><a href="../ncfas/create.php">Parental Capabilities</a> </h4>
        <h4><a href="../ncfas/create.php">Family Interactions</a> </h4>
        <h4><a href="../ncfas/create.php">Family Safety</a> </h4>
        <h4><a href="../ncfas/create.php">Child Well-Being</a> </h4>
        <h4><a href="../ncfas/create.php">Social/Community Life</a> </h4>
        <h4><a href="../ncfas/create.php">Self-Sufficiency</a> </h4>
        <h4><a href="../ncfas/create.php">Family Health</a> </h4>
    </div>
</div>


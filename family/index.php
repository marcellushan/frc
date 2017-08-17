<?php
require_once __DIR__ ."/../inc/initialize.php";
require_once __DIR__ ."/../inc/header.php";
$family_id = $_GET['id'];
$family = Family::find_by_id($family_id);
$children = Family::find_by_sql('select * from children where family_id =' . $family_id);
$caregivers = Family::find_by_sql('select * from caregivers where family_id =' . $family_id);
$income_sources = FamilyIncome::find_by_sql("SELECT * FROM family_income, income_sources 
where family_id = " . $family_id . " and family_income.income_id = income_sources.id");
$abuses = AbuseFamily::find_by_sql("SELECT * FROM abuse_family, abuses 
where family_id = " . $family_id . " and abuse_family.abuse_id = abuses.id");
//print_r($abuses);
?>
<div class="well">
    <div class="row">
        <h2 class="col-md-6">Family Name: <span class="not_bold"><?=$family->name ?></span></h2>
        <h2 class="col-md-6">Case Number: <span class="not_bold"><?=$family->case_id ?></span></h2>
    </div>
    <div class="row">
        <h4 class="col-md-5">Street Address: <span class="not_bold"><?=$family->street ?></span></h4>
        <h4 class="col-md-3">City: <span class="not_bold"><?=$family->city ?></span></h4>
        <h4 class="col-md-2">State: <span class="not_bold"><?=$family->state ?></span></h4>
        <h4 class="col-md-2">Zip: <span class="not_bold"><?=$family->zip ?></span></h4>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <h4 class="col-md-12">Income Sources:</h4>
            </div>
            <? foreach ($income_sources as $income_source) {?>
                <div class="row">
                    <h4 class="col-md-12"><span class="not_bold"><?=$income_source->name ?></span></h4>
                </div>
            <? } ?>
        </div>
        <div class="col-md-3">
            <div class="row">
                <h4 class="col-md-12">Income Range (annual):</h4>
            </div>
                <div class="row">
                    <h4 class="col-md-12"><span class="not_bold"><?=$family->income_range ?></span></h4>
                </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <h4 class="col-md-12">Referral Source:</h4>
            </div>
            <div class="row">
                <h4 class="col-md-12"><span class="not_bold"><?=$family->income_range ?></span></h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <h4 class="col-md-12">Type of Abuse:</h4>
            </div>
            <? foreach ($abuses as $abuse) {?>
                <div class="row">
                    <h4 class="col-md-12"><span class="not_bold"><?=$abuse->name ?></span></h4>
                </div>
            <? } ?>
        </div>
    </div>


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


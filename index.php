<?php
require_once "inc/initialize.php";
require_once __DIR__ ."/inc/header.php";
$teams =$database->setQuery('select * from families');
//foreach ($teams as $team) {
//    echo $team['id'];
//
//}
?>
<div class="well">
    <h2><a href="family/create.php">Add a Family</a> </h2>

    <h2>Select a Family</h2>
    <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
        <?php foreach ($teams as $team){?>
            <option value="family/index.php?id=<?=$team['id'] ?>"><?=$team['name']?></option>
        <? } ?>
    </select>




</div>

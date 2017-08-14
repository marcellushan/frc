<?php
require_once __DIR__ ."/../inc/initialize.php";
require_once __DIR__ ."/../inc/newheader.php";
?>
<div class="well">
    <h2 align="center">Category: <?=$_GET['category'] ?></h2>
<form action="store.php" method="post">
    <?php
    $category = "Housing Stability";
    include "../inc/ncfas_select.php";

    $category = "Safety in the Community";
    include "../inc/ncfas_select.php";

    $category = "Environmental Risks";
    include "../inc/ncfas_select.php";

    $category = "Habitibility of Housing";
    include "../inc/ncfas_select.php";

    $category = "Personal Hygiene";
    include "../inc/ncfas_select.php";

    $category = "Learning Environment";
    include "../inc/ncfas_select.php";

    $category = "Overall Environment";
    include "../inc/ncfas_select.php";
    ?>


<button type="submit">submit</button>

</form>

</div>
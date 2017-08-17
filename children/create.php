<?php
require_once __DIR__ ."/../inc/initialize.php";
require_once __DIR__ ."/../inc/header.php";
$family_id = $_GET['id'];
$family = Family::find_by_id($family_id);
?>
<div class="well">
<form action="store.php?id=<?=$family_id ?>" method="post">
    <h2>Family: <?=$family->name ?></h2>
    <h1>Add Child</h1>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Date of Birth:</label>
            <input type="date" name="birth_date" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="street">Gender</label>
            <input type="radio" name="gender" value="1">Male
            <input type="radio" name="gender" value="2">Female
        </div>
        <div class="col-md-4">
            <label>Race</label>
            <select name="race">
                <option>Select</option>
                <option value="1">White</option>
                <option value="2">Black</option>
                <option value="3">Other</option>
            </select>
        </div>
    </div>

<br>
<button type="submit">submit</button>

</form>

</div>
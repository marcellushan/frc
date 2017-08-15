<?php
require_once __DIR__ ."/../inc/initialize.php";
require_once __DIR__ ."/../inc/header.php";
?>
<div class="well">
<form action="store.php"  method="post">
    <h1>Add Re-abuse</h1>
    <div class="row">
       <div class="form-group col-md-4">
            <label for="name">Date:</label>
            <input type="date" name="date" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label>Type of Abuse</label>
            <select name="type">
                <option>Select</option>
                <option value="1">Physical</option>
                <option value="2">Emotional</option>
                <option value="3">Sexual</option>
                <option value="4">High Risk</option>
                <option value="5">Other</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="street">Outcome</label>
            <input type="radio" name="outcome" value="1">Confirmed
            <input type="radio" name="outcome" value="2">Unconfirmed
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <label>Notes</label>
            <textarea class="form-control" rows="5" name="notes" ></textarea>
        </div>
    </div>

<br>
<button type="submit">submit</button>

</form>

</div>
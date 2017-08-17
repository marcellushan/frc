<?php
require_once __DIR__ ."/../inc/initialize.php";
require_once __DIR__ ."/../inc/header.php";
$family_id = $_GET['id'];
?>
<div class="well">
<form action="store.php?id=<?=$family_id ?>" method="post">
    <h1>Add Caregiver</h1>
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
            <label>Marital Status</label>
            <select name="marital_status">
                <option>Select</option>
                <option value="1">Single</option>
                <option value="2">Married</option>
                <option value="3">Divorced</option>
                <option value="4">Separated</option>
                <option value="5">Widow</option>
            </select>
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
    <div class="row">
        <div class="col-md-4">
            <label>Education</label>
            <select name="education">
                <option>Select</option>
                <option value="1">Less than High School</option>
                <option value="2">High School Graduate</option>
                <option value="3">GED</option>
                <option value="4">Vocational</option>
                <option value="5">Some College</option>
                <option value="6">College Graduate</option>
                <option value="7">Other</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>Family Role</label>
            <select name="family_role">
                <option>Select</option>
                <option value="1">Biological Parent</option>
                <option value="2">GrandParent</option>
                <option value="3">Step-Parent</option>
                <option value="4">Live-in</option>
                <option value="5">Foster Parent</option>
                <option value="6">Adoptive Parent</option>
                <option value="7">Other</option>
            </select>
        </div>
    </div>
<br>
<button type="submit">submit</button>

</form>

</div>
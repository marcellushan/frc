<?php
require_once __DIR__ ."/../inc/initialize.php";
require_once __DIR__ ."/../inc/newheader.php";
?>
<div class="well">
<form action="store.php" method="post">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="case_id"> Case ID:</label>
            <input type="text" name="case_id" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="street">Street Address:</label>
            <input type="text" name="street" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="city">City:</label>
            <input type="text" name="city" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <label for="state">State:</label>
            <input type="text" name="state" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <label for="zip">Zip Code:</label>
            <input type="text" name="zip" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label>Income Source (select all that apply)</label>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="1">Full-time Employment
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="2">Part-time Employment
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="3">SS
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="4">SSI
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="5">Child Support
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="6">Food Stamps
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="7">TANF
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="8">Family Members
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="9">Retirement/Pension
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="10">Other
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Income Range (annual)</label>
            <select name="income_range">
                <option>Select Range</option>
                <option value="1">Less than $10,000</option>
                <option value="2">$10,000 - $19,999</option>
                <option value="3">$20,000 - $29,999</option>
                <option value="4">$30,000 - $39,999</option>
                <option value="5">$40,000 - $49,999</option>
                    <option value="6">$50,000+</option>
            </select>
        </div>
        <div class="col-md-6">
            <label>Referral Source</label>
            <select name="referral">
                <option value="1">Select Referral</option>
                <option value="1">DFCS</option>
                <option value="2">Court</option>
                <option value="3">Self</option>
                <option value="4">Mental Health Agency</option>
                <option value="5">Mental Health Private</option>
                <option value="6">Hospital/Physician</option>
                <option value="7">Family</option>
                <option value="8">School</option>
                <option value="9">Other Human Resource provider</option>
                <option value="10">Other</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <label>Type of Abuse (select all that apply)</label>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="1">Physical Abuse
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="2">Emotional Abuse
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="3">Sexual Abuse
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="4">Neglect
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="5">High Risk
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="6">Other
            </div>
        </div>
    </div>
    <label>Date of INA</label>
        <input type="date" name="ina_date"><p></p>
<button type="submit">submit</button>

</form>

</div>
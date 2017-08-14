<?php
require_once __DIR__ ."/../inc/initialize.php";
require_once __DIR__ ."/../inc/newheader.php";
$family_id = $_GET['id'];
$family = Family::find_by_id($family_id);
$family_incomes = FamilyIncome::find_by_sql("select income_id from family_income where family_id = " . $family_id);
$income_set= [];
foreach ($family_incomes as $family_income)
{
    array_push($income_set, $family_income->income_id);
}
$abuse_families = AbuseFamily::find_by_sql("select abuse_id from abuse_family where family_id = " . $family_id);
$abuse_set= [];
foreach ($abuse_families as $abuse_family)
{
    array_push($abuse_set, $abuse_family->abuse_id);
}

//print_r($family->income_range);

?>
<div class="well">
<form action="update.php" method="post">
    <input type="hidden" name="family_id" value="<?=$family_id ?>">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="case_id"> Case ID:</label>
            <input type="text" name="case_id" class="form-control" value="<?=$family->case_id ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="<?=$family->name ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="street_address">Street Address:</label>
            <input type="text" name="street" class="form-control" value="<?=$family->street ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="city">City:</label>
            <input type="text" name="city" class="form-control" value="<?=$family->city ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="state">State:</label>
            <input type="text" name="state" class="form-control" value="<?=$family->state ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="zip">Zip Code:</label>
            <input type="text" name="zip" class="form-control" value="<?=$family->zip ?>">
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
                <input type="checkbox" name="income_source[]" value="1" <?php echo (in_array('1', $income_set) ? "checked" :""); ?>>Full-time Employment
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="2" <?php echo (in_array('2', $income_set) ? "checked" :""); ?>>Part-time Employment
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="3" <?php echo (in_array('3', $income_set) ? "checked" :""); ?>>SS
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="4" <?php echo (in_array('4', $income_set) ? "checked" :""); ?>>SSI
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="5" <?php echo (in_array('5', $income_set) ? "checked" :""); ?>>Child Support
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="6" <?php echo (in_array('6', $income_set) ? "checked" :""); ?>>Food Stamps
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="7" <?php echo (in_array('7', $income_set) ? "checked" :""); ?>>TANF
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="8" <?php echo (in_array('8', $income_set) ? "checked" :""); ?>>Family Members
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="9" <?php echo (in_array('9', $income_set) ? "checked" :""); ?>>Retirement/Pension
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="income_source[]" value="10" <?php echo (in_array('10', $income_set) ? "checked" :""); ?>>Other
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Income Range (annual)</label>
            <select name="income_range">
                <option>Select Range</option>
                <option value="1" <?php echo ($family->income_range=='1' ? 'selected':'');?>>Less than $10,000</option>
                <option value="2" <?php echo ($family->income_range=='2' ? 'selected':'');?>>$10,000 - $19,999</option>
                <option value="3" <?php echo ($family->income_range=='3' ? 'selected':'');?>>$20,000 - $29,999</option>
                <option value="4" <?php echo ($family->income_range=='4' ? 'selected':'');?>>$30,000 - $39,999</option>
                <option value="5" <?php echo ($family->income_range=='5' ? 'selected':'');?>>$40,000 - $49,999</option>
                <option value="6" <?php echo ($family->income_range=='6' ? 'selected':'');?>>$50,000+</option>
            </select>
        </div>
        <div class="col-md-6">
            <label>Referral Source</label>
            <select name="referral">
                <option>Select Referral</option>
                <option value="1" <?php echo ($family->referral=='1' ? 'selected':'');?>>DFCS</option>
                <option value="2" <?php echo ($family->referral=='2' ? 'selected':'');?>>Court</option>
                <option value="3" <?php echo ($family->referral=='3' ? 'selected':'');?>>Self</option>
                <option value="4" <?php echo ($family->referral=='4' ? 'selected':'');?>>Mental Health Agency</option>
                <option value="5" <?php echo ($family->referral=='5' ? 'selected':'');?>>Mental Health Private</option>
                <option value="6" <?php echo ($family->referral=='6' ? 'selected':'');?>>Hospital/Physician</option>
                <option value="7" <?php echo ($family->referral=='7' ? 'selected':'');?>>Family</option>
                <option value="8" <?php echo ($family->referral=='8' ? 'selected':'');?>>School</option>
                <option value="9" <?php echo ($family->referral=='9' ? 'selected':'');?>>Other Human Resource provider</option>
                <option value="10" <?php echo ($family->referral=='10' ? 'selected':'');?>>Other</option>
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
                <input type="checkbox" name="abuse[]" value="1" <?php echo (in_array('1', $abuse_set) ? "checked" :""); ?>>Physical Abuse
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="2" <?php echo (in_array('2', $abuse_set) ? "checked" :""); ?>>Emotional Abuse
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="3" <?php echo (in_array('3', $abuse_set) ? "checked" :""); ?>>Sexual Abuse
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="4" <?php echo (in_array('4', $abuse_set) ? "checked" :""); ?>>Neglect
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="5" <?php echo (in_array('5', $abuse_set) ? "checked" :""); ?>>High Risk
            </div>
            <div class="col-md-3">
                <input type="checkbox" name="abuse[]" value="6" <?php echo (in_array('6', $abuse_set) ? "checked" :""); ?>>Other
            </div>
        </div>
    </div>
    <label>Date of INA</label>
        <input type="date" name="ina_date" value="<?=$family->ina_date ?>"><p></p>
<button type="submit">submit</button>

</form>

</div>
<?php
require_once __DIR__ ."/inc/initialize.php";
?>
<form action="family_store.php" method="post">

    <h3> Name:  <input type="text" name="name"></h3>
    <h3>Address:  <input type="text" name="street_address"></h3>
    <h3>City:  <input type="text" name="city"></h3>
    <h3>State:  <input type="text" name="state"></h3>
    <h3>Zip:  <input type="text" name="zip"></h3>
    <h3>Income Source (select all that apply)</h3>
        <input type="checkbox" name="income_source[]">Full-time Employment
        <input type="checkbox" name="income_source[]">Part-time Employment
        <input type="checkbox" name="income_source[]">SS
        <input type="checkbox" name="income_source[]">SSI
        <input type="checkbox" name="income_source[]">Child Support
        <input type="checkbox" name="income_source[]">Food Stamps
        <input type="checkbox" name="income_source[]">TANF
        <input type="checkbox" name="income_source[]">Family Members
        <input type="checkbox" name="income_source[]">Retirement/Pension
        <input type="checkbox" name="income_source[]">Other
    <h3>Income Range (annual)</h3>
        <input type="radio" name="income_range">Less than $10,000
        <input type="radio" name="income_range">$10,000 - $19,999
        <input type="radio" name="income_range">$20,000 - $29,999
        <input type="radio" name="income_range">$30,000 - $39,999
        <input type="radio" name="income_range">$40,000 - $49,999
        <input type="radio" name="income_range">$50,000+
    <h3>Referral Source (one only)</h3>
        <input type="radio" name="referral_source">DFCS
        <input type="radio" name="referral_source">Court
        <input type="radio" name="referral_source">Self
        <input type="radio" name="referral_source">Mental Health Agency
        <input type="radio" name="referral_source">Mental Health Private
        <input type="radio" name="referral_source">Hospital/Physician
        <input type="radio" name="referral_source">Family
        <input type="radio" name="referral_source">School
        <input type="radio" name="referral_source">Other Human Resource provider
        <input type="radio" name="referral_source">Other
    <h3>Type of Abuse (select all that apply)</h3>
        <input type="checkbox" name="abuse_type[]">Physical Abuse
        <input type="checkbox" name="abuse_type[]">Emotional Abuse
        <input type="checkbox" name="abuse_type[]">Sexual Abuse
        <input type="checkbox" name="abuse_type[]">Neglect
        <input type="checkbox" name="abuse_type[]">High Risk
        <input type="checkbox" name="abuse_type[]">Other
    <h3>Date of INA</h3>
        <input type="date">
<button type="submit">submit</button>

</form>
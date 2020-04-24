<?php
function valid_class_name($str)
{
return (!preg_match("/^[CAP][0-9][0-9][0-9][0-9][GHIKLM]$/", $str)) ? false : true;
}

function checkValidClassName($className)
{
if (!valid_phone_number($className)) {
echo "Invalid class name.";
} else {
echo "Valid class name.";
}
}
checkValidPhoneNumber('C0318G');echo '<br>';
checkValidPhoneNumber('A6537H');echo '<br>';
checkValidPhoneNumber('P6537I');echo '<br>';

checkValidPhoneNumber('M0318G');echo '<br>';
checkValidPhoneNumber('C038G');echo '<br>';
checkValidPhoneNumber('P0323A');echo '<br>';
checkValidPhoneNumber('P$%23A');echo '<br>';
checkValidPhoneNumber('%^&*(');echo '<br>';

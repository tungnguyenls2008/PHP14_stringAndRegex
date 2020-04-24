<?php
function valid_class_name($str)
{
return (!preg_match("/^[CAP][0-9][0-9][0-9][0-9][GHIKLM]$/", $str)) ? false : true;
}

function checkValidClassName($className)
{
if (!valid_class_name($className)) {
echo "Invalid class name.";
} else {
echo "Valid class name.";
}
}
checkValidClassName('C0318G');echo '<br>';
checkValidClassName('A6537H');echo '<br>';
checkValidClassName('P6537I');echo '<br>';

checkValidClassName('M0318G');echo '<br>';
checkValidClassName('C038G');echo '<br>';
checkValidClassName('P0323A');echo '<br>';
checkValidClassName('P$%23A');echo '<br>';
checkValidClassName('%^&*(');echo '<br>';

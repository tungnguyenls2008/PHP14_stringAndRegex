<?php
function valid_account($str)
{
    return (!preg_match("/^[_a-z0-9]{6,}$/", $str)) ? false : true;
}

function checkValidAccount($acc)
{
    if (!valid_account($acc)) {
        echo "Invalid account.";
    } else {
        echo "Valid account.";
    }
}
checkValidAccount('123abc_');echo '<br>';
checkValidAccount('_abc123');echo '<br>';
checkValidAccount('______');echo '<br>';
checkValidAccount('123456');echo '<br>';
checkValidAccount('abcdefg');echo '<br>';
checkValidAccount('.@');echo '<br>';
checkValidAccount('12345');echo '<br>';
checkValidAccount('1234_');echo '<br>';
checkValidAccount('abcde ');echo '<br>';
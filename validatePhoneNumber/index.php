<?php
function valid_phone_number($str)
{
    return (!preg_match("/^[(][0-9][0-9][)][-][(][0][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][)]$/", $str)) ? false : true;
}

function checkValidPhoneNumber($phoneNumber)
{
    if (!valid_phone_number($phoneNumber)) {
        echo "Invalid class name.";
    } else {
        echo "Valid class name.";
    }
}
checkValidPhoneNumber('(84)-(0978489648)');echo '<br>';
checkValidPhoneNumber('(84)-(0234666445)');echo '<br>';
checkValidPhoneNumber('(88)-(3457664344)');echo '<br>';
checkValidPhoneNumber('(a8)-(22222222)');echo '<br>';
checkValidPhoneNumber('(24)-(09%^&89648)');echo '<br>';
checkValidPhoneNumber('(84)-(0978489bd8)');echo '<br>';


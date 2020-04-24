<?php
function valid_email($str)
{
    return (!preg_match("/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/", $str)) ? false : true;
}

function checkValidEmail($email)
{
    if (!valid_email($email)) {
        echo "Invalid email address.";
    } else {
        echo "Valid email address.";
    }
}
checkValidEmail('a@gmail.com');echo '<br>';
checkValidEmail('ab@yahoo.com');echo '<br>';
checkValidEmail('abc@hotmail.com');echo '<br>';
checkValidEmail('@gmail.com');echo '<br>';
checkValidEmail('ab@gmail.');echo '<br>';
checkValidEmail('@#abc@gmail.com');echo '<br>';

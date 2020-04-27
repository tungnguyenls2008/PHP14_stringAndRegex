<?php


class Account
{
protected $fullName;
protected $email;
protected $phone;
protected $password;
public function __construct($fullName,$email,$phone,$password)
{
    $this->fullName=$fullName;
    $this->email=$email;
    $this->phone=$phone;
    $this->password=$password;
}
}
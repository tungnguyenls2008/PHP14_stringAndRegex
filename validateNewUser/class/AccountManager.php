<?php


class AccountManager
{
protected $filePath;
protected $accountList=[];
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }



    public function saveDataJSON($filename, $data)
    {
        try {

            $jsonData = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($filename, $jsonData);
            echo 'Data successfully saved';
        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }
    }
    public function loadAccountList()
    {
        $jsonData = file_get_contents($this->filePath);
        return json_decode($jsonData, true);

    }
    public function getAccountList()
    {
        $data = $this->loadAccountList();

        foreach ($data as $obj) {
            $account = new Account($obj['fullName'],$obj['email'],$obj['phone'],$obj['password']);

            array_push($this->accountList, $account);
        }
        return $this->accountList;
    }
    public function validateUserName($username){
        return (!preg_match("/^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/", $username)) ? false : true;
    }
    public function validatePassword($password){
        return (!preg_match("/^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8}$/", $password)) ? false : true;
    }
    public function validatePhoneNumber($phone)
    {
        return (!preg_match("/^[(][0-9][0-9][)][-][(][0][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][)]$/", $phone)) ? false : true;
    }
}
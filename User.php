<?php
include('Database.php');

class User extends Database
{
    public $email = "";
    public $pass = "";
    public $validationResult = false;

    function validationData($email, $pass, $checkPass = "") {
        $result = new User();
        $result->validationResult;
        if ($email == "" || $pass == "") return false;
        elseif($pass != $checkPass ) return false;
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
        else {
            $this->validationResult = true;
            $this->email = $email;
            $this->pass = $pass;
            return true;
        }
    }

    function saveUserData(){
        $db = new Database();
        $user = new User();
        $conn = $db->setConnection();
        $db->insertNewUser($this->email, $this->pass, $conn);
    }

    function login($email, $pass){
        $db = new Database();
        $conn = $db->setConnection();
        $result = $db->loginUser($email, $pass, $conn);
        return $result;
    }
}

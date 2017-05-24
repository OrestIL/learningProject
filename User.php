<?php
include('Database.php');

class User extends Database
{
    public $email = "";
    public $pass = "";

    function validationData($email, $pass, $checkPass = "") {
        $result = new User();
        if ($email == "" || $pass == "") { return false;}
        elseif($pass != $checkPass ){ return false;}
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { return false;}
        else {
            $this->email = $email;
            $this->pass = $pass;
            return true;
        }
    }

    function saveUserData(){
        $db = new Database();
        $user = new User();
        $db->insertNewUser($this->email, $this->pass);
    }

    function login($email, $pass){
        $db = new Database();
        $result = $db->loginUser($email, $pass);
        return $result;
    }
}

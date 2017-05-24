<?php
//
class Database
{
    public $serverName = "localhost";
    public $dataBaseName = "learningProject";
    public $username = "root";
    public $password = "";

    function setConnection() {
        $conn = new mysqli($this->serverName, $this->username, $this->password, $this->dataBaseName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function insertNewUser($email, $password) {
        $conn = $this->setConnection();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword');";
        if ($conn->multi_query($sql) === TRUE) return true;
        else return false;
    }

    function loginUser($email, $pass) {
            $conn = $this->setConnection();
            $sql = "SELECT email, password FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    if (password_verify($pass, $row["password"])){
                        return true;
                    } else return false;
                }
            }
            else {return false;}
    }
}
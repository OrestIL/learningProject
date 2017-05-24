<?php

class Database
{
    private $serverName = "localhost";
    private $dataBaseName = "learningProject";
    private $username = "root";
    private $password = "";
    public $conn;

    public function __construct()
    {
        $this->conn = $this->setConnection();
    }

    private function setConnection()
    {
        $conn = new mysqli($this->serverName, $this->username, $this->password, $this->dataBaseName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function insertNewUser($email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword');";
        if ($this->conn->multi_query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function loginUser($email, $pass)
    {
        $sql = "SELECT email, password FROM users WHERE email = '$email'";
        if ($this->conn === false) {
            echo "No connection";
        } else {
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if (password_verify($pass, $row["password"])) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        }
    }
}
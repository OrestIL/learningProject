<?php
if (isset($_COOKIE['user'])){
    setcookie("user", "", time() - 60*60*24*365);
    header("Location: index.php");
}
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include_once("header.php");
    echo "<head>
    <link rel=\"stylesheet\" href=\"login.css\">
        </head>
        <h2>Login form</h2>
        <form action=\"login.php\" method=\"post\">
            <input type=\"email\" name=\"email\" placeholder=\"Enter your email\" required>
            <input type=\"password\" name=\"pass\" placeholder=\"Enter your password\" required>
            <input type=\"submit\" name=\"submit\" value=\"Summit\">
        </form> ";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("User.php");
    $linkForRedirect = "login.php";
    $user = new User();
    $user->email = $_POST["email"];
    $user->pass = $_POST["pass"];
    $result = $user->login($_POST["email"], $_POST["pass"]);
    if ($result === true) {
        setcookie('user', $_POST["email"], time() + 60 * 60 * 24 * 365);
        $linkForRedirect = "index.php";
        header("Location: " . $linkForRedirect);
        exit();
    } else {
        $linkForRedirect = "login.php";
        header("Location:" . $linkForRedirect);
        exit();
    }
} else {
    header("Location:" . $linkForRedirect);
    exit();
}
?>

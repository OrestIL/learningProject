<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include_once("header.php");
    echo "<head>
        <link rel=\"stylesheet\" href=\"registration.css\">
        </head>
        <h2>Registration form</h2>
        <form action=\"registration.php\" method=\"post\">
            <input type=\"email\" name=\"email\" placeholder=\"Enter your email\" required>
            <input type=\"password\" name=\"pass\" placeholder=\"Enter your password\" required>
            <input type=\"password\" name=\"checkPass\" placeholder=\"Confirm your password\" required>
            <input type=\"submit\" name=\"submit\" value=\"Summit\">
        </form>";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("User.php");
    $linkForRedirect = "index.php";
    $user = new User();
    $result = $user->validationData($_POST["email"], $_POST["pass"], $_POST["checkPass"]);
    if ($result === true) {
        $user->saveUserData();
        $linkForRedirect = "login.php";
        header("Location: " . $linkForRedirect);
        exit();
    } else {
        $linkForRedirect = "registration.php";
        header("Location:" . $linkForRedirect);
        exit();
    }
} else {
    header("Location:" . $linkForRedirect);
}
?>


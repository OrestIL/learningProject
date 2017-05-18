<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testing</title>
    <link rel="stylesheet" href="style.css"></link>
</head>
<body>
<?php
    echo "Hello world" . "</br>" . "good";
?>
<h2>Registration form</h2>
<form action="index.php" method="post">
    <input type="email" name="email" placeholder="Enter your email">
    <input type="text" name="nickname" placeholder="Enter your nickname">
    <input type="password" name="pass" placeholder="Enter your password">
    <input type="password" name="checkpass" placeholder="Confirm your password">
    <input type="submit" name="submit">
</form>
</body>
</html>
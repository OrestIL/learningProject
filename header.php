<header class="top-menu">
    <a class="title" href="index.php">Test application</a>
    <?php
    if (!isset($_COOKIE['user'])) {
        echo "<a href=\"registration.php\">Registration</a>
                 <a href=\"login.php\">Log In</a>";
    } else {
        echo "You're logged as " . $_COOKIE['user'];
        echo "&nbsp &nbsp &nbsp";
        echo "<a href=\"logout.php\">Log out</a>";
    }
    ?>
</header>
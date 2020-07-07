<?php

//Initialize the session.

//if you are using session_name("something"), don't forget it now!

session_start();

//Unset all of the variables.

$_SESSION=array();

//if it's desired to kill the session also delete the session cookie.
//Note: This will destroy the session, and not just the session data!

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//Finally, destory the session.
session_destroy();
header("Location: index.php");
exit;
?>